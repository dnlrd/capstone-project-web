<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
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
    public static function Question15a($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_15.answer1_q15 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_15.answer1_q15 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_15', 'household.id', '=', 'question_15.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_15.answer1_q15')
        ->get();

        $result = [
            'answer1_q15' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2')
            ]
        ];

        return $result;
    }
    public static function Question15c($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_15.answer3_q15 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_15.answer3_q15 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_15.answer3_q15 = 3 THEN 1 ELSE 0 END) AS answer3'),
        )
        ->join('question_15', 'household.id', '=', 'question_15.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_15.answer3_q15')
        ->get();

        $result = [
            'answer3_q15' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3')
            ]
        ];

        return $result;
    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
