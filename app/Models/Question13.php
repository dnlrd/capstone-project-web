<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question13 extends Model
{
    use HasFactory;
    protected $table = 'question_13';

    protected $fillable = [
        'answer1_q13',
        'answer2_q13',
        'answer3_q13',
        'answer4_q13',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
