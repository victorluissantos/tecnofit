<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetRankingRequest;
use App\Services\RankingService;
use Illuminate\Http\JsonResponse;

class RankingController extends Controller
{
    private RankingService $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function getRanking(GetRankingRequest $request, int $movement)
    {
        try {
            $result = $this->rankingService->getRankingByMovement($movement);
        } catch (\Exception $e) {
            \Log::error('Erro no ranking', [
                'movement' => $movement,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Erro ao processar a requisição.'], 500);
        }

        return response()->json($result);
    }
}
