@extends('layouts.app')
@section('title', 'Account Settings')
@section('content')
    <div class="page-header d-print-none text-black">
        <div class="container-xl">

            @if (session('success'))
                <div id="success-message" class="alert alert-success mb-2">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('info'))
                <div id="success-message" class="alert alert-info mb-2">
                    {{ session('info') }}
                </div>
            @endif
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">

            <div class="col d-flex flex-column">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('edit-account-settings') }}" class="btn btn-outline-primary">Edit Account</a>

                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>Description:</strong> {{ $user->description ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Phone Number:</strong> {{ $user->phone_number ?? 'N/A' }}
                            </li>
                            <li class="list-group-item"><strong>Barangay:</strong> {{ $user->barangay ?? 'N/A' }}</li>
                            @if ($user->role != 1)
                                <li class="list-group-item"><strong>Role:</strong>
                                    {{ $user->role === 0 ? 'Admin' : 'Sub-Admin' }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
