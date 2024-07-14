@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_css/item.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">商品一覧</h2>
    </div>
    <div class="main-search">
        <form class="search-form" action="/admin/item/search" method="get">
            <input class="search-form__input" type="text" name="keyword" placeholder="商品名又はカテゴリーで検索"
            value="{{ old('keyword') }}" onchange="submit()">
        </form>
    </div>
    <div class="main-content">
        @foreach($items as $item)
        <div class="content-item">
            <div class="item-photo">
                <img class="item-photo__img" src="{{ asset($item->img_url) }}" alt="商品画像">
            </div>
            <div class="item-name">
                {{ $item['item_name'] }}
            </div>
            <div class="comment-count">
                総コメント数&emsp;{{ $item['comments_count'] }}
            </div>
            <div class="comment-confirm">
                <a class="comment-confirm__link" href="{{ route('adminComment', ['item' => $item['id']]) }}">コメント確認</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection