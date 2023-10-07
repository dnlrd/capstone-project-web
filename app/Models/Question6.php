<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question6 extends Model
{
    use HasFactory;
    protected $table = 'question_6';

    protected $fillable = [
        'answer1_q6',
        'household_id',
    ];

    public static function Question6($selectedYear)
    {
        $totalModeOfRelocation = Household::select(
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 1 THEN 1 ELSE 0 END) AS answer1_q6'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 2 THEN 1 ELSE 0 END) AS answer2_q6'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 3 THEN 1 ELSE 0 END) AS answer3_q6')
        )
        ->join('question_6', 'household.id', '=', 'question_6.household_id')
        ->where('household.year', $selectedYear)
        ->get();

        return $totalModeOfRelocation;
    }


    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
