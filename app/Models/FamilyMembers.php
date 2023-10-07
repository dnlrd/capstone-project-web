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
        'gender',
        'age',
        'civil_status',
        'solo_parent',
        'religion',
        'ibang_relihiyon',
        'studying',
        'not_studying',
        'has_job',
        'job',
        'known_work',
        'where',
        'iba_pa_saan',
        'sector',
        'iba_pa_sektor',
        'position',
        'monthly_income',
        'level_of_nutrition',
        'type_of_disability',
        'iba_pa_kapansanan',
        'household_id',
    ];
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
    public static function getPercentageChangeInFemaleResidents($selectedYear)
    {
        $femaleCountSelectedYear = self::getFemaleResidentsCount($selectedYear);
        $femaleCountPreviousYear = self::getFemaleResidentsCountPreviousYear($selectedYear);
    
        if ($femaleCountPreviousYear != 0) {
            $percentageChange = (($femaleCountSelectedYear - $femaleCountPreviousYear) / $femaleCountPreviousYear) * 100;
        } else {
            $percentageChange = 0; 
        }
    
        return $percentageChange;
    }
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
