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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($EconomicReportWhere);
    var EconomicReportWhere = document.getElementById('EconomicReportWhere').getContext('2d');

    var labels = [
        'Tirahan ({{ $EconomicReportWhere[0]->tirahan_count }})', 
        'Kapitbahay ({{ $EconomicReportWhere[0]->kapitbahay_count }})', 
        'Sa Loob ng Sto. Tomas ({{ $EconomicReportWhere[0]->sa_loob_ng_sto_tomas_count }})',
        'Sa Labas ng Sto. Tomas ({{ $EconomicReportWhere[0]->sa_labas_ng_sto_tomas_count }})', 
        'Sa Labas ng Batangas ({{ $EconomicReportWhere[0]->sa_labas_ng_batangas_count }})', 
        'Hindi Tiyak ({{ $EconomicReportWhere[0]->hindi_tiyak_count }})', 
        'Iba Pa ({{ $EconomicReportWhere[0]->iba_pa_count }})'];
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(106, 74, 60, 0.2)'
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
                    data[0].tirahan_count, 
                    data[0].kapitbahay_count, 
                    data[0].sa_loob_ng_sto_tomas_count, 
                    data[0].sa_labas_ng_sto_tomas_count, 
                    data[0].sa_labas_ng_batangas_count, 
                    data[0].hindi_tiyak_count, 
                    data[0].iba_pa_count,
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