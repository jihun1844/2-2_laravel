<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['users'=>[]]);
});

Route::resource('/users', UserController::class);

Route::resource('/posts', PostController::class);

//중첩 메소드로 정의, nested resource                          except()는 라우트에 맵핑을 빼라는 뜻
Route::resource('/posts.comments', CommentController::class)->except(['create']);
