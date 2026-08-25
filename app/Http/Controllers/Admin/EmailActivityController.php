<?php
// app/Http/Controllers/Admin/EmailActivityController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationHistory;
use Illuminate\Http\Request;

class EmailActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = ApplicationHistory::with('user:id,name,email')
            ->select('id', 'user_id', 'email_hrd', 'status', 'created_at')
            ->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $activities = $query->paginate(30)->withQueryString();

        // Diperbarui agar mendeteksi 'Terkirim', 'success', atau 'berhasil'
        $summary = [
            'success_today' => ApplicationHistory::whereDate('created_at', today())
                ->where(function ($q) {
                    $q->where('status', 'Terkirim')
                        ->orWhere('status', 'success')
                        ->orWhere('status', 'berhasil');
                })->count(),

            'failed_today'  => ApplicationHistory::whereDate('created_at', today())
                ->where(function ($q) {
                    $q->where('status', 'Gagal')
                        ->orWhere('status', 'failed');
                })->count(),
        ];

        return view('admin.email-activity.index', compact('activities', 'summary'));
    }
}
