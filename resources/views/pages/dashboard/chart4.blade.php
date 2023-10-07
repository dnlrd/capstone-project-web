
<canvas id="Chart4" class="img-fluid"></canvas>



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx4 = document.getElementById('Chart4');

        new Chart(ctx4, {
            type: 'pie',
            data: {
            labels: ['Pribadong Lupa', 'Lupa ng Gobyerno'],
            datasets: [{
                label: 'Total',
                data: [
                    {{$Question11b['answer2_q11']['answer1']}},
                    {{$Question11b['answer2_q11']['answer2']}},
                ],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
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