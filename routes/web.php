<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TaskStatusesController;
use App\Mail\JustTesting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/send-mail', function () {

//    Mail::to('newuser@example.com')->send(new JustTesting());
    Mail::send(new JustTesting());

    return 'A message has been sent to Mailtrap!';

});

Route::fallback(function () {
    abort(404, 'Oops, page not found');
});