<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs=Blog::with('user')
        ->withCount('comments')
        ->onlyOpen()
        ->orderByDesc('comments_count')
        ->latest('updated_at') // ->orderByDesc('updated_at')
        ->get();

        // return $blogs;

        return view('home',compact('blogs'));
    }

    public function show(Blog $blog)
    {
        //非公開のものは見られない
        // if(!$blog->is_open){
        //     abort(403);
        // }

        abort_unless($blog->is_open,403);

        return view('blog.show',compact('blog'));
    }


}
