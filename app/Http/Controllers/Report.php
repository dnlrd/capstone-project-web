<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\FamilyMembers;
use App\Models\Household;

use App\Models\Question5;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
class Report extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.report.reports');
    }

    public function demographic(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');
        

        $DemographicReportGender = FamilyMembers::DemographicReportGender($selectedYear);
        $DemographicReportCivilStatus = FamilyMembers::DemographicReportCivilStatus($selectedYear);
        $DemographicReportAge = FamilyMembers::DemographicReportAge($selectedYear);
        $DemographicGenderAgeDistribution = FamilyMembers::GenderAgeDistribution($selectedYear);

        return view('pages.report.demographic', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'DemographicReportGender',
            'DemographicReportCivilStatus',
            'DemographicReportAge',
            'DemographicGenderAgeDistribution',
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

        return view('pages.report.health', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'HealthReportDisability',
            'HealthReportNutritionByBarangay',

            'HealthReportNutrition',
            'HealthReportDisabilityByBarangay',
            'list'

        ));
    }

    public function housing()
    {
        //
    }

    public function migration(Request $request)
    {
        //
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        $MigrationReportQuestion5 = FamilyMembers::MigrationReportQuestion5($selectedYear);
    }
}
