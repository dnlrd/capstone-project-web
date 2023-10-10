<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question4 extends Model
{
    use HasFactory;
    protected $table = 'question_4';

    protected $fillable = [
        'answer1_q4',
        'answer2_q4',
        'answer3_q4',
        'household_id',
    ];

    //MIGRATION
    public static function MigrationReportQuestion4($year)
    {

    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
