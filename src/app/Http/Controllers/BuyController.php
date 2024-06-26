<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\SoldItem;

class BuyController extends Controller
{
    public function buy($itemId) {
        $item = Item::find($itemId);

        return view('buy', compact('item'));
    }

    public function payment(Request $request) {
        $sold = $request->only('item_id');
        $user = Auth::user();

        $sold['user_id'] = $user->id;
        SoldItem::create($sold);

        return redirect()->route('detail', ['item' => $request->item_id])
        ->with('message', 'お買い上げありがとうございます');
    }
}
