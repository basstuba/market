@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_css/comment.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-link">
        <a class="main-link__back" href="{{ route('adminItem') }}">商品一覧へ</a>
    </div>
    <div class="main-title">
        <h2 class="main-title__logo">コメント一覧</h2>
    </div>
    <div class="message">
        {{ session('message') ?? '' }}&emsp;
    </div>
    <div class="main-content">
        @foreach($comments as $comment)
        <div class="content-item">
            <div class="comment-user">
                {{ $comment['user']['name'] }}
            </div>
            <div class="comment-delete">
                <form class="delete-form" action="/admin/comment/delete" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment['id'] }}">
                    <input type="hidden" name="item_id" value="{{ $comment['item_id'] }}">
                    <button class="delete-button" type="submit">削除する</button>
                </form>
            </div>
        </div>
        <div class="comment-text">
            {{ $comment['comment'] }}
        </div>
        @endforeach
    </div>
</div>
@endsection