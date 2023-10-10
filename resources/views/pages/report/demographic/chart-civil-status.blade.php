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
<script>
    var data = @json($DemographicReportCivilStatus);

    var DemographicReportCivilStatus = document.getElementById('DemographicReportCivilStatus').getContext('2d');
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)', 
    ];
    var chart = new Chart(DemographicReportCivilStatus, {
        type: 'bar',
        data: {
            labels: [
                'Single - {{$DemographicReportCivilStatus->total_single}}',
                'Cohabiting - {{$DemographicReportCivilStatus->total_cohabiting}}',
                'Married - {{$DemographicReportCivilStatus->total_married}}',
                'Separated - {{$DemographicReportCivilStatus->total_separated}}',
                'Widowed - {{$DemographicReportCivilStatus->total_widowed}}'],
            datasets: [{
                data: [
                    data.total_single,
                    data.total_cohabiting,
                    data.total_married,
                    data.total_separated,
                    data.total_widowed,
                ],
                backgroundColor: backgroundColors,
                borderColor: backgroundColors.map(color => color.replace('0.2', '1')),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false,
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