<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index'])->name('index');
Route::post( '/questions', [App\Http\Controllers\QuestionController::class, 'store'])->name('store');
Route::get('/questions/answer/{id}', [ App\Http\Controllers\QuestionController::class, 'show'])->name('show');
Route::get( '/questions/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('create');
Route::delete('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'destroy']);
//AnswersController
Route::get( '/answer/{id}', [App\Http\Controllers\CommentController::class, 'index'])->name('questions');
Route::post('/questions', [ App\Http\Controllers\CommentController::class, 'store'])->name('answer');
Route::get('/answer/create', [App\Http\Controllers\CommentController::class, 'create'])->name('answers');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::resource('questions',App\Http\Controllers\QuestionController::class);
