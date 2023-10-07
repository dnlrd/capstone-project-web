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
