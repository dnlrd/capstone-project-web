@extends('layouts.app')

@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    Household Details
                </h2>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Household Information of {{ $household->household_code }}</h3>
            </div>
            <div class="card-body">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>Household Code</th>
                            <th>Year</th>
                            <th>Tag No</th>
                            <th>Barangay</th>
                            <th>Purok</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $household->household_code }}</td>
                                <td>{{ $household->year }}</td>
                                <td>{{ $household->tag_no }}</td>
                                <td>{{ $household->barangay }}</td>
                                <td>{{ $household->purok }}</td>
                            </tr>
                    </tbody>
                </table>
                <div class="row mb-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">1. Pangalan ng Puno ng Pamilya:</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="pangalan">Pangalan</label>
                                        <div class="fw-bold">{{ $household->firstname }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="gitnang_pangalan">Gitnang Pangalan</label>
                                        <div class="fw-bold">{{ $household->middlename }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="apelyido">Apelyido</label>
                                        <div class="fw-bold">{{ $household->lastname }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">2a. Kasalukuyang Tirahan</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-9">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <div class="fw-bold">{{$question2->answer1_q2}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 mb-3">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <div class="fw-bold">{{$question2->answer2_q2}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <h3 class="card-title">2b. Taon ng Paglipat</h3>
                                    <div class="form-group">
                                        <label>Taon</label>
                                        <div class="fw-bold">{{$question2->answer3_q2}}</div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        

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

<br>
{{$question2->answer2_q2}}<br>
{{$question2->answer3_q2}}<br>
<br>
{{$question3->answer1_q3}}<br>
{{$question3->answer2_q3}}<br>
{{$question3->answer3_q3}}<br>
{{$question3->answer4_q3}}<br>
<br>
{{$question4->answer1_q4}}<br>
{{$question4->answer2_q4}}<br>
{{$question4->answer3_q4}}<br>
<br>
{{$question5->answer1_q5}}<br>
<br>
{{$question6->answer1_q6}}<br>
<br>
{{$familyMemberCount}}
<br>
@foreach ($question9 as $data)
    <p>if_yes: {{ $data->if_yes }}</p>
    <p>answer1_q9: {{ $data->answer1_q9 }}</p>
    <p>answer2_q9: {{ $data->answer2_q9 }}</p>
    <p>answer3_q9: {{ $data->answer3_q9 }}</p>
    <p>answer4_q9: {{ $data->answer4_q9 }}</p>
    <p>answer5_q9: {{ $data->answer5_q9 }}</p>
@endforeach
<br>
@foreach ($question10 as $data)
    <p>answer1_q10: {{ $data->answer1_q10 }}</p>
    <p>answer2_q10: {{ $data->answer2_q10 }}</p>
    <p>answer3_q10: {{ $data->answer3_q10 }}</p>
    <p>answer4_q10: {{ $data->answer4_q10 }}</p>
@endforeach
<br>
{{$question11->answer1_q11}}<br>
{{$question11->answer2_q11}}<br>
{{$question11->answer3_q11}}<br>
{{$question11->answer4_q11}}<br>
<br>
{{$question12->answer1_q12}}<br>
{{$question12->answer2_q12}}<br>
{{$question12->answer3_q12}}<br>
{{$question12->answer4_q12}}<br>
<br>
{{$question14->answer1_q14}}<br>
<br>
{{$question15->answer1_q15}}<br>
{{$question15->answer2_q15}}<br>
{{$question15->answer3_q15}}<br>
<br>
{{$question16->answer1_q16}}<br>
{{$question16->answer2_q16}}<br>
<br>
{{$question17->answer1_q17}}<br>
{{$question17->answer2_q17}}<br>
{{$question17->answer3_q17}}<br>


    </div>
</div>
@endsection
