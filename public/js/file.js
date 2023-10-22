document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: '/chart-data', 
        method: 'GET',
        success: function (data) {
            var labels = data;
            var values = data;

            var ctx67 = document.getElementById('myChart').getContext('2d');
            new Chart(ctx67, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Data',
                        data: [data.male_count, data.female_count],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });

    $.ajax({
        url: '/chart-data',
        method: 'GET',
        success: function (data) {
            var ctx672 = document.getElementById('myChart1').getContext('2d');
            new Chart(ctx672, {
                type: 'bar',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Data',
                        data: [data.male_count, data.female_count],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });
});
