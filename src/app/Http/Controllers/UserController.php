<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Profile;
use App\Models\SoldItem;
use App\Models\User;

class UserController extends Controller
{
    public function myPage() {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user['id'])->first();

        $items = session()->has('items') ? session('items') : Item::where('user_id', $user['id'])->get();

        return view('user', compact('user', 'profile', 'items'));
    }

    public function listChange(Request $request) {
        $user = Auth::user();

        if(has($request->soldItem)) {
            $items = SoldItem::with('item')->where('user_id', $user['id'])->get();

            return redirect('/')->with('items', $items);
        }else{
            return redirect('/');
        }
    }

    public function profile($userId) {
        $profile = User::with('profile')->find($userId);

        return view('profile', compact('profile'));
    }

    public function address() {

        return view('address');
    }
}
