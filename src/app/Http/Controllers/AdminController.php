<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function adminUser() {
        $users = session()->has('users') ? session('users') : User::with('profile')->where('id', '!=', 1)->get();

        return view('admin.user', compact('users'));
    }

    public function adminSearch(Request $request) {
        $keyword = $request->input('keyword');
        $users = User::KeywordNameSearch($keyword)->where('id', '!=', 1)->get();

        return redirect('/admin/user')->with(['users' => $users]);
    }

    public function adminMail($userId) {
        $user = User::find($userId);

        return view('admin.mail_create', compact('user'));
    }

    public function adminUserDelete(Request $request) {
        User::find($request->user_id)->delete();

        return redirect('/admin/user')->with('message', '削除しました');
    }
}
