<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="EconomicReportPosition" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    Chart.register(ChartDataLabels);
    var data = @json($EconomicReportPosition);

    var EconomicReportPosition = document.getElementById('EconomicReportPosition').getContext('2d');
    var labels = [
        `Permanente (${data.permanente_count})`, 
        `Kaswal (${data.kaswal_count})`, 
        `May kontrata (${data.may_kontrata_count})`,
        `Pana-panahon (${data.pana_panahon_count})`, 
        `Self Employed (${data.self_employed_count})`, 
        `Job Order (${data.job_order_count})`, 
    ];
    var backgroundColors = [
        'rgba(75, 192, 192)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(153, 102, 255)',
        'rgba(106, 74, 60)'
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(106, 74, 60, 1)'
    ];
    var chart = new Chart(EconomicReportPosition, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: [
                    data.permanente_percentage,
                    data.kaswal_percentage,
                    data.may_kontrata_percentage,
                    data.pana_panahon_percentage,
                    data.self_employed_percentage,
                    data.job_order_percentage,
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
                    text: '{{$getChartTitlePosition}}',
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