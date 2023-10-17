<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="EducationalReportByBarangay" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>

    var customBarangayOrder = {
        1: "Barangay I (Poblacion)",
        2: "Barangay II (Poblacion)",
        3: "Barangay III (Poblacion)",
        4: "Barangay IV (Poblacion)",
        5: "San Agustin",
        6: "San Antonio",
        7: "San Bartolome",
        8: "San Felix",
        9: "San Fernando",
        10: "San Francisco",
        11: "San Isidro Norte",
        12: "San Isidro Sur",
        13: "San Joaquin",
        14: "San Jose",
        15: "San Juan",
        16: "San Luis",
        17: "San Miguel",
        18: "San Pablo",
        19: "San Pedro",
        20: "San Rafael",
        21: "San Roque",
        22: "San Vicente",
        23: "Santa Ana",
        24: "Santa Anastacia",
        25: "Santa Clara",
        26: "Santa Cruz",
        27: "Santa Elena",
        28: "Santa Maria",
        29: "Santiago",
        30: "Santa Teresita",
    };

    var data = @json($EducationalReportByBarangay);

    var sortedData = data.sort(function (a, b) {
        var barangayA = customBarangayOrder[a.barangay];
        var barangayB = customBarangayOrder[b.barangay];
        return barangayA.localeCompare(barangayB);
    });

    var sortedLabels = sortedData.map(function (item) {
        return customBarangayOrder[item.barangay];
    });



    var notInSchoolAgeData = data.map(function (item) {
        return item.not_in_school_age_count;
    });

    var noEducationData = data.map(function (item) {
        return item.no_education_count;
    });

    var elementaryData = data.map(function (item) {
        return item.elementary_count;
    });

    var highSchoolData = data.map(function (item) {
        return item.high_school_count;
    });

    var juniorHighData = data.map(function (item) {
        return item.junior_high_count;
    });

    var seniorHighData = data.map(function (item) {
        return item.senior_high_count;
    });

    var postBaccalaureateData = data.map(function (item) {
        return item.post_baccalaureate_count;
    });

    var osyData = data.map(function (item) {
        return item.osy_count;
    });

    var hindiNagAaralData = data.map(function (item) {
        return item.hindi_nag_aaral_count;
    });

    var EducationalReportByBarangay= document.getElementById('EducationalReportByBarangay').getContext('2d');
    var chart = new Chart(EducationalReportByBarangay, {
        type: 'bar',
        data: {
            labels: sortedLabels,
            datasets: [
                {
                    label: `Not in School Age 5`,
                    data: notInSchoolAgeData,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'No Education',
                    data: noEducationData,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Elementary',
                    data: elementaryData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'High School',
                    data: highSchoolData,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Junior High',
                    data: juniorHighData,
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Senior High',
                    data: seniorHighData,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Post Baccalaureate',
                    data: postBaccalaureateData,
                    backgroundColor: 'rgba(106, 74, 60, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'OSY',
                    data: osyData,
                    backgroundColor: 'rgba(255, 0, 0, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Not studying',
                    data: hindiNagAaralData,
                    backgroundColor: 'rgba(0, 255, 0, 0.6)',
                    borderWidth: 1,
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            indexAxis: 'y',
            plugins: {
                title: {
                    display: true,
                    text: 'Education Level Distribution By Barangay ({{$selectedYear}})',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: true,
                    position: 'right'
                }
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    beginAtZero: true,
                    stacked: true
                }
            }
        }
    });
</script>
@endpush