@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="page-header d-print-none text-black">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <form method="get" action="{{ route('dashboard') }}">
                        @csrf
                        <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                            @foreach ($availableYears as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div class="row row-deck row-cards mb-3">
                <div class="col-sm-6 col-lg-3">
                    @include('pages.dashboard.total-households')
                </div>
                <div class="col-sm-6 col-lg-3">
                    @include('pages.dashboard.total-residents')
                </div>

                <div class="col-sm-6 col-lg-3">
                    @include('pages.dashboard.total-males')
                </div>

                <div class="col-sm-6 col-lg-3">
                    @include('pages.dashboard.total-females')
                </div>
            </div>

            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-4 col-md-6  d-flex justify-content-cente">
                    @include('pages.dashboard.chart-civilstatus')
                </div>

                <div class="col-sm-12 col-lg-4 col-md-6  d-flex justify-content-cente">
                    @include('pages.dashboard.chart-employmentstatus')
                </div>

                <div class="col-sm-12 col-lg-4 col-md-6  d-flex justify-content-cente">
                    @include('pages.dashboard.chart-nutrition')
                </div>

                <div class="col-sm-12 col-lg-6  col-md-6">
                    @include('pages.dashboard.chart-agerangedistribution')
                </div>

                <div class="col-sm-12 col-lg-6 col-md-6">
                    @include('pages.dashboard.chart1')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    @include('pages.dashboard.chart2')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    @include('pages.dashboard.chart3')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    @include('pages.dashboard.chart4')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    @include('pages.dashboard.chart5')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    @include('pages.dashboard.chart6')
                </div>
            </div>
        </div>  
    </div>
@endsection
