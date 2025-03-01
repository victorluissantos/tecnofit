<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movement_id',
        'value'
    ];

    /**
     * Relacionamento com User
     * Um registro pessoal pertence a um usuário
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com Movement
     * Um registro pessoal pertence a um movimento
     */
    public function movement(): BelongsTo
    {
        return $this->belongsTo(Movement::class);
    }
}
