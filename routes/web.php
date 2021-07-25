<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index'])->name('index');
Route::post('/questions', [App\Http\Controllers\QuestionController::class, 'store'])->name('store');
Route::get('/questions/answer/{id}', [App\Http\Controllers\QuestionController::class, 'show'])->name('show');
Route::get('/questions/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('create');
Route::delete('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'destroy']);
//AnswersController
// Route::get( 'questions/answer/{id}', [App\Http\Controllers\CommentController::class, 'index'])->name('andex');
Route::post('/questions/answer', [App\Http\Controllers\CommentController::class, 'store'])->name('answer');
Route::get('/answer/create', [App\Http\Controllers\CommentController::class, 'create'])->name('answers');
Route::delete('/answer/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('answerDelete');

//admin
Route::get('/admin/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');
Route::delete('/dashboard/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
//user
Route::get( '/user/questions', [App\Http\Controllers\UserController::class, 'show'])->name('MyQuestions');
Route::get('/user/answers', [App\Http\Controllers\UserController::class, 'anwsers'])->name('MyAnswers');

// Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {
//     return view('/admin/dashboard');
// })->name('dashboard');

// Route::resource('questions',App\Http\Controllers\QuestionController::class);
