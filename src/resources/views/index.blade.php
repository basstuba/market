@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-select">
        <form class="select-form" action="">
            <div class="select-item">
                <label class="item-title">
                    <input class="item-check" type="checkbox" name="recommend" onchange="submit()" checked>
                    <span class="item-text">おすすめ</span>
                </label>
            </div>
            @if(Auth::check())
            <div class="select-item">
                <label class="item-title">
                    <input class="item-check" type="checkbox" name="myList" onchange="submit()">
                    <span class="item-text">マイリスト</span>
                </label>
            </div>
            @else
            <div class="select-item__dummy">マイリスト</div>
            @endif
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