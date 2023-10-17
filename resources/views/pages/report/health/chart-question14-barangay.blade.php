<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="HealthReportQuestion14ByBarangay" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($HealthReportQuestion14ByBarangay);
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
        30: "Santa Teresita"
    };

    var sortedData = data.sort(function (a, b) {
        var barangayA = customBarangayOrder[a.barangay];
        var barangayB = customBarangayOrder[b.barangay];
        return barangayA.localeCompare(barangayB);
    });

    var barangays = sortedData.map(item => customBarangayOrder[item.barangay]);

    var HealthReportQuestion14ByBarangay = document.getElementById('HealthReportQuestion14ByBarangay').getContext('2d');
    var chart = new Chart(HealthReportQuestion14ByBarangay, {
        type: 'bar',
        data: {
            labels: barangays,
            datasets: [
                {
                    label: 'Pampublikong Ospital/Health Center',
                    data: data.map(item => item.answer1),
                    backgroundColor: 'rgba(75, 192, 192, 0.3)',
                    borderWidth: 1,
                },
                {
                    label: 'Albularyo/Hilot',
                    data: data.map(item => item.answer2),
                    backgroundColor: 'rgba(255, 99, 132, 0.3)',
                    borderWidth: 1,
                },
                {
                    label: 'Pampribadong Ospital/Klinika',
                    data: data.map(item => item.answer3),
                    backgroundColor: 'rgba(153, 102, 255, 0.3)',
                    borderWidth: 1,
                },
                {
                    label: 'Iba pa',
                    data: data.map(item => item.answer4),
                    backgroundColor: 'rgba(255, 205, 86, 0.3)',
                    borderWidth: 1,
                },
            ],
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
                    text: 'Medical Treatment Distribution By Barangay ({{ $selectedYear }})',
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