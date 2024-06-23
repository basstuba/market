@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="item-photo">
        <img class="item-img" src="{{ asset($item->img_url) }}" alt="商品画像">
    </div>
    <div class="item-detail">
        <h2 class="item-name">
            {{ $item['name'] }}
        </h2>
        <div class="item-brand">COACHTECH</div>
        <div class="item-price">
            {{ '¥' . number_format($item['price']) }}
        </div>
        <div class="item-evaluation">
            <div class="like">
                @if(!empty($like))
                <form class="like-form__delete" action="/like/delete" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    <input class="like-color" type="image" src="{{ asset('storage/image/like_color.png') }}" alt="お気に入りを外す">
                </form>
                @else
                <form class="like-form__create" action="/like/create" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    <input class="like-white" type="image" src="{{ asset('storage/image/like_white.png') }}" alt="お気に入り">
                </form>
                @endif
                <div class="like-count">
                    {{ $item['likes_count'] }}
                </div>
            </div>
            <div class="comment">
                <a class="comment-link" href="{{ route('comment', ['item' => $item['id']]) }}">
                    <img class="comment-link__icon" src="{{ asset('storage/image/comment.png') }}" alt="コメント">
                </a>
                <div class="comment-count">
                    {{ $item['comments_count'] }}
                </div>
            </div>
        </div>
        <div class="link-buy">
            <a class="link-buy__button" href="{{ route('buy', ['item' => $item['id']]) }}">購入する</a>
        </div>
        <h3 class="item-information">商品説明</h3>
        <div class="item-text">
            {{ $item['explanation'] }}
        </div>
        <h3 class="item-information">商品の情報</h3>
        <table class="information-table">
            <tr class="information-tr">
                <th class="information-th">カテゴリー</th>
                @foreach($item->categories as $category)
                <td class="information-td">
                    <div class="td-category">
                        {{ $category['category'] }}
                    </div>
                </td>
                @endforeach
            </tr>
            <tr class="information-tr">
                <th class="information-th">商品の状態</th>
                <td class="information-td">
                    <div class="td-condition">
                        {{ $item['condition']['condition'] }}
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection