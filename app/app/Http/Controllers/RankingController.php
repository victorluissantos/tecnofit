<?php

namespace App\Http\Controllers;

use App\Services\RankingService;
use Illuminate\Http\JsonResponse;

class RankingController extends Controller
{
    private RankingService $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function getRanking(int $movement_id): JsonResponse
    {
        $ranking = $this->rankingService->getRankingByMovement($movement_id);
        return response()->json($ranking);
    }
}
