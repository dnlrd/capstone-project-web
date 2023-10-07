<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question10 extends Model
{
    use HasFactory;
    protected $table = 'question_10';

    protected $fillable = [
        'answer1_q10',
        'answer2_q10',
        'answer3_q10',
        'answer4_q10',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
