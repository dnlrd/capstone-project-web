<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Household extends Model
{
    use HasFactory;
    protected $table = 'household';

    protected $fillable = [
        'user_id',
        'household_code',
        'year',
        'tag_no',
        'barangay',
        'purok',
        'firstname',
        'middlename',
        'lastname',
        'status'
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
    public static function totalHouseholds($selectedYear)
    {
        $totalHouseholds = Household::where('year', $selectedYear)->count();
    
        return $totalHouseholds;
    }

    public static function previousYearHousehold($selectedYear)
    {
        $previousYear = $selectedYear - 1;

        $totalHouseholds = Household::where('year', $previousYear)->count();

        return $totalHouseholds;
    }
    public static function previousPercentageHousehold($selectedYear)
    {
        $previousYear = $selectedYear - 1;

        $totalHouseholdsSelectedYear = Household::where('year', $selectedYear)->count();

        $totalHouseholdsPreviousYear = Household::where('year', $previousYear)->count();

        if ($totalHouseholdsPreviousYear != 0) {
            $percentageChange = (($totalHouseholdsSelectedYear - $totalHouseholdsPreviousYear) / $totalHouseholdsPreviousYear) * 100;
        } else {
            $percentageChange = 0;
        }

        return $percentageChange;
    }


    // public static function getAverageHouseholdSize($year)
    // {
    //     $totalHouseholds = Household::where('year', $year)->count();

    //     $familyMemberCounts = [];

    //     if ($totalHouseholds > 0) {
    //         $households = Household::where('year', $year)->get();

    //         foreach ($households as $household) {
    //             $familyMemberCount = FamilyMembers::where('household_id', $household->id)->count();

    //             $familyMemberCounts[$household->id] = $familyMemberCount;
    //         }
    //     }

    //     $totalFamilyMembers = array_sum($familyMemberCounts);

    //     $averageSize = ($totalHouseholds > 0) ? ($totalFamilyMembers / $totalHouseholds) : 0;

    //     return [
    //         'totalHouseholds' => $totalHouseholds,
    //         'averageSize' => $averageSize,
    //     ];
    // }
    public static function getHouseholdStatistics()
    {
        // Retrieve all unique years for which data is available
        $years = Household::distinct('year')->pluck('year')->toArray();

        $data = [];

        // Loop through each year and calculate household statistics
        foreach ($years as $year) {
            $totalHouseholds = Household::where('year', $year)->count();

            $familyMemberCounts = [];

            if ($totalHouseholds > 0) {
                $households = Household::where('year', $year)->get();

                foreach ($households as $household) {
                    $familyMemberCount = FamilyMembers::where('household_id', $household->id)->count();

                    $familyMemberCounts[$household->id] = $familyMemberCount;
                }
            }

            $totalFamilyMembers = array_sum($familyMemberCounts);

            $averageSize = ($totalHouseholds > 0) ? ($totalFamilyMembers / $totalHouseholds) : 0;

            // Calculate household population
            $householdPopulation = $totalHouseholds * $averageSize;

            // Store the data for this year
            $data[] = [
                'year' => $year,
                'totalHouseholds' => $totalHouseholds,
                'averageSize' => $averageSize,
                'householdPopulation' => $householdPopulation,
            ];
        }

        return $data;
    }

    
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function familyMembers()
    {
        return $this->hasMany(FamilyMembers::class);
    }
    public function question2()
    {
        return $this->hasOne(Question2::class);
    }
    public function question3()
    {
        return $this->hasOne(Question3::class);
    }
    public function question4()
    {
        return $this->hasOne(Question4::class);
    }
    public function question5()
    {
        return $this->hasOne(Question5::class);
    }
    public function question6()
    {
        return $this->hasOne(Question6::class);
    }
    public function question9()
    {
        return $this->hasMany(Question9::class);
    }
    public function question10()
    {
        return $this->hasMany(Question10::class);
    }
    public function question11()
    {
        return $this->hasOne(Question11::class);
    }
    public function question12()
    {
        return $this->hasOne(Question12::class);
    }
    public function question13()
    {
        return $this->hasOne(Question13::class);
    }
    public function question14()
    {
        return $this->hasOne(Question14::class);
    }
    public function question15()
    {
        return $this->hasOne(Question15::class);
    }
    public function question16()
    {
        return $this->hasOne(Question16::class);
    }
    public function question17()
    {
        return $this->hasOne(Question17::class);
    }
}
