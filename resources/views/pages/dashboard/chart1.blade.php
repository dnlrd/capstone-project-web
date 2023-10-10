

<div class="card ">
    <div class="card-title">
        Dahilan ng Paglipat
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <canvas id="myChart" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-auto d-flex align-items-center pe-2">
            <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
            <span>Magtratrabaho ({{$Question5['answer1_q5']['answer1']}})</span>
        </div>
        <div class="col-auto d-flex align-items-center px-2">
            <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
            <span>Tumira sa kamag-anak ({{$Question5['answer1_q5']['answer2']}})</span>
        </div>
        <div class="col-auto d-flex align-items-center px-2">
            <span class="legend me-2"  style="background-color:rgba(255, 205, 86);"></span>
            <span>Ibang dahilan ({{$Question5['answer1_q5']['answer3']}})</span>
        </div>
    </div>
</div>


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