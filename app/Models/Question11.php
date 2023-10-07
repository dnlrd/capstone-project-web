<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question11 extends Model
{
    use HasFactory;
    protected $table = 'question_11';

    protected $fillable = [
        'answer1_q11',
        'answer2_q11',
        'answer3_q11',
        'answer4_q11',
        'answer5_q11',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
