


<div class="card ">
    <div class="card-title">
        Uri ng tirahan/bahay
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
               
                <canvas id="Chart3" class="img-fluid"></canvas>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <div class="row d-flex justify-content-start">
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                        <span>Konkreto ({{$Question11a['answer1_q11']['answer1']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                        <span>Konkreto at Kahoy ({{$Question11a['answer1_q11']['answer2']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2"  style="background-color:rgba(255, 205, 86);"></span>
                        <span>Kahoy ({{$Question11a['answer1_q11']['answer3']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2"  style="background-color:rgba(0, 128, 255);"></span>
                        <span>Barong-barong ({{$Question11a['answer1_q11']['answer4']}})</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx3 = document.getElementById('Chart3');

        new Chart(ctx3, {
            type: 'bar',
            data: {
            labels: [
                'Konkreto ({{$Question11a['answer1_q11']['answer1']}})', 
                'Konkreto at Kahoy ({{$Question11a['answer1_q11']['answer2']}})', 
                'Kahoy ({{$Question11a['answer1_q11']['answer3']}})',
                'Barong-barong ({{$Question11a['answer1_q11']['answer4']}})'],
            datasets: [{
                label: 'Total',
                data: [
                    {{$Question11a['answer1_q11']['answer1']}},
                    {{$Question11a['answer1_q11']['answer2']}},
                    {{$Question11a['answer1_q11']['answer3']}},
                    {{$Question11a['answer1_q11']['answer4']}}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(0, 128, 255)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(0, 128, 255)'
                ],
                borderWidth: 1
            }]
            },
            
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        display: false 
                    }
                }  
            }
        });
    </script>
@endpush