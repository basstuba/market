<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UserController;


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

Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/detail/{item}', [ItemController::class, 'detail'])->name('detail');
Route::get('/view/change', [ItemController::class, 'viewChange']);
Route::get('/search', [ItemController::class, 'search']);

Route::prefix('link')->group(function() {
    Route::get('login', function() {
        return view('auth.login');
    })->name('linkLogin');
    Route::get('register', function() {
        return view('auth.register');
    })->name('linkRegister');
});

Route::middleware('auth')->group(function() {
    Route::prefix('like')->group(function() {
        Route::post('/create', [LikeController::class, 'likeCreate']);
        Route::delete('/delete', [LikeController::class, 'likeDelete']);
    });

    Route::prefix('comment')->group(function() {
        Route::get('/', [CommentController::class, 'comment'])->name('comment');
        Route::post('/create', [CommentController::class, 'commentCreate']);
        Route::delete('/delete', [CommentController::class, 'commentDelete']);
    });

    Route::get('/buy/{item}', [BuyController::class, 'buy'])->name('buy');
    Route::post('/payment', [BuyController::class, 'payment']);

    Route::prefix('sell')->group(function() {
        Route::get('/', [SellController::class, 'sell'])->name('sell');
        Route::post('/create', [SellController::class, 'sellCreate']);
    });

    Route::get('/user', [UserController::class, 'myPage'])->name('myPage');
    Route::get('/list/change', [UserController::class, 'listChange']);
    Route::prefix('profile')->group(function() {
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::post('/update', [UserController::class, 'profileUpdate']);
    });
    Route::post('/address/update', [UserController::class, 'addressUpdate']);
});

//view確認用//
Route::get('/test', [ItemController::class, 'test']);


