
<canvas id="Chart6" class="img-fluid"></canvas>



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx6 = document.getElementById('Chart6');

        new Chart(ctx6, {
            type: 'doughnut',
            data: {
            labels: [
                'Poso ({{$Question12a['answer1_q12']['answer1']}})', 
                'Gripo ({{$Question12a['answer1_q12']['answer2']}})', 
                'Iba pa ({{$Question12a['answer1_q12']['answer3']}})'
            ],
            datasets: [{
                label: 'Total',
                data: [
                    {{$Question12a['answer1_q12']['answer1']}},
                    {{$Question12a['answer1_q12']['answer2']}},
                    {{$Question12a['answer1_q12']['answer3']}},
                ],
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