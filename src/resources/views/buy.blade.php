@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/buy.css') }}"/>
@endsection

@section('content')
<div class="message">
    {{ session('message') ?? '' }}&emsp;
</div>
<div class="main">
    <div class="main-content">
        <div class="content-item">
            <div class="item-photo">
                <img class="item-img" src="{{ asset($item['img_url']) }}" alt="商品画像">
            </div>
            <div class="item-detail">
                <div class="item-name">
                    {{ $item['item_name'] }}
                </div>
                <div class="item-price">
                    {{ '¥' . number_format($item['price']) }}
                </div>
            </div>
        </div>
        <div class="payment">
            <div class="payment-name">支払い方法</div>
            <div class="payment-link">
                <a class="payment-link__button" href="#">変更する</a>
            </div>
        </div>
        <div class="delivery">
            <div class="delivery-name">配送先</div>
            <div class="delivery-link">
                <a class="delivery-link__button" href="{{ route('address', ['item' => $item['id']]) }}">変更する</a>
            </div>
        </div>
    </div>
    <div class="main-sell">
        <form class="sell-form" action="/payment" method="post">
            @csrf
            <div class="sell-detail">
                <div class="detail-price">
                    <div class="sell-name">商品代金</div>
                    <div class="sell-price">
                        {{ '¥' . number_format($item['price']) }}
                    </div>
                </div>
                <div class="detail-payment">
                    <div class="sell-name">支払い金額</div>
                    <div class="sell-price">
                        {{ '¥' . number_format($item['price']) }}
                    </div>
                </div>
                <div class="detail-method">
                    <div class="sell-name">支払い方法</div>
                    <div class="sell-price">コンビニ払い</div>
                </div>
            </div>
            <div class="sell-button">
                <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                <button class="sell-button__submit" type="submit">購入する</button>
            </div>
        </form>
    </div>
</div>
@endsection