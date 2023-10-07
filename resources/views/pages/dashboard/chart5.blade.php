
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
                'Nangungupahan sa lupa at may-ari ng bahay ({{$Question11c['answer3_q11']['answer2']}})', 
                'Nagtayo ng bahay nang walang pahintulot ({{$Question11c['answer3_q11']['answer3']}})',
                'Nangungupahan sa bahay ({{$Question11c['answer3_q11']['answer4']}})',
                'Nakikitira sa bahay ({{$Question11c['answer3_q11']['answer5']}})', 
                'Katiwala sa bahay ({{$Question11c['answer3_q11']['answer6']}})',
                'Iba pa ({{$Question11c['answer3_q11']['answer7']}})'
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
                    'rgba(255, 0, 0)',    
                    'rgba(0, 255, 0)',    
                    'rgba(128, 0, 128)',  
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(0, 128, 255)',
                    'rgb(255, 0, 0)',   
                    'rgb(0, 255, 0)',  
                    'rgb(128, 0, 128)', 
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
                        display: false 
                    }
                }  
            }
        });
    </script>
@endpush