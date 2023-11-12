<?php

// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Feedback::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Feedback created successfully');
    }

    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $feedback->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Feedback updated successfully');
    }

    public function destroy(Feedback $feedback)
    {
        // Delete associated comments
        $feedback->comments()->delete();
    
        // Then delete the feedback
        $feedback->delete();
    
        return redirect()->route('feedbacks.index')->with('success', 'Feedback deleted successfully');
    }

    
}
