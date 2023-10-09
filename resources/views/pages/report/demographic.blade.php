
<canvas id="civilStatusChart" width="400" height="200"></canvas>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // Get the canvas element
    var DashboardChartCivilStatus = document.getElementById('civilStatusChart').getContext('2d');

    // Retrieve the data from PHP using Blade syntax
    var data = @json($DashboardChartCivilStatus);

    // Extract the years and civil status data
    var years = Object.keys(data);
    var civilStatusData = Object.values(data);

    // Create the datasets for each civil status category
    var datasets = [
        {
            label: 'Single',
            data: civilStatusData.map(function (yearData) {
                return yearData.single;
            }),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            tension: 0.1
        },
        {
            label: 'Cohabiting',
            data: civilStatusData.map(function (yearData) {
                return yearData.cohabiting;
            }),
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1,
            tension: 0.1
        },
        {
            label: 'Married',
            data: civilStatusData.map(function (yearData) {
                return yearData.married;
            }),
            backgroundColor: 'rgba(255, 205, 86, 0.2)',
            borderColor: 'rgba(255, 205, 86, 1)',
            borderWidth: 1,
            tension: 0.1
        },
        {
            label: 'Separated',
            data: civilStatusData.map(function (yearData) {
                return yearData.separated;
            }),
            backgroundColor: 'rgba(0, 128, 255, 0.2)',
            borderColor: 'rgba(0, 128, 255, 1)',
            borderWidth: 1,
            tension: 0.1
        },
        {
            label: 'Widowed',
            data: civilStatusData.map(function (yearData) {
                return yearData.widowed;
            }),
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            borderColor: 'rgba(0, 255, 0, 1)',
            borderWidth: 1,
            tension: 0.1
        }
    ];

    // Create the chart
    var myChart = new Chart(DashboardChartCivilStatus, {
        type: 'line', // You can change the chart type as needed
        data: {
            labels: years,
            datasets: datasets,
            
        },
        
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush