<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="EducationalReport" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    Chart.register(ChartDataLabels);
    var data = @json($EducationalReport);
    var EducationalReport = document.getElementById('EducationalReport').getContext('2d');

    var labels = [
        'not in school age 5', 
        'no education', 
        'elementary',
        'high school', 
        'junior high', 
        'senior high', 
        'post baccalaureate',
        'osy', 
        'Not Studying', 
    ];
    var backgroundColors = [
        'rgba(75, 192, 192)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)',
        'rgba(106, 74, 60)',
        'rgba(255, 0, 0)', 
        'rgba(0, 255, 0)' 
    ];

    var borderColors = [
        'rgba(75, 192, 192, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(106, 74, 60, 1)',
        'rgba(255, 0, 0, 1)',
        'rgba(0, 255, 0, 1)'  
    ];
    
    var chart = new Chart(EducationalReport, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: [
                    data.not_in_school_age_percentage, 
                    data.no_education_percentage, 
                    data.elementary_percentage, 
                    data.high_school_percentage, 
                    data.junior_high_percentage, 
                    data.senior_high_percentage, 
                    data.post_baccalaureate_percentage,
                    data.osy_percentage, 
                    data.hindi_nag_aaral_percentage,
                ],
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            indexAxis: 'y',
            plugins: {
                datalabels: {
                    formatter: function (value, context) {
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
                    },
                },
                title: {
                    display: true,
                    text: '{{$getChartTitleEducationalReport}}',
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
@endpush