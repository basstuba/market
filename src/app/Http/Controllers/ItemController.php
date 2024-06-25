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

        return view('index', compact('items'));
    }

    public function viewChange(Request $request) {
        $user = Auth::user();

        if(has($request->myList)) {
            $items = Like::with('item')->where('user_id', $user['id'])->get();

            return redirect('/')->with('items', $items);
        }else{
            return redirect('/');
        }
    }

    public function detail($itemId) {
        $item = Item::with(['condition', 'likes', 'comments', 'categories'])->withCount(['likes', 'comments'])->find($itemId);
        $user = Auth::check() ? Auth::user() : [ 'id' => 0 ];
        $like = $item['likes']->where('user_id', $user['id'])->first();

        return view('item', compact('item', 'like'));
    }
}
