<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\FamilyMembers;
class Report extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function demographic()
    {
        
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
