@extends('layouts.app')

@section('content')

<h1>ログイン画面</h1>

<form method="post" action="">
@csrf

@include('inc.error')

@include('inc.message')

メールアドレス：<input type="email" name="email" value="{{old('email')}}">
<br>
パスワード：<input type="password" name="password">
<br><br>
<button>送信する</button>

</form>

<p style="margin-top:30px">
    <a href="/signup">新規ユーザー登録</a>
</p>
@endsection
