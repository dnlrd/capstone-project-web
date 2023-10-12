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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($EducationalReport);
    var EducationalReport = document.getElementById('EducationalReport').getContext('2d');

    var labels = [
        'not in school age 5 ({{ $EducationalReport->not_in_school_age_count }})', 
        'no education ({{ $EducationalReport->no_education_count }})', 
        'elementary ({{ $EducationalReport->elementary_count }})',
        'high school ({{ $EducationalReport->high_school_count }})', 
        'junior high({{ $EducationalReport->junior_high_count }})', 
        'senior high ({{ $EducationalReport->senior_high_count }})', 
        'post baccalaureate ({{ $EducationalReport->post_baccalaureate_count }})',
        'osy ({{ $EducationalReport->osy_count }})', 
        'hindi nag-aaral ({{ $EducationalReport->hindi_nag_aaral_count }})', 
    ];
    var backgroundColors = [
        'rgba(75, 192, 192, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(106, 74, 60, 0.2)',
        'rgba(255, 0, 0, 0.2)', 
        'rgba(0, 255, 0, 0.2)' 
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
                    data.not_in_school_age_count, 
                    data.no_education_count, 
                    data.elementary_count, 
                    data.high_school_count, 
                    data.junior_high_count, 
                    data.senior_high_count, 
                    data.post_baccalaureate_count,
                    data.osy_count, 
                    data.hindi_nag_aaral_count,
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
                title: {
                    display: true,
                    text: 'Education Level Distribution Chart ({{$selectedYear}})',
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