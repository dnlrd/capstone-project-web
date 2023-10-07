<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question17 extends Model
{
    use HasFactory;
    protected $table = 'question_17';

    protected $fillable = [
        'answer1_q17',
        'answer2_q17',
        'answer3_q17',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
