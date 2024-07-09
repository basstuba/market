@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_css/index.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-item">
        <a class="main-item__link" href="{{ route('adminUser') }}">登録者一覧</a>
    </div>
    <div class="main-item">
        <a class="main-item__link" href="{{ route('adminItem') }}">商品別コメント一覧</a>
    </div>
</div>
@endsection