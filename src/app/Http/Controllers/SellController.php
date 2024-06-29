<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryItem;
use App\Models\Condition;
use App\Models\Item;

class SellController extends Controller
{
    public function sell() {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', compact('categories', 'conditions'));
    }

    public function sellCreate(ItemRequest $request) {
        $dir = 'image';
        $fileName = $request->file('itemImage')->getClientOriginalName();
        $request->file('itemImage')->storeAs('public/' . $dir, $fileName);

        $user = Auth::user();
        $item = $request->only('condition_id', 'item_name', 'explanation', 'price');
        $item['user_id'] = $user->id;
        $item['img_url'] = 'storage/' . $dir . '/' . $fileName;

        Item::create($item);

        $newItem = Item::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        foreach($request->category_id as $categoryId) {
            CategoryItem::create([
                'item_id' => $newItem->id,
                'category_id' => $categoryId
            ]);
        }

        return redirect('/')->with('message', '出品完了しました');
    }
}
