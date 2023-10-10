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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ageRangeData = @json($DemographicReportAge);

    var ageRanges = ageRangeData.map(function(item) {
        return item.age_range;
    });
    var ageCounts = ageRangeData.map(function(item) {
        return item.count;
    });
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(102, 255, 102, 0.2)',
        'rgba(204, 51, 255, 0.2)',
        'rgba(255, 102, 178, 0.2)',
        'rgba(0, 102, 0, 0.2)'   
    ];
    var DemographicReportAge = document.getElementById('DemographicReportAge').getContext('2d');
    var ageRangeChart = new Chart(DemographicReportAge, {
        type: 'bar',
        data: {
            labels: [
                '0-4: ({{ $DemographicReportAge[0]['count'] }})',
                '5-9: ({{ $DemographicReportAge[1]['count'] }})',
                '10-19: ({{ $DemographicReportAge[2]['count'] }})',
                '20-29: ({{ $DemographicReportAge[3]['count'] }})',
                '30-39: ({{ $DemographicReportAge[4]['count'] }})',
                '40-49: ({{ $DemographicReportAge[5]['count'] }})',
                '50-59: ({{ $DemographicReportAge[6]['count'] }})',
                '60-69: ({{ $DemographicReportAge[7]['count'] }})',
                '70-79: ({{ $DemographicReportAge[8]['count'] }})',
                '80+: ({{ $DemographicReportAge[9]['count'] }})',
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
                    legend: {
                        display: false
                    }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Age Range'
                    }
                },
            }
        }
    });
</script>
   
@endpush