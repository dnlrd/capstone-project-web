<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="DemographicReportAge" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')


<script>
    Chart.register(ChartDataLabels);
    var ageRangeData = @json($DemographicReportAge);

    var ageRanges = ageRangeData.map(function(item) {
        return item.age_range;
    });
    var ageCounts = ageRangeData.map(function(item) {
        return item.count;
    });
    var backgroundColors = [
        'rgba(75, 192, 192)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)',
        'rgba(102, 255, 102)',
        'rgba(204, 51, 255)',
        'rgba(255, 102, 178)',
        'rgba(0, 102, 0)'   
    ];
    var DemographicReportAge = document.getElementById('DemographicReportAge').getContext('2d');
    var ageRangeChart = new Chart(DemographicReportAge, {
        type: 'bar',
        data: {
            labels: [
                '0-4:',
                '5-9:',
                '10-19:',
                '20-29:',
                '30-39:',
                '40-49:',
                '50-59:',
                '60-69:',
                '70-79:',
                '80+:',
            ],
            datasets: [{
                data: ageCounts,
                backgroundColor: backgroundColors,
                borderColor: backgroundColors.map(color => color.replace('0.2', '1')),
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                datalabels: {
                    color: 'white',
                        labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                    }
                },
                title: {
                    display: true,
                    text: '{{ $getChartTitleAge }}',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            }
        }
    });
</script>
   
@endpush