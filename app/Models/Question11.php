<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question11 extends Model
{
    use HasFactory;
    protected $table = 'question_11';

    protected $fillable = [
        'answer1_q11',
        'answer2_q11',
        'answer3_q11',
        'answer4_q11',
        'answer5_q11',
        'household_id',
    ];

    public static function Question11a($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 3 THEN 1 ELSE 0 END) AS answer3'),
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 4 THEN 1 ELSE 0 END) AS answer4')
        )
        ->join('question_11', 'household.id', '=', 'question_11.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_11.answer1_q11')
        ->get();

        $result = [
            'answer1_q11' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
                'answer4' => $total->sum('answer4'),
            ]
        ];

        return $result;
    }
    public static function Question11b($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_11.answer2_q11 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_11.answer2_q11 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_11', 'household.id', '=', 'question_11.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_11.answer2_q11')
        ->get();

        $result = [
            'answer2_q11' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
            ]
        ];

        return $result;
    }
    public static function Question11c($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 3 THEN 1 ELSE 0 END) AS answer3'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 4 THEN 1 ELSE 0 END) AS answer4'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 5 THEN 1 ELSE 0 END) AS answer5'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 6 THEN 1 ELSE 0 END) AS answer6'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 7 THEN 1 ELSE 0 END) AS answer7')
        )
        ->join('question_11', 'household.id', '=', 'question_11.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('question_11.answer3_q11')
        ->get();

        $result = [
            'answer3_q11' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
                'answer4' => $total->sum('answer4'),
                'answer5' => $total->sum('answer5'),
                'answer6' => $total->sum('answer6'),
                'answer7' => $total->sum('answer7'),
            ]
        ];

        return $result;
    }

    //HOUSING
    public static function HousingReportQuestion11a($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 3 THEN 1 ELSE 0 END) AS answer3'),
            DB::raw('SUM(CASE WHEN question_11.answer1_q11 = 4 THEN 1 ELSE 0 END) AS answer4')
        )
        ->join('question_11', 'household.id', '=', 'question_11.household_id')
        ->where('household.year', $selectedYear);

        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }

        $total = $query->groupBy('question_11.answer1_q11')->get();

        $result = [
            'answer1_q11' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
                'answer4' => $total->sum('answer4'),
            ]
        ];

        $totalResponses = $total->sum('answer1') + $total->sum('answer2') + $total->sum('answer3') + $total->sum('answer4');
        $result['answer1_q11']['answer1_percentage'] = intval(($result['answer1_q11']['answer1'] / $totalResponses) * 100);
        $result['answer1_q11']['answer2_percentage'] = intval(($result['answer1_q11']['answer2'] / $totalResponses) * 100);
        $result['answer1_q11']['answer3_percentage'] = intval(($result['answer1_q11']['answer3'] / $totalResponses) * 100);
        $result['answer1_q11']['answer4_percentage'] = intval(($result['answer1_q11']['answer4'] / $totalResponses) * 100);


        return $result;
    }


    public static function HousingReportQuestion11b($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_11.answer2_q11 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_11.answer2_q11 = 2 THEN 1 ELSE 0 END) AS answer2'),
        )
        ->join('question_11', 'household.id', '=', 'question_11.household_id')
        ->where('household.year', $selectedYear);
    
        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }
    
        $total = $query->groupBy('question_11.answer2_q11')->get();
    
        $result = [
            'answer2_q11' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer1_percentage' => 0,
                'answer2_percentage' => 0,
            ]
        ];
    
        $totalResponses = $result['answer2_q11']['answer1'] + $result['answer2_q11']['answer2'];
    
        if ($totalResponses > 0) {
            $result['answer2_q11']['answer1_percentage'] = intval(($result['answer2_q11']['answer1'] / $totalResponses) * 100);
            $result['answer2_q11']['answer2_percentage'] = intval(($result['answer2_q11']['answer2'] / $totalResponses) * 100);
        }
    
        return $result;
    }

    public static function HousingReportQuestion11c($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 3 THEN 1 ELSE 0 END) AS answer3'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 4 THEN 1 ELSE 0 END) AS answer4'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 5 THEN 1 ELSE 0 END) AS answer5'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 6 THEN 1 ELSE 0 END) AS answer6'),
            DB::raw('SUM(CASE WHEN question_11.answer3_q11 = 7 THEN 1 ELSE 0 END) AS answer7')
        )
        ->join('question_11', 'household.id', '=', 'question_11.household_id')
        ->where('household.year', $selectedYear);

        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }

        $total = $query->groupBy('question_11.answer3_q11')->get();

        $result = [
            'answer3_q11' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
                'answer3' => $total->sum('answer3'),
                'answer4' => $total->sum('answer4'),
                'answer5' => $total->sum('answer5'),
                'answer6' => $total->sum('answer6'),
                'answer7' => $total->sum('answer7'),
                'answer1_percentage' => 0,
                'answer2_percentage' => 0,
                'answer3_percentage' => 0,
                'answer4_percentage' => 0,
                'answer5_percentage' => 0,
                'answer6_percentage' => 0,
                'answer7_percentage' => 0,
            ]
        ];

        $totalResponses = $result['answer3_q11']['answer1'] + $result['answer3_q11']['answer2'] + $result['answer3_q11']['answer3'] + $result['answer3_q11']['answer4'] + $result['answer3_q11']['answer5'] + $result['answer3_q11']['answer6'] + $result['answer3_q11']['answer7'];

        if ($totalResponses > 0) {
            $result['answer3_q11']['answer1_percentage'] = intval(($result['answer3_q11']['answer1'] / $totalResponses) * 100);
            $result['answer3_q11']['answer2_percentage'] = intval(($result['answer3_q11']['answer2'] / $totalResponses) * 100);
            $result['answer3_q11']['answer3_percentage'] = intval(($result['answer3_q11']['answer3'] / $totalResponses) * 100);
            $result['answer3_q11']['answer4_percentage'] = intval(($result['answer3_q11']['answer4'] / $totalResponses) * 100);
            $result['answer3_q11']['answer5_percentage'] = intval(($result['answer3_q11']['answer5'] / $totalResponses) * 100);
            $result['answer3_q11']['answer6_percentage'] = intval(($result['answer3_q11']['answer6'] / $totalResponses) * 100);
            $result['answer3_q11']['answer7_percentage'] = intval(($result['answer3_q11']['answer7'] / $totalResponses) * 100);
        }

        return $result;
    }

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
