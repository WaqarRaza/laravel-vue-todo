<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('task-lists', [TaskListController::class, 'index']);
Route::put('task-lists/{id}', [TaskListController::class, 'update']);
Route::post('task-lists', [TaskListController::class, 'store']);
Route::delete('task-lists/{id}', [TaskListController::class, 'destroy']);


Route::post('task-lists/{id}/tasks', [TaskController::class, 'store']);
Route::patch('task-completed/{task}/{value?}', [TaskController::class, 'completed']);
Route::delete('tasks/{id}', [TaskController::class, 'destroy']);

Route::get('/{any}', [HomeController::class, 'index']);
