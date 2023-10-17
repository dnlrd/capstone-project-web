<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="HealthReportQuestion14" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($HealthReportQuestion14);
    var HealthReportQuestion14 = document.getElementById('HealthReportQuestion14').getContext('2d');
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
    ];
    var chart = new Chart(HealthReportQuestion14, {
        type: 'pie',
        data: {
            labels: [
                'Pampublikong Ospital/Health Center',
                'Albularyo/Hilot', 
                'Pampribadong Ospital/Klinika', 
                'Iba pa'],
            datasets: [
                {
                    label: 'Total',
                    data: [
                        data[0].answer1,
                        data[0].answer2,
                        data[0].answer3,
                        data[0].answer4,
                    ],
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1,
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
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
                    position: 'left'
                }
            }
        }
    });
</script>


@endpush