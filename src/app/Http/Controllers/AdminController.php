<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;

class AdminController extends Controller
{
    public function adminUser() {
        $users = User::with('profile')->where('id', '!=', 1)->get();

        return view('admin.user', compact('users'));
    }
}
