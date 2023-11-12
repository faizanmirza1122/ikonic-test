<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::resource('feedbacks', FeedbackController::class);
    
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/create/{feedbackId}', [CommentController::class, 'create'])->name('comments.create');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
