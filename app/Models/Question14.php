<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
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
    public static function Question14($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_14.answer1_q14 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_14.answer1_q14 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_14.answer1_q14 = 3 THEN 1 ELSE 0 END) AS answer3'),
            DB::raw('SUM(CASE WHEN question_14.answer1_q14 = 4 THEN 1 ELSE 0 END) AS answer4'),
        )
        ->join('question_14', 'household.id', '=', 'question_14.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_14.answer1_q14')
        ->get();

        $result = [
            'answer1_q14' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
                'answer4' => $total->sum('answer4'),
            ]
        ];

        return $result;
    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
