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
    public static function maleResidents($selectedYear)
    {
        $total = DB::table('family_members')
            ->join('household', 'family_members.household_id', '=', 'household.id')
            ->where('household.year', $selectedYear)
            ->where('family_members.gender', '1')
            ->count();

        return $total;
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
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
