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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($EconomicReportSector);

    var EconomicReportSector = document.getElementById('EconomicReportSector').getContext('2d');
    var labels = [
        'Pagmamanupaktyur ({{ $EconomicReportSector->pagmamanupaktyur_count }})', 
        'Konstruksyon ({{ $EconomicReportSector->konstruksyon_count }})', 
        'Pagbubukid ({{ $EconomicReportSector->pagbubukid_count }})',
        'Serbisyo ({{ $EconomicReportSector->serbisyo_count }})', 
        'Iba pa ({{ $EconomicReportSector->iba_pa_count }})', 
    ];
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(153, 102, 255, 1)',
    ];
    var chart = new Chart(EconomicReportSector, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: [
                    data.pagmamanupaktyur_count,
                    data.konstruksyon_count,
                    data.pagbubukid_count,
                    data.serbisyo_count,
                    data.iba_pa_count,
                ],
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Job Sector Distribution Chart ({{$selectedYear}})',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: true,
                    position: 'right'
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