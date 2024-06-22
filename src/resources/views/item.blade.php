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
        <h2 class="item-name">{{ $item['name'] }}</h2>
        <div class="item-brand">COACHTECH</div>
        <div class="item-price">{{ '¥' . $item['price'] }}</div>
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
                <div>{{ $item['likes_count'] }}</div>
            </div>
            <div class="comment"></div>
        </div>
        <div class="link-buy">
            <a class="link-buy__button" href="{{ route('buy', ['item' => $item['id']]) }}">購入する</a>
        </div>
        <h3 class="item-information">商品説明</h3>
        <div class="item-text">{{ $item['explanation'] }}</div>
        <h3 class="item-information">商品の情報</h3>
        <table class="information-table">
            <tr class="information-tr">
                <th class="information-th">カテゴリー</th>
                @foreach($item->categories as $category)
                <td class="information-td">{{ $category['category'] }}</td>
                @endforeach
            </tr>
            <tr class="information-tr">
                <th class="information-th">商品の状態</th>
                <td class="information-td">{{ $item['condition']['condition'] }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection