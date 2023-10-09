<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Household;
use App\Models\FamilyMembers;
use App\Models\Question5;
use App\Models\Question6;

use App\Models\Question11;
use App\Models\Question12;
class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentYear = Carbon::now()->year;

        $selectedYear = $request->input('year', $currentYear);

        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');

        //Household
        $totalHouseholds = Household::totalHouseholds($selectedYear);
        $previousYearHousehold = Household::previousYearHousehold($selectedYear);
        $previousPercentageHousehold = Household::previousPercentageHousehold($selectedYear);
        $getHouseholdStatistics = Household::getHouseholdStatistics($selectedYear);


        //Resident
        $totalResidents = FamilyMembers::totalResidents($selectedYear);
        $previousYearResidents = FamilyMembers::previousYearResidents($selectedYear);
        $previousPercentageResidents = FamilyMembers::previousPercentageResidents($selectedYear);
        //Male
        $maleResidents = FamilyMembers::maleResidents($selectedYear);
        $previousYearMale = FamilyMembers::previousYearMale($selectedYear);
        $previousPercentageMale = FamilyMembers::previousPercentageMale($selectedYear);
        //Female
        $femaleResidents = FamilyMembers::femaleResidents($selectedYear);
        $previousYearFemale = FamilyMembers::previousYearFemale($selectedYear);
        $previousPercentageFemale = FamilyMembers::previousPercentageFemale($selectedYear);

        //Dahilan ng Paglipat --- {{$Question5['answer1_q5']['answer1']}}
        $Question5 = Question5::Question5($selectedYear);
        //Uri ng Paglipat --- {{$Question6['answer1_q6']['answer1']}}
        $Question6 = Question6::Question6($selectedYear);


        $Question11a = Question11::Question11a($selectedYear);
        $Question11b = Question11::Question11b($selectedYear);
        $Question11c = Question11::Question11c($selectedYear);

        $Question12a = Question12::Question12a($selectedYear);
        $Question12b = Question12::Question12b($selectedYear);
        
        $DashboardChartCivilStatus = FamilyMembers::DashboardChartCivilStatus($selectedYear);
        $DashboardAgeRangeDistribution = FamilyMembers::DashboardAgeRangeDistribution($selectedYear);
        return view('pages.dashboard.dashboard', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'totalHouseholds',
            'previousYearHousehold',
            'previousPercentageHousehold',

            'getHouseholdStatistics',

            'totalResidents',
            'previousYearResidents',
            'previousPercentageResidents',

            'maleResidents',
            'previousYearMale',
            'previousPercentageMale',

            'femaleResidents',
            'previousYearFemale',
            'previousPercentageFemale',

            'Question5',
            'Question6',

            'Question11a',
            'Question11b',
            'Question11c',

            'Question12a',
            'Question12b',


            'DashboardChartCivilStatus',
            'DashboardAgeRangeDistribution',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
