<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question14 extends Model
{
    use HasFactory;
    protected $table = 'question_14';

    protected $fillable = [
        'answer1_q14',
        'answer2_q14',
        'household_id',
    ];
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
