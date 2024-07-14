<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Item;

class AdminCommentController extends Controller
{
    public function adminItem() {
        $items = session()->has('items') ? session('items') : Item::withCount('comments')->get();

        return view('admin.item', compact('items'));
    }

    public function adminItemSearch(Request $request) {
        $keyword = $request->input('keyword');

        $nameItems = Item::KeywordSearch($keyword)->withCount('comments')->get();
        $categoryItems = Item::CategorySearch($keyword)->withCount('comments')->get();

        $items = $categoryItems->merge($nameItems)->unique('id');

        return redirect('/admin/item')->with(['items' => $items]);
    }

    public function adminComment($itemId) {
        $comments = Comment::with('user')->where('item_id', $itemId)->get();

        return view('admin.comment', compact('comments'));
    }

    public function adminCommentDelete(Request $request) {
        Comment::find($request->comment_id)->delete();

        return redirect()->route('adminComment', ['item' => $request->item_id])->with('message', '削除しました');
    }
}
