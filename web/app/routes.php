<?php

use App\Routing\Route;
use App\Controllers\MainController;
use App\Controllers\UrlController;

Route::get('/', [MainController::class, 'displayMainPage']);
Route::get('/{urlKey}', [MainController::class, 'redirectToOriginalUrl']);
Route::get('/url/minimize', [UrlController::class, 'minimizeUrl']);
Route::post('/url/minimize', [UrlController::class, 'minimizeUrl']);
Route::post('/url/track', [UrlController::class, 'countMinimizedUrlClicks']);
Route::get('/url/counter', [UrlController::class, 'displayUrlClickCounter']);
Route::get('/url/count/{urlKey}', [UrlController::class, 'displayMinimizedUrlClicksCount']);
