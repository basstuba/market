@extends('layouts.blank')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">住所の変更</h2>
    </div>
    <div class="main-content">
        <form class="content-form" action="/address/update" method="post">
            @csrf
            <div class="form-item">
                <label class="item-name">郵便番号</label>
                <input class="item-input" type="text" name="postcode" value="{{ old('postcode') }}">
            </div>
            <div class="form-item__error">
                @error('postcode')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="form-item">
                <label class="item-name">住所</label>
                <input class="item-input" type="text" name="address" value="{{ old('address') }}">
            </div>
            <div class="form-item__error">
                @error('address')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="form-item">
                <label class="item-name">建物名</label>
                <input class="item-input" type="text" name="building" value="{{ old('building') }}">
            </div>
            <div class="form-button">
                <input type="hidden" name="item_id" value="{{ $item }}">
                <button class="form-button__submit" type="submit">更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection