<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;

class ReplyController extends Controller
{

    public function store(Request $request, $commentId)
    {

        $request->validate([
            'reply_content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($commentId);
        $reply = new Reply([
            'reply_content' => $request->input('reply_content'),
        ]);

        $comment->replies()->save($reply);

        return back()->with('success', 'Reply added successfully.');
    }
}
