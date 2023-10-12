@extends('layouts.app')
@section('title', 'Health report')
@section('content')
<style>
        .multi-column {
            column-count: 4; /* Set the number of columns you desire */
            column-gap: 10px; /* Adjust the gap between columns as needed */
        }
    </style>
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Educational Reports
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form method="get" action="{{ route('health-report') }}" class="mb-3">
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
                    @include('pages.report.health.chart-disability')
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6 d-flex justify-content-center">
                    @include('pages.report.health.chart-nutrition-level')
                </div>
                
                
                    <div id="carouselExample" class="carousel slide col-sm-12 col-lg-12 col-md-12 ">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
                                    @include('pages.report.health.chart-nutrition-level-barangay')
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center">
                                    @include('pages.report.health.chart-disability-barangay')
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
                
                <!-- <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Barangay</th>
                                <th scope="col">Disabilities</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                ksort($list);
                            ?>
                            @foreach ($list as $barangayNumber => $barangayName)
                            <?php
                                $row = $HealthReportDisabilityByBarangay->where('barangay', $barangayNumber)->first();
                            ?>
                            <tr>
                                <td>{{ $barangayName }}</td>
                                <td>
                                    <ul>
                                    <div class="multi-column">
                                            <li>Hearing Impairment: {{ $row->hearing_impairment_count }}</li>
                                            <li>Visual Impairment: {{ $row->visual_impairment_count }}</li>
                                            <li>Mental Retardation: {{ $row->mental_retardation_count }}</li>
                                            <li>Autism: {{ $row->autism_count }}</li>
                                            <li>Cerebral Palsy: {{ $row->cerebral_palsy_count }}</li>
                                            <li>Epilepsy: {{ $row->epilepsy_count }}</li>
                                            <li>Amputee: {{ $row->amputee_count }}</li>
                                            <li>Polio: {{ $row->polio_count }}</li>
                                            <li>Clubfoot: {{ $row->clubfoot_count }}</li>
                                            <li>Hunchback: {{ $row->hunchback_count }}</li>
                                            <li>Dwarfism: {{ $row->dwarfism_count }}</li>
                                            <li>Others: {{ $row->others_count }}</li>
                                            </div>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            
                           
                            </tbody>
                        </table>
                       
                    </div>
                </div> -->
            </div>
            
            
    </div>
</div>

@endsection
