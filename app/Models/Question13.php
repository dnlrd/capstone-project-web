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

    public static function EconomicQuestion13a($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_13.answer1_q13 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_13.answer1_q13 = 2 THEN 1 ELSE 0 END) AS answer2')
        )
        ->join('question_13', 'household.id', '=', 'question_13.household_id')
        ->where('household.year', $selectedYear);

        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }

        $total = $query->groupBy('question_13.answer1_q13')->get();

        $result = [
            'answer1_q13' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
            ]
        ];

        $totalResponses = $total->sum('answer1') + $total->sum('answer2');

        if ($totalResponses !== 0) {
            $result['answer1_q13']['answer1_percentage'] = intval(($result['answer1_q13']['answer1'] / $totalResponses) * 100);
            $result['answer1_q13']['answer2_percentage'] = intval(($result['answer1_q13']['answer2'] / $totalResponses) * 100);
        } else {
            $result['answer1_q13']['answer1_percentage'] = 0;
            $result['answer1_q13']['answer2_percentage'] = 0;
        }

        return $result;
    }

    
    public static function EconomicQuestion13b($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_13.answer3_q13 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_13.answer3_q13 = 2 THEN 1 ELSE 0 END) AS answer2')
        )
        ->join('question_13', 'household.id', '=', 'question_13.household_id')
        ->where('household.year', $selectedYear);
    
        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }
    
        $total = $query->groupBy('question_13.answer3_q13')->get();
    
        $result = [
            'answer3_q13' => [
                'answer1' => $total->sum('answer1'),
                'answer2' => $total->sum('answer2'),
            ]
        ];
    
        $totalResponses = $total->sum('answer1') + $total->sum('answer2');
    
        if ($totalResponses !== 0) {
            $result['answer3_q13']['answer1_percentage'] = intval(($result['answer3_q13']['answer1'] / $totalResponses) * 100);
            $result['answer3_q13']['answer2_percentage'] = intval(($result['answer3_q13']['answer2'] / $totalResponses) * 100);
        } else {
            $result['answer3_q13']['answer1_percentage'] = 0;
            $result['answer3_q13']['answer2_percentage'] = 0;
        }
    
        return $result;
    }
    
    
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
