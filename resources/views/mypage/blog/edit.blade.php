@extends('layouts.app')

@section('content')

<h1>マイブログ更新</h1>

<form method="post" action="">
@csrf

@include('inc.error')

@include('inc.message')

タイトル：<input type="text" name="title" value="{{data_get($data,'title')}}">
<br>
<br>
本文：<textarea name="body" style="width:600px; height:200px">{{data_get($data,'body')}}</textarea>
<br>
公開する：<label><input type="checkbox" name="is_open" value="1" {{ (data_get($data,'is_open') ? 'checked':'')}}>公開する</label>
<br>
画像：<input type="file" name="pict">

<br><br>
<button>更新する</button>

</form>

@endsection
