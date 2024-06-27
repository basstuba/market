@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">プロフィール設定</h2>
    </div>
    <div class="main-content">
        <form class="content-form" action="/profile/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="upload">
                <div class="user-photo">
                    <img class="photo-img"
                    src="{{asset(old('img_url') ?? $profile['profile']['img_url'] ?? 'storage/image/user_icon.png')}}" alt="ユーザーアイコン">
                </div>
                <div class="user-upload">
                    <input class="upload-input" id="upload" type="file" name="userImage">
                </div>
            </div>
            <div class="content-item">
                <label class="item-name">ユーザー名</label>
                <input class="item-input" type="text" name="name" value="{{ old('name') ?? $profile['name'] }}">
            </div>
            <div class="form-item__error">
                @error('name')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="content-item">
                <label class="item-name">郵便番号</label>
                <input class="item-input" type="text" name="postcode" value="{{ old('postcode') ?? $profile['profile']['postcode'] ?? '' }}">
            </div>
            <div class="form-item__error">
                @error('postcode')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="content-item">
                <label class="item-name">住所</label>
                <input class="item-input" type="text" name="address" value="{{ old('address') ?? $profile['profile']['address'] ?? '' }}">
            </div>
            <div class="form-item__error">
                @error('address')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="content-item">
                <label class="item-name">建物名</label>
                <input class="item-input" type="text" name="building" value="{{ old('building') ?? $profile['profile']['building'] ?? '' }}">
            </div>
            <div class="content-button">
                <input type="hidden" name="user_id" value="{{ $profile['id'] }}">
                <input type="hidden" name="profile_id" value="{{ $profile['profile']['id'] ?? '' }}">
                <button class="button-submit" type="submit">更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection