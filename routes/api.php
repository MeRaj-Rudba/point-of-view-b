<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotographController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(PhotographController::class)->group(function () {
    Route::get('photographs', 'index');
    Route::post('photographs', 'store');
    Route::put('photographs/{id}', 'update');
    Route::delete('photographs/{id}', 'destroy');
});
