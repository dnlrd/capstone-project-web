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

    public static function totalCivilStatus($year)
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
