<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('applicationHistories')
            ->latest()
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('applicationHistories');
        return view('admin.users.show', compact('user'));
    }

    public function suspend(User $user)
    {
        $user->update([
            'status' => 'suspended'
        ]);

        return back()->with('success', 'User suspended.');
    }

    public function activate(User $user)
    {
        $user->update([
            'status' => 'active'
        ]);

        return back()->with('success', 'User activated.');
    }

    public function destroy(User $user)
    {
        // Cegah admin menghapus akunnya sendiri
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Path folder khusus milik user ini di dalam storage public (contoh: berkas/3)
        $userFolderPath = 'berkas/' . $user->id;

        // Jika folder tersebut ada di storage, hapus folder beserta seluruh file di dalamnya secara permanen
        if (Storage::disk('public')->exists($userFolderPath)) {
            Storage::disk('public')->deleteDirectory($userFolderPath);
        }

        // Hapus data user dari database (otomatis menghapus relasinya jika cascade)
        $user->delete();

        return back()->with('success', 'Pengguna beserta seluruh berkas dan foldernya berhasil dihapus.');
    }
}
