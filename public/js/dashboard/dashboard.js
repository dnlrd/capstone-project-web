// dashboard.js

const ctx = document.getElementById('myChart');

var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        datasets: [{
            label: 'Total',
            data: [
                chartData.answer1_q5,
                chartData.answer2_q5,
                chartData.answer3_q5
            ],
            backgroundColor: [
                'rgb(255, 99, 132, 0.2)',
                'rgb(75, 192, 192, 0.2)',
                'rgb(255, 205, 86, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)', 
                'rgb(255, 205, 86)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {}
    },
});


const ctx1 = document.getElementById('myChart1');

var chart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
        datasets: [{
            label: 'Total',
            data: [
                chartData1.answer1_q6,
                chartData1.answer2_q6,
                chartData1.answer3_q6
            ],
            backgroundColor: [
                'rgb(255, 99, 132, 0.2)',
                'rgb(75, 192, 192, 0.2)',
                'rgb(255, 205, 86, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)', 
                'rgb(255, 205, 86)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {}
    },
});
