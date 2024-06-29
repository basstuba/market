<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Item;

class CommentController extends Controller
{
    public function comment($itemId) {
        $item = Item::with(['likes', 'comments'])->withCount(['likes', 'comments'])->find($itemId);
        $user = Auth::user();
        $commentUsers = Comment::with('user.profile')->where('item_id', $itemId)->orderBy('created_at', 'desc')->get();

        $like = $item['likes']->where('user_id', $user['id'])->first();

        return view('comment', compact('item', 'user', 'commentUsers', 'like'));
    }

    public function commentCreate(CommentRequest $request) {
        $user = Auth::user();
        $comment = $request->only('item_id', 'comment');
        $comment['user_id'] = $user->id;

        Comment::create($comment);

        return redirect()->route('comment', ['item' => $request->item_id]);
    }

    public function commentDelete(Request $request) {
        Comment::find($request->id)->delete();

        return redirect()->route('comment', ['item' => $request->item_id]);
    }
}
