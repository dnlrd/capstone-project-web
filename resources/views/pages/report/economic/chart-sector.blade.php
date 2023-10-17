<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="EconomicReportSector" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    Chart.register(ChartDataLabels);
    var data = @json($EconomicReportSector);

    var EconomicReportSector = document.getElementById('EconomicReportSector').getContext('2d');
    var labels = [
        `Pagmamanupaktyur (${data.pagmamanupaktyur_count})`, 
        `Konstruksyon (${data.konstruksyon_count})`, 
        `Pagbubukid (${data.pagbubukid_count})`,
        `Serbisyo (${data.serbisyo_count})`, 
        `Iba pa (${data.iba_pa_count})`, 
    ];
    var backgroundColors = [
        'rgba(75, 192, 192)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(153, 102, 255)',
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(153, 102, 255, 1)',
    ];
    var chart = new Chart(EconomicReportSector, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: [
                    data.pagmamanupaktyur_percentage,
                    data.konstruksyon_percentage,
                    data.pagbubukid_percentage,
                    data.serbisyo_percentage,
                    data.iba_pa_percentage,
                ],
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
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
                    text: '{{$getChartTitleSector}}',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>

@endpush