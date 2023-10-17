<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="EconomicReportWhere" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    Chart.register(ChartDataLabels);
    var data = @json($EconomicReportWhere);
    var EconomicReportWhere = document.getElementById('EconomicReportWhere').getContext('2d');

    var labels = [
        `Tirahan (${data.tirahan_count})`, 
        `Kapitbahay (${data.kapitbahay_count})`, 
        `Sa Loob ng Sto. Tomas (${data.sa_loob_ng_sto_tomas_count})`,
        `Sa Labas ng Sto. Tomas (${data.sa_labas_ng_sto_tomas_count})`, 
        `Sa Labas ng Batangas (${data.sa_labas_ng_batangas_count})`, 
        `Hindi Tiyak (${data.hindi_tiyak_count})`, 
        `Iba Pa (${data.iba_pa_count})`
    ];
    var backgroundColors = [
        'rgba(75, 192, 192)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)',
        'rgba(106, 74, 60)'
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(106, 74, 60, 1)'
    ];
    
    var chart = new Chart(EconomicReportWhere, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: [
                    data.tirahan_percentage, 
                    data.kapitbahay_percentage, 
                    data.sa_loob_ng_sto_tomas_percentage, 
                    data.sa_labas_ng_sto_tomas_percentage, 
                    data.sa_labas_ng_batangas_percentage, 
                    data.hindi_tiyak_percentage, 
                    data.iba_pa_percentage,
                ],
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                datalabels: {
                    formatter: function (value, context) {
                        if (value === 0) {
                            return '';
                        }
                        return Math.round(value) + '%';
                    },
                    color: 'white',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                    },
                },
                title: {
                    display: true,
                    text: 'Job Location Distribution Chart ({{$selectedYear}})',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: false,
                    position: 'bottom'
                }
            },
        }
    });
</script>
<script>
    $( ".printDemo" ).click(function() {
        $('#printable-content').printThis({
            pageTitle: "jQuery printThis Demo",
            loadCSS: "",
            header: "<h1>jQueryScript.Net</h1>",
        });
    });
</script>
@endpush