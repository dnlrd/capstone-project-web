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
    const BARANGAY_NAMES = [
        1 => "Barangay I (Poblacion)",
        2 => "Barangay II (Poblacion)",
        3 => "Barangay III (Poblacion)",
        4 => "Barangay IV (Poblacion)",
        5 => "San Agustin",
        6 => "San Antonio",
        7 => "San Bartolome",
        8 => "San Felix",
        9 => "San Fernando",
        10 => "San Francisco",
        11 => "San Isidro Norte",
        12 => "San Isidro Sur",
        13 => "San Joaquin",
        14 => "San Jose",
        15 => "San Juan",
        16 => "San Luis",
        17 => "San Miguel",
        18 => "San Pablo",
        19 => "San Pedro",
        20 => "San Rafael",
        21 => "San Roque",
        22 => "San Vicente",
        23 => "Santa Ana",
        24 => "Santa Anastacia",
        25 => "Santa Clara",
        26 => "Santa Cruz",
        27 => "Santa Elena",
        28 => "Santa Maria",
        29 => "Santiago",
        30 => "Santa Teresita",
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
    public static function getChartTitleQuestion11a($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown';
        }

        $chartTitle = 'Uri ng tirahan/bahay Chart (' . $selectedYear;

        if ($barangayName) {
            $chartTitle .= ' - ' . $barangayName;
        }

        $chartTitle .= ')';

        return $chartTitle;
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
    public static function getChartTitleQuestion11b($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown';
        }

        $chartTitle = 'Uri ng lupang kinatatayuan ng bahay Chart (' . $selectedYear;

        if ($barangayName) {
            $chartTitle .= ' - ' . $barangayName;
        }

        $chartTitle .= ')';

        return $chartTitle;
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
    public static function getChartTitleQuestion11c($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown';
        }

        $chartTitle = 'Katayuan sa lupa at bahay Chart (' . $selectedYear;

        if ($barangayName) {
            $chartTitle .= ' - ' . $barangayName;
        }

        $chartTitle .= ')';

        return $chartTitle;
    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
