
<div class="card ">
    <div class="card-title">
        Katayuan sa lupa at bahay
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex align-items-center">
                <div class="row d-flex justify-content-start">
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                        <span>May-ari ng Lupa at Bahay ({{$Question11c['answer3_q11']['answer1']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                        <span>Nangungupahan sa lupa at may-ari ng bahay ({{$Question11c['answer3_q11']['answer2']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2"  style="background-color:rgba(255, 205, 86);"></span>
                        <span>Nagtayo ng bahay nang walang pahintulot ({{$Question11c['answer3_q11']['answer3']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2"  style="background-color:rgba(0, 128, 255);"></span>
                        <span>Nangungupahan sa bahay ({{$Question11c['answer3_q11']['answer4']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2" style="background-color:rgba(255, 0, 0);"></span>
                        <span>Nakikitira sa bahay ({{$Question11c['answer3_q11']['answer5']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2"  style="background-color:rgba(0, 255, 0);"></span>
                        <span>Katiwala sa bahay ({{$Question11c['answer3_q11']['answer6']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-1">
                        <span class="legend me-2"  style="background-color:rgba(128, 0, 128);"></span>
                        <span>Iba pa ({{$Question11c['answer3_q11']['answer7']}})</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <div class="col-md-12">
                    <canvas id="Chart5" class="img-fluid"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>





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