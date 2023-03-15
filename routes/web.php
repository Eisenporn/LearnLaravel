<?php

use \App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Models\User;
use \App\Http\Controllers\IndexController;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AdminMiddleware;
// Route::get('/', function () {

//     // $user=User::query()->create([
//     //     'username'=>'username' . uniqid(),
//     //     'email'=>uniqid().'@gmail.com',
//     //     'password'=>Hash::make('avavion')
//     // ]);

//     // User::query()->find('3')->update([
//     //     'username'=>'new user',
//     //     'email'=>'newuser@maill.ru'
//     // ]);

//     return view('home');
// });


Route::controller(IndexController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/signin', 'signin')->name('signin');
});

Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function() {
    Route::post('/signup', 'signup')->name('signup'); // Регистрация
    Route::post('/signin', 'signin')->name('signin'); // Авторизация

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ArticleController::class)->prefix('/articles')->as('article.')->group(function(){

    Route::middleware(['auth', AdminMiddleware::class])->group(function(){
        Route::get('/create', 'createForm')->name('createForm');
        Route::post('/create', 'store')->name('create');

        Route::get('/{article:id}/delete', 'delete')->name('delete');

        Route::get('/{article:id}/update', 'updateForm')->name('updateForm');
        Route::post('/{article:id}/update', 'update')->name('update');
    });

    Route::get('/{article:id}', 'single')->name('single');
});

Route::controller(CommentController::class)->prefix('/comments')->as('comment.')->middleware('auth')->group(function(){
    Route::post('/create', 'store')->name('store');
});
