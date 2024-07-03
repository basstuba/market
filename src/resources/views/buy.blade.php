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
            <div class="payment-modal">
                <div class="modal-button">
                    <button class="payment-button__submit" popovertarget="Modal" popovertargetaction="show">変更する</button>
                </div>
                <div class="modal" id="Modal" popover="auto">
                    <form class="modal-form" action="/payment/redirect" method="get">
                        <div class="modal-item">
                            <label class="payment-item">
                                <input class="payment-item__input" type="radio" name="payment" value="card" onchange="submit()">
                                <span class="payment-item__name">クレジットカード払い</span>
                            </label>
                        </div>
                        <div class="modal-item">
                            <label class="payment-item">
                                <input class="payment-item__input" type="radio" name="payment" value="konbini" onchange="submit()">
                                <span class="payment-item__name">コンビニ払い</span>
                            </label>
                        </div>
                        <div class="modal-item">
                            <label class="payment-item">
                                <input class="payment-item__input" type="radio" name="payment" value="customer_balance" onchange="submit()">
                                <span class="payment-item__name">銀行振込</span>
                            </label>
                        </div>
                        <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    </form>
                    <div class="modal-close">
                        <button class="modal-close__button" popovertarget="Modal" popovertargetaction="hidden">閉じる</button>
                    </div>
                </div>
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
                <div class="sell-price">
                    @if(old('payment') == 'card')
                        {{ 'クレジットカード払い' }}
                    @elseif(old('payment') == 'konbini')
                        {{ 'コンビニ払い' }}
                    @elseif(old('payment') == 'customer_balance')
                        {{ '銀行振込' }}
                    @endif
                </div>
            </div>
        </div>
        <div class="form-item__error">
            @error('pay')
            {{ $message }}
            @enderror
            &emsp;
        </div>
        <form class="sell-form" action="/payment" method="post">
            @csrf
            <div class="sell-button">
                <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                <input type="hidden" name="pay" value="{{ old('payment') }}">
                <button class="sell-button__submit" type="submit">購入する</button>
            </div>
        </form>
    </div>
</div>
@endsection