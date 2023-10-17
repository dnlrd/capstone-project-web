<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMembers extends Model
{
    use HasFactory;
    protected $table = 'family_members';
    
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'relationship_to_head',
        'gender', //
        'age',
        'civil_status', //
        'solo_parent', //

        'religion', //
        'ibang_relihiyon', //

        'studying', //

        'has_job', //

        'job',//
        'known_work', //

        'where', //
        'iba_pa_saan', //

        'sector', //
        'iba_pa_sektor', //

        'position', //

        'monthly_income',

        'level_of_nutrition', //

        'type_of_disability', //

        'iba_pa_kapansanan',

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
    //Dashboard
    public static function totalResidents($selectedYear)
    {
        $total = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $selectedYear)
            ->count();

        return $total;
    }
    public static function previousYearResidents($selectedYear)
    {
        $previousYear = $selectedYear - 1;

        $totalResidentsPreviousYear = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $previousYear)
            ->count();

        return $totalResidentsPreviousYear;
    }
    public static function previousPercentageResidents($selectedYear)
    {
        $totalResidentsSelectedYear = self::totalResidents($selectedYear);
        $totalResidentsPreviousYear = self::previousYearResidents($selectedYear);
    
        if ($totalResidentsPreviousYear != 0) {
            $percentageChange = (($totalResidentsSelectedYear - $totalResidentsPreviousYear) / $totalResidentsPreviousYear) * 100;
        } else {
            $percentageChange = 0; 
        }
    
        return $percentageChange;
    }

    public static function maleResidents($selectedYear)
    {
        $total = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $selectedYear)
            ->where('family_members.gender', '1')
            ->count();

        return $total;
    }
    public static function previousYearMale($selectedYear)
    {
        $previousYear = $selectedYear - 1;

        $maleCountPreviousYear = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $previousYear)
            ->where('family_members.gender', '1')
            ->count();

        return $maleCountPreviousYear;
    }
    public static function previousPercentageMale($selectedYear)
    {
        $maleCountSelectedYear = self::maleResidents($selectedYear);
        $maleCountPreviousYear = self::previousYearMale($selectedYear);

        if ($maleCountPreviousYear != 0) {
            $percentageChange = (($maleCountSelectedYear - $maleCountPreviousYear) / $maleCountPreviousYear) * 100;
        } else {
            $percentageChange = 0; 
        }

        return $percentageChange;
    }

    public static function femaleResidents($selectedYear)
    {
        $total = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $selectedYear)
            ->where('family_members.gender', '2')
            ->count();

        return $total;
    }
    public static function previousYearFemale($selectedYear)
    {
        $previousYear = $selectedYear - 1;
    
        $femaleCountPreviousYear = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $previousYear)
            ->where('family_members.gender', '2')
            ->count();
    
        return $femaleCountPreviousYear;
    }
    public static function previousPercentageFemale($selectedYear)
    {
        $femaleCountSelectedYear = self::femaleResidents($selectedYear);
        $femaleCountPreviousYear = self::previousYearFemale($selectedYear);
    
        if ($femaleCountPreviousYear != 0) {
            $percentageChange = (($femaleCountSelectedYear - $femaleCountPreviousYear) / $femaleCountPreviousYear) * 100;
        } else {
            $percentageChange = 0; 
        }
    
        return $percentageChange;
    }
    //End Dashboard

    public static function totalCivilStatus($selectedYear)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' THEN 1 ELSE 0 END) AS total_single"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' THEN 1 ELSE 0 END) AS total_cohabiting"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '3' THEN 1 ELSE 0 END) AS total_married"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '4' THEN 1 ELSE 0 END) AS total_separated"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '5' THEN 1 ELSE 0 END) AS total_widowed")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->first();

        $results = [
            'single' => $total->total_single,
            'cohabiting' => $total->total_cohabiting,
            'married' => $total->total_married,
            'separated' => $total->total_separated,
            'widowed' => $total->total_widowed,
        ];

        return $results;
    }

    //DEMOGRAPHIC
    public static function DemographicReportResidents($selectedYear)
    {

    }
    public static function DemographicReportGender($selectedYear, $selectedBarangay)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.gender = '1' THEN 1 ELSE 0 END) AS male_count"),
            DB::raw("SUM(CASE WHEN family_members.gender = '2' THEN 1 ELSE 0 END) AS female_count"),
            DB::raw("SUM(CASE WHEN family_members.gender IN ('1', '2') THEN 1 ELSE 0 END) AS total_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $selectedYear);
    
        if ($selectedBarangay) {
            $total->where('household.barangay', $selectedBarangay);
        }
    
        $total = $total->first();
    
        if ($total->total_count > 0) {
            $total->male_percentage = ($total->male_count / $total->total_count) * 100;
            $total->female_percentage = ($total->female_count / $total->total_count) * 100;
        } else {
            $total->male_percentage = 0;
            $total->female_percentage = 0;
        }
    
        return $total;
    }
    
    public static function getChartTitleGender($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown'; 
        }

        $chartTitle = 'Gender Distribution Chart (' . $selectedYear;

        if ($barangayName) {
            $chartTitle .= ' - ' . $barangayName;
        }

        $chartTitle .= ')';

        return $chartTitle;
    }

    public static function DemographicReportCivilStatus($selectedYear, $selectedBarangay)
{
    $query = Household::select(
        DB::raw("SUM(CASE WHEN family_members.civil_status = '1' THEN 1 ELSE 0 END) AS total_single"),
        DB::raw("SUM(CASE WHEN family_members.civil_status = '2' THEN 1 ELSE 0 END) AS total_cohabiting"),
        DB::raw("SUM(CASE WHEN family_members.civil_status = '3' THEN 1 ELSE 0 END) AS total_married"),
        DB::raw("SUM(CASE WHEN family_members.civil_status = '4' THEN 1 ELSE 0 END) AS total_separated"),
        DB::raw("SUM(CASE WHEN family_members.civil_status = '5' THEN 1 ELSE 0 END) AS total_widowed")
    )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $selectedYear);

    if ($selectedBarangay) {
        $query->where('household.barangay', $selectedBarangay);
    }

    $total = $query->first();

    $totalCount = $total['total_single'] + $total['total_cohabiting'] + $total['total_married'] + $total['total_separated'] + $total['total_widowed'];

