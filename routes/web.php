<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


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

Route::name('front.')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('home');
    Route::middleware(['guest'])->group(function(){
        Route::get('post/{post:slug}', [PostController::class, 'show'])->name('posts','post');
        Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

        Route::post('newsletter', NewsletterController::class)->name('newsletter.store');

        Route::resource('register', RegisterController::class)->only(['create', 'store']);
        //Route::post('register', [RegisterController::class,'store'])->name('guest');

        Route::get('login', [SessionController::class,'create'])->name('login');
        Route::post('session', [SessionController::class,'store'])->name('login.store');
    });


});


Route::middleware('auth')->group(function(){
    Route::post('logout', [SessionController::class,'destroy'])->name('logout');
});

Route::middleware('admin')->prefix('admin')->group(function(){
    Route::resource('posts/create', PostController::class);
//    Route::post('admin/posts', [PostController::class, 'store']);
});


// Route::get('/', [PostController::class, 'index'])->name('home');

// Route::get('posts/{post:slug}', [PostController::class, 'show']);
// Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

// Route::post('newsletter', NewsletterController::class);

// Route::get('register', [RegisterController::class,'create'])->middleware('guest');
// Route::post('register', [RegisterController::class,'store'])->middleware('guest');

// Route::get('login', [SessionController::class,'create'])->middleware('guest');
// Route::post('session', [SessionController::class,'store'])->middleware('guest');

// Route::post('logout', [SessionController::class,'destroy'])->middleware('auth');

// Route::get('admin/posts/create',[PostController::class, 'create'])->middleware('admin');
