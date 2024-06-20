<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    @yield('css')
</head>
<body class="body">
    <header>
        <div>
            <a href="">
                <img src="" alt="">
            </a>
        </div>
        <div>
            <form action="">
                <input type="text">
            </form>
        </div>
        @if(Auth::check())
        <nav>
            <div>
                <a href=""></a>
            </div>
            <div>
                <a href=""></a>
            </div>
            <div>
                <a href=""></a>
            </div>
        </nav>
        @else
        <nav>
            <div>
                <a href=""></a>
            </div>
            <div>
                <a href=""></a>
            </div>
            <div>出品</div>
        </nav>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>