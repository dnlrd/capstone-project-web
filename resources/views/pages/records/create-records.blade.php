@extends('layouts.app')
@section('title', 'Create New Records')
@section('content')
<div class="page-header d-print-none text-black">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Adding record
                </h2>
            </div>
        </div>
        <form method="POST" action="{{ route('store-records') }}" class="mt-5">
            @csrf
            <div class="section" id="section1">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            <h3 class="card-title">Household Information</h3>
                        </div>

                        <div class="card-body">
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="household_code">Household Code:</label>
                                        <input type="text" name="household_code" class="form-control @error('household_code') is-invalid @enderror" value="{{ old('household_code') }}">
                                        @error('household_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="household_code">Taon:</label>
                                        <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
                                        @error('year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="household_code">Tag No.:</label>
                                        <input type="text" name="tag_no" class="form-control @error('tag_no') is-invalid @enderror" value="{{ old('tag_no') }}">
                                        @error('tag_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="household_code">Barangay:</label>
                                        <select class="form-select mb-3" name="barangay">
                                            <option value="0">Select...</option>
                                            <option value="1">Barangay I (Poblacion)</option>
                                            <option value="2">Barangay II (Poblacion)</option>
                                            <option value="3">Barangay III (Poblacion)</option>
                                            <option value="4">Barangay IV (Poblacion)</option>
                                            <option value="5">San Agustin</option>
                                            <option value="6">San Antonio</option>
                                            <option value="7">San Bartolome</option>
                                            <option value="8">San Felix</option>
                                            <option value="9">San Fernando</option>
                                            <option value="10">San Francisco</option>
                                            <option value="11">San Isidro Norte</option>
                                            <option value="12">San Isidro Sur</option>
                                            <option value="13">San Joaquin</option>
                                            <option value="14">San Jose</option>
                                            <option value="15">San Juan</option>
                                            <option value="16">San Luis</option>
                                            <option value="17">San Miguel</option>
                                            <option value="18">San Pablo</option>
                                            <option value="19">San Pedro</option>
                                            <option value="20">San Rafael</option>
                                            <option value="21">San Roque</option>
                                            <option value="22">San Vicente</option>
                                            <option value="23">Santa Ana</option>
                                            <option value="24">Santa Anastacia</option>
                                            <option value="25">Santa Clara</option>
                                            <option value="26">Santa Cruz</option>
                                            <option value="27">Santa Elena</option>
                                            <option value="28">Santa Maria</option>
                                            <option value="29">Santiago</option>
                                            <option value="30">Santa Teresita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="household_code">Purok:</label>
                                        <input type="text" name="purok" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section2">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 1
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">1. Pangalan ng Puno ng Pamilya:</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="pangalan">Pangalan</label>
                                        <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
                                        @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="gitnang_pangalan">Gitnang Pangalan</label>
                                        <input type="text" name="middlename" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="apelyido">Apelyido</label>
                                        <input type="text" name="lastname" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section3">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 2
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">2a. Kasalukuyang Tirahan</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <input type="text" name="answer1_q2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <input type="text" name="answer2_q2" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">2b. Taon ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Taon</label>
                                        <input type="text" name="answer3_q2" class="form-control">
                                    </div>
                                </div>
                            </div>      
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="section" id="section4">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 3
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">3a. Probinsyang Pinanggalingan ng Puno</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <input type="text" name="answer1_q3" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <input type="text" name="answer2_q3" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">3b. Probinsyang Pinanggalingan ng Asawa</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Bilang at Kalye)</label>
                                        <input type="text" name="answer3_q3" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Barangay)</label>
                                        <input type="text" name="answer4_q3" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="section" id="section5">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 4
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">4a. Huling Tirahan</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Lungsod/Bayan)</label>
                                        <input type="text" name="answer1_q4" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>(Lalawigan)</label>
                                        <input type="text" name="answer2_q4" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">4b. Taon ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Taon</label>
                                        <input type="text" name="answer3_q4" class="form-control">
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section6">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 5
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">5. Dahilan ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q5" id="answer1_q5">
                                        <option value="0">Select...</option>
                                        <option value="1">Magtratrabaho</option>
                                        <option value="2">Tumira sa kamag-anak</option>
                                        <option value="3">Ibang dahilan</option>
                                    </select>
                                </div>
                            
                            </div>

                            <div class="row row-cards" style="display: none;" id="question_5">
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group mb-2 ">
                                        <span class="input-group-text">
                                            &nbsp;Ibang dahilan:
                                        </span>
                                        <input type="text" class="form-control" name="answer2_q5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section7">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 6
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">6.Uri ng Paglipat</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select" name="answer1_q6">
                                        <option value="0">Select...</option>
                                        <option value="1">Kasama lahat ng pamilya</option>
                                        <option value="2">Kasama ang ibang myembro ng pamilya</option>
                                        <option value="3">Nag-iisang lumipat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section8">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 7
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">7. Ilang myembro ng pamilya ang naninirahan sa bahay</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" class="form-control" name="answer1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section9">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 8
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">8. Impormasyon tungkol sa mga kasapi ng pamilya</h3>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary" type="button" id="add-family-member-button">Add Family Member</button>
                            </div>
                            <div id="family-members"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section10">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 9
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">9. May miyembro ng pamilya ba kayong nag tratrabaho sa ibang bansa?</h3>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary" type="button" id="add-member-button">Add</button>
                            </div>
                            <div id="question9-section">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section11">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 10
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">10. Saan pumapasok ang mga miyembro ng pamilya na nagaaral?</h3>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary" type="button" id="question10-button">Add</button>
                            </div>
                            <div id="question10-section">
                              
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section12">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
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
            <div class="section" id="section13">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 12
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">12.a Saan kumukuha ng tubig?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q12" id="answer1_q12a">
                                        <option value="0">Select...</option>
                                        <option value="1">Poso</option>
                                        <option value="2">Gripo</option>
                                        <option value="3">Iba pa</option>
                                    </select>
                                    <div class="input-group mb-2" style="display:none;" id="question_q12a">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa
                                        </span>
                                        <input type="text" class="form-control" name="answer2_q12">
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-title">12.b Uri ng palikuran</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer3_q12" id="answer3_q12b">
                                        <option value="0">Select...</option>
                                        <option value="1">Open pit/Privy</option>
                                        <option value="2">Water-sealed</option>
                                        <option value="3">Flush</option>
                                        <option value="4">Iba pa</option>
                                    </select>
                                    <div class="input-group mb-2" style="display:none;" id="question_q12b">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa
                                        </span>
                                        <input type="text" class="form-control" name="answer4_q12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section14">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 13
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">13.a Gusto mo bang mag karoon ng kasanayan ("skills training")?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q13">
                                        <option value="0">Select...</option>
                                        <option value="1">Oo</option>
                                        <option value="2">Hindi</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">13.b Kung oo, ano-anong kasanayang pangkabuhayan?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" class="form-control" name="answer2_q13">
                                </div>
                            </div>

                            <h3 class="card-title">13.c Gusto mo bang makapag-aral ng kursong bokasyonal?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer3_q13">
                                        <option value="0">Select...</option>
                                        <option value="1">Oo</option>
                                        <option value="2">Hindi</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">13.d Kung oo, ano kurso o kasanayan?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" class="form-control" name="answer4_q13">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section15">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 14
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">14. Saan kayo pumupunta kung nagpapagamot?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q14" id="answer1_q14">
                                        <option value="0">Select...</option>
                                        <option value="1">Pampublikong Ospital/"Health Center"</option>
                                        <option value="2">Albularyo/Hilot</option>
                                        <option value="3">Pampribadong Ospital/Klinika</option>
                                        <option value="4">Iba pa</option>
                                    </select>
                                    <div class="input-group mb-2" style="display:none;" id="question_q14">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa
                                        </span>
                                        <input type="text" class="form-control" name="answer2_q14">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section16">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 15
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">15.a May miyembro ba ng pamilya na namatay?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q15">
                                        <option value="0">Select...</option>
                                        <option value="1">Meron</option>
                                        <option value="2">Wala</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">15.b Taon kung kelan namatay?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" class="form-control mb-3" name="answer2_q15">
                                </div>
                            </div>

                            <h3 class="card-title">15.c Dahilan ng kamatayan?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer3_q15" id="answer3_q15c">
                                        <option value="0">Select...</option>
                                        <option value="1">Natural na pagkamatay</option>
                                        <option value="2">Aksidente</option>
                                        <option value="3">Sakit, anong sakit?</option>
                                    </select>
                                    <div class="input-group mb-2" style="display:none;" id="question_q15c">
                                        <span class="input-group-text">
                                            &nbsp;Sakit, anong sakit?
                                        </span>
                                        <input type="text" class="form-control" name="answer4_q15">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section17">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 16
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">16.a May ipinamumuwis ba na ari-arian?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q16">
                                        <option value="0">Select...</option>
                                        <option value="1">Meron</option>
                                        <option value="2">Wala</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">16.b Kung meron, saan?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control" name="answer2_q16">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section18">
                <div class="row mb-3 d-flex align-items-center justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header">
                            Question 17
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">17.a May sasakyan ba kayo?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <select class="form-select mb-3" name="answer1_q17">
                                        <option value="0">Select...</option>
                                        <option value="1">Meron</option>
                                        <option value="2">Wala</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="card-title">17.b Kung meron, anong uri ng sasakyan?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control" name="answer2_q17">
                                </div>
                            </div>

                            <h3 class="card-title">17.c Kung meron, ilan?</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control" name="answer3_q17">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section19"></div>

            <div class="d-flex justify-content-center">
                    <div class="btn-list">
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
            </div>
        </form>
    </div>
    <a href="#" id="scrollToNext">Scroll to Next Question</a>
</div>

@push('scripts')
<script src="{{asset('js/main.js')}}" defer></script>
<script src="{{asset('js/question8.js')}}" defer></script>
<script src="{{asset('js/question9.js')}}" defer></script>
<script src="{{asset('js/question10.js')}}" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollToNextButton = document.getElementById('scrollToNext');
        const sections = document.querySelectorAll('.section');
        let currentSectionIndex = 0;

        scrollToNextButton.addEventListener('click', function (e) {
            e.preventDefault();
            const previousSection = sections[currentSectionIndex];
            const previousCard = previousSection.querySelector('.card');
            previousCard.classList.remove('border-primary');

            currentSectionIndex++;
            if (currentSectionIndex >= sections.length) {
                currentSectionIndex = 0;
            }

            const nextSection = sections[currentSectionIndex];
            const nextCard = nextSection.querySelector('.card');
            nextCard.classList.add('border-primary');

            const windowHeight = window.innerHeight;
            const sectionHeight = nextSection.clientHeight;
            const scrollToOffset = nextSection.offsetTop - (windowHeight - sectionHeight) / 2;

            window.scrollTo({
                top: scrollToOffset,
                behavior: 'smooth'
            });
        });
    });
</script>

@endpush
@endsection