<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function likeCreate(Request $request) {
        $user = Auth::user();
        $like = $request->only('item_id');
        $like['user_id'] = $user->id;

        Like::create($like);

        if($request->has('comment')) {
            return redirect()->route('comment', ['item' => $request->item_id]);
        }else{
            return redirect()->route('detail', ['item' => $request->item_id]);
        }
    }

    public function likeDelete(Request $request) {
        Like::find($request->like_id)->delete();

        if($request->has('comment')) {
            return redirect()->route('comment', ['item' => $request->item_id]);
        }else{
            return redirect()->route('detail', ['item' => $request->item_id]);
        }
    }
}
