<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
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
    public static function Question12a($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_12.answer1_q12 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_12.answer1_q12 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_12.answer1_q12 = 3 THEN 1 ELSE 0 END) AS answer3'),
        )
        ->join('question_12', 'household.id', '=', 'question_12.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_12.answer1_q12')
        ->get();

        $result = [
            'answer1_q12' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
            ]
        ];

        return $result;
    }
    public static function Question12b($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 3 THEN 1 ELSE 0 END) AS answer3'),
            DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 4 THEN 1 ELSE 0 END) AS answer4'),
        )
        ->join('question_12', 'household.id', '=', 'question_12.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_12.answer3_q12')
        ->get();

        $result = [
            'answer3_q12' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
                'answer4' => $total->sum('answer4'),
            ]
        ];

        return $result;
    }

    //HOUSING
    public static function HousingReportQuestion12a($year)
    {

    }
    public static function HousingReportQuestion12b($year)
    {

    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
