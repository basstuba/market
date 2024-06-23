@extends('layouts.logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">会員登録</h2>
    </div>
    <div class="main-content">
        <form class="main-form" action="/register" method="post">
            @csrf
            <input type="hidden" name="name" value="ユーザー">
            <div class="form-item">
                <label class="item-name">メールアドレス</label>
                <input class="item-input" type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-item__error">
                @error('email')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="form-item">
                <label class="item-name">パスワード</label>
                <input class="item-input" type="text" name="password" value="{{ old('password') }}">
            </div>
            <div class="form-item__error">
                @error('password')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="item-button">
                <button class="item-button__submit" type="submit">登録する</button>
            </div>
        </form>
    </div>
    <div class="main-link">
        <a class="main-link__button" href="{{ route('linkLogin') }}">ログインはこちら</a>
    </div>
</div>
@endsection