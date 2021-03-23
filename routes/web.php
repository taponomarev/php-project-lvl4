<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

/* @phpstan-ignore-next-line */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::resources([
    'tasks' => TaskController::class,
    'task_statuses' => TaskStatusController::class,
    'labels' => LabelController::class
]);
