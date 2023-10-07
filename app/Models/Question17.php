<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question17 extends Model
{
    use HasFactory;
    protected $table = 'question_17';

    protected $fillable = [
        'answer1_q17',
        'answer2_q17',
        'answer3_q17',
        'household_id',
    ];
    public static function Question17($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_17.answer1_q17 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_17.answer1_q17 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_17', 'household.id', '=', 'question_17.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_17.answer1_q17')
        ->get();

        $result = [
            'answer1_q17' => [
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
