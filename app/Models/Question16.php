<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question16 extends Model
{
    use HasFactory;
    protected $table = 'question_16';

    protected $fillable = [
        'answer1_q16',
        'answer2_q16',
        'household_id',
    ];
    public static function Question16($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_16.answer1_q16 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_16.answer1_q16 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_16', 'household.id', '=', 'question_16.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_16.answer1_q16')
        ->get();

        $result = [
            'answer1_q16' => [
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
