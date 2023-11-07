<?php

use App\Routing\Route;
use App\Controllers\IndexController;
use App\Controllers\UrlController;

Route::get('/', [IndexController::class,'index']);
Route::get('/{urlKey}', [IndexController::class,'redirect']);
Route::get('/url/minimize', [UrlController::class, 'minimize']);
Route::post('/url/minimize', [UrlController::class, 'minimize']);
Route::post('/url/track', [UrlController::class, 'track']);
Route::get('/url/counter', [UrlController::class, 'counter']);
Route::get('/url/count/{urlKey}', [UrlController::class, 'count']);
