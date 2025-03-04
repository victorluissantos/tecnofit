<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/ranking/{movement}', [RankingController::class, 'getRanking']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
