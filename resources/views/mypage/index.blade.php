@extends('layouts.app')

@section('content')

<h1>マイブログ一覧</h1>

<a href="/mypage/blogs/create">ブログ新規登録</a>
<hr>

<table>
    <tr>
        <th>ブログ一覧</th>
    </tr>
    @foreach($blogs as $blog)
    <tr>
        <td>
            <a href="{{route('mypage.blog.edit',$blog)}}">{{$blog->title}}</a>
        </td>
        <td>
            <form method="post" action="{{route('mypage.blog.delete',$blog)}}">
                @csrf  @method('delete')  <input type="submit" value="削除する">
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
