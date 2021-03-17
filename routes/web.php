<?php

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

use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

/** @phpstan-ignore-next-line */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::resource('task_statuses', TaskStatusController::class);
Route::resource('tasks', TaskController::class);
Route::resource('labels', LabelController::class);
