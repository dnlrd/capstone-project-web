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
                                <td>
                                    @if ($household->barangay == 1)
                                        Barangay I (Poblacion)
                                    @elseif ($household->barangay == 2)
                                        Barangay II (Poblacion)
                                    @elseif ($household->barangay == 3)
                                        Barangay III (Poblacion)
                                    @elseif ($household->barangay == 4)
                                        Barangay IV (Poblacion)
                                    @elseif ($household->barangay == 5)
                                        San Agustin
                                    @elseif ($household->barangay == 6)
                                        San Antonio
                                    @elseif ($household->barangay == 7)
                                        San Bartolome
                                    @elseif ($household->barangay == 8)
                                        San Felix
                                    @elseif ($household->barangay == 9)
                                        San Fernando
                                    @elseif ($household->barangay == 10)
                                        San Francisco
                                    @elseif ($household->barangay == 11)
                                        San Isidro Norte
                                    @elseif ($household->barangay == 12)
                                        San Isidro Sur
                                    @elseif ($household->barangay == 13)
                                        San Joaquin
                                    @elseif ($household->barangay == 14)
                                        San Jose
                                    @elseif ($household->barangay == 15)
                                        San Juan
                                    @elseif ($household->barangay == 16)
                                        San Luis
                                    @elseif ($household->barangay == 17)
                                        San Miguel
                                    @elseif ($household->barangay == 18)
                                        San Pablo
                                    @elseif ($household->barangay == 19)
                                        San Pedro
                                    @elseif ($household->barangay == 20)
                                        San Rafael
                                    @elseif ($household->barangay == 21)
                                        San Roque
                                    @elseif ($household->barangay == 22)
                                        San Vicente
                                    @elseif ($household->barangay == 23)
                                        Santa Ana
                                    @elseif ($household->barangay == 24)
                                        Santa Anastacia
                                    @elseif ($household->barangay == 25)
                                        Santa Clara
                                    @elseif ($household->barangay == 26)
                                        Santa Cruz
                                    @elseif ($household->barangay == 27)
                                        Santa Elena
                                    @elseif ($household->barangay == 28)
                                        Santa Maria
                                    @elseif ($household->barangay == 29)
                                        Santiago
                                    @elseif ($household->barangay == 30)
                                        Santa Teresita
                                    @endif

                                </td>
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
                                        Magtratrabaho
                                    @elseif ($question5->answer1_q5 == 2)
                                        Tumira sa kamag-anak
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

                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">8. Impormasyon tungkol sa mga kasapi ng pamilya</h3>
                                    
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
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
                                                        <td>
                                                            @if ($familyMember->relationship_to_head == 1)
                                                                Puno
                                                            @elseif ($familyMember->relationship_to_head == 2)
                                                                Asawa
                                                            @elseif ($familyMember->relationship_to_head == 3)
                                                                Anak na Lalaki
                                                            @elseif ($familyMember->relationship_to_head == 4)
                                                                Anak na Babae
                                                            @elseif ($familyMember->relationship_to_head == 5)
                                                                Magulang
                                                            @elseif ($familyMember->relationship_to_head == 6)
                                                                Kapatid na Lalaki
                                                            @elseif ($familyMember->relationship_to_head == 7)
                                                                Kapatid na Babae
                                                            @elseif ($familyMember->relationship_to_head == 8)
                                                                Apo
                                                            @elseif ($familyMember->relationship_to_head == 9)
                                                                Pamangkin
                                                            @elseif ($familyMember->relationship_to_head == 10)
                                                                Hindi kamag-anak
                                                            @elseif ($familyMember->relationship_to_head == 11)
                                                                Manugang
                                                            @elseif ($familyMember->relationship_to_head == 12)
                                                                Pinsan
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($familyMember->gender == 1)
                                                                Male
                                                            @elseif ($familyMember->gender == 2)
                                                                Female
                                                            @endif

                                                        </td>
                                                        <td>{{ $familyMember->age }}</td>
                                                        <td>
                                                            @if ($familyMember->civil_status == 1)
                                                                Walang Asawa
                                                            @elseif ($familyMember->civil_status == 2)
                                                                Nagsasama ng Hindi Kasal
                                                            @elseif ($familyMember->civil_status == 3)
                                                                Kasal
                                                            @elseif ($familyMember->civil_status == 4)
                                                                Hiwalay sa Asawa
                                                            @elseif ($familyMember->civil_status == 5)
                                                                Balo
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($familyMember->solo_parent == 1)
                                                                Oo
                                                            @elseif ($familyMember->solo_parent == 2)
                                                                Hindi
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($familyMember->religion == 1)
                                                                Katoliko
                                                            @elseif ($familyMember->religion == 2)
                                                                Born-Again
                                                            @elseif ($familyMember->religion == 3)
                                                                Iglesia ni Cristo
                                                            @elseif ($familyMember->religion == 4)
                                                                Islam
                                                            @elseif ($familyMember->religion == 5)
                                                                Buddism
                                                            @elseif ($familyMember->religion == 6)
                                                                {{$familyMember->ibang_relihiyon}}
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($familyMember->studying == 1)
                                                                Not in school age (0-5 y/o)
                                                            @elseif ($familyMember->studying == 2)
                                                                No Education
                                                            @elseif ($familyMember->studying == 3)
                                                                Elementarya (1-6)
                                                            @elseif ($familyMember->studying == 4)
                                                                High School (1-4)
                                                            @elseif ($familyMember->studying == 5)
                                                                Junior High (7-10)
                                                            @elseif ($familyMember->studying == 6)
                                                                Senior High School (11-12)
                                                            @elseif ($familyMember->studying == 7)
                                                                Post Baccalaureate
                                                            @elseif ($familyMember->studying == 8)
                                                                OSY
                                                            @elseif ($familyMember->studying == 9)
                                                                Not studying
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($familyMember->has_job == 1)
                                                                Meron
                                                            @elseif ($familyMember->has_job == 2)
                                                                Wala
                                                            @endif

                                                        </td>
                                                        <td>{{ $familyMember->job }}</td>

                                                        <td>{{ $familyMember->known_work }}</td>

                                                        <td>
                                                            @if ($familyMember->where == 1)
                                                                Tirahan
                                                            @elseif ($familyMember->where == 2)
                                                                Kapitbahay
                                                            @elseif ($familyMember->where == 3)
                                                                Sa loob ng Sto. Tomas
                                                            @elseif ($familyMember->where == 4)
                                                                Sa labas ng Sto. Tomas ngunit sa loob ng Batangas
                                                            @elseif ($familyMember->where == 5)
                                                                Sa labas ng Batangas
                                                            @elseif ($familyMember->where == 6)
                                                                Hindi tiyak
                                                            @elseif ($familyMember->where == 7)
                                                                {{$familyMember->iba_pa_saan}}
                                                            @endif

                                                        </td>

                                                        <td>
                                                            @if ($familyMember->sector == 1)
                                                                Pagmamanupaktyur
                                                            @elseif ($familyMember->sector == 2)
                                                                Konstruksyon
                                                            @elseif ($familyMember->sector == 3)
                                                                Pagbubukid
                                                            @elseif ($familyMember->sector == 4)
                                                                Serbisyo
                                                            @elseif ($familyMember->sector == 5)
                                                                {{$familyMember->iba_pa_sektor}}
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($familyMember->position == 1)
                                                                Permanente
                                                            @elseif ($familyMember->position == 2)
                                                                Kaswal
                                                            @elseif ($familyMember->position == 3)
                                                                May Kontrata
                                                            @elseif ($familyMember->position == 4)
                                                                Pana-panahon
                                                            @elseif ($familyMember->position == 5)
                                                                Self-Employed
                                                            @elseif ($familyMember->position == 6)
                                                                Job Order
                                                            @endif

                                                        </td>

                                                        <td>{{ $familyMember->monthly_income }}</td>

                                                        <td>
                                                            @if ($familyMember->level_of_nutrition == 1)
                                                                Wastong Nutrisyon
                                                            @elseif ($familyMember->level_of_nutrition == 2)
                                                                Undernutrition
                                                            @elseif ($familyMember->level_of_nutrition == 3)
                                                                Overnutrition
                                                            @endif

                                                        </td>

                                                        <td>
                                                            @if ($familyMember->type_of_disability == 1)
                                                                Hearing Impairment
                                                            @elseif ($familyMember->type_of_disability == 2)
                                                                Visual Impairment
                                                            @elseif ($familyMember->type_of_disability == 3)
                                                                Mental Retardation
                                                            @elseif ($familyMember->type_of_disability == 4)
                                                                Autism
                                                            @elseif ($familyMember->type_of_disability == 5)
                                                                Cerebral Palsy
                                                            @elseif ($familyMember->type_of_disability == 6)
                                                                Epilepsy
                                                            @elseif ($familyMember->type_of_disability == 7)
                                                                Amputee
                                                            @elseif ($familyMember->type_of_disability == 8)
                                                                Polio
                                                            @elseif ($familyMember->type_of_disability == 9)
                                                                Clubfoot
                                                            @elseif ($familyMember->type_of_disability == 10)
                                                                Hunchback
                                                            @elseif ($familyMember->type_of_disability == 11)
                                                                Dwarfism
                                                            @elseif ($familyMember->type_of_disability == 12)
                                                                {{$familyMember->iba_pa_kapansanan}}
                                                            @endif
                                                        </td>
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

                    <div class="row row-cards">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">11a. Uri ng tirahan/bahay</h3>
                                        @if ($question11->answer1_q11 == 1)
                                            Konkreto
                                        @elseif ($question11->answer1_q11 == 2)
                                            Konkreto at Kahoy
                                        @elseif ($question11->answer1_q11 == 3)
                                            Kahoy
                                        @elseif ($question11->answer1_q11 == 4)
                                            Barong-barong
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">11b. Uri ng lupang kinatatayuan ng bahay</h3>
                                    @if ($question11->answer2_q11 == 1)
                                        Pribadong Lupa
                                    @elseif ($question11->answer2_q11 == 2)
                                        Lupa ng Gobyerno
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">11c. Katayuan sa lupa at bahay<</h3>
                                    @if ($question11->answer3_q11 == 1)
                                        May-ari ng Lupa at Bahay
                                    @elseif ($question11->answer3_q11 == 2)
                                        Nangungupahan sa lupa at may-ari ng bahay
                                    @elseif ($question11->answer3_q11 == 3)
                                        Nagtayo ng bahay nang walang pahintulot
                                    @elseif ($question11->answer3_q11 == 4)
                                        Nangungupahan sa bahay
                                    @elseif ($question11->answer3_q11 == 5)
                                        Nakikitira sa bahay
                                    @elseif ($question11->answer3_q11 == 6)
                                        Katiwala sa bahay
                                    @elseif ($question11->answer3_q11 == 7)
                                        {{$question11->answer4_q11}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">11d. Kung ikaw ay umuupa ng tirahan/bahay, magkano ang inyong buwanang upa</h3>
                                    {{$question11->answer5_q11}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-cards">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">12.a Saan kumukuha ng tubig?</h3>
                                    @if ($question12->answer1_q12 == 1)
                                        Poso
                                    @elseif ($question12->answer1_q12 == 2)
                                        Gripo
                                    @elseif ($question12->answer1_q12 == 3)
                                        {{$question12->answer2_q12}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">12.b Uri ng palikuran</h3>
                                    @if ($question12->answer3_q12 == 1)
                                        Open pit/Privy
                                    @elseif ($question12->answer3_q12 == 2)
                                        Water-sealed
                                    @elseif ($question12->answer3_q12 == 3)
                                        Flush
                                    @elseif ($question12->answer1_q12 == 4)
                                        {{$question12->answer4_q12}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cards">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">13.a Gusto mo bang mag karoon ng kasanayan ("skills training")?</h3>
                                    @if ($question13)
                                        @if ($question13->answer1_q13 == 1)
                                            Oo
                                        @elseif ($question13->answer1_q13 == 2)
                                            Hindi
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">13.b Kung oo, ano-anong kasanayang pangkabuhayan?</h3>
                                    @if ($question13)
                                        {{$question13->answer2_q13}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">13.c Gusto mo bang makapag-aral ng kursong bokasyonal?</h3>
                                    @if ($question13)
                                        @if ($question13->answer3_q13 == 1)
                                            Oo
                                        @elseif ($question13->answer3_q13 == 2)
                                            Hindi
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">13.d Kung oo, ano kurso o kasanayan?</h3>
                                    @if ($question13)
                                        {{$question13->answer4_q13}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cards">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">14. Saan kayo pumupunta kung nagpapagamot?</h3>
                                    
                                    @if ($question14)
                                        @if ($question14->answer1_q14 == 1)
                                            Pampublikong Ospital/"Health Center"
                                        @elseif ($question14->answer1_q14 == 2)
                                            Albularyo/Hilot
                                        @elseif ($question14->answer1_q14 == 3)
                                            Pampribadong Ospital/Klinika
                                        @elseif ($question14->answer1_q14 == 4)
                                            {{$question14->answer2_q14}}
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">15.a May miyembro ba ng pamilya na namatay?</h3>
                                    @if ($question15)
                                        @if ($question15->answer1_q15 == 1)
                                            Meron
                                        @elseif ($question15->answer1_q15 == 2)
                                            Wala
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">15.b Taon kung kelan namatay?</h3>
                                    @if ($question15)
                                        {{$question15->answer2_q15}}
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">15.c Dahilan ng kamatayan?</h3>
                                    @if ($question15)
                                        @if ($question15->answer3_q15 == 1)
                                            Natural na pagkamatay
                                        @elseif ($question15->answer3_q15 == 2)
                                            Aksidente
                                        @elseif ($question15->answer3_q15 == 3)
                                            {{$question15->answer4_q15}}
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cards">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">16.a May ipinamumuwis ba na ari-arian?</h3>
                                    
                                    @if ($question16)
                                        @if ($question16->answer1_q16 == 1)
                                            Meron
                                        @elseif ($question16->answer1_q16 == 2)
                                            Wala
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">16.b Kung meron, saan?</h3>
                                    @if ($question15)
                                        {{$question16->answer2_q16}}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cards">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">17.a May sasakyan ba kayo?</h3>
                                    
                                    @if ($question17)
                                        @if ($question17->answer1_q17 == 1)
                                            Meron
                                        @elseif ($question17->answer1_q17 == 2)
                                            Wala
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">17.b Kung meron, anong uri ng sasakyan?</h3>
                                    @if ($question17)
                                        {{$question17->answer2_q17}}
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">17.c Kung meron, ilan?</h3>
                                    @if ($question17)
                                        {{$question17->answer3_q17}}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
        

        


    </div>
</div>
@endsection
