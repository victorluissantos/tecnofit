<?php

use App\Http\Controllers\RankingController;

Route::get('/ranking/{movement_id}', [RankingController::class, 'getRanking']);
