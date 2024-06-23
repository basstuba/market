<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;

class CommentController extends Controller
{
    public function comment($itemId) {
        $item = Item::with(['likes', 'comments'])->withCount(['likes', 'comments'])->find($itemId);
        $user = Auth::user();
        $like = $item['likes']->where('user_id', $user['id'])->first();

        return view('comment', compact('item', 'user', 'like'));
    }
}
