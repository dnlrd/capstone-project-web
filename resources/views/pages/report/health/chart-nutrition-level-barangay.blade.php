<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="HealthReportNutritionByBarangay" class="img-fluid"></canvas>
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
    var nutritionData = @json($HealthReportNutritionByBarangay);

    
    var sortedData = nutritionData.sort(function (a, b) {
        var barangayA = customBarangayOrder[a.barangay];
        var barangayB = customBarangayOrder[b.barangay];
        return barangayA.localeCompare(barangayB);
    });

    var labels = sortedData.map(function (item) {
        return customBarangayOrder[item.barangay];
    });

    var undernutritionCounts = nutritionData.map(function (item) {
        return item.undernutrition_count;
    });

    var overnutritionCounts = nutritionData.map(function (item) {
        return item.overnutrition_count;
    });

    var wastongNutrisyonCounts = nutritionData.map(function (item) {
        return item.wastong_nutrisyon_count;
    });

    var HealthReportNutritionByBarangay = document.getElementById('HealthReportNutritionByBarangay').getContext('2d');
    var chart = new Chart(HealthReportNutritionByBarangay, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Undernutrition',
                data: undernutritionCounts,
                backgroundColor: 'rgba(255, 99, 132, 0.6)'
            }, {
                label: 'Overnutrition',
                data: overnutritionCounts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }, {
                label: 'Wastong Nutrisyon',
                data: wastongNutrisyonCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)'
            }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: true,
        indexAxis: 'y',
        plugins: {
            title: {
                display: true,
                text: 'Nutrition Level Distribution By Barangay ({{ $selectedYear }})',
                font: {
                    size: 17,
                    family: 'Arial'
                }
            },
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
<script>
    $( ".printDemo" ).click(function() {
        $('#printable-content').printThis({
            pageTitle: "jQuery printThis Demo",
            loadCSS: "",
            header: "<h1>jQueryScript.Net</h1>",
        });
    });
</script>
@endpush