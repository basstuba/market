<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;

class ItemController extends Controller
{
    public function index() {
        $items = session()->has('items') ? session('items') : Item::recommendItem();
        $change = session()->has('change') ? session('change') : 'recommend';

        return view('index', compact('items', 'change'));
    }

    public function viewChange() {
        $user = Auth::user();

        $items = Like::where('user_id', $user['id'])->with('item')->get()->pluck('item');
        $change = 'myList';

        return redirect('/')->with([
            'items' => $items,
            'change' => $change
        ]);
    }

    public function detail($itemId) {
        $item = Item::with(['condition', 'likes', 'comments', 'categories'])->withCount(['likes', 'comments'])->find($itemId);
        $user = Auth::check() ? Auth::user() : [ 'id' => 0 ];
        $like = $item['likes']->where('user_id', $user['id'])->first();

        return view('item', compact('item', 'like'));
    }

    public function search(Request $request) {
        $keyword = $request->keyword;

        $nameItems = Item::KeywordSearch($keyword)->get();
        $categoryItems = Item::CategorySearch($keyword)->get();

        $items = $categoryItems->merge($nameItems)->unique('id');
        $change = 'search';

        return redirect('/')->with([
            'items' => $items,
            'change' => $change
        ]);
    }
}
