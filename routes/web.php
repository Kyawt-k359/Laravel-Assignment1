<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogsController;

use App\Http\Controllers\PostsController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('home',function (){
//     return view('home');
// });

// Route::get('/blog',[BlogController::class,'get']);

Route::resource('blogs',BlogsController::class);

Route::resource('post',PostsController::class);

Route::get('blog',[BlogController::class,'index'])->name('blog.index');
Route::get('blog\create',[BlogController::class,'create'])->name('blog.create');
Route::post('blog\store',[BlogController::class,'store'])->name('blog.store');
Route::get('blog\edit\{blog}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog\update\{blog}',[BlogController::class,'update'])->name('blog.update');
Route::get('blog\show\{blog}',[BlogController::class,'show'])->name('blog.show');
Route::post('blog\destroy\{blog}',[BlogController::class,'destroy'])->name('blog.destroy');

