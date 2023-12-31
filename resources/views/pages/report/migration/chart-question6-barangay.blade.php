<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="MigrationReportQuestion6ByBarangay" class="img-fluid"></canvas>
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
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
    ];

    var data = @json($MigrationReportQuestion6ByBarangay);
    var MigrationReportQuestion6ByBarangay = document.getElementById('MigrationReportQuestion6ByBarangay').getContext('2d');
    data.sort((a, b) => customBarangayOrder[a.barangay].localeCompare(customBarangayOrder[b.barangay]));

    var chart = new Chart(MigrationReportQuestion6ByBarangay, {
        type: 'bar',
        data: {
            labels: data.map(item => customBarangayOrder[item.barangay]),
            datasets: [
                {
                    label: 'Kasama lahat ng pamilya',
                    data: data.map(item => item.answer1),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Kasama ang ibang myembro ng pamilya',
                    data: data.map(item => item.answer2),
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderWidth: 1,
                },
                {
                    label: 'Nag-iisang lumipat',
                    data: data.map(item => item.answer3),
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
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
                    text: 'Uri ng Pag-lipat Distribution Chart ({{$selectedYear}})',
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