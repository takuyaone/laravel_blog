<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\mypage\BlogController;
use App\Http\Controllers\mypage\UserLoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;


Route::get('',[HomeController::class,'index']);
Route::get('blogs/{blog}',[HomeController::class,'show'])->name('blog.show');

Route::get('signup',[SignupController::class,'index']);
Route::post('signup', [SignupController::class, 'store']);


Route::middleware('guest')->group(function (){
    Route::get('mypage/login', [UserLoginController::class, 'index'])->name('login');
    Route::post('mypage/login', [UserLoginController::class, 'login']);
});

Route::middleware('auth')->group(function (){
    Route::post('mypage/logout', [UserLoginController::class, 'logout']);

    Route::get('mypage',[BlogController::class,'index']);
    Route::get('mypage/blogs/create', [BlogController::class, 'create']);
    Route::post('mypage/blogs/create', [BlogController::class, 'store']);
    Route::get('mypage/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('mypage.blog.edit');
    Route::post('mypage/blogs/edit/{blog}', [BlogController::class, 'update'])->name('mypage.blog.update');
    Route::delete('mypage/blogs/delete/{blog}', [BlogController::class, 'destroy'])->name('mypage.blog.delete');
});
