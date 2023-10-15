<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="GenderAgeDistribution" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    Chart.register(ChartDataLabels);
    const genderage = document.getElementById('GenderAgeDistribution').getContext('2d');
    
    const ageData = {!! json_encode($DemographicGenderAgeDistribution) !!};
    const tooltip = {
        yAlign: 'bottom',
        titleAlign: 'center',
        callbacks: {
            label: function(context) {
                return `${context.dataset.label}: ${Math.abs(context.raw)}`;
            }
        }
    };
    const ageDistributionChart = new Chart(genderage , {
        type: 'bar',
        data: {
            labels: ageData.map(item => item.age_range),
            datasets: [
                {
                    label: 'Male',
                    data: ageData.map(item => -item.male_count),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 0.1,
                    barThickness: 15
                },
                {
                    label: 'Female',
                    data: ageData.map(item => item.female_count),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 0.1,
                    barThickness: 15
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            interaction: {
                intersect: true,
                mode: 'index',
                },
            indexAxis: 'y',
            scales: {
                x: {
                    
                    ticks: {
                        callback: (val) => (Math.abs(val)) 
                    }
                },
                y: {
                    beginAtZero: true,
                    stacked: true
                }
            },
            
            plugins: {
                
                title: {
                    display: true,
                    text: '{{$getChartTitleGenderAge}}',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                tooltip,
                
            }
        }
    });
    
</script>
@endpush