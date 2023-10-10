<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\FamilyMembers;
use App\Models\Household;

use App\Models\Question5;
class Report extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function demographic(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $selectedYear = $request->input('year', $currentYear);
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');
        

        $DemographicReportGender = FamilyMembers::DemographicReportGender($selectedYear);
        $DemographicReportCivilStatus = FamilyMembers::DemographicReportCivilStatus($selectedYear);
        $DemographicReportAge = FamilyMembers::DemographicReportAge($selectedYear);
        
        return view('pages.report.demographic', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'DemographicReportGender',
            'DemographicReportCivilStatus',
            'DemographicReportAge'
        ));
    }

    public function economic()
    {
        
    }

    public function educational()
    {
        //
    }

    public function health()
    {
        //
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
