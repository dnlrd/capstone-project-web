

<div class="card ">
    <div class="card-title">
        Uri ng Paglipat
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-12 mb-2">
                <canvas id="Chart2" class="img-fluid"></canvas>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="row d-flex justify-content-start">
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2" style="background-color:rgba(255, 99, 132);"></span>
                        <span>Kasama lahat ng pamilya ({{$Question6['answer1_q6']['answer1']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2" style="background-color:rgba(255, 159, 64);"></span>
                        <span>Kasama ang ilang myembro ng pamilya ({{$Question6['answer1_q6']['answer2']}})</span>
                    </div>
                    <div class="col-auto d-flex align-items-center mb-2">
                        <span class="legend me-2"  style="background-color:rgba(255, 205, 86);"></span>
                        <span>Nag-iisang lumipat ({{$Question6['answer1_q6']['answer3']}})</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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