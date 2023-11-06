<?php

use App\Routing\Route;
use App\Controllers\IndexController;
use App\Controllers\UrlController;

Route::get('/', [IndexController::class,'index']);
Route::get('/{urlKey}', [IndexController::class,'redirect']);
Route::get('/url/minimize', [UrlController::class, 'minimize']);
Route::post('/url/minimize', [UrlController::class, 'minimize']);
Route::get('/url/total', [UrlController::class, 'total']);
Route::get('/url/count/{urlKey}', [UrlController::class, 'count']);
Route::get('/url/error', [UrlController::class, 'error']);
