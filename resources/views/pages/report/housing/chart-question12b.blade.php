<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="Question12bChart" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    Chart.register(ChartDataLabels);

    var data = @json($Question12b);

    var labels = [
        `Open pit/Privy (${data.answer3_q12.answer1})`, 
        `Water-sealed (${data.answer3_q12.answer2})`, 
        `Flush (${data.answer3_q12.answer3})`,
        `Iba pa (${data.answer3_q12.answer4})`
    ];

    var chartData = {
        labels: labels,
        datasets: [{
            data: [
                data.answer3_q12.answer1_percentage,
                data.answer3_q12.answer2_percentage,
                data.answer3_q12.answer3_percentage,
                data.answer3_q12.answer4_percentage,
            ],
            backgroundColor: [
                'rgba(75, 192, 192)',
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    var Question12b = document.getElementById('Question12bChart').getContext('2d');

    var question12bChart = new Chart(Question12b, {
        type: 'pie',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: function(value, context) {
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
                        }
                    }
                },
                title: {
                    display: true,
                    text: '{{$getChartTitleQuestion12b}}',
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