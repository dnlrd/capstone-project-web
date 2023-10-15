<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="DemographicReportCivilStatus" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
    Chart.register(ChartDataLabels);
    
    // Chart.defaults.set('plugins.datalabels', {
    //     color: 'white'
    // });
    var data = @json($DemographicReportCivilStatus);

    var DemographicReportCivilStatus = document.getElementById('DemographicReportCivilStatus').getContext('2d');

    var chart = new Chart(DemographicReportCivilStatus, {
        type: 'doughnut',
        data: {
            labels: [
                'Single ({{ $DemographicReportCivilStatus->total_single }})',
                'Cohabiting ({{ $DemographicReportCivilStatus->total_cohabiting }})',
                'Married ({{ $DemographicReportCivilStatus->total_married }})',
                'Separated ({{ $DemographicReportCivilStatus->total_separated }})',
                'Widowed ({{ $DemographicReportCivilStatus->total_widowed }})'
            ],
            datasets: [{
                data: [
                    {{ $DemographicReportCivilStatus->total_single_percentage }},
                    {{ $DemographicReportCivilStatus->total_cohabiting_percentage }},
                    {{ $DemographicReportCivilStatus->total_married_percentage }},
                    {{ $DemographicReportCivilStatus->total_separated_percentage }},
                    {{ $DemographicReportCivilStatus->total_widowed_percentage }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192)',
                    'rgba(255, 99, 132)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 75, 75)',
                    'rgba(153, 102, 255)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 75, 75, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: function(value, context) {
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
                    }
                },
                title: {
                    display: true,
                    text: '{{ $getChartTitleCivilStatus }}',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: true,
                    position: 'left'
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