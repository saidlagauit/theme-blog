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

    public function destroy($commentId, $replyId)
    {
        try {
            $comment = Comment::findOrFail($commentId);

            $reply = $comment->replies()->findOrFail($replyId);

            $reply->delete();

            return back()->with('success', 'Reply deleted successfully.');

        } catch (\Exception $e) {

            return back()->with('error', 'Error deleting reply: ' . $e->getMessage());

        }
    }
}
