<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question9 extends Model
{
    use HasFactory;
    protected $table = 'question_9';

    protected $fillable = [
        'if_yes',
        'answer1_q9',
        'answer2_q9',
        'answer3_q9',
        'answer4_q9',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
