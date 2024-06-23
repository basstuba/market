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
                <a class="comment-link__back" href="{{ route('detail', ['item' => $item['id']]) }}">
                    <img class="comment-link__icon" src="{{ asset('storage/image/comment.png') }}" alt="コメント">
                </a>
                <div class="comment-count">
                    {{ $item['comments_count'] }}
                </div>
            </div>
        </div>
        <div>
            @foreach($item->comments as $comment)
                @if($comment['user_id'] == $user['id'])
                <div>
                    <div></div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div></div>
                    <div>
                        <form action="">
                            <input type="text">
                            <button></button>
                        </form>
                    </div>
                </div>
                @else
                <div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div></div>
                    <div></div>
                </div>
                @endif
            @endforeach
        </div>
        <div>
            <form action="">
                <div>
                    <label for=""></label>
                    <textarea name="" id=""></textarea>
                </div>
                <div>
                    <button></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection