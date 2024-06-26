@extends('layouts.blank')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">商品の出品</h2>
    </div>
    <div class="main-content">
        <form class="content-form" action="/sell/create" method="post" enctype="multipart/form-data">
            <div class="item-photo">
                <div class="input-title">商品画像</div>
                <div class="upload-space">
                    <label class="upload-button" for="upload">画像を選択する</label>
                    <input class="upload-input" id="upload" type="file" name="itemImage">
                </div>
            </div>
            <div class="form-item__error">
                @error('itemImage')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="content-title">
                <h3 class="content-title__logo">商品の詳細</h3>
            </div>
            <div class="item-select">
                <label class="select-title">カテゴリー</label>
                <select class="select" name="category_id">
                    <option value="" hidden>選択してください（複数選択可）</option>
                    @foreach($categories as $category)
                    <option value="{{ $category['id'] }}"
                    {{ old('category_id') == $category['id'] ? 'selected' : ''}}>
                        {{ $category['category'] }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-item__error">
                @error('category')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="item-select">
                <label class="select-title">商品の状態</label>
                <select class="select" name="condition_id">
                    <option value="" hidden>選択してください</option>
                    @foreach($conditions as $condition)
                    <option value="{{ $condition['id'] }}"
                    {{ old('condition_id') == $condition['id'] ? 'selected' : ''}}>
                        {{ $condition['condition'] }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-item__error">
                @error('condition')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="content-title">
                <h3 class="content-title__logo">商品名と説明</h3>
            </div>
            <div class="item-text">
                <label class="text-title">商品名</label>
                <input class="text" type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-item__error">
                @error('name')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="item-explanation">
                <label class="explanation-title">商品の説明</label>
                <textarea class="explanation" name="explanation" cols="60" rows="5">{{ old('explanation') }}</textarea>
            </div>
            <div class="form-item__error">
                @error('explanation')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="content-title">
                <h3 class="content-title__logo">販売価格</h3>
            </div>
            <div class="item-text">
                <label class="text-title">販売価格</label>
                <div class="item-price">
                    <span class="mark">￥</span>
                    <input class="price" type="number" name="price" value="{{ old('price') }}">
                </div>
            </div>
            <div class="form-item__error">
                @error('price')
                {{ $message }}
                @enderror
                &emsp;
            </div>
            <div class="form-button">
                <button class="form-button__submit" type="submit">出品する</button>
            </div>
        </form>
    </div>
</div>
@endsection