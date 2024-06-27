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
        $change = session()->has('change') ? session('change') : 'sellItem';

        return view('user', compact('user', 'profile', 'items','change'));
    }

    public function listChange() {
        $user = Auth::user();

        $items = SoldItem::where('user_id', $user['id'])->with('item')->get()->pluck('item');
        $change = 'soldItem';

        return redirect('/user')->with([
            'items' => $items,
            'change' => $change
        ]);
    }

    public function profile($userId) {
        $profile = User::with('profile')->find($userId);

        return view('profile', compact('profile'));
    }

    public function address() {

        return view('address');
    }
}
