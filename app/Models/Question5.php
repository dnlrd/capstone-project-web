<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question5 extends Model
{
    use HasFactory;
    protected $table = 'question_5';

    protected $fillable = [
        'answer1_q5',
        'answer2_q5',
        'household_id',
    ];

    public static function Question5($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_5', 'household.id', '=', 'question_5.household_id')
        ->where('household.year', $selectedYear)
        ->get();

        $result = [
            'answer1_q5' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
            ]
        ];

        return $result;
    }


    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
