$(document).ready(function() {
    var familyMemberCount = 1;

    // Function to add a new family member input section
    function addFamilyMemberFields(data) {
        var newFamilyMemberFields = `
            <div class="hr-text">Family Member ${familyMemberCount}</div>
            <div class="family-member mb-3">

                <div class="row row-cards">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Apelyedo</label>
                            <input type="text" name="family_members[${familyMemberCount}][lastname]" class="form-control"  value="${data ? data.lastname : ''}">
                            
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Pangalan</label>
                            <input type="text" name="family_members[${familyMemberCount}][firstname]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Gitnang Pangalan</label>
                            <input type="text" name="family_members[${familyMemberCount}][middlename]" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Kapanganakan <i>(mm/dd/yy)</i></label>
                            <input type=date name="family_members[${familyMemberCount}][birthdate]" class="form-control"> 
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Relasyon sa Puno ng Pamilya</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][relationship_to_head]">
                                <option value="0">Select...</option>
                                <option value="1">Puno</option>
                                <option value="2">Asawa</option>
                                <option value="3">Anak na Lalaki</option>
                                <option value="4">Anak na Babae</option>
                                <option value="5">Magulang</option>
                                <option value="6">Kapatid na Lalaki</option>
                                <option value="7">Kapatid na Babae</option>
                                <option value="8">Apo</option>
                                <option value="9">Pamangkin</option>
                                <option value="10">Hindi kamag-anak</option>
                                <option value="11">Manugang</option>
                                <option value="12">Pinsan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Kasarian</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][gender]">
                                <option value="0">Select...</option>
                                <option value="1">Lalaki</option>
                                <option value="2">Babae</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Edad</label>
                            <input type="text" name="family_members[${familyMemberCount}][age]" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Katayuang Sibil</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][civil_status]">
                                <option value="0">Select...</option>
                                <option value="1">Walang Asawa</option>
                                <option value="2">Nagsasama ng Hindi Kasal</option>
                                <option value="3">Kasal</option>
                                <option value="4">Hiwalay sa Asawa</option>
                                <option value="5">Balo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Solo Parent</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][solo_parent]">
                                <option value="0">Select...</option>
                                <option value="1">Oo</option>
                                <option value="2">Hindi</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Relihiyon</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][religion]">
                                <option value="0">Select...</option>
                                <option value="1">Katoliko</option>
                                <option value="2">Born-Again</option>
                                <option value="3">Iglesia ni Cristo</option>
                                <option value="4">Islam</option>
                                <option value="5">Buddism</option>
                                <option value="6">Iba pa</option>
                            </select>

                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group mb-2 mt-1">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa:
                                        </span>
                                        <input type="text" class="form-control" name="family_members[${familyMemberCount}][ibang_relihiyon]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Antas ng Pinag-aralan</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][studying]">
                                <option value="0">Select...</option>
                                <option value="1">Not in school age (0-5 y/o)</option>
                                <option value="2">No Education</option>
                                <option value="3">Elementarya (1-6)</option>
                                <option value="4">High School (1-4)</option>
                                <option value="5">Junior High (7-10)</option>
                                <option value="6">Senior High School (11-12)</option>
                                <option value="7">Post Baccalaureate</option>
                                <option value="8">OSY</option>
                                <option value="9">Not studying</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Mayroon/Walang Trabaho <i>(15-65 y/o)</i></label>
                            <select class="form-select" name="family_members[${familyMemberCount}][has_job]">
                                <option value="0">Select...</option>
                                <option value="1">Meron</option>
                                <option value="2">Wala</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Trabaho <i>(Hanapbuhay)</i></label>
                            <input type="text" name="family_members[${familyMemberCount}][job]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Alam na Trabaho <i>(Hanapbuhay)</i></label>
                            <input type="text" name="family_members[${familyMemberCount}][known_work]" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Saan <i>(Hanapbuhay)</i></label>
                            <select class="form-select" name="family_members[${familyMemberCount}][where]">
                                <option value="0">Select...</option>
                                <option value="1">Tirahan</option>
                                <option value="2">Kapitbahay</option>
                                <option value="3">Sa loob ng Sto. Tomas</option>
                                <option value="4">Sa labas ng Sto. Tomas ngunit sa loob ng Batangas</option>
                                <option value="5">Sa labas ng Batangas</option>
                                <option value="6">Hindi tiyak</option>
                                <option value="7">Iba pa</option>
                            </select>

                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group mb-2 mt-1">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa:
                                        </span>
                                        <input type="text" class="form-control" name="family_members[${familyMemberCount}][iba_pa_saan]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Sektor <i>(Hanapbuhay)</i></label>
                            <select class="form-select" name="family_members[${familyMemberCount}][sector]">
                                <option value="0">Select...</option>
                                <option value="1">Pagmamanupaktyur</option>
                                <option value="2">Konstruksyon</option>
                                <option value="3">Pagbubukid</option>
                                <option value="4">Serbisyo</option>
                                <option value="5">Iba pa</option>
                            </select>

                            <div class="row row-cards" id="">
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group mb-2 mt-1">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa:
                                        </span>
                                        <input type="text" class="form-control" name="family_members[${familyMemberCount}][iba_pa_sektor]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Katayuan <i>(Hanapbuhay)</i></label>
                            <select class="form-select" name="family_members[${familyMemberCount}][position]">
                                <option value="0">Select...</option>
                                <option value="1">Permanente</option>
                                <option value="2">Kaswal</option>
                                <option value="3">May Kontrata</option>
                                <option value="4">Pana-panahon</option>
                                <option value="5">Self-Employed</option>
                                <option value="6">Job Order</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Buwanang Kita</label>
                            <input type="text" name="family_members[${familyMemberCount}][monthly_income]" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Antas ng Nutrisyon</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][level_of_nutrition]">
                                <option value="">Select...</option>
                                <option value="1">Wastong Nutrisyon</option>
                                <option value="2">Undernutrition</option>
                                <option value="3">Overnutrition</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Uri ng Kapansanan</label>
                            <select class="form-select" name="family_members[${familyMemberCount}][type_of_disability]">
                                <option value="">Select...</option>
                                <option value="1">Hearing Impairment</option>
                                <option value="2">Visual Impairment</option>
                                <option value="3">Mental Retardation</option>
                                <option value="4">Autism</option>
                                <option value="5">Cerebral Palsy</option>
                                <option value="6">Epilepsy</option>
                                <option value="7">Amputatee</option>
                                <option value="8">Polio</option>
                                <option value="9">Clubfoot</option>
                                <option value="10">Hunchback</option>
                                <option value="11">Dwarfism</option>
                                <option value="12">Iba pa</option>
                            </select>
                            <div class="row row-cards" id="">
                                <div class="col-sm-12 col-md-12">
                                    <div class="input-group mb-2 mt-1">
                                        <span class="input-group-text">
                                            &nbsp;Iba pa:
                                        </span>
                                        <input type="text" class="form-control" name="family_members[${familyMemberCount}][iba_pa_kapansanan]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#family-members").append(newFamilyMemberFields);
        familyMemberCount++;

        if (data) {
            $(`#family-members input[name='family_members[${familyMemberCount}][lastname]']`).val(data.lastname);
            $(`#family-members input[name='family_members[${familyMemberCount}][firstname]']`).val(data.firstname);
           
        }
    }

    $("#add-family-member-button").click(function() {
        addFamilyMemberFields();
    });

    $("#clear-family-member-data").click(function() {
        sessionStorage.removeItem('familyMemberData');
        
        $("#family-members").empty();
        
        familyMemberCount = 1;
    });

    const storedData = sessionStorage.getItem('familyMemberData');

    if (storedData) {
        const parsedData = JSON.parse(storedData);

        if (Array.isArray(parsedData) && parsedData.length > 0) {
            parsedData.forEach((data) => {
                addFamilyMemberFields(data);
            });
        }
    }

    $("#family-members").on('change', 'input, select', function() {
        const familyMemberData = [];

        $("#family-members .family-member").each(function(index) {
            const data = {
                lastname: $(`#family-members input[name='family_members[${index + 1}][lastname]']`).val(),
                firstname: $(`#family-members input[name='family_members[${index + 1}][firstname]']`).val(),
                
            };

            familyMemberData.push(data);
        });

        sessionStorage.setItem('familyMemberData', JSON.stringify(familyMemberData));
    });
});