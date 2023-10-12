<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="EconomicEmploymentStatus" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($EconomicReportEmploymentStatus);

    var EconomicReportEmploymentStatus = document.getElementById('EconomicEmploymentStatus').getContext('2d');

    var chart = new Chart(EconomicReportEmploymentStatus, {
        type: 'pie',
        data: {
            labels: ['Employed {{$EconomicReportEmploymentStatus[0]->employed_count}}', 'Unemployed {{$EconomicReportEmploymentStatus[0]->unemployed_count}}'],
            datasets: [{
                data: [
                    data[0].employed_count,
                    data[0].unemployed_count,
                ],
                backgroundColor: ['rgba(75, 192, 192)', 'rgba(255, 99, 132)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Employment Status Distribution Chart ({{$selectedYear}})',
                    font: {
                        size: 17,
                        family: 'Arial'
                    }
                },
                legend: {
                    display: true,
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