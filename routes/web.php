<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FibonacciController;

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

Route::get('fibonacci',[FibonacciController::class, 'index']);
Route::post('fibonacci',[FibonacciController::class, 'output']);