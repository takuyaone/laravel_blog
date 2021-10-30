<?php

namespace App\Http\Controllers\mypage;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogSaveRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // $blogs=Blog::where('user_id',Auth::user()->id)->get();
        // $blogs = Blog::where('user_id', Auth::id())->get();
        $blogs = $request->user()->blogs;

        return view('mypage.index', compact('blogs'));
    }

    public function create()
    {
        return view('mypage.blog.create');
    }

    public function store(BlogSaveRequest $request)
    {
        $data = $request->proceed();

        $blog = $request->user()->blogs()->create($data);

        return redirect(route('mypage.blog.edit', $blog))->with('message', '新規登録しました。');
    }

    public function edit(Blog $blog, Request $request)
    {
        abort_if($request->user()->isNot($blog->user), 403);

        $data = old() ?: $blog;

        return view('mypage.blog.edit', compact('data', 'blog'));
    }

    public function update(Blog $blog, BlogSaveRequest $request)
    {

        abort_if($request->user()->isNot($blog->user), 403);

        $data = $request->proceed();

        $data['is_open'] = $request->boolean('is_open');

        $blog->update($data);
        return redirect(route('mypage.blog.edit', $blog))->with('message', 'ブログを更新しました。');
    }

    public function destroy(Blog $blog, Request $request)
    {
        abort_if($request->user()->isNot($blog->user), 403);

        //画像と付属するコメントは、イベントを使って削除しています。
        //App\Models\Blog参照

        $blog->delete();

        return redirect('mypage');
    }
}
