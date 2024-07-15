@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_css/mail_create.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">メール作成</h2>
    </div>
    <div class="main-content">
        <div class="content-address">
            <table class="address-table">
                <tr class="address-tr">
                    <th class="address-th">宛先氏名</th>
                    <td class="address-td">{{ $user['name'] }}</td>
                </tr>
                <tr class="address-tr">
                    <th class="address-th">宛先メールアドレス</th>
                    <td class="address-td">{{ $user['email'] }}</td>
                </tr>
            </table>
        </div>
        <div class="content-form">
            <form class="mail-form" action="/mail" method="post">
                @csrf
                <div class="mail-title">
                    <label class="mail-title__logo">タイトル</label>
                    <input class="mail-title__input" type="text" name="mail_title" value="{{ old('mail_title') }}">
                </div>
                <div class="mail-error">
                    @error('mail_title')
                    {{ $message }}
                    @enderror
                    &emsp;
                </div>
                <div class="mail-text">
                    <label class="mail-text__logo">本文内容</label>
                    <textarea class="mail-text__textarea" name="mail_text" cols="60" rows="10">{{ old('mail_text') }}</textarea>
                </div>
                <div class="mail-error">
                    @error('mail_text')
                    {{ $message }}
                    @enderror
                    &emsp;
                </div>
                <div class="form-button">
                    <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                    <button class="form-button__submit" type="submit">送信する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection