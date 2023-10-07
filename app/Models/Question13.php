<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question13 extends Model
{
    use HasFactory;
    protected $table = 'question_13';

    protected $fillable = [
        'answer1_q13',
        'answer2_q13',
        'answer3_q13',
        'answer4_q13',
        'household_id',
    ];
    public static function Question13a($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_13.answer1_q13 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_13.answer1_q13 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_13', 'household.id', '=', 'question_13.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_13.answer1_q13')
        ->get();

        $result = [
            'answer1_q13' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
            ]
        ];

        return $result;
    }

    public static function Question13b($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_13.answer3_q13 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_13.answer3_q13 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_13', 'household.id', '=', 'question_13.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_13.answer3_q13')
        ->get();

        $result = [
            'answer3_q13' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
            ]
        ];

        return $result;
    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
