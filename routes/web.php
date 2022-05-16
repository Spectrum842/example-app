<?php

use App\Http\Controllers\AdminPostController;
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

//as pour préfixer le name, prefix pour préfixer l'url
// Route::get('/', [PostController::class, 'index'])->name('home');
// Route::as('front.')->group(function(){
//     Route::get('/', [PostController::class, 'index'])->name('home');
//     Route::middleware('guest')->group(function(){
//         Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post.show');
//         Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('posts.comments.store');

//         Route::post('newsletter', NewsletterController::class)->name('newsletter.store');

//         Route::resource('register', RegisterController::class)->only(['create', 'store']);
//         //Route::post('register', [RegisterController::class,'store'])->name('guest');

//         Route::get('login', [SessionController::class,'create'])->name('login');
//         Route::post('session', [SessionController::class,'store'])->name('login.store');
//     });
// });
// Route::middleware('auth')->group(function(){
//     Route::post('logout', [SessionController::class,'destroy'])->name('logout');
// });
// Route::middleware('admin')->prefix('admin')->group(function(){
//     // avec resource les routes sont auto créées
//     Route::resource('posts', PostController::class);
// //    Route::post('admin/posts', [PostController::class, 'store']);
// });


Route::get('/', [PostController::class, 'index'])->name('front.home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('front.post.show');
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsletterController::class)->name('front.newsletter.store');

Route::middleware('guest')->group(function(){
    Route::get('register', [RegisterController::class,'create'])->name('register');
    Route::post('register', [RegisterController::class,'store']);

    Route::get('login', [SessionController::class,'create'])->name('login');
    Route::post('session', [SessionController::class,'store']);
});


Route::post('logout', [SessionController::class,'destroy'])->middleware('auth')->name('logout');

Route::middleware('admin')->prefix('admin/posts')->group(function(){

    Route::get('',[AdminPostController::class,'index'])->name('admin.posts');
    Route::get('create',[AdminPostController::class,'create'])->name('admin.create');

    Route::post('store',[AdminPostController::class,'store'])->name('admin.store');
    Route::get('{post}/edit',[AdminPostController::class,'edit'])->name('admin.edit');
    Route::patch('{post}',[AdminPostController::class,'update'])->name('admin.update');
});
// Route::get('admin/posts/create',[PostController::class, 'create'])->middleware('admin')->name('admin.create');
// Route::post('admin/posts',[PostController::class, 'store'])->middleware('admin')->name('admin.store');
