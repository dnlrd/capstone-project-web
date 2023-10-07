<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Household;
use App\Models\FamilyMembers;

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

        $totalHouseholds = Household::totalHouseholds($selectedYear);
        $previousYearHousehold = Household::previousYearHousehold($selectedYear);
        $previousPercentageHousehold = Household::previousPercentageHousehold($selectedYear);

        $totalResidents = FamilyMembers::totalResidents($selectedYear);
        $previousYearResidents = FamilyMembers::previousYearResidents($selectedYear);
        $previousPercentageResidents = FamilyMembers::previousPercentageResidents($selectedYear);

        $maleResidents = FamilyMembers::maleResidents($selectedYear);
        $previousYearMale = FamilyMembers::previousYearMale($selectedYear);
        $previousPercentageMale = FamilyMembers::previousPercentageMale($selectedYear);

        
        return view('pages.dashboard.dashboard', compact(
            'currentYear',
            'selectedYear',
            'availableYears',

            'totalHouseholds',
            'previousYearHousehold',
            'previousPercentageHousehold',

            'totalResidents',
            'previousYearResidents',
            'previousPercentageResidents',

            'maleResidents',
            'previousYearMale',
            'previousPercentageMale',
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
