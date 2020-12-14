<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TaskCommentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskStatusesController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::resource('task_statuses', TaskStatusesController::class);

Route::resource('tasks', TaskController::class);

Route::resource('labels', LabelController::class);

Route::resource('task.comments', TaskCommentController::class);

Route::fallback(function () {
    abort(404, 'Oops, page not found');
});
