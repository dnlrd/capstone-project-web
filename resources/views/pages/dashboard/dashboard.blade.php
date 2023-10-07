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
            
            <div class="row row-deck row-cards">
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
            <div class="row">
                <div class="col-md-6 gy-3">
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6">
                                @include('pages.dashboard.chart1')
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-auto d-flex align-items-center pe-2">
                                <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                                <span>Magtratrabaho</span>
                            </div>
                            <div class="col-auto d-flex align-items-center px-2">
                                <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                                <span>Tumira sa kamag-anak</span>
                            </div>
                            <div class="col-auto d-flex align-items-center px-2">
                                <span class="legend me-2"  style="background-color:rgba(255, 205, 86);"></span>
                                <span>Ibang dahilan</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 gy-3">
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 col-sm-12 mb-2">
                                @include('pages.dashboard.chart2')
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="row d-flex justify-content-start">
                                        <div class="col-auto d-flex align-items-center mb-2">
                                            <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                                            <span>Kasama lahat ng pamilya</span>
                                        </div>
                                        <div class="col-auto d-flex align-items-center mb-2">
                                            <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                                            <span>Kasama ang ilang myembro ng pamilya</span>
                                        </div>
                                        <div class="col-auto d-flex align-items-center mb-2">
                                            <span class="legend me-2"  style="background-color:rgba(255, 205, 86);"></span>
                                            <span>Nag-iisang lumipat</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 gy-3">
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                    @include('pages.dashboard.chart3')
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-6 gy-3">
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row d-flex justify-content-center">
                            <div class="col-md-6 d-flex align-items-center">
                                    <div class="row d-flex justify-content-start">
                                        <div class="col-auto d-flex align-items-center mb-2">
                                            <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                                            <span>Pribadong Lupa</span>
                                        </div>
                                        <div class="col-auto d-flex align-items-center mb-2">
                                            <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                                            <span>Lupa ng Gobyerno</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @include('pages.dashboard.chart4')
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @endpush
    
@endsection