<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movements'; // Opcional se seguir padrão

    protected $fillable = [
        'name',
    ];

    /**
     * Relacionamento com PersonalRecord
     * Um movimento pode ter vários registros pessoais
     */
    public function personalRecords(): HasMany
    {
        return $this->hasMany(PersonalRecord::class);
    }
}
