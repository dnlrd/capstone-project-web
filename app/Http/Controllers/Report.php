<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\FamilyMembers;
use App\Models\Household;

use App\Models\Question5;
use App\Models\Question6;

use App\Models\Question11;
use App\Models\Question12;
use App\Models\Question13;
use App\Models\Question14;
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
        $BARANGAY_NAMES = self::BARANGAY_NAMES;
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $selectedBarangay = $request->input('barangay');
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $availableBarangays = Household::distinct()->orderBy('barangay', 'asc')->pluck('barangay');

        $EconomicReportEmploymentStatus = FamilyMembers::EconomicReportEmploymentStatus($selectedYear, $selectedBarangay);
        $EconomicReportWhere = FamilyMembers::EconomicReportWhere($selectedYear, $selectedBarangay);
        $EconomicReportSector = FamilyMembers::EconomicReportSector($selectedYear, $selectedBarangay);
        $EconomicReportPosition = FamilyMembers::EconomicReportPosition($selectedYear, $selectedBarangay);

        $EconomicReportEmploymentStatusByBarangay = FamilyMembers::EconomicReportEmploymentStatusByBarangay($selectedYear);

        $Question13a = Question13::EconomicQuestion13a($selectedYear, $selectedBarangay );
        $Question13b = Question13::EconomicQuestion13b($selectedYear, $selectedBarangay );


        $getChartTitleEmploymentStatus = FamilyMembers::getChartTitleEmploymentStatus($selectedYear, $selectedBarangay );
        $getChartTitleWhere = FamilyMembers::getChartTitleWhere($selectedYear, $selectedBarangay );
        $getChartTitlePosition = FamilyMembers::getChartTitlePosition($selectedYear, $selectedBarangay );
        $getChartTitleSector = FamilyMembers::getChartTitleSector($selectedYear, $selectedBarangay );
        return view('pages.report.economic', compact(
            'currentYear',
            'selectedYear',
            'availableYears',
            'selectedBarangay',
            'availableBarangays',
            'BARANGAY_NAMES',

            'EconomicReportEmploymentStatus',
            'EconomicReportEmploymentStatusByBarangay',

            'EconomicReportWhere',
            'EconomicReportSector',
            'EconomicReportPosition',

            'Question13a',
            'Question13b',

            'getChartTitleEmploymentStatus',
            'getChartTitleWhere',
            'getChartTitlePosition',
            'getChartTitleSector',
        ));
    }

    public function educational(Request $request)
    {
        $BARANGAY_NAMES = self::BARANGAY_NAMES;
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $selectedBarangay = $request->input('barangay');
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $availableBarangays = Household::distinct()->orderBy('barangay', 'asc')->pluck('barangay');

        $EducationalReport = FamilyMembers::EducationalReport($selectedYear, $selectedBarangay);
        $EducationalReportByBarangay = FamilyMembers::EducationalReportByBarangay($selectedYear);
        $getChartTitleEducationalReport = FamilyMembers::getChartTitleEducationalReport($selectedYear, $selectedBarangay);
        
        return view('pages.report.educational', compact(
            'currentYear',
            'selectedYear',
            'availableYears',
            'selectedBarangay',
            'availableBarangays',
            'BARANGAY_NAMES',

            'EducationalReport',
            'EducationalReportByBarangay',
            
            'getChartTitleEducationalReport',

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

        $Question12a = Question12::HousingReportQuestion12a($selectedYear, $selectedBarangay );
        $Question12b = Question12::HousingReportQuestion12b($selectedYear, $selectedBarangay );

        $getChartTitleQuestion11a = Question11::getChartTitleQuestion11a($selectedYear, $selectedBarangay );
        $getChartTitleQuestion11b = Question11::getChartTitleQuestion11b($selectedYear, $selectedBarangay );
        $getChartTitleQuestion11c = Question11::getChartTitleQuestion11c($selectedYear, $selectedBarangay );

        $getChartTitleQuestion12a = Question12::getChartTitleQuestion12a($selectedYear, $selectedBarangay );
        $getChartTitleQuestion12b = Question12::getChartTitleQuestion12b($selectedYear, $selectedBarangay );
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

            'Question12a',
            'Question12b',

            'getChartTitleQuestion11a',
            'getChartTitleQuestion11b',
            'getChartTitleQuestion11c',

            'getChartTitleQuestion12a',
            'getChartTitleQuestion12b',
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
