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
                                        <canvas id="myChart" class="img-fluid"></canvas>
                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 gy-3">
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                    <canvas id="myChart1" class="img-fluid"></canvas>
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
