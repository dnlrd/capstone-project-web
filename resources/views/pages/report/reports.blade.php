@extends('layouts.app')
@section('title', 'Reports')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Reports
                </h2>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('demographic-report')}}" class="text-black">Demographic</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('economic-report')}}" class="text-black">Economic</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('educational-report')}}" class="text-black">Educational</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="" class="text-black">Housing</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('health-report')}}" class="text-black">Health</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="{{ route('migration-report') }}" class="text-black">Migration</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <a href="" class="text-black">Social Data:</a>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection