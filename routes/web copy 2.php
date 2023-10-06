<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
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
Route::get('/test', [UserController::class, 'test']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/update', [UserController::class, 'update']);
Route::put('/update', [UserController::class, 'edit']);
Route::get('/remove', [UserController::class, 'index']);
Route::delete('/remove', [UserController::class, 'delete']);

Route::resource('photos', PhotoController::class);