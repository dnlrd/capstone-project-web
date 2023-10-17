<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\FamilyMembers;
use App\Models\Household;

use App\Models\Question5;
use App\Models\Question6;
use App\Models\Question14;
use App\Models\Question11;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
class Report extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
    public function index()
    {
        return view('pages.report.reports');
    }

    public function demographic(Request $request)
    {
        $BARANGAY_NAMES = self::BARANGAY_NAMES;
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $selectedBarangay = $request->input('barangay');
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $availableBarangays = Household::distinct()->orderBy('barangay', 'asc')->pluck('barangay');
        
        $getChartTitleGender = FamilyMembers::getChartTitleGender($selectedYear, $selectedBarangay);
        $getChartTitleCivilStatus = FamilyMembers::getChartTitleCivilStatus($selectedYear, $selectedBarangay);
        $getChartTitleGenderAge = FamilyMembers::getChartTitleGenderAge($selectedYear, $selectedBarangay);

        $DemographicReportGender = FamilyMembers::DemographicReportGender($selectedYear,$selectedBarangay);
        $DemographicReportCivilStatus = FamilyMembers::DemographicReportCivilStatus($selectedYear, $selectedBarangay);
        $DemographicReportAge = FamilyMembers::DemographicReportAge($selectedYear,$selectedBarangay);
        $DemographicGenderAgeDistribution = FamilyMembers::GenderAgeDistribution($selectedYear, $selectedBarangay);

        return view('pages.report.demographic', compact(
            'currentYear',
            'selectedYear',
            'availableYears',
            'selectedBarangay',
            'availableBarangays',
            'BARANGAY_NAMES',

            'DemographicReportGender',
            'DemographicReportCivilStatus',
            'DemographicReportAge',
            'DemographicGenderAgeDistribution',

            'getChartTitleCivilStatus',
            'getChartTitleGender',
            'getChartTitleGenderAge',

        ));
    }

    public function economic(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $EconomicReportEmploymentStatus = FamilyMembers::EconomicReportEmploymentStatus($selectedYear);
        $EconomicReportWhere = FamilyMembers::EconomicReportWhere($selectedYear);
        $EconomicReportSector = FamilyMembers::EconomicReportSector($selectedYear);
        $EconomicReportPosition = FamilyMembers::EconomicReportPosition($selectedYear);
        $EconomicReportEmploymentStatusByBarangay = FamilyMembers::EconomicReportEmploymentStatusByBarangay($selectedYear);
        return view('pages.report.economic', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'EconomicReportEmploymentStatus',
            'EconomicReportEmploymentStatusByBarangay',

            'EconomicReportWhere',
            'EconomicReportSector',
            'EconomicReportPosition',
        ));
    }

    public function educational(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $EducationalReport = FamilyMembers::EducationalReport($selectedYear);
        $EducationalReportByBarangay = FamilyMembers::EducationalReportByBarangay($selectedYear);
        
        return view('pages.report.educational', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'EducationalReport',
            'EducationalReportByBarangay',
            

        ));
    }

    public function health(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');
        $list = FamilyMembers::BARANGAY_NAMES;

        $perPage = 8;
        
        $HealthReportDisability = FamilyMembers::HealthReportDisability($selectedYear);
        $HealthReportDisabilityByBarangay = FamilyMembers::HealthReportDisabilityByBarangay($selectedYear);

        $HealthReportNutritionByBarangay = FamilyMembers::HealthReportNutritionByBarangay($selectedYear);
        $HealthReportNutrition = FamilyMembers::HealthReportNutrition($selectedYear);

        $HealthReportQuestion14 = Question14::HealthReportQuestion14($selectedYear);
        $HealthReportQuestion14ByBarangay = Question14::HealthReportQuestion14ByBarangay($selectedYear);
        return view('pages.report.health', compact(
            'list',
            'currentYear',
            'selectedYear',
            'availableYears',

            'HealthReportDisability',
            'HealthReportNutritionByBarangay',

            'HealthReportNutrition',
            'HealthReportDisabilityByBarangay',
           

            'HealthReportQuestion14',
            'HealthReportQuestion14ByBarangay',

        ));
    }

    public function housing(Request $request)
    {
        $BARANGAY_NAMES = self::BARANGAY_NAMES;
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $selectedBarangay = $request->input('barangay');
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $availableBarangays = Household::distinct()->orderBy('barangay', 'asc')->pluck('barangay');


        $Question11a = Question11::HousingReportQuestion11a($selectedYear, $selectedBarangay );
        $Question11b = Question11::HousingReportQuestion11b($selectedYear, $selectedBarangay );
        $Question11c = Question11::HousingReportQuestion11c($selectedYear, $selectedBarangay );
        return view('pages.report.housing', compact(
            'currentYear',
            'selectedYear',
            'availableYears',
            'selectedBarangay',
            'availableBarangays',
            'BARANGAY_NAMES',

            'Question11a',
            'Question11b',
            'Question11c',
        ));
    }

    public function migration(Request $request)
    {
        //
        $BARANGAY_NAMES = self::BARANGAY_NAMES;
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $selectedBarangay = $request->input('barangay');
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $availableBarangays = Household::distinct()->orderBy('barangay', 'asc')->pluck('barangay');
       

        $selectedBarangay = $request->input('barangay');
        $MigrationReportQuestion5 = Question5::MigrationReportQuestion5($selectedYear);
        $MigrationReportQuestion5ByBarangay = Question5::MigrationReportQuestion5ByBarangay($selectedYear);

        $getChartTitleQuestion5 = Question5::getChartTitleQuestion5($selectedYear, $selectedBarangay);
        $getChartTitleQuestion6 = Question6::getChartTitleQuestion6($selectedYear, $selectedBarangay);

        $MigrationReportQuestion6 = Question6::MigrationReportQuestion6($selectedYear);
        $MigrationReportQuestion6ByBarangay = Question6::MigrationReportQuestion6ByBarangay($selectedYear);
        
        $MigrationReportQuestion5Chart = Question5::MigrationReportQuestion5Chart($selectedYear, $selectedBarangay);
        $MigrationReportQuestion6Chart = Question6::MigrationReportQuestion6Chart($selectedYear, $selectedBarangay);
        
        return view('pages.report.migration', compact(
            'currentYear',
            'selectedYear',
            'availableYears',
            'selectedBarangay',
            'availableBarangays',
            'BARANGAY_NAMES',

            'getChartTitleQuestion5',
            'getChartTitleQuestion6',

            'MigrationReportQuestion5',
            'MigrationReportQuestion5ByBarangay',
            'MigrationReportQuestion6',
            'MigrationReportQuestion6ByBarangay',

            'MigrationReportQuestion5Chart',
            'MigrationReportQuestion6Chart'
            
        ));
    }
}
