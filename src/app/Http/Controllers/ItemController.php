<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryItem;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Like;
use App\Models\Profile;
use App\Models\SoldItem;
use App\Models\User;

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
        $items = Item::with(['categories' => function($query) use ($request) {
            $query->CategoriesSearch($request->keyword);
        }])->KeywordSearch($request->keyword)->get();
        $change = 'search';

        return redirect('/')->with([
            'items' => $items,
            'change' => $change
        ]);
    }
}
