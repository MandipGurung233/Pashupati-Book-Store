<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
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

Route::get('books', [bookController::class,'index']);
Route::get('add-book', [bookController::class,'create']);
Route::post('add-book', [bookController::class,'store']);
Route::get('edit-book/{id}', [bookController::class,'edit']);
Route::get('view-book/{id}', [bookController::class,'view']);
Route::put('update-book/{id}', [bookController::class,'update']);
Route::delete('delete-book/{id}', [bookController::class,'destroy']);
