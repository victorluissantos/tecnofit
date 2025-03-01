<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RankingService
{
    public function getRankingByMovement(int $movement_id): array
    {
        // Buscar o ranking diretamente do banco de dados
        $records = DB::table('personal_record')
            ->join('user', 'personal_record.user_id', '=', 'user.id')
            ->join('movement', 'personal_record.movement_id', '=', 'movement.id')
            ->select('user.name as user_name', 'movement.name as movement_name', 
                     DB::raw('MAX(personal_record.value) as record'), 
                     DB::raw('MAX(personal_record.date) as record_date'))
            ->where('personal_record.movement_id', $movement_id)
            ->groupBy('user.id', 'user.name', 'movement.name')
            ->orderByDesc('record')
            ->get();

        // Montar ranking com posições considerando empates
        $ranking = [];
        $lastRecord = null;
        $currentPosition = 0;
        $tiedCount = 0;

        foreach ($records as $index => $record) {
            if ($record->record !== $lastRecord) {
                $currentPosition += $tiedCount + 1;
                $tiedCount = 0;
            } else {
                $tiedCount++;
            }

            $ranking[] = [
                'position' => $currentPosition,
                'user' => $record->user_name,
                'record' => $record->record,
                'date' => $record->record_date,
                'movement' => $record->movement_name
            ];

            $lastRecord = $record->record;
        }

        return [
            'movement' => $ranking[0]['movement'] ?? 'Not Found',
            'ranking' => $ranking
        ];
    }
}
