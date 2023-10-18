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
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <div class="fw-bold">{{$question2->answer1_q2}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-3">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <div class="fw-bold">{{$question2->answer2_q2}}</div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">2b. Taon ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Taon</label>
                                        <div class="fw-bold">{{$question2->answer3_q2}}</div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>

                    <div class="card col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">3a. Probinsyang Pinanggalingan ng Puno</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <div class="fw-bold">{{$question3->answer1_q3}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <div class="fw-bold">{{$question3->answer2_q3}}</div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">3b. Probinsyang Pinanggalingan ng Asawa</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <div class="fw-bold">{{$question3->answer3_q3}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <div class="fw-bold">{{$question3->answer4_q3}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">4a. Huling Tirahan</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Lungsod/Bayan)</label>
                                        <div class="fw-bold">{{$question4->answer1_q4}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Lalawigan)</label>
                                        <div class="fw-bold">{{$question4->answer2_q4}}</div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">4b. Taon ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Taon</label>
                                        <div class="fw-bold">{{$question4->answer3_q4}}</div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">5. Dahilan ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    @if ($question5->answer1_q5 == 1)
                                        {{ "Magtratrabaho" }}
                                    @elseif ($question5->answer1_q5 == 2)
                                        {{ "Tumira sa kamag-anak" }}
                                    @elseif ($question5->answer1_q5 == 3)
                                        {{$question5->answer2_q5}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-4">
                        <div class="card-body">
                            <h3 class="card-title">6.Uri ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                @if ($question6->answer1_q6 == 1)
                                    {{ "Kasama lahat ng pamilya" }}
                                @elseif ($question6->answer1_q6 == 2)
                                    {{ "Kasama ang ibang myembro ng pamilya" }}
                                @elseif ($question6->answer1_q6 == 3)
                                    {{ "Nag-iisang lumipat" }}
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-2">
                        <div class="card-body">
                            <h3 class="card-title">7. Ilang myembro ng pamilya ang naninirahan sa bahay</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    {{$familyMemberCount}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-12">
                        <div class="card-body">
                            <h3 class="card-title">9. May miyembro ng pamilya ba kayong nag tratrabaho sa ibang bansa?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <!-- <th>Kung oo,</th> -->
                                                    <th>Sino?</th>
                                                    <th>Saan?</th>
                                                    <th>Buwanang Kita/Naipapadala?</th>
                                                    <th>Uri ng Paninirahan sa ibang bansa (immigrant / contract worker)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($question9 as $data)
                                                    <tr>
                                                        <!-- <td>{{ $data->if_yes }}</td> -->
                                                        <td>{{ $data->answer1_q9 }}</td>
                                                        <td>{{ $data->answer2_q9 }}</td>
                                                        <td>{{ $data->answer3_q9 }}</td>
                                                        <td>{{ $data->answer4_q9 }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-12">
                        <div class="card-body">
                            <h3 class="card-title">10. Saan pumapasok ang mga miyembro ng pamilya na nagaaral?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th>1</th>
                                                    <th>Ilan?</th>
                                                    <th>3</th>
                                                    <th>Pangalan ng Paaralan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($question10 as $data)
                                                    <tr>
                                                        <td>
                                                        @if ($data['answer1_q10'] == 1)
                                                            Pampublikong Paaralan
                                                        @elseif ($data['answer1_q10'] == 2)
                                                            Pampribadong Paaralan
                                                        @endif
                                                        </td>
                                                        <td>{{ $data->answer2_q10 }}</td>
                                                        <td>
                                                        @if ($data['answer3_q10'] == 1)
                                                            Elementary
                                                        @elseif ($data['answer3_q10'] == 2)
                                                            Senior High
                                                        @elseif ($data['answer3_q10'] == 3)
                                                            Kolehiyo
                                                        @endif
                                                        </td>
                                                        <td>{{ $data->answer4_q10 }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-12">
                        <div class="card-header">
                            Question 11
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">11a. Uri ng tirahan/bahay</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select" name="answer1_q11">
                                        <option value="0">Select...</option>
                                        <option value="1">Konkreto</option>
                                        <option value="2">Konkreto at Kahoy</option>
                                        <option value="3">Kahoy</option>
                                        <option value="4">Barong-barong</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">11b. Uri ng lupang kinatatayuan ng bahay</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select" name="answer2_q11">
                                        <option value="0">Select...</option>
                                        <option value="1">Pribadong Lupa</option>
                                        <option value="2">Lupa ng Gobyerno</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">11c. Katayuan sa lupa at bahay</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer3_q11" id="answer3_q11c">
                                        <option value="0">Select...</option>
                                        <option value="1">May-ari ng Lupa at Bahay</option>
                                        <option value="2">Nangungupahan sa lupa at may-ari ng bahay</option>
                                        <option value="3">Nagtayo ng bahay nang walang pahintulot</option>
                                        <option value="4">Nangungupahan sa bahay</option>
                                        <option value="5">Nakikitira sa bahay</option>
                                        <option value="6">Katiwala sa bahay</option>
                                        <option value="7">Iba pa</option>
                                    </select>
                                    <div class="input-group mb-2" style="display:none;" id="question_11c">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa
                                        </span>
                                        <input type="text" class="form-control" name="answer4_q11">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">11d. Kung ikaw ay umuupa ng tirahan/bahay, magkano ang inyong buwanang upa</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" name="answer5_q11" class="form-control">
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
