<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="Question11bChart" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')

  <script>
    Chart.register(ChartDataLabels);

    var data = @json($Question11b);

    var labels = [
        `Pribadong Lupa (${data.answer2_q11.answer1})`, 
        `Lupa ng Gobyerno (${data.answer2_q11.answer2})`, 
    ];

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Responses',
            data: [
                data.answer2_q11.answer1_percentage,
                data.answer2_q11.answer2_percentage,
            ],
            backgroundColor: [
                'rgba(75, 192, 192)',
                'rgba(255, 99, 132)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    };

    var Question11b = document.getElementById('Question11bChart').getContext('2d');

    var question11bChart = new Chart(Question11b, {
        type: 'doughnut',
        data: chartData,
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
                    text: '{{$getChartTitleQuestion11b}}',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: true,
                    position: 'left'
                }
            },
           
        }
    });
</script>

   
@endpush