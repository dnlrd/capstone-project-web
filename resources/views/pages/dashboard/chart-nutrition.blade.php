<div class="card ">
    <div class="card-header fw-bold">
        Nutrition Status
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="DashboardNutrition" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var nutritionData = @json($DashboardNutrition);


    var DashboardNutrition = document.getElementById('DashboardNutrition').getContext('2d');
    var nutritionChart = new Chart(DashboardNutrition, {
        type: 'line',
        data: {
            labels: nutritionData.map(item => item.year),
            datasets: [
                {
                    label: 'Wastong Nutrisyon',
                    data: nutritionData.map(item => item.wastong_nutrisyon_count),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension:0.3,
                    borderWidth: 1
                },
                {
                    label: 'Undernutrition',
                    data: nutritionData.map(item => item.undernutrition_count),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension:0.3,
                    borderWidth: 1
                },
                {
                    label: 'Overnutrition',
                    data: nutritionData.map(item => item.overnutrition_count),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension:0.3,
                    borderWidth: 1
                }
            ]
        },
        options: {
            interaction: {
                intersect: true,
                mode: 'index',
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush