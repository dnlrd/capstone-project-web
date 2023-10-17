<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="Question11aChart" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')

  <script>
    Chart.register(ChartDataLabels);

    var data = @json($Question11a);

    var labels = [
        `Konkreto (${data.answer1_q11.answer1})`, 
        `Konkreto at Kahoy (${data.answer1_q11.answer2})`, 
        `Kahoy (${data.answer1_q11.answer3})`, 
        `Barong-Barong (${data.answer1_q11.answer4})`
    ];

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Responses',
            data: [
                data.answer1_q11.answer1_percentage,
                data.answer1_q11.answer2_percentage,
                data.answer1_q11.answer3_percentage,
                data.answer1_q11.answer4_percentage,
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

    var Question11a = document.getElementById('Question11aChart').getContext('2d');

    var question11aChart = new Chart(Question11a, {
        type: 'pie',
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
                    text: 'Uri ng tirahan/bahay Chart',
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