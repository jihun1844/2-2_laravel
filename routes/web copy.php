<?php

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
    return view('welcome');
});

//get 방식으로 왔을때 저 함수를 실행 해라
Route::get('/test', function () { //클로저
    return "보내고 싶은 텍스트";
});

Route::get('/register', function () {
    return view('register_form');
});

Route::post('/register', function (Request $req) {
    $name = $req->input("name");
    $email = $req->input("email");
    $birthday = $req->input("birthday");
    $affiliation = $req->input("affiliation");
    return view('register', ['name'=>$name, 'email'=>$email, 'birthday'=>$birthday, 'affiliation'=>$affiliation]);
});



Route::get('/update', function () {
    return view('update_form');
});

Route::put('/update', function (Request $req) {
    $email = $req->input("email");
    $name = $req->input("name");
    $birthday = $req->input("birthday");
    $affiliation = $req->input("affiliation");
    return view('update', ['birthday'=>$birthday, 'affiliation'=>$affiliation, 'name' => $name, 'email' => $email]);
});



Route::get('/remove', function () {
    return view('remove_form');
});

Route::delete('/remove', function (Request $req) {
    $delete = $req->input("name");
    return view('remove', ['name'=>$delete]);
});

//?는 (옵션) 값이 없어도 됨
Route::get('/user/{id?}', function (string $id="1000") {
    return 'User ' .$id;
});

//점은 문자열을 이어주는 역할
Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    return '게시글 ' . $postId . '번글의 댓글 ' . $commentId . '번을 삭제했습니다.';
});

Route::get('/test', function (Request $req) {
    
});


