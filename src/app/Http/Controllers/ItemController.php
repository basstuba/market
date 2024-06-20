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
    public function test() {
        return view('layouts.app');
    }
}
