@extends('layouts.app')
@section('title', 'Economic report')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Economic Reports
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form method="get" action="{{ route('economic-report') }}" class="mb-3">
                    @csrf
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <select name="barangay" class="form-select" onchange="this.form.submit()">
                                <option value="" {{ $selectedBarangay === null ? 'selected' : '' }}>All Barangays</option>
                                @foreach (collect($BARANGAY_NAMES)->sort() as $key => $barangayName)
                                    <option value="{{ $key }}" {{ $selectedBarangay == $key ? 'selected' : '' }}>
                                        {{ $barangayName }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label class="form-selectgroup-item">
                            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                @foreach ($availableYears as $yearOption)
                                    <option value="{{ $yearOption }}" {{ $yearOption == $selectedYear ? 'selected' : '' }}>
                                        {{ $yearOption }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                       
                    </div>
                </form>
            </div>
        </div>
        <button class="btn btn-primary printDemo">Print</button>

        <div class="row row-deck row-cards" id="printable-content">
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.economic.chart-employment')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.economic.chart-job-location')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.economic.chart-job-position')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.economic.chart-sector')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
                    @include('pages.report.economic.chart-employment-barangay')
                </div>
            </div>
    </div>
</div>
@push('plugins')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
@endpush
@endsection
