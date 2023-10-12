@extends('layouts.app')
@section('title', 'User Management')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        @if (session('info'))
            <div id="success-message" class="alert alert-info mb-3">
                {{ session('info') }}
            </div>
        @endif 
        @if (session('success'))
            <div id="success-message" class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div id="success-message" class="alert alert-danger mb-3">
                {{ session('danger') }}
            </div>
        @endif
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title"> User Management </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Create New User
                    </button>
                </div>
                <!-- Create User Modal -->
                <div class="modal" id="createUserModal" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('store-new-user') }}" id="createUserForm">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                        <div class="col-md-8">
                                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="0">Admin</option>
                                                <option value="1">Sub-Admin</option>
                                            </select>

                                            @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                        <div class="col-md-8">
                                            <textarea id="description" name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                        <div class="col-md-8">
                                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}">

                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="barangay" class="col-md-4 col-form-label text-md-right">{{ __('Barangay') }}</label>

                                        <div class="col-md-8">
                                            <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay') }}">

                                            @error('barangay')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <input type="reset" class="btn btn-info">
                                    <button type="button" class="btn btn-red" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            
                            <div class="ms-auto text-secondary">
                                
                                <form action="{{ route('user-management') }}" method="GET">
                                    <div class="ms-2 d-inline-block">
                                        <div class="input-group">
                                            <input type="text" name="query" id="search-input" class="form-control" value="{{ $query }}" placeholder="Search users/barangay">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Barangay</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @php
                                        $query = mb_strtolower(request('query'));
                                        $name = mb_strtolower($user->name);
                                        $barangay = mb_strtolower($user->barangay);
                                    @endphp
                                    @if (empty($query) || (str_contains($name, $query) || str_contains($barangay, $query)))
                                        <tr>
                                            <td>
                                                <span
                                                    class="badge {{ $user->role === 0 ? 'bg-purple-lt' : 'bg-green-lt' }}">
                                                    {{ $user->role === 0 ? 'Admin' : 'Sub-admin' }}
                                                </span>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->barangay }}
                                            </td>
                                            <td>
                                                @if ($user->isOnline())
                                                    <span class="badge bg-green ms-2">Online</span>
                                                @else
                                                    <span class="badge bg-red ms-2">Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (Auth::check() && Auth::user()->id !== $user->id)
                                                        <button type="button" class="btn-action text-blue" data-bs-toggle="modal" data-bs-target="#viewDetailsModal-{{ $user->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                            </svg>
                                                        </button>
                                                        <!-- View User Modal -->
                                                        <div class="modal" id="viewDetailsModal-{{ $user->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="viewDetailsModalLabel">{{ $user->name }}</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Name: {{ $user->name }}</p>
                                                                        <p>Email: {{ $user->email }}</p>
                                                                        <p>Barangay: {{ $user->barangay }}</p>
                                                                        <p>Description: {{ $user->description }}</p>
                                                                        <p>Contact No.: {{ $user->phone_number }}</p>
                                                                        <p>Email: {{ $user->email }}</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn-action text-blue" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-edit" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path
                                                                    d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                                </path>
                                                                <path
                                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                                </path>
                                                                <path d="M16 5l3 3"></path>
                                                            </svg>
                                                        </button>
                                                        <!-- Edit User Modal -->
                                                        <div class="modal" id="editUserModal-{{ $user->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <div class="form-group row mb-3">
                                                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                                            <div class="col-md-8">
                                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                                                                @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                            <div class="col-md-8">
                                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                                                                @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                                            <div class="col-md-8">
                                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{ old('password') }}">

                                                                                @error('password')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group row mb-3">
                                                                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                                                            <div class="col-md-8">
                                                                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                                                                    <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>Admin</option>
                                                                                    <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Sub-Admin</option>
                                                                                </select>

                                                                                @error('role')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                                                            <div class="col-md-8">
                                                                                <textarea id="description" name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $user->description) }}</textarea>

                                                                                @error('description')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                                                            <div class="col-md-8">
                                                                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">

                                                                                @error('phone_number')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-3">
                                                                            <label for="barangay" class="col-md-4 col-form-label text-md-right">{{ __('Barangay') }}</label>

                                                                            <div class="col-md-8">
                                                                                <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ old('barangay', $user->barangay) }}">

                                                                                @error('barangay')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <button type="button" class="btn-action text-red" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $user->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-trash" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M4 7l16 0"></path>
                                                                <path d="M10 11l0 6"></path>
                                                                <path d="M14 11l0 6"></path>
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                                </path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                            </svg>
                                                        </button>
                                                        <div class="modal" id="confirmDeleteModal-{{ $user->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="modal-status bg-danger"></div>
                                                                    <div class="modal-body text-center py-4">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
                                                                        <h3>Are you sure?</h3>
                                                                        <div class="text-secondary">
                                                                            <p>Are you sure you want to delete this? </p>
                                                                            <p><b>"{{ $user->name }} : {{ $user->barangay }}"</b></p>
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
                                                                                    <form method="POST" action="{{ route('user.delete', $user->id) }}">
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
                                                    @endif
                                            </td>
                                        </tr>
                                    @endif
                                
                                @endforeach
                                @if (!empty(request('query')) && count($users) === 0)
                                    <td>
                                        <div>No users found for search query: "{{ request('query') }}"</div>
                                    </td>
                                    
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->appends(['query' => $query])->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <script>
        $(document).ready(function () {
            $('#createUserModal').modal('show');
        });
    </script>
@endif
@endsection
