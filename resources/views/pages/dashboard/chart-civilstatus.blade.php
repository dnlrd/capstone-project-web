<div class="card ">
    <div class="card-header fw-bold">
        Marital Status
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <canvas id="DashboardChartCivilStatus" class="img-fluid" height="150"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var stackedBarChartCanvas = document.getElementById('DashboardChartCivilStatus').getContext('2d');

    var data = @json($DashboardChartCivilStatus);

    var years = Object.keys(data);
    var singleData = Object.values(data).map(function (yearData) {
        return yearData.single.total;
    });
    var cohabitingData = Object.values(data).map(function (yearData) {
        return yearData.cohabiting.total;
    });
    var marriedData = Object.values(data).map(function (yearData) {
        return yearData.married.total;
    });
    var separatedData = Object.values(data).map(function (yearData) {
        return yearData.separated.total;
    });
    var widowedData = Object.values(data).map(function (yearData) {
        return yearData.widowed.total;
    });

    var datasets = [
        {
            label: 'Single',
            data: singleData,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            tension: 0.3,
            borderWidth: 1
        },
        {
            label: 'Cohabiting',
            data: cohabitingData,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            tension: 0.3,
            borderWidth: 1
        },
        {
            label: 'Married',
            data: marriedData,
            backgroundColor: 'rgba(255, 205, 86, 0.2)',
            borderColor: 'rgba(255, 205, 86, 1)',
            tension: 0.3,
            borderWidth: 1
        },
        {
            label: 'Separated',
            data: separatedData,
            backgroundColor: 'rgba(0, 128, 255, 0.2)',
            borderColor: 'rgba(0, 128, 255, 1)',
            tension: 0.3,
            borderWidth: 1
        },
        {
            label: 'Widowed',
            data: widowedData,
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            borderColor: 'rgba(0, 255, 0, 1)',
            tension: 0.3,
            borderWidth: 1
        },
        {
            label: 'Total',
            data: singleData.map(function (value, index) {
                return value + cohabitingData[index] + marriedData[index] + separatedData[index] + widowedData[index];
            }),
            fill: false,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            type: 'bar',
            yAxisID: 'right-y-axis'
        },
    ];
    var stackedBarChart = new Chart(stackedBarChartCanvas, {
        type: 'line',
        data: {
            labels: years,
            datasets: datasets
        },
        maintainAspectRatio: true,
        responsive: true,
        
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Years'
                    }
                },
                y: {
                    beginAtZero: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Marital Status'
                    }
                },
                'right-y-axis': {
                    beginAtZero: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Total'
                    }
                }
            }
        }
    });
</script>
@endpush