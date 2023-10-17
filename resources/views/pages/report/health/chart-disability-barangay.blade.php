<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="HealthReportDisabilityByBarangay" class="img-fluid"></canvas>
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
    var data = @json($HealthReportDisabilityByBarangay);

    var sortedData = data.sort(function (a, b) {
    var barangayA = customBarangayOrder[a.barangay];
    var barangayB = customBarangayOrder[b.barangay];
    return barangayA.localeCompare(barangayB);
});

var barangays = sortedData.map(function (item) {
    return customBarangayOrder[item.barangay];
});

var hearingImpairment = sortedData.map(function (item) {
    return item.hearing_impairment_count;
});

var visualImpairment = sortedData.map(function (item) {
    return item.visual_impairment_count;
});

var mentalRetardation = sortedData.map(function (item) {
    return item.mental_retardation_count;
});

var autism = sortedData.map(function (item) {
    return item.autism_count;
});

var cerebralPalsy = sortedData.map(function (item) {
    return item.cerebral_palsy_count;
});

var epilepsy = sortedData.map(function (item) {
    return item.epilepsy_count;
});

var amputee = sortedData.map(function (item) {
    return item.amputee_count;
});

var polio = sortedData.map(function (item) {
    return item.polio_count;
});

var clubfoot = sortedData.map(function (item) {
    return item.clubfoot_count;
});

var hunchback = sortedData.map(function (item) {
    return item.hunchback_count;
});

var dwarfism = sortedData.map(function (item) {
    return item.dwarfism_count;
});

var others = sortedData.map(function (item) {
    return item.others_count;
});

    // Create a new bar chart
    var HealthReportDisabilityByBarangay = document.getElementById('HealthReportDisabilityByBarangay').getContext('2d');
    var chart = new Chart(HealthReportDisabilityByBarangay, {
        type: 'bar',
        data: {
            labels: barangays,
            datasets: [
                {
                    label: 'Hearing Impairment',
                    data: hearingImpairment,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Visual Impairment',
                    data: visualImpairment,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Mental Retardation',
                    data: mentalRetardation,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Autism',
                    data: autism,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Cerebral Palsy',
                    data: cerebralPalsy,
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Epilepsy',
                    data: epilepsy,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Amputee',
                    data: amputee,
                    backgroundColor: 'rgba(106, 74, 60, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Polio',
                    data: polio,
                    backgroundColor: 'rgba(255, 0, 0, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Clubfoot',
                    data: clubfoot,
                    backgroundColor: 'rgba(0, 255, 0, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Hunchback',
                    data: hunchback,
                    backgroundColor: 'rgba(192, 192, 75, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Dwarfism',
                    data: dwarfism,
                    backgroundColor: 'rgba(75, 192, 75, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Others',
                    data: others,
                    backgroundColor: 'rgba(75, 75, 192, 0.6)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            indexAxis: 'y',
            interaction: {
                intersect: true,
                mode: 'index',
                },
            plugins: {
                
                title: {
                    display: true,
                    text: 'Types of Disabilities Distribution By Barangay ({{ $selectedYear }})',
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