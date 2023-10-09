<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\FamilyMembers;
use App\Models\Household;
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


        
        return view('pages.report.demographic');
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

    public function migration()
    {
        //
    }
}
