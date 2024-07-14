<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketManagement</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin_app.css') }}"/>
    @yield('css')
</head>
<body class="body">
    <header class="header">
        <div class="header-title">
            <h1 class="header-title__logo">
                <a class="header-title__link" href="{{ route('admin') }}">Management Screen</a>
            </h1>
        </div>
        <nav class="header-nav">
            <div class="nav-item">
                <form class="form-logout" action="/logout" method="post">
                    @csrf
                    <button class="logout-button" type="submit">ログアウト</button>
                </form>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">トップページ</a>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>