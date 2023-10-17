<div class="card ">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="Question13aChart" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    Chart.register(ChartDataLabels);

    var data = @json($Question13a);

    var labels = ['Answer 1', 'Answer 2'];

    var chartData = {
        labels: labels,
        datasets: [{
            label: 'Responses',
            data: [
                data.answer3_q13.answer1_percentage,
                data.answer3_q13.answer2_percentage,
            ],
            backgroundColor: [
                'rgba(75, 192, 192)',
                'rgba(255, 99, 132)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1,
        }],
    };

    var Question13a = document.getElementById('Question13aChart').getContext('2d');

    var question13aChart = new Chart(Question13a, {
        type: 'pie',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: function (value, context) {
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
                    },
                },
            },
            title: {
                display: true,
                text: 'Question 13b Chart',
                font: {
                    size: 17,
                    family: 'Arial',
                },
            },
            legend: {
                display: true,
                position: 'left',
            },
        },
    });
</script>

   
@endpush