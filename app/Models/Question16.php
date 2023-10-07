<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question16 extends Model
{
    use HasFactory;
    protected $table = 'question_16';

    protected $fillable = [
        'answer1_q16',
        'answer2_q16',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
