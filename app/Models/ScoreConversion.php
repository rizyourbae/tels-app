<?php

namespace App\Models;

use App\Enums\ScoreSection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreConversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'correct_answers',
        'converted_score',
    ];

    protected $casts = [
        'section' => ScoreSection::class,
        'correct_answers' => 'integer',
        'converted_score' => 'integer',
    ];
}
