<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
