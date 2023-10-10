<div class="card ">
    <div class="card-header fw-bold">
        Employment Status
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="DashboardChartEmploymentStatus" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var employmentStatusCounts = @json($DashboardEmploymentStatus);

    var DashboardChartEmploymentStatus = document.getElementById('DashboardChartEmploymentStatus').getContext('2d');
    var employmentStatusChart = new Chart(DashboardChartEmploymentStatus, {
        type: 'line',
        data: {
            labels: employmentStatusCounts.map(item => item.year),
            datasets: [
                {
                    label: 'Employed',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    
                    data: employmentStatusCounts.map(item => item.total_employed_count),
                },
                {
                    label: 'Unemployed',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: employmentStatusCounts.map(item => item.total_unemployed_count),
                },
                {
                    label: 'Male Employed',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    type: 'bar',
                    stack: 'Stack 0',
                    data: employmentStatusCounts.map(item => item.employed_male_count),
                },
                {
                    label: 'Female Employed',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    type: 'bar',
                    stack: 'Stack 0',
                    data: employmentStatusCounts.map(item => item.employed_female_count),
                },
                {
                    label: 'Male Unemployed',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    type: 'bar',
                    stack: 'Stack 1',
                    data: employmentStatusCounts.map(item => item.unemployed_male_count),
                },
                {
                    label: 'Female Unemployed',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    type: 'bar',
                    stack: 'Stack 1',
                    
                    data: employmentStatusCounts.map(item => item.unemployed_female_count),
                    yAxisID: 'right-y-axis'
                },
            ],
        }, 
        maintainAspectRatio: true,
        
        options: {
            responsive: true,
            interaction: {
                intersect: true,
                mode: 'index',
            },
            scales: {
                 x: {
                },
                y: {
                    beginAtZero: true,
                    position: 'left',
                },
                'right-y-axis': {
                    beginAtZero: true,
                    position: 'right',
                }
            }
            }
            
        ,
    });
</script>
@endpush