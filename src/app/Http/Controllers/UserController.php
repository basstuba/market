<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProfileRequest;
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

    public function profileUpdate(ProfileRequest $request) {
        $userName = $request->only('name');
        User::find($request->user_id)->update($userName);

        $userProfile = Profile::where('user_id', $request->user_id)->first();
        $profile = $request->only('postcode', 'address', 'building');

        if($userProfile === null) {
            $profile['user_id'] = $request->user_id;
            Profile::create($profile);
        }else{
            Profile::find($userProfile['id'])->update($profile);
        }

        return redirect()->route('profile', ['user' => $request->user_id])
        ->with('message', 'プロフィールを変更しました');
    }

    public function address($itemId) {
        $item = $itemId;

        return view('address', compact('item'));
    }

    public function addressUpdate(AddressRequest $request) {
        $user = Auth::User();
        $profile = Profile::where('user_id', $user->id)->first();
        $address = $request->only('postcode', 'address', 'building');

        if($profile === null) {
            $address['user_id'] = $user->id;
            Profile::create($address);
        }else{
            Profile::find($profile['id'])->update($address);
        }

        return redirect()->route('buy', ['item' => $request->item_id])
        ->with('message', '住所を変更しました');
    }
}