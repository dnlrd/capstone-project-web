
<canvas id="Chart5" class="img-fluid"></canvas>



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx5 = document.getElementById('Chart5');

        new Chart(ctx5, {
            type: 'bar',
            data: {
            labels: [
                'May-ari ng Lupa at Bahay ({{$Question11c['answer3_q11']['answer1']}})', 
                'Konkreto at Kahoy ({{$Question11c['answer3_q11']['answer2']}})', 
                'Kahoy ({{$Question11c['answer3_q11']['answer3']}})',
                'Barong-barong ({{$Question11c['answer3_q11']['answer4']}})',
                'Konkreto at Kahoy ({{$Question11c['answer3_q11']['answer5']}})', 
                'Kahoy ({{$Question11c['answer3_q11']['answer6']}})',
                'Barong-barong ({{$Question11c['answer3_q11']['answer7']}})'
            ],
            datasets: [{
                label: 'Total',
                data: [
                    {{$Question11c['answer3_q11']['answer1']}},
                    {{$Question11c['answer3_q11']['answer2']}},
                    {{$Question11c['answer3_q11']['answer3']}},
                    {{$Question11c['answer3_q11']['answer4']}},
                    {{$Question11c['answer3_q11']['answer5']}},
                    {{$Question11c['answer3_q11']['answer6']}},
                    {{$Question11c['answer3_q11']['answer7']}}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(0, 128, 255)',
                    'rgba(255, 0, 0)',    // New color (red)
                    'rgba(0, 255, 0)',    // New color (green)
                    'rgba(128, 0, 128)',  // New color (purple)
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(0, 128, 255)',
                    'rgb(255, 0, 0)',    // New color (red)
                    'rgb(0, 255, 0)',    // New color (green)
                    'rgb(128, 0, 128)',  // New color (purple)
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
                    x: {
                        display: false // Hide X axis labels
                    }
                }  
            }
        });
    </script>
@endpush