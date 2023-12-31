@extends('layouts.app')
@section('title', 'Migration report')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-4">
            <div class="col">
                <h2 class="page-title">
                    Migration Reports
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form method="get" action="{{ route('migration-report') }}" class="mb-3">
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
                    @include('pages.report.migration.chart-question5')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.migration.chart-question6')
                </div>
                <div id="carouselExample" class="carousel slide col-sm-12 col-lg-12 col-md-12 ">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
                                @include('pages.report.migration.chart-question5-barangay')
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
                                @include('pages.report.migration.chart-question6-barangay')
                            </div>
                        </div>
                        
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left text-black" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 6l-6 6l6 6"></path>
                        </svg>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right text-black" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
               
                </div>
            </div>
    </div>
</div>
@push('plugins')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('js/printThis.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
    $( ".printDemo" ).click(function() {
        $('#printable-content').printThis({
            pageTitle: "jQuery printThis Demo",
            loadCSS: "",
        });
    });
</script>
@endpush
@endsection
