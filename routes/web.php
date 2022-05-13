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


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');

Route::get('login', [SessionController::class,'create'])->middleware('guest');
Route::post('session', [SessionController::class,'store'])->middleware('guest');

Route::post('logout', [SessionController::class,'destroy'])->middleware('auth');

// $str=Request::url();
// $del="127.0.0.1:8000";
// $pos=strpos($str, $del);
// $important1=substr($str, $pos+strlen($del), strlen($str)-1);
// $important=ucfirst($important1);
// $asif=explode("/", $important);

// $asif1=explode("/", $important1);

// //echo $important;
// $post=$asif1[0];
// $post1=$asif1[1];
// if(isset($asif1[2]))
// {
//    $post2=$asif1[2];
// }
// if(!(isset($post2)))
// {

//    Route::match(array('GET','POST'),$important1, $asif[0].'Controller@'.$asif[1]);
// }
// if(isset($post2))
// {      Route::match(array('GET','POST'),$post.'/'.$post1.'/{id}',$asif[0].'Controller@'.$asif[1]);
// }
// Route::get('/', function () {
//     return view('welcome');
// });
