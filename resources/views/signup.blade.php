@extends('layouts.app')

@section('content')

<h1>ユーザー登録</h1>

<form method="post">
    @csrf
    @include('inc.error')

    名前： <input type="text" name="name" value="{{old('name')}}">
    <br>
    メールアドレス： <input type="email" name="email" value="{{old('email')}}">
    <br>
    パスワード： <input type="password" name="password">
    <br>
    都道府県：<x-pref class="bb" id="myId" message="選択してね" :default="old('pref')" />
    {{-- ケバブケースで書く --}}
    <br>
    住所：<input type="text" name="address" value="{{old('address')}}">※東京の場合は必須

    <br><br>
    <button>送信する</button>
</form>

@endsection
