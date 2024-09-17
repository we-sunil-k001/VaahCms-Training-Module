<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('todos', TodoController::class);
Route::put('todos/{todo}/mark-complete', [TodoController::class, 'markComplete']);
