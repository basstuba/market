@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-status">
        <div class="main-user">
            <div class="user-photo">
                <img class="photo-img" src="{{ asset($profile['img_url'] ?? 'storage/image/user_icon.png') }}" alt="ユーザーアイコン">
            </div>
            <div class="user-name">
                {{ $user['name'] }}
            </div>
        </div>
        <div class="main-link">
            <a class="link-profile" href="{{ route('profile', ['user' => $user['id']]) }}">プロフィールを編集</a>
        </div>
    </div>
    <div class="main-select">
        <form class="select-form" action="/user" method="get">
            <div class="select-item">
                <label class="item-title">
                    <input class="item-check" type="checkbox" name="sellItem"
                    onchange="submit()" {{ $change === 'sellItem' ? 'checked' : '' }}>
                    <span class="item-text">出品した商品</span>
                </label>
            </div>
        </form>
        <form class="select-form" action="/list/change" method="get">
            <div class="select-item">
                <label class="item-title">
                    <input class="item-check" type="checkbox" name="soldItem"
                    onchange="submit()" {{ $change === 'soldItem' ? 'checked' : '' }}>
                    <span class="item-text">購入した商品</span>
                </label>
            </div>
        </form>
    </div>
    <div class="main-content">
        @foreach($items as $item)
        <div class="item-img">
            <a class="item-link" href="{{ route('detail', ['item' => $item['id']]) }}">
                <img class="item-photo" src="{{ asset($item->img_url) }}" alt="商品画像">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection