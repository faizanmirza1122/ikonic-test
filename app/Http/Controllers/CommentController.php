<?php

// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($feedbackId)
    {
        // Retrieve the corresponding feedback for the comment
        $feedback = Feedback::findOrFail($feedbackId);

        return view('comment.create', compact('feedback'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'feedback_id' => 'required|exists:feedback,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'feedback_id' => $request->feedback_id,
        ]);

        return redirect()->route('feedbacks.show', $request->feedback_id)->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
