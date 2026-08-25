<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ApplicationHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFiles = count(Storage::disk('public')->allFiles());
        $stats = [
            'total_users'        => User::count(),
            'total_storage_size' => $this->getStorageSize(),
            'total_files' => $totalFiles,
            'total_applications' => ApplicationHistory::count(),
            'applications_today' => ApplicationHistory::whereDate('created_at', today())->count(),
            'emails_success' => ApplicationHistory::where('status', 'Terkirim')
                ->orWhere('status', 'success')
                ->orWhere('status', 'berhasil')
                ->count(),
            'emails_failed' => ApplicationHistory::where(function ($q) {
                $q->where('status', 'Gagal')
                    ->orWhere('status', 'gagal')
                    ->orWhere('status', 'failed');
            })->count(),
            'gmail_connected'    => DB::table('google_accounts')->count(),
        ];

        $recentLogs = ApplicationHistory::latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentLogs'));
    }

    public function getStorageSize()
    {
        // Mengambil semua file di disk public (tempat upload lamaran/feedback)
        $files = Storage::disk('public')->allFiles();

        $totalSize = 0;
        foreach ($files as $file) {
            $totalSize += Storage::disk('public')->size($file);
        }

        // Ubah bytes menjadi format yang mudah dibaca (KB, MB, atau GB)
        return $this->formatBytes($totalSize);
    }

    // Helper untuk format ukuran file
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
