@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Household Details</h1>
        <table class="table">
            <tr>
                <th>Household Code</th>
                <td>{{ $household->household_code }}</td>
            </tr>
            <tr>
                <th>Barangay</th>
                <td>{{ $household->barangay }}</td>
            </tr>
            <!-- Add more household details here -->

            <tr>
                <th>Family Members</th>
                <td>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <!-- Add more family member details here -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($familyMembers as $familyMember)
                                <tr>
                                    <td>{{ $familyMember->firstname }} {{ $familyMember->lastname }}</td>
                                    <td>{{ $familyMember->age }}</td>
                                    <!-- Add more family member details here -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
@endsection
