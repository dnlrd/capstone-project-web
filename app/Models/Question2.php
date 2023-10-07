<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question2 extends Model
{
    use HasFactory;
    protected $table = 'question_2';

    protected $fillable = [
        'answer1_q2',
        'answer2_q2',
        'answer3_q2',
        'household_id',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
    
}
