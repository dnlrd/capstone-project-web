<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question3 extends Model
{
    use HasFactory;

    protected $table = 'question_3';

    protected $fillable = [
        'answer1_q3',
        'answer2_q3',
        'answer3_q3',
        'answer4_q3',
        'household_id',
    ];

    //MIGRATION
    public static function MigrationReportQuestion3($year)
    {

    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
