@extends('layouts.app')

@section('content')
<style>
table, th, td {
  border:1px solid black;
}
</style>
        <h1>Household Details</h1>
        <table>
    <thead>
        <tr>
            <th>Household Code</th>
            <th>Year</th>
            <th>Tag No</th>
            <th>Barangay</th>
            <th>Purok</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $household->household_code }}</td>
                <td>{{ $household->year }}</td>
                <td>{{ $household->tag_no }}</td>
                <td>{{ $household->barangay }}</td>
                <td>{{ $household->purok }}</td>
                <td>{{ $household->firstname }}</td>
                <td>{{ $household->middlename }}</td>
                <td>{{ $household->lastname }}</td>
            </tr>
    </tbody>
</table>

        <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Relationship to Head</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Civil Status</th>
            <th>Solo Parent</th>
            <th>Religion</th>
            <th>Studying</th>
            <th>Has Job</th>
            <th>Job</th>
            <th>Known Work</th>
            <th>Where</th>
            <th>Sector</th>
            <th>Position</th>
            <th>Monthly Income</th>
            <th>Level of Nutrition</th>
            <th>Type of Disability</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($familyMembers as $familyMember)
            <tr>
                <td>{{ $familyMember->lastname }}, {{ $familyMember->firstname }} {{ $familyMember->middlename }}</td>
                <td>{{ $familyMember->birthdate }}</td>
                <td>{{ $familyMember->relationship_to_head }}</td>
                <td>{{ $familyMember->gender }}</td>
                <td>{{ $familyMember->age }}</td>
                <td>{{ $familyMember->civil_status }}</td>
                <td>{{ $familyMember->solo_parent }}</td>
                <td>{{ $familyMember->religion }}</td>
                <td>{{ $familyMember->studying }}</td>
                <td>{{ $familyMember->has_job }}</td>
                <td>{{ $familyMember->job }}</td>
                <td>{{ $familyMember->known_work }}</td>
                <td>{{ $familyMember->where }}</td>
                <td>{{ $familyMember->sector }}</td>
                <td>{{ $familyMember->position }}</td>
                <td>{{ $familyMember->monthly_income }}</td>
                <td>{{ $familyMember->level_of_nutrition }}</td>
                <td>{{ $familyMember->type_of_disability }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
