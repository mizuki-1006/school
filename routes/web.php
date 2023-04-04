<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\DeleteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//インデックス表示用 OK
Route::get('/', [AdminController::class, 'index'])->name('');
Route::get('/index', [AdminController::class, 'index'])->name('index');

//ログアウト OK
Route::post('/index',[AdminController::class, 'logout'])->name('logout');

//ログイン画面表示 OK
Route::get('/signin', [AdminController::class, 'show_signin'])->name('show_signin');
Route::post('/signin', [AdminController::class, 'create'])->name('create');

//新規会員登録画面表示 OK
Route::get('/signup', [AdminController::class, 'show_signup'])->name('show_signup');

// ログイン＆マイページ遷移 OK
Route::get('/mypage', [AdminController::class, 'signin'])->name('signin');
Route::get('/mypage', [ReserveController::class, 'back_mypage'])->name('back_mypage');
Route::post('/mypage', [AdminController::class, 'signin'])->name('signin');

//管理者用ページ遷移 OK
Route::get('/admin_home',[DeleteController::class, 'show_admin_home'])->name('show_admin_home');
Route::post('/admin_home',[AdminController::class, 'signin'])->name('signin');

//管理者用予約作成 OK
Route::get('/admin',[LessonController::class, 'show_admin'])->name('show_admin');
Route::post('/admin',[LessonController::class, 'add_lesson'])->name('add_lesson');

//管理者用レッスン削除画面
Route::post('/delete_lesson',[DeleteController::class, 'delete_lesson'])->name('delete_lesson');

//パスワード変更画面表示 OK
Route::get('/reset', [AdminController::class, 'show_reset'])->name('show_reset');
Route::post('/reset',[AdminController::class,'pw_reset'])->name('pw_reset');

//予約画面表示
Route::get('/reserve', [AdminController::class, 'show_reserve'])->name('show_reserve');
Route::post('/reserve', [AdminController::class, 'show_reserve'])->name('show_reserve');

//受講予約処理
Route::post('/lesson_reserve',[ReserveController::class,'lesson_reserve'])->name('lesson_reserve');

//アカウント削除 OK
Route::post('/delete',[AdminController::class,'delete'])->name('delete');

