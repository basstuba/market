<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class BuyController extends Controller
{
    public function buy($itemId) {
        $item = Item::find($itemId);

        return view('buy', compact('item'));
    }
}