if ($totalCount > 0) {
    $total['total_single_percentage'] = intval($total['total_single'] / $totalCount * 100);
    $total['total_cohabiting_percentage'] = intval($total['total_cohabiting'] / $totalCount * 100);
    $total['total_married_percentage'] = intval($total['total_married'] / $totalCount * 100);
    $total['total_separated_percentage'] = intval($total['total_separated'] / $totalCount * 100);
    $total['total_widowed_percentage'] = intval($total['total_widowed'] / $totalCount * 100);
} else {
    $total['total_single_percentage'] = 0;
    $total['total_cohabiting_percentage'] = 0;
    $total['total_married_percentage'] = 0;
    $total['total_separated_percentage'] = 0;
    $total['total_widowed_percentage'] = 0;
}return $total;
}

    public static function getChartTitleCivilStatus($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown Civil Status'; 
        }

        $chartTitle = 'Civil Status Distribution Chart (' . $selectedYear;

        if ($barangayName) {
            $chartTitle .= ' - ' . $barangayName;
        }

        $chartTitle .= ')';

        return $chartTitle;
    }

    public static function DemographicReportAge($year, $selectedBarangay)
{
    $query = Household::select(
        DB::raw("CASE 
            WHEN age BETWEEN 0 AND 4 THEN '0-4'
            WHEN age BETWEEN 5 AND 9 THEN '5-9'
            WHEN age BETWEEN 10 AND 19 THEN '10-19'
            WHEN age BETWEEN 20 AND 29 THEN '20-29'
            WHEN age BETWEEN 30 AND 39 THEN '30-39'
            WHEN age BETWEEN 40 AND 49 THEN '40-49'
            WHEN age BETWEEN 50 AND 59 THEN '50-59'
            WHEN age BETWEEN 60 AND 69 THEN '60-69'
            WHEN age BETWEEN 70 AND 79 THEN '70-79'
            ELSE '80+' END AS `age_range`"), // Escape `age_range` with backticks
        DB::raw('COUNT(*) as `count`') // Escape `count` with backticks
    )
        ->join('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year);

    if ($selectedBarangay) {
        $query->where('household.barangay', $selectedBarangay);
    }

    $ageRangeDistribution = $query
        ->groupBy('age_range')
        ->orderByRaw("CASE 
            WHEN `age_range` = '0-4' THEN 1
            WHEN `age_range` = '5-9' THEN 2
            WHEN `age_range` = '10-19' THEN 3
            WHEN `age_range` = '20-29' THEN 4
            WHEN `age_range` = '30-39' THEN 5
            WHEN `age_range` = '40-49' THEN 6
            WHEN `age_range` = '50-59' THEN 7
            WHEN `age_range` = '60-69' THEN 8
            WHEN `age_range` = '70-79' THEN 9
            ELSE 10 END")
        ->get();

    $result = [];

    foreach ($ageRangeDistribution as $data) {
        $result[] = [
            'age_range' => $data->age_range,
            'count' => $data->count,
        ];
    }

    return $result;
}

    
    public static function DemographicReportSoloParent($year)
    {

    }
    public static function GenderAgeDistribution($year, $selectedBarangay)
    {
        $query = DB::table('household')
            ->select(
                DB::raw("CASE 
                    WHEN family_members.age BETWEEN 0 AND 4 THEN '0-4'
                    WHEN family_members.age BETWEEN 5 AND 9 THEN '5-9'
                    WHEN family_members.age BETWEEN 10 AND 19 THEN '10-19'
                    WHEN family_members.age BETWEEN 20 AND 29 THEN '20-29'
                    WHEN family_members.age BETWEEN 30 AND 39 THEN '30-39'
                    WHEN family_members.age BETWEEN 40 AND 49 THEN '40-49'
                    WHEN family_members.age BETWEEN 50 AND 59 THEN '50-59'
                    WHEN family_members.age BETWEEN 60 AND 69 THEN '60-69'
                    WHEN family_members.age BETWEEN 70 AND 79 THEN '70-79'
                    ELSE '80+' END AS age_range"),
                DB::raw("SUM(CASE WHEN family_members.gender = '1' THEN 1 ELSE 0 END) AS male_count"),
                DB::raw("SUM(CASE WHEN family_members.gender = '2' THEN 1 ELSE 0 END) AS female_count")
            )
            ->join('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year);

        if ($selectedBarangay) {
            $query->where('household.barangay', $selectedBarangay);
        }

        return $query
            ->groupBy('age_range')
            ->orderByRaw("CASE 
                WHEN age_range = '0-4' THEN 1
                WHEN age_range = '5-9' THEN 2
                WHEN age_range = '10-19' THEN 3
                WHEN age_range = '20-29' THEN 4
                WHEN age_range = '30-39' THEN 5
                WHEN age_range = '40-49' THEN 6
                WHEN age_range = '50-59' THEN 7
                WHEN age_range = '60-69' THEN 8
                WHEN age_range = '70-79' THEN 9
                ELSE 10 END")
            ->get();
    }
    public static function getChartTitleGenderAge($selectedYear, $selectedBarangay)
    {
        $barangayName = '';

        if ($selectedBarangay) {
            $barangayName = isset(self::BARANGAY_NAMES[$selectedBarangay])
                ? self::BARANGAY_NAMES[$selectedBarangay]
                : 'Unknown'; 
        }

        $chartTitle = 'Age and Gender Distribution Chart (' . $selectedYear;

        if ($barangayName) {
            $chartTitle .= ' - ' . $barangayName;
        }

        $chartTitle .= ')';

        return $chartTitle;
    }

    //ECONOMIC
    public static function EconomicReportEmploymentStatus($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.has_job = '1' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS employed_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '2' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS unemployed_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->get();

        return $total;
    }
    public static function EconomicReportEmploymentStatusByBarangay($year)
    {
        $total = Household::select(
            'household.barangay',
            DB::raw("SUM(CASE WHEN family_members.has_job = '1' THEN 1 ELSE 0 END) AS employed_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '2' THEN 1 ELSE 0 END) AS unemployed_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->groupBy('household.barangay')
            ->orderBy('household.barangay')
            ->get();

        return $total;
    }
    public static function EconomicReportIncome($year)
    {

    }

    public static function EconomicReportWhere($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN `where` = '1' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS tirahan_count"),
            DB::raw("SUM(CASE WHEN `where` = '2' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS kapitbahay_count"),
            DB::raw("SUM(CASE WHEN `where` = '3' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS sa_loob_ng_sto_tomas_count"),
            DB::raw("SUM(CASE WHEN `where` = '4' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS sa_labas_ng_sto_tomas_count"),
            DB::raw("SUM(CASE WHEN `where` = '5' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS sa_labas_ng_batangas_count"),
            DB::raw("SUM(CASE WHEN `where` = '6' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS hindi_tiyak_count"),
            DB::raw("SUM(CASE WHEN `where` = '7' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS iba_pa_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('family_members.has_job', '1')
        ->where('household.year', $year)
        ->get();

        return $total;
    }
    public static function EconomicReportSector($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.sector = '1' THEN 1 ELSE 0 END) AS pagmamanupaktyur_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '2' THEN 1 ELSE 0 END) AS konstruksyon_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '3' THEN 1 ELSE 0 END) AS pagbubukid_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '4' THEN 1 ELSE 0 END) AS serbisyo_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '5' THEN 1 ELSE 0 END) AS iba_pa_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->first();

        return $total;
    }
    public static function EconomicReportPosition($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.position = '1' THEN 1 ELSE 0 END) AS permanente_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '2' THEN 1 ELSE 0 END) AS kaswal_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '3' THEN 1 ELSE 0 END) AS may_kontrata_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '4' THEN 1 ELSE 0 END) AS pana_panahon_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '5' THEN 1 ELSE 0 END) AS self_employed_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '6' THEN 1 ELSE 0 END) AS job_order_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->first();

        return $total;
    }

    //EDUCATIONAL
    public static function EducationalReport($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.studying = '1' THEN 1 ELSE 0 END) AS not_in_school_age_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '2' THEN 1 ELSE 0 END) AS no_education_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '3' THEN 1 ELSE 0 END) AS elementary_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '4' THEN 1 ELSE 0 END) AS high_school_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '5' THEN 1 ELSE 0 END) AS junior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '6' THEN 1 ELSE 0 END) AS senior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '7' THEN 1 ELSE 0 END) AS post_baccalaureate_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '8' THEN 1 ELSE 0 END) AS osy_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '9' THEN 1 ELSE 0 END) AS hindi_nag_aaral_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->first();

        return $total;
    }
    public static function  EducationalReportByBarangay($year)
    {
        $educationLevelCountsByBarangay = Household::select(
            'household.barangay',
            DB::raw("SUM(CASE WHEN family_members.studying = '1' THEN 1 ELSE 0 END) AS not_in_school_age_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '2' THEN 1 ELSE 0 END) AS no_education_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '3' THEN 1 ELSE 0 END) AS elementary_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '4' THEN 1 ELSE 0 END) AS high_school_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '5' THEN 1 ELSE 0 END) AS junior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '6' THEN 1 ELSE 0 END) AS senior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '7' THEN 1 ELSE 0 END) AS post_baccalaureate_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '8' THEN 1 ELSE 0 END) AS osy_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '9' THEN 1 ELSE 0 END) AS hindi_nag_aaral_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->groupBy('household.barangay')
            ->orderBy('household.barangay')
            ->get();

        return $educationLevelCountsByBarangay;
    }
    //HEALTH
    public static function HealthReportDisability($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '1' THEN 1 ELSE 0 END) AS hearing_impairment_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '2' THEN 1 ELSE 0 END) AS visual_impairment_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '3' THEN 1 ELSE 0 END) AS mental_retardation_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '4' THEN 1 ELSE 0 END) AS autism_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '5' THEN 1 ELSE 0 END) AS cerebral_palsy_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '6' THEN 1 ELSE 0 END) AS epilepsy_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '7' THEN 1 ELSE 0 END) AS amputee_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '8' THEN 1 ELSE 0 END) AS polio_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '9' THEN 1 ELSE 0 END) AS clubfoot_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '10' THEN 1 ELSE 0 END) AS hunchback_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '11' THEN 1 ELSE 0 END) AS dwarfism_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '12' THEN 1 ELSE 0 END) AS others_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->first();

        return $total;
    }
    public static function HealthReportDisabilityByBarangay($year)
    {
        $total = Household::select(
            'household.barangay',
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '1' THEN 1 ELSE 0 END) AS hearing_impairment_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '2' THEN 1 ELSE 0 END) AS visual_impairment_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '3' THEN 1 ELSE 0 END) AS mental_retardation_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '4' THEN 1 ELSE 0 END) AS autism_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '5' THEN 1 ELSE 0 END) AS cerebral_palsy_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '6' THEN 1 ELSE 0 END) AS epilepsy_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '7' THEN 1 ELSE 0 END) AS amputee_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '8' THEN 1 ELSE 0 END) AS polio_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '9' THEN 1 ELSE 0 END) AS clubfoot_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '10' THEN 1 ELSE 0 END) AS hunchback_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '11' THEN 1 ELSE 0 END) AS dwarfism_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '12' THEN 1 ELSE 0 END) AS others_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->groupBy('household.barangay')
        ->get();

        return $total;
    }


    public static function HealthReportNutrition($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '1' THEN 1 ELSE 0 END) AS wastong_nutrisyon_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '2' THEN 1 ELSE 0 END) AS undernutrition_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '3' THEN 1 ELSE 0 END) AS overnutrition_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->first();

        return $total;
    }

    public static function HealthReportNutritionByBarangay($year)
    {
        $total = Household::select(
            'household.barangay',
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '1' THEN 1 ELSE 0 END) AS wastong_nutrisyon_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '2' THEN 1 ELSE 0 END) AS undernutrition_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '3' THEN 1 ELSE 0 END) AS overnutrition_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->groupBy('household.barangay')
            ->get();

        return $total;
    }

    
    public static function DashboardChartCivilStatus()
    {
        $results = Household::select(
            'household.year',
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '1' THEN 1 ELSE 0 END) AS total_single_male"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '2' THEN 1 ELSE 0 END) AS total_single_female"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '1' THEN 1 ELSE 0 END) AS total_cohabiting_male"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '2' THEN 1 ELSE 0 END) AS total_cohabiting_female"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '3' AND family_members.gender = '1' THEN 1 ELSE 0 END) AS total_married_male"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '3' AND family_members.gender = '2' THEN 1 ELSE 0 END) AS total_married_female"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '4' AND family_members.gender = '1' THEN 1 ELSE 0 END) AS total_separated_male"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '4' AND family_members.gender = '2' THEN 1 ELSE 0 END) AS total_separated_female"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '5' AND family_members.gender = '1' THEN 1 ELSE 0 END) AS total_widowed_male"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '5' AND family_members.gender = '2' THEN 1 ELSE 0 END) AS total_widowed_female")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->groupBy('household.year')
            ->get();

        // Prepare the final result array
        $finalResults = [];
            foreach ($results as $result) {
                $finalResults[$result->year] = [
                    'single' => [
                        'male' => $result->total_single_male,
                        'female' => $result->total_single_female,
                        'total' => $result->total_single_male + $result->total_single_female,
                    ],
                    'cohabiting' => [
                        'male' => $result->total_cohabiting_male,
                        'female' => $result->total_cohabiting_female,
                        'total' => $result->total_cohabiting_male + $result->total_cohabiting_female,
                    ],
                    'married' => [
                        'male' => $result->total_married_male,
                        'female' => $result->total_married_female,
                        'total' => $result->total_married_male + $result->total_married_female,
                    ],
                    'separated' => [
                        'male' => $result->total_separated_male,
                        'female' => $result->total_separated_female,
                        'total' => $result->total_separated_male + $result->total_separated_female,
                    ],
                    'widowed' => [
                        'male' => $result->total_widowed_male,
                        'female' => $result->total_widowed_female,
                        'total' => $result->total_widowed_male + $result->total_widowed_female,
                    ],
                ];
            }
        return $finalResults;
    }

    public static function DashboardChartCivilStatus1()
    {
        $results = Household::select(
            'household.year',
            // Age range breakdown for single males
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '1' AND family_members.age BETWEEN 0 AND 4 THEN 1 ELSE 0 END) AS total_single_male_age_0_4"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '1' AND family_members.age BETWEEN 5 AND 9 THEN 1 ELSE 0 END) AS total_single_male_age_5_9"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '1' AND family_members.age BETWEEN 10 AND 19 THEN 1 ELSE 0 END) AS total_single_male_age_10_19"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '1' AND family_members.age BETWEEN 20 AND 29 THEN 1 ELSE 0 END) AS total_single_male_age_20_29"),
            // Add more age ranges for single males as needed
            // Age range breakdown for single females
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '2' AND family_members.age BETWEEN 0 AND 4 THEN 1 ELSE 0 END) AS total_single_female_age_0_4"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '2' AND family_members.age BETWEEN 5 AND 9 THEN 1 ELSE 0 END) AS total_single_female_age_5_9"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '2' AND family_members.age BETWEEN 10 AND 19 THEN 1 ELSE 0 END) AS total_single_female_age_10_19"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '1' AND family_members.gender = '2' AND family_members.age BETWEEN 20 AND 29 THEN 1 ELSE 0 END) AS total_single_female_age_20_29"),
            // Add more age ranges for single females as needed
            // Age range breakdown for cohabiting males
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '1' AND family_members.age BETWEEN 0 AND 4 THEN 1 ELSE 0 END) AS total_cohabiting_male_age_0_4"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '1' AND family_members.age BETWEEN 5 AND 9 THEN 1 ELSE 0 END) AS total_cohabiting_male_age_5_9"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '1' AND family_members.age BETWEEN 10 AND 19 THEN 1 ELSE 0 END) AS total_cohabiting_male_age_10_19"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '1' AND family_members.age BETWEEN 20 AND 29 THEN 1 ELSE 0 END) AS total_cohabiting_male_age_20_29"),
            // Add more age ranges for cohabiting males as needed
            // Age range breakdown for cohabiting females
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '2' AND family_members.age BETWEEN 0 AND 4 THEN 1 ELSE 0 END) AS total_cohabiting_female_age_0_4"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '2' AND family_members.age BETWEEN 5 AND 9 THEN 1 ELSE 0 END) AS total_cohabiting_female_age_5_9"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '2' AND family_members.age BETWEEN 10 AND 19 THEN 1 ELSE 0 END) AS total_cohabiting_female_age_10_19"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = '2' AND family_members.gender = '2' AND family_members.age BETWEEN 20 AND 29 THEN 1 ELSE 0 END) AS total_cohabiting_female_age_20_29"),
            // Add more age ranges for cohabiting females as needed
            // Repeat similar blocks for other civil statuses (married, separated, widowed) and genders
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->groupBy('household.year')
            ->get();
    
        // Prepare the final result array
        $finalResults = [];
        foreach ($results as $result) {
            $finalResults[$result->year] = [
                'single' => [
                    'male' => [
                        '0-4' => $result->total_single_male_age_0_4,
                        '5-9' => $result->total_single_male_age_5_9,
                        '10-19' => $result->total_single_male_age_10_19,
                        '20-29' => $result->total_single_male_age_20_29,
                        // Add more age ranges for single males as needed
                    ],
                    'female' => [
                        '0-4' => $result->total_single_female_age_0_4,
                        '5-9' => $result->total_single_female_age_5_9,
                        '10-19' => $result->total_single_female_age_10_19,
                        '20-29' => $result->total_single_female_age_20_29,
                        // Add more age ranges for single females as needed
                    ],
                ],
                'cohabiting' => [
                    'male' => [
                        '0-4' => $result->total_cohabiting_male_age_0_4,
                        '5-9' => $result->total_cohabiting_male_age_5_9,
                        '10-19' => $result->total_cohabiting_male_age_10_19,
                        '20-29' => $result->total_cohabiting_male_age_20_29,
                        // Add more age ranges for cohabiting males as needed
                    ],
                    'female' => [
                        '0-4' => $result->total_cohabiting_female_age_0_4,
                        '5-9' => $result->total_cohabiting_female_age_5_9,
                        '10-19' => $result->total_cohabiting_female_age_10_19,
                        '20-29' => $result->total_cohabiting_female_age_20_29,
                        // Add more age ranges for cohabiting females as needed
                    ],
                ],
                // Repeat similar blocks for other civil statuses (married, separated, widowed) and genders
            ];
        }
    
        return $finalResults;
    }
    
    

    public static function totalSoloParent($year)
    {
        $soloParentCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.solo_parent = '1' THEN 1 ELSE 0 END) AS solo_parent_oo"),
            DB::raw("SUM(CASE WHEN family_members.solo_parent = '2' THEN 1 ELSE 0 END) AS solo_parent_hindi")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->get();
    
            return $soloParentCounts;
    }
    public static function DashboardSoloParent($year)
    {
        $soloParentCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.solo_parent = '1' THEN 1 ELSE 0 END) AS solo_parent_oo"),
            DB::raw("SUM(CASE WHEN family_members.solo_parent = '2' THEN 1 ELSE 0 END) AS solo_parent_hindi")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->get();
    
            return $soloParentCounts;
    }
    //Religion
    public static function totalReligion($year)
    {
        $religionCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.religion = '1' THEN 1 ELSE 0 END) AS katoliko_count"),
            DB::raw("SUM(CASE WHEN family_members.religion = '2' THEN 1 ELSE 0 END) AS born_again_count"),
            DB::raw("SUM(CASE WHEN family_members.religion = '3' THEN 1 ELSE 0 END) AS iglesia_ni_cristo_count"),
            DB::raw("SUM(CASE WHEN family_members.religion = '4' THEN 1 ELSE 0 END) AS islam_count"),
            DB::raw("SUM(CASE WHEN family_members.religion = '5' THEN 1 ELSE 0 END) AS buddhism_count"),
            DB::raw("SUM(CASE WHEN family_members.religion NOT IN ('1', '2', '3', '4', '5') THEN 1 ELSE 0 END) AS others_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->get();

        return $religionCounts;
    }
    public static function totalIbangRelihiyon($year)
    {
        $distinctIbangRelihiyon = FamilyMembers::select(
            'family_members.ibang_relihiyon', 
            DB::raw('COUNT(*) as count'))
            ->leftJoin('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $year)
            ->groupBy('family_members.ibang_relihiyon')
            ->get();

        $results = [];

        foreach ($distinctIbangRelihiyon as $item) {
            $results[$item->ibang_relihiyon] = $item->count;
        }

        return $results;
    }

    
    //Education
    public static function totalEducationLevel($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.studying = '1' THEN 1 ELSE 0 END) AS not_in_school_age_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '2' THEN 1 ELSE 0 END) AS no_education_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '3' THEN 1 ELSE 0 END) AS elementary_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '4' THEN 1 ELSE 0 END) AS high_school_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '5' THEN 1 ELSE 0 END) AS junior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '6' THEN 1 ELSE 0 END) AS senior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '7' THEN 1 ELSE 0 END) AS post_baccalaureate_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '8' THEN 1 ELSE 0 END) AS osy_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->first();

        return $total;
    }

    public static function DashboardEducationLevel($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.studying = '1' THEN 1 ELSE 0 END) AS not_in_school_age_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '2' THEN 1 ELSE 0 END) AS no_education_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '3' THEN 1 ELSE 0 END) AS elementary_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '4' THEN 1 ELSE 0 END) AS high_school_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '5' THEN 1 ELSE 0 END) AS junior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '6' THEN 1 ELSE 0 END) AS senior_high_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '7' THEN 1 ELSE 0 END) AS post_baccalaureate_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '8' THEN 1 ELSE 0 END) AS osy_count"),
            DB::raw("SUM(CASE WHEN family_members.studying = '9' THEN 1 ELSE 0 END) AS hindi_nag_aaral")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->first();

        return $total;
    }

    //Has job
    public static function totalEmploymentStatus($year)
    {
        $employmentStatusCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.has_job = '1' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS employed_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '2' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS unemployed_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->get();

        return $employmentStatusCounts;
    }



    //Job
    public static function totalJob($year)
    {
        $total = FamilyMembers::select(
            'family_members.job', 
            DB::raw('COUNT(*) as count'))
            ->leftJoin('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $year)
            ->groupBy('family_members.job')
            ->get();

        $results = [];

        foreach ($total as $item) {
            $results[$item->job] = $item->count;
        }

        return $results;
    }

    //Known Work
    public static function countDistinctKnownWorks($year)
    {
        $distinctKnownWorks = FamilyMembers::select('family_members.known_work', DB::raw('COUNT(*) as count'))
            ->leftJoin('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $year)
            ->groupBy('family_members.known_work')
            ->get();

        $results = [];

        foreach ($distinctKnownWorks as $item) {
            $results[$item->known_work] = $item->count;
        }

        return $results;
    }


    // wHERE
    public static function totalJobLocation($year)
    {
        $jobLocationCounts = Household::select(
            DB::raw("SUM(CASE WHEN `where` = '1' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS tirahan_count"),
            DB::raw("SUM(CASE WHEN `where` = '2' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS kapitbahay_count"),
            DB::raw("SUM(CASE WHEN `where` = '3' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS sa_loob_ng_sto_tomas_count"),
            DB::raw("SUM(CASE WHEN `where` = '4' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS sa_labas_ng_sto_tomas_count"),
            DB::raw("SUM(CASE WHEN `where` = '5' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS sa_labas_ng_batangas_count"),
            DB::raw("SUM(CASE WHEN `where` = '6' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS hindi_tiyak_count"),
            DB::raw("SUM(CASE WHEN `where` = '7' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS iba_pa_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('family_members.has_job', '1')
        ->where('household.year', $year)
        ->get();

        return $jobLocationCounts;
    }
    public static function totalIbaPaSaan($year)
    {
        $distinctIbaPaSaan = FamilyMembers::select('family_members.iba_pa_saan', DB::raw('COUNT(*) as count'))
            ->leftJoin('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $year)
            ->groupBy('family_members.iba_pa_saan')
            ->get();

        $results = [];

        foreach ($distinctIbaPaSaan as $item) {
            $results[$item->iba_pa_saan] = $item->count;
        }

        return $results;
    }

    //sECTOR
    public static function totalSector($year)
    {
        $sectorCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.sector = '1' THEN 1 ELSE 0 END) AS pagmamanupaktyur_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '2' THEN 1 ELSE 0 END) AS konstruksyon_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '3' THEN 1 ELSE 0 END) AS pagbubukid_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '4' THEN 1 ELSE 0 END) AS serbisyo_count"),
            DB::raw("SUM(CASE WHEN family_members.sector = '5' THEN 1 ELSE 0 END) AS iba_pa_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->first();

        return $sectorCounts;
    }
    public static function totalIbaPaSector($year)
    {
        $distinctIbaPaSektor = FamilyMembers::select('family_members.iba_pa_sektor', DB::raw('COUNT(*) as count'))
            ->leftJoin('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $year)
            ->groupBy('family_members.iba_pa_sektor')
            ->get();

        $results = [];

        foreach ($distinctIbaPaSektor as $item) {
            $results[$item->iba_pa_sektor] = $item->count;
        }

        return $results;
    }

    //Position
    public static function totalPosition($year)
    {
        $total = Household::select(
            DB::raw("SUM(CASE WHEN family_members.position = '1' THEN 1 ELSE 0 END) AS permanente_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '2' THEN 1 ELSE 0 END) AS kaswal_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '3' THEN 1 ELSE 0 END) AS may_kontrata_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '4' THEN 1 ELSE 0 END) AS pana_panahon_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '5' THEN 1 ELSE 0 END) AS self_employed_count"),
            DB::raw("SUM(CASE WHEN family_members.position = '6' THEN 1 ELSE 0 END) AS job_order_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->get();

        return $total;
    }

    public static function totalNutrition($year)
    {
        $nutritionCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '1' THEN 1 ELSE 0 END) AS wastong_nutrisyon_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '2' THEN 1 ELSE 0 END) AS undernutrition_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '3' THEN 1 ELSE 0 END) AS overnutrition_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->get();

        return $nutritionCounts;
    }

    public static function totalDisability($year)
    {
        $disabilityCounts = Household::select(
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '1' THEN 1 ELSE 0 END) AS hearing_impairment_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '2' THEN 1 ELSE 0 END) AS visual_impairment_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '3' THEN 1 ELSE 0 END) AS mental_retardation_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '4' THEN 1 ELSE 0 END) AS autism_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '5' THEN 1 ELSE 0 END) AS cerebral_palsy_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '6' THEN 1 ELSE 0 END) AS epilepsy_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '7' THEN 1 ELSE 0 END) AS amputee_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '8' THEN 1 ELSE 0 END) AS polio_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '9' THEN 1 ELSE 0 END) AS clubfoot_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '10' THEN 1 ELSE 0 END) AS hunchback_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '11' THEN 1 ELSE 0 END) AS dwarfism_count"),
            DB::raw("SUM(CASE WHEN family_members.type_of_disability = '12' THEN 1 ELSE 0 END) AS others_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->where('household.year', $year)
        ->first();

        return $disabilityCounts;
    }

    public static function AverageMonthlyIncome()
    {
        $averageIncomes = Household::select(DB::raw('AVG(monthly_income) as average_income'))
            ->groupBy('household_id')
            ->get();

        return $averageIncomes;
    }


    public static function DashboardAgeRangeDistribution($year)
    {
        $ageRangeDistribution = Household::select(
                DB::raw("CASE 
                    WHEN age BETWEEN 0 AND 4 THEN '0-4'
                    WHEN age BETWEEN 5 AND 9 THEN '5-9'
                    WHEN age BETWEEN 10 AND 19 THEN '10-19'
                    WHEN age BETWEEN 20 AND 29 THEN '20-29'
                    WHEN age BETWEEN 30 AND 39 THEN '30-39'
                    WHEN age BETWEEN 40 AND 49 THEN '40-49'
                    WHEN age BETWEEN 50 AND 59 THEN '50-59'
                    WHEN age BETWEEN 60 AND 69 THEN '60-69'
                    WHEN age BETWEEN 70 AND 79 THEN '70-79'
                    ELSE '80+' END AS age_range"),
                DB::raw('COUNT(*) as count')
            )
            ->join('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->groupBy('age_range')
            ->orderByRaw("CASE 
                WHEN age_range = '0-4' THEN 1
                WHEN age_range = '5-9' THEN 2
                WHEN age_range = '10-19' THEN 3
                WHEN age_range = '20-29' THEN 4
                WHEN age_range = '30-39' THEN 5
                WHEN age_range = '40-49' THEN 6
                WHEN age_range = '50-59' THEN 7
                WHEN age_range = '60-69' THEN 8
                WHEN age_range = '70-79' THEN 9
                ELSE 10 END")
            ->get();

        $result = [];

        foreach ($ageRangeDistribution as $data) {
            $result[] = [
                'age_range' => $data->age_range,
                'count' => $data->count,
            ];
        }

        return $result;
    }
    public static function DashboardEmploymentStatus()
    {
        $employmentStatusCounts = Household::select(
            'year',
            DB::raw("SUM(CASE WHEN family_members.has_job = '1' AND family_members.age >= 15 AND family_members.gender = '1' THEN 1 ELSE 0 END) AS employed_male_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '1' AND family_members.age >= 15 AND family_members.gender = '2' THEN 1 ELSE 0 END) AS employed_female_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '2' AND family_members.age >= 15 AND family_members.gender = '1' THEN 1 ELSE 0 END) AS unemployed_male_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '2' AND family_members.age >= 15 AND family_members.gender = '2' THEN 1 ELSE 0 END) AS unemployed_female_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '1' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS total_employed_count"),
            DB::raw("SUM(CASE WHEN family_members.has_job = '2' AND family_members.age >= 15 THEN 1 ELSE 0 END) AS total_unemployed_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->groupBy('year') // Group by year to get counts for each year
            ->get();

        return $employmentStatusCounts;
    }
    public static function DashboardNutrition()
    {
        $nutritionCounts = Household::select(
            'household.year',
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '1' THEN 1 ELSE 0 END) AS wastong_nutrisyon_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '2' THEN 1 ELSE 0 END) AS undernutrition_count"),
            DB::raw("SUM(CASE WHEN family_members.level_of_nutrition = '3' THEN 1 ELSE 0 END) AS overnutrition_count")
        )
        ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
        ->groupBy('household.year')
        ->get();
    
        return $nutritionCounts;
    }
    


    // public static function AgeRangeDistribution($year)
    // {
    //     $ageRangeDistribution = Household::select(
    //             DB::raw("CASE 
    //                 WHEN family_members.age BETWEEN 0 AND 4 THEN '0-4'
    //                 WHEN family_members.age BETWEEN 5 AND 9 THEN '5-9'
    //                 WHEN family_members.age BETWEEN 10 AND 19 THEN '10-19'
    //                 WHEN family_members.age BETWEEN 20 AND 29 THEN '20-29'
    //                 WHEN family_members.age BETWEEN 30 AND 39 THEN '30-39'
    //                 WHEN family_members.age BETWEEN 40 AND 49 THEN '40-49'
    //                 WHEN family_members.age BETWEEN 50 AND 59 THEN '50-59'
    //                 WHEN family_members.age BETWEEN 60 AND 69 THEN '60-69'
    //                 WHEN family_members.age BETWEEN 70 AND 79 THEN '70-79'
    //                 ELSE '80+' END AS age_range"),
    //             DB::raw("SUM(CASE WHEN family_members.gender = '1' THEN 1 ELSE 0 END) AS male_count"),
    //             DB::raw("SUM(CASE WHEN family_members.gender = '2' THEN 1 ELSE 0 END) AS female_count")
    //         )
    //         ->join('family_members', 'household.id', '=', 'family_members.household_id')
    //         ->where('household.year', $year)
    //         ->groupBy('age_range')
    //         ->orderByRaw("CASE 
    //             WHEN age_range = '0-4' THEN 1
    //             WHEN age_range = '5-9' THEN 2
    //             WHEN age_range = '10-19' THEN 3
    //             WHEN age_range = '20-29' THEN 4
    //             WHEN age_range = '30-39' THEN 5
    //             WHEN age_range = '40-49' THEN 6
    //             WHEN age_range = '50-59' THEN 7
    //             WHEN age_range = '60-69' THEN 8
    //             WHEN age_range = '70-79' THEN 9
    //             ELSE 10 END")
    //         ->get();
    
    //     $result = [];
    
    //     foreach ($ageRangeDistribution as $data) {
    //         $result[] = [
    //             'age_range' => $data->age_range,
    //             'male_count' => $data->male_count,
    //             'female_count' => $data->female_count,
    //         ];
    //     }
    
    //     return $result;
    // }

    public static function genderDistributionByCivilStatus($year)
    {
        $civilStatuses = Household::select(
            'family_members.civil_status',
            DB::raw("SUM(CASE WHEN family_members.civil_status = 1 AND family_members.gender = 1 THEN 1 ELSE 0 END) AS single_male_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 1 AND family_members.gender = 2 THEN 1 ELSE 0 END) AS single_female_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 2 AND family_members.gender = 1 THEN 1 ELSE 0 END) AS cohabiting_male_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 2 AND family_members.gender = 2 THEN 1 ELSE 0 END) AS cohabiting_female_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 3 AND family_members.gender = 1 THEN 1 ELSE 0 END) AS married_male_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 3 AND family_members.gender = 2 THEN 1 ELSE 0 END) AS married_female_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 4 AND family_members.gender = 1 THEN 1 ELSE 0 END) AS separated_male_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 4 AND family_members.gender = 2 THEN 1 ELSE 0 END) AS separated_female_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 5 AND family_members.gender = 1 THEN 1 ELSE 0 END) AS widowed_male_count"),
            DB::raw("SUM(CASE WHEN family_members.civil_status = 5 AND family_members.gender = 2 THEN 1 ELSE 0 END) AS widowed_female_count")
        )
            ->leftJoin('family_members', 'household.id', '=', 'family_members.household_id')
            ->where('household.year', $year)
            ->groupBy('family_members.civil_status')
            ->get();

        $results = [];

        foreach ($civilStatuses as $civilStatus) {
            $results[$civilStatus->civil_status] = [
                'single' => [
                    'male' => $civilStatus->single_male_count,
                    'female' => $civilStatus->single_female_count,
                ],
                'cohabiting' => [
                    'male' => $civilStatus->cohabiting_male_count,
                    'female' => $civilStatus->cohabiting_female_count,
                ],
                'married' => [
                    'male' => $civilStatus->married_male_count,
                    'female' => $civilStatus->married_female_count,
                ],
                'separated' => [
                    'male' => $civilStatus->separated_male_count,
                    'female' => $civilStatus->separated_female_count,
                ],
                'widowed' => [
                    'male' => $civilStatus->widowed_male_count,
                    'female' => $civilStatus->widowed_female_count,
                ],
            ];
        }

        return $results;
    }



    

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
