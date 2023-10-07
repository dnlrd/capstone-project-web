
<canvas id="Chart2" class="img-fluid"></canvas>



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx2 = document.getElementById('Chart2');

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
            labels: ['Magtratrabaho', 'Tumira sa kamag-anak', 'Ibang dahilan'],
            datasets: [{
                label: 'Total',
                data: [{{$Question6['answer1_q6']['answer1']}},{{$Question6['answer1_q6']['answer2']}},{{$Question6['answer1_q6']['answer3']}}],
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