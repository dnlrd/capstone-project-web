@extends('layouts.app')
@section('title', 'Records')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
        @endif
        @if(session('delete'))
        <div class="alert alert-danger" id="success-message">
            {{ session('delete') }}
        </div>
        @endif
        <div class="row g-2 align-items-center mb-4">
            <div class="col">
                <h2 class="page-title">
                    Record lists
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('create-records') }}" class="btn btn-primary d-sm-inline-block" id="clear-family-member-data">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        Add new record
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        <form method="get" action="{{ route('records') }}">
                            @csrf
                            <div class="d-flex align-items-center">
                                <div class="d-inline">
                                    <select name="perPage" id="perPage" class="form-select d-inline" onchange="this.form.submit()">
                                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5 per page</option>
                                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10 per page</option>
                                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20 per page</option>
                                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50 per page</option>
                                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100 per page</option>
                                    </select>
                                </div>
                                &nbsp;
                                <div class="d-inline">
                                    <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                        @foreach ($availableYears as $yearOption)
                                            <option value="{{ $yearOption }}" {{ $yearOption == $selectedYear ? 'selected' : '' }}>
                                                {{ $yearOption }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="ms-auto text-secondary">
                        <form action="{{ route('records') }}" method="GET">
                            <div class="ms-2 d-inline-block">
                                <div class="input-group">
                                    <input type="text" name="query" id="search-input" class="form-control"  placeholder="Search users/barangay">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>Head of the Family</th>
                            <th>Total Family Members</th>
                            <th>Household Code</th>
                            <th>Barangay</th>
                            <th>Added by</th>
                            <th>Year</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($households as $household)
                            @php
                                $query = mb_strtolower(request('query'));
                                $barangay = mb_strtolower($household->barangay);
                            @endphp

                            @if (empty($query) || str_contains($barangay, $query))
                                @if (auth()->user()->role === 0 || (auth()->user()->role === 1 && auth()->user()->id === $household->user_id))
                                    <tr>
                                        <td>
                                            {{ $household->lastname }}, {{ $household->firstname }} {{ $household->middlename }}
                                        </td>
                                        <td>
                                            {{ $familyMemberCounts[$household->id] }}
                                        </td>
                                        <td>
                                            {{ $household->household_code }}
                                        </td>
                                        <td>
                                            {{ $household->barangay }}
                                        </td>
                                        <td>
                                            {{ $household->user->name }}
                                        </td>
                                        <td>
                                            {{ $household->year }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $household->id }}">
                                                Delete
                                            </button>
                                            <div class="modal" id="confirmDeleteModal-{{ $household->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <div class="modal-status bg-danger"></div>
                                                        <div class="modal-body text-center py-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
                                                            <h3>Are you sure?</h3>
                                                            <div class="text-secondary">
                                                                <p>Are you sure you want to delete this? </p>
                                                                <p><b>"{{ $household->lastname }}, {{ $household->firstname }} {{ $household->middlename }} : {{ $household->barangay }}"</b></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="w-100">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                                        Cancel
                                                                        </a>
                                                                    </div>
                                                                    <div class="col">
                                                                        <form method="POST" action="{{ route('delete-records', ['id' => $household->id]) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $households->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection