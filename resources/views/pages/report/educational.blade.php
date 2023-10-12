@extends('layouts.app')
@section('title', 'Educational report')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Educational Reports
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form method="get" action="{{ route('educational-report') }}" class="mb-3">
                    @csrf
                    <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                        @foreach ($availableYears as $yearOption)
                            <option value="{{ $yearOption }}" {{ $yearOption == $selectedYear ? 'selected' : '' }}>
                                {{ $yearOption }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <button class="btn btn-primary printDemo">Print</button>

        <div class="row row-deck row-cards" id="printable-content">
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.educational.chart-education-level')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                   
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
                    @include('pages.report.educational.chart-education-level-barangay')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                </div>
            </div>

    </div>
</div>

@endsection
