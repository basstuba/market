@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_css/user.css') }}"/>
@endsection

@section('content')
<div class="main">
    <div class="main-title">
        <h2 class="main-title__logo">登録者一覧</h2>
    </div>
    <div class="main-search">
        <form class="search-form" action="/admin/search" method="get">
            <input class="search-input" type="text" name="keyword" placeholder="登録名で検索"
            value="{{ old('keyword') }}" onchange="submit()">
        </form>
    </div>
    <div class="main-content">
        <table class="content-table">
            <tr class="content-tr">
                <th class="content-th">登録者名</th>
                <th class="content-th">登録者詳細</th>
            </tr>
            @foreach($users as $user)
            <tr class="content-tr">
                <td class="content-td">
                    {{ $user['name'] }}
                </td>
                <td class="content-td">
                    <div class="modal">
                        <div class="modal-button__open">
                            <button class="button-open__submit" popovertarget="Modal{{ $user['id'] }}" popovertargetaction="show">
                                詳細確認
                            </button>
                        </div>
                        <div class="modal-main" id="Modal{{ $user['id'] }}" popover="auto">
                            <div class="item-name">登録者名</div>
                            <div class="modal-item">
                                {{ $user['name'] }}
                            </div>
                            <div class="item-name">メールアドレス</div>
                            <div class="modal-item">
                                {{ $user['email'] }}
                            </div>
                            <div class="item-name">郵便番号</div>
                            <div class="modal-item">
                                {{ $user['profile']['postcode'] ?? '' }}
                            </div>
                            <div class="item-name">住所</div>
                            <div class="modal-item">
                                {{ $user['profile']['address'] ?? '' }}
                            </div>
                            <div class="item-name">建物名</div>
                            <div class="modal-item">
                                {{ $user['profile']['building'] ?? '' }}
                            </div>
                            <div class="modal-button__close">
                                <button class="button-close__submit" popovertarget="Modal{{ $user['id'] }}" popovertargetaction="hidden">
                                    閉じる
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="content-td">
                    <a class="link-mail" href="{{ route('adminMail', ['user' => $user['id']]) }}">メールを作成する</a>
                </td>
                <td class="content-td">
                    <form class="delete-form" action="/admin/user/delete" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                        <button class="delete-button" type="submit">削除する</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection