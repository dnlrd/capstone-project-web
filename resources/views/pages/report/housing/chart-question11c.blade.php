<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="Question11cChart" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')

<script>
    Chart.register(ChartDataLabels);

    var data = @json($Question11c);

    var labels = [
        `May-ari ng Lupa at Bahay (${data.answer3_q11.answer1})`, 
        `Nangungupahan sa lupa at may-ari ng bahay (${data.answer3_q11.answer2})`, 
        `Nagtayo ng bahay nang walang pahintulot (${data.answer3_q11.answer3})`, 
        `Nangungupahan sa bahay (${data.answer3_q11.answer4})`, 
        `Nakikitira sa bahay (${data.answer3_q11.answer5})`, 
        `Katiwala sa bahay (${data.answer3_q11.answer6})`, 
        `Iba (${data.answer3_q11.answer7})`];

    var chartData = {
        labels: labels,
        datasets: [{
            data: [
                data.answer3_q11.answer1_percentage,
                data.answer3_q11.answer2_percentage,
                data.answer3_q11.answer3_percentage,
                data.answer3_q11.answer4_percentage,
                data.answer3_q11.answer5_percentage,
                data.answer3_q11.answer6_percentage,
                data.answer3_q11.answer7_percentage,
            ],
            backgroundColor: [
                'rgba(75, 192, 192)',
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(93, 46, 159)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(93, 46, 159, 1)',
            ],
            borderWidth: 1
        }]
    };

    var Question11c = document.getElementById('Question11cChart').getContext('2d');

    var question11cChart = new Chart(Question11c, {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            indexAxis: 'y',
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
                    }
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Katayuan sa lupa at bahay',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
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