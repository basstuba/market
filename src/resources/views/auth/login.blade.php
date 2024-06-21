@extends('layouts.logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">ログイン</h2>
    </div>
    <div class="main-content">
        <form class="main-form" action="/login" method="post">
            @csrf
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
                <input class="item-input" type="password" name="password" value="{{ old('password') }}">
            </div>
            <div class="form-item__error">
                @error('password')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="item-button">
                <button class="item-button__submit">ログインする</button>
            </div>
        </form>
    </div>
    <div class="main-link">
        <a class="main-link__button" href="{{ route('linkLogin') }}">会員登録はこちら</a>
    </div>
</div>
@endsection