<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stu', [StudentController::class, 'get']);
Route::post('/stu', [StudentController::class, 'post']);
Route::put('/stu/edit/{id}', [StudentController::class, 'put']);
Route::delete('/stu/delete/{id}', [StudentController::class, 'delete']);