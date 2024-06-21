<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}"/>
    @yield('css')
</head>
<body class="body">
    <header class="header">
        <div class="header-title">
            <a class="header-title__link" href="{{ route('index') }}">
                <img class="header-title__logo" src="{{ asset('storage/image/logo.svg') }}" alt="社名ロゴ"/>
            </a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>