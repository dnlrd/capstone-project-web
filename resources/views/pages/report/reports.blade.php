@extends('layouts.app')
@section('title', 'Reports')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-4">
            <div class="col">
                <h2 class="page-title">
                    Reports
                </h2>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('demographic-report')}}" class="text-black text-decoration-none">Demographic</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('economic-report')}}" class="text-black text-decoration-none">Economic</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('educational-report')}}" class="text-black text-decoration-none">Educational</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('housing-report')}}" class="text-black text-decoration-none">Housing</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('health-report')}}" class="text-black text-decoration-none">Health</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('migration-report') }}" class="text-black text-decoration-none">Migration</a>
                            </div>
                        </div>
                    </li>
                    
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection