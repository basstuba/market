<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    @yield('css')
</head>
<body class="body">
    <header class="header">
        <div class="header-title">
            <a class="header-title__link" href="{{ route('index') }}">
                <img class="header-title__logo" src="{{ asset('storage/image/logo.svg') }}" alt="社名ロゴ"/>
            </a>
        </div>
        <div class="header-search">
            <form class="header-form" action="/search" method="get">
                <input class="header-search__input" type="text" name="keyword" placeholder="なにをお探しですか？"
                value="{{ old('keyword') }}" onchange="submit()">
            </form>
        </div>
        @if(Auth::check())
        <nav class="header-nav">
            <div class="nav-item">
                <form class="form-logout" action="/logout" method="post">
                    @csrf
                    <button class="logout-button" type="submit">ログアウト</button>
                </form>
            </div>
            <div class="nav-item">
                @if(Auth::user()->isAdmin())
                <a class="nav-admin__link" href="{{ route('admin') }}">管理画面</a>
                @else
                <a class="nav-item__link" href="{{ route('myPage') }}">マイページ</a>
                @endif
            </div>
            <div class="nav-sell">
                <a class="nav-sell__button" href="{{ route('sell') }}">出品</a>
            </div>
        </nav>
        @else
        <nav class="header-nav">
            <div class="nav-item">
                <a class="nav-item__link" href="{{ route('linkLogin') }}">ログイン</a>
            </div>
            <div class="nav-item">
                <a class="nav-item__link" href="{{ route('linkRegister') }}">会員登録</a>
            </div>
            <div class="nav-sell__dummy">出品</div>
        </nav>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>