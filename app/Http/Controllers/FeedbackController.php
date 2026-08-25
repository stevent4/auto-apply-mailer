<?php
// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\ApplicationHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        // untuk dropdown opsional "kaitkan dengan lamaran yang gagal"
        $applications = ApplicationHistory::where('user_id', Auth::id())
            ->latest()
            ->take(20)
            ->get();

        return view('feedback.create', compact('applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'                    => 'required|in:feedback,report',
            'category'                => 'nullable|string|max:100',
            'title'                   => 'required|string|max:255',
            'description'             => 'required|string',
            'screenshot'              => 'nullable|image|max:2048', // max 2MB
            'related_application_id'  => 'nullable|exists:application_histories,id',
        ]);

        $screenshotPath = null;
        if ($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('feedback-screenshots', 'public');
        }

        Feedback::create([
            'user_id'                 => Auth::id(),
            'type'                    => $request->type,
            'category'                => $request->category,
            'title'                   => $request->title,
            'description'             => $request->description,
            'screenshot_path'         => $screenshotPath,
            'related_application_id'  => $request->related_application_id,
            'status'                  => 'open',
        ]);

        return redirect()->route('feedback.index')->with('success', 'Terima kasih, laporan Anda sudah kami terima.');
    }

    public function show(Feedback $feedback)
    {
        // pastikan user hanya bisa lihat feedback miliknya sendiri
        abort_unless($feedback->user_id === Auth::id(), 403);

        $feedback->load('replies.user');
        return view('feedback.show', compact('feedback'));
    }

    public function reply(Request $request, Feedback $feedback)
    {
        abort_unless($feedback->user_id === Auth::id(), 403);

        $request->validate(['message' => 'required|string']);

        $feedback->replies()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Balasan terkirim.');
    }
}
