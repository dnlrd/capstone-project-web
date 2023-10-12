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
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_6', 'household.id', '=', 'question_6.household_id')
        ->where('household.year', $selectedYear)
        ->get();

        $result = [
            'answer1_q6' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
            ]
        ];

        return $result;
    }
    //MIGRATION   
    public static function MigrationReportQuestion6($selectedYear)
    {
        $total = Household::select(
            
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_6', 'household.id', '=', 'question_6.household_id')
        ->where('household.year', $selectedYear)
        ->get();

        return $total;
    }
    public static function MigrationReportQuestion6ByBarangay($selectedYear)
    {
        $total = Household::select(
            'household.barangay',
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_6.answer1_q6 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_6', 'household.id', '=', 'question_6.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('household.barangay')
        ->get();

        return $total;
    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
