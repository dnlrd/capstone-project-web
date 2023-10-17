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
    public static function HousingReportQuestion12a($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_12.answer1_q12 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_12.answer1_q12 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_12.answer1_q12 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_12', 'household.id', '=', 'question_12.household_id')
        ->where('household.year', $selectedYear);

        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }

        $total = $query->groupBy('question_12.answer1_q12')->get();

        $result = [
            'answer1_q12' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
            ]
        ];

        $totalResponses = $total->sum('answer1') + $total->sum('answer2') + $total->sum('answer3');
        $result['answer1_q12']['answer1_percentage'] = intval(($result['answer1_q12']['answer1'] / $totalResponses) * 100);
        $result['answer1_q12']['answer2_percentage'] = intval(($result['answer1_q12']['answer2'] / $totalResponses) * 100);
        $result['answer1_q12']['answer3_percentage'] = intval(($result['answer1_q12']['answer3'] / $totalResponses) * 100);

        return $result;
    }
    public static function HousingReportQuestion12b($selectedYear, $selectedBarangay)
{
    $query = Household::select(
        DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 1 THEN 1 ELSE 0 END) AS answer1'),
        DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 2 THEN 1 ELSE 0 END) AS answer2'),
        DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 3 THEN 1 ELSE 0 END) AS answer3'),
        DB::raw('SUM(CASE WHEN question_12.answer3_q12 = 4 THEN 1 ELSE 0 END) AS answer4')
    )
    ->join('question_12', 'household.id', '=', 'question_12.household_id')
    ->where('household.year', $selectedYear);

    if ($selectedBarangay) {
        $query->where('household.barangay', $selectedBarangay);
    }

    $total = $query->groupBy('question_12.answer3_q12')->get();

    $result = [
        'answer3_q12' => [
            'answer1' => $total->sum('answer1'),
            'answer2' => $total->sum('answer2'),
            'answer3' => $total->sum('answer3'),
            'answer4' => $total->sum('answer4'),
        ]
    ];

    $totalResponses = $total->sum('answer1') + $total->sum('answer2') + $total->sum('answer3') + $total->sum('answer4');
    $result['answer3_q12']['answer1_percentage'] = intval(($result['answer3_q12']['answer1'] / $totalResponses) * 100);
    $result['answer3_q12']['answer2_percentage'] = intval(($result['answer3_q12']['answer2'] / $totalResponses) * 100);
    $result['answer3_q12']['answer3_percentage'] = intval(($result['answer3_q12']['answer3'] / $totalResponses) * 100);
    $result['answer3_q12']['answer4_percentage'] = intval(($result['answer3_q12']['answer4'] / $totalResponses) * 100);

    return $result;
}

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
