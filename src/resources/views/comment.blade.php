@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="item-photo">
        <img class="item-img" src="{{ asset($item['img_url']) }}" alt="商品画像">
    </div>
    <div class="main-content">
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
                    <input type="hidden" name="comment">
                    <input type="hidden" name="like_id" value="{{ $like['id'] }}">
                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    <input class="like-color" type="image" src="{{ asset('storage/image/like_color.png') }}" alt="お気に入りを外す">
                </form>
                @else
                <form class="like-form__create" action="/like/create" method="post">
                    @csrf
                    <input type="hidden" name="comment">
                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    <input class="like-white" type="image" src="{{ asset('storage/image/like_white.png') }}" alt="お気に入り">
                </form>
                @endif
                <div class="like-count">
                    {{ $item['likes_count'] }}
                </div>
            </div>
            <div class="comment">
                <a class="comment-link__back" href="{{ route('detail', ['item' => $item['id']]) }}">
                    <img class="comment-link__icon" src="{{ asset('storage/image/comment.png') }}" alt="コメント">
                </a>
                <div class="comment-count">
                    {{ $item['comments_count'] }}
                </div>
            </div>
        </div>
        <div class="comment-detail">
            @foreach($commentUsers as $commentUser)
                @if($commentUser['user_id'] == $user['id'])
                <div class="comment-item">
                    <div class="my-user">
                        <div class="user-name">
                            {{ $commentUser['user']['name'] }}
                        </div>
                        <div class="user-photo">
                            <img class="photo-img"
                            src="{{ asset($commentUser['user']['profile']['img_url'] ?? 'storage/image/user_icon.png') }}" alt="ユーザーアイコン">
                        </div>
                    </div>
                    <div class="user-comment">
                        {{ $commentUser['comment'] }}
                    </div>
                    <div class="comment-delete">
                        <form class="delete-form" action="/comment/delete" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="id" value="{{ $commentUser['id'] }}">
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <button class="delete-button">コメント削除</button>
                        </form>
                    </div>
                </div>
                @else
                <div class="comment-item">
                    <div class="user">
                        <div class="user-photo">
                            <img class="photo-img"
                            src="{{ asset($commentUser['user']['profile']['img_url'] ?? 'storage/image/user_icon.png') }}" alt="ユーザーアイコン">
                        </div>
                        <div class="user-name">
                            {{ $commentUser['user']['name'] }}
                        </div>
                    </div>
                    <div class="user-comment">
                        {{ $commentUser['comment'] }}
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="comment-form">
            <form class="text-form" action="/comment/create" method="post">
                @csrf
                <div class="comment-text">
                    <label class="text-title">商品へのコメント</label>
                    <textarea class="textarea" name="comment" cols="50" rows="5"></textarea>
                </div>
                <div class="form-item__error">
                @error('comment')
                {{ $message }}
                @enderror
                &emsp;
                </div>
                <div class="comment-button">
                    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                    <button class="comment-button__submit">コメントを送信する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection