<?php
// app/Http/Controllers/Admin/FeedbackController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $query = Feedback::with('user:id,name,email')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $feedbacks = $query->paginate(20)->withQueryString();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function show(Feedback $feedback)
    {
        $feedback->load('replies.user', 'relatedApplication');
        return view('admin.feedback.show', compact('feedback'));
    }

    public function reply(Request $request, Feedback $feedback)
    {
        $request->validate(['message' => 'required|string']);

        $feedback->replies()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        // opsional: auto-update status jadi in_progress kalau masih open
        if ($feedback->status === 'open') {
            $feedback->update(['status' => 'in_progress']);
        }

        return back()->with('success', 'Balasan terkirim.');
    }

    public function updateStatus(Request $request, Feedback $feedback)
    {
        $request->validate(['status' => 'required|in:open,in_progress,resolved,closed']);
        $feedback->update(['status' => $request->status]);
        return back()->with('success', 'Status diperbarui.');
    }
}
