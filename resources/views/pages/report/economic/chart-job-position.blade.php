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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($EconomicReportPosition);

    var EconomicReportPosition = document.getElementById('EconomicReportPosition').getContext('2d');
    var labels = [
        'Permanente ({{ $EconomicReportPosition->permanente_count }})', 
        'Kaswal ({{ $EconomicReportPosition->kaswal_count }})', 
        'May kontrata ({{ $EconomicReportPosition->may_kontrata_count }})',
        'Pana-panahon ({{ $EconomicReportPosition->pana_panahon_count }})', 
        'Self Employed ({{ $EconomicReportPosition->self_employed_count }})', 
        'Job Order ({{ $EconomicReportPosition->job_order_count }})', 
    ];
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(106, 74, 60, 0.2)'
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
                    data.permanente_count,
                    data.kaswal_count,
                    data.may_kontrata_count,
                    data.pana_panahon_count,
                    data.self_employed_count,
                    data.job_order_count,
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
                title: {
                    display: true,
                    text: 'Job Position Distribution Chart ({{$selectedYear}})',
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