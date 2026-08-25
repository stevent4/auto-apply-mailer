<?php
// app/Http/Controllers/Admin/SystemLogController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemLog;
use Illuminate\Http\Request;

class SystemLogController extends Controller
{
    public function index(Request $request)
    {
        $query = SystemLog::with('user:id,name,email')->latest();

        if ($request->filled('level') && $request->level !== 'all') {
            $query->where('level', $request->level);
        }

        $logs = $query->paginate(50)->withQueryString();

        return view('admin.logs.index', compact('logs'));
    }
}
