<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question12 extends Model
{
    use HasFactory;
    protected $table = 'question_12';

    protected $fillable = [
        'answer1_q12',
        'answer2_q12',
        'answer3_q12',
        'answer4_q12',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
