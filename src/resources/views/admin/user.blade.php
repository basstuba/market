@extends('layouts.admin_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_css/user.css') }}"/>
@endsection

@section('content')
<div>
    <div>
        <h2>登録者一覧</h2>
    </div>
    <div>
        <form action="">
            <input type="text">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th>登録名</th>
                <th>メールアドレス</th>
                <th>住所</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $user['name'] }}
                </td>
                <td>
                    {{ $user['email'] }}
                </td>
                <td>
                    <div>
                        <div>
                            <button>住所確認</button>
                        </div>
                        <div>
                            <div>
                                {{ $user['profile']['postcode'] ?? '' }}
                            </div>
                            <div>
                                {{ $user['profile']['address'] ?? '' }}
                            </div>
                            <div>
                                {{ $user['profile']['building'] ?? '' }}
                            </div>
                            <div>
                                <button>閉じる</button>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="">メールを作成する</a>
                </td>
                <td>
                    <form action="">
                        @method(delete)
                        @csrf
                        <input type="hidden" value="{{ $user['id'] }}">
                        <button>削除する</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection