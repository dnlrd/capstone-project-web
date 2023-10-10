


<div class="card ">
    <div class="card-title">
        Uri ng lupang kinatatayuan ng bahay
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
        <div class="col-md-6 d-flex align-items-center">
                <div class="row d-flex justify-content-end">
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                        <span>Pribadong Lupa ({{$Question11b['answer2_q11']['answer1']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                        <span>Lupa ng Gobyerno ({{$Question11b['answer2_q11']['answer2']}})</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="Chart4" class="img-fluid"></canvas>
                
            </div>
        </div>
    </div>
    
</div>

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
                
            }
        });
    </script>
@endpush