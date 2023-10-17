<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="MigrationReportQuestion5" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    Chart.register(ChartDataLabels);
    var backgroundColors = [
        'rgba(75, 192, 192)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
    ];

        var data = @json($MigrationReportQuestion5Chart);

        var MigrationReportQuestion5 = document.getElementById('MigrationReportQuestion5').getContext('2d');
        var chart = new Chart(MigrationReportQuestion5, {
            type: 'doughnut',
            data: {
                labels: [
                    `Magtratrabaho (${data[0].answer1})`, 
                    `Tumira sa kamag-anak (${data[0].answer2})`, 
                    `Iba pa (${data[0].answer3})`
                ],
                datasets: [{
                    label: 'Migration Report',
                    data: [
                        data[0].answer1_percentage,
                        data[0].answer2_percentage, 
                        data[0].answer3_percentage],
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: (value) => {
                        if (value === 0) {
                            return '';
                        }
                        return Math.round(value) + '%';
                    },
                    color: 'white',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'white'
                        }
                    }
                },
                title: {
                    display: true,
                    text: '{{$getChartTitleQuestion5}}',
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
        }
        });
    </script>
@endpush