<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ブログ</title>
    <link type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <li><a href="/">TOP (ブログ一覧)</a></li>
        @auth
            <li><a href="/mypage">マイブログ一覧</a></li>
            <li>ようこそ{{auth()->user()->name}}</li>
            <li>
                <form method="post" action="/mypage/logout">
                    @csrf
                    <button>ログアウト</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login')}}">ログイン</a></li>
        @endauth
    </nav>

    @yield('content')


</body>
</html>
