<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMail;
use App\Models\User;

class MailController extends Controller
{
    public function send(MailRequest $request) {
        $user = User::find($request->user_id);
        $mail = $request->only('mail_title', 'mail_text');

        Mail::send(new AdminMail($user, $mail));

        return redirect('/admin/user')->with('message', 'メール送信完了しました');
    }
}
