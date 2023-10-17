<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="HealthReportNutrition" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($HealthReportNutrition);

    var HealthReportNutrition = document.getElementById('HealthReportNutrition').getContext('2d');
    var chart = new Chart(HealthReportNutrition, {
        type: 'doughnut',
        data: {
            labels: ['Wastong Nutrisyon', 'Undernutrition', 'Overnutrition'],
            datasets: [{
                data: [
                    data.wastong_nutrisyon_count,
                    data.undernutrition_count,
                    data.overnutrition_count
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Nutrition Level Distribution ({{ $selectedYear }})',
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