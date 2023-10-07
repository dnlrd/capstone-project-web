
<canvas id="myChart" class="img-fluid"></canvas>



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
            labels: ['Magtratrabaho', 'Tumira sa kamag-anak', 'Ibang dahilan'],
            datasets: [{
                label: 'Total',
                data: [{{$Question5['answer1_q5']['answer1']}},{{$Question5['answer1_q5']['answer2']}},{{$Question5['answer1_q5']['answer3']}}],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    ],
                    borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    ],
                borderWidth: 1
            }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
            scales: {
            }
            }
        });
    </script>
@endpush