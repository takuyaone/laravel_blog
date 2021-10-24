@extends('layouts.app')

@section('content')

<h1>ブログ新規投稿</h1>

<form method="post" action="">
@csrf

@include('inc.error')

@include('inc.message')

タイトル：<input type="text" name="title" value="{{old('title')}}">
<br>
<br>
本文：<textarea name="body" style="width:600px; height:200px">{{old('body')}}</textarea>
<br>
公開する：<label><input type="checkbox" name="is_open" value="1" {{ (old('is_open') ? 'checked':'')}}>公開する</label>
<br>
画像：<input type="file" name="pict">
<br><br>
<button>送信する</button>

</form>

@endsection
