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

        // $result = [
        //     'answer1_q5' => [
        //         'answer1' => $total->sum('answer1'),
        //         'answer2' => $total->sum('answer2'),
        //         'answer3' => $total->sum('answer3'),
        //     ]
        // ];

        return $total;
    }

    //MIGRATION
    public static function MigrationReportQuestion5($selectedYear)
    {
        $total = Household::select(
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_5', 'household.id', '=', 'question_5.household_id')
        ->where('household.year', $selectedYear)
        ->get();

        return $total;
    }
    public static function MigrationReportQuestion5ByBarangay($selectedYear)
    {
        $total = Household::select(
            'household.barangay',
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_5', 'household.id', '=', 'question_5.household_id')
        ->where('household.year', $selectedYear)
        ->groupBy('household.barangay')
        ->get();

        return $total;
    }
    public static function MigrationReportQuestion5Chart($selectedYear, $selectedBarangay)
    {
        $query = Household::select(
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 1 THEN 1 ELSE 0 END) AS answer1'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 2 THEN 1 ELSE 0 END) AS answer2'),
            DB::raw('SUM(CASE WHEN question_5.answer1_q5 = 3 THEN 1 ELSE 0 END) AS answer3')
        )
        ->join('question_5', 'household.id', '=', 'question_5.household_id')
        ->where('household.year', $selectedYear);
    
        if ($selectedBarangay) {
            $query->addSelect('household.barangay')
                ->where('household.barangay', $selectedBarangay)
                ->groupBy('household.barangay');
        }
    
        $total = $query->get();
    
        $result = [];
    
        foreach ($total as $item) {
            $totalResponses = $item->answer1 + $item->answer2 + $item->answer3;
    
            $result[] = [
                'barangay' => $item->barangay ?? null,
                'answer1' => $item->answer1,
                'answer2' => $item->answer2,
                'answer3' => $item->answer3,
                'answer1_percentage' => ($totalResponses !== 0) ? intval(($item->answer1 / $totalResponses) * 100) : 0,
                'answer2_percentage' => ($totalResponses !== 0) ? intval(($item->answer2 / $totalResponses) * 100) : 0,
                'answer3_percentage' => ($totalResponses !== 0) ? intval(($item->answer3 / $totalResponses) * 100) : 0,
            ];
        }
    
        return $result;
    }
    
    public static function getChartTitleQuestion5($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown Barangay'; 
        }

        $chartTitle = 'Dahilan ng Pag-lipat Distribution Chart (' . $selectedYear;

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
