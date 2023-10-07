<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question15 extends Model
{
    use HasFactory;
    protected $table = 'question_15';

    protected $fillable = [
        'answer1_q15',
        'answer2_q15',
        'answer3_q15',
        'answer4_q15',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
