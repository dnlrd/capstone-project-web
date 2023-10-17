<div class="card">
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="HealthReportDisability" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/printThis.js')}}" defer></script>
<script>
    var data = @json($HealthReportDisability);

    var labels = [
        'Hearing Impairment ({{ $HealthReportDisability->hearing_impairment_count }})', 
        'Visual Impairment ({{ $HealthReportDisability->visual_impairment_count }})', 
        'Mental Retardation ({{ $HealthReportDisability->mental_retardation_count }})', 
        'Autism ({{ $HealthReportDisability->autism_count }})', 
        'Cerebral Palsy ({{ $HealthReportDisability->cerebral_palsy_count }})', 
        'Epilepsy ({{ $HealthReportDisability->epilepsy_count }})', 
        'Amputee ({{ $HealthReportDisability->amputee_count }})', 
        'Polio ({{ $HealthReportDisability->polio_count }})', 
        'Clubfoot ({{ $HealthReportDisability->clubfoot_count }})', 
        'Hunchback ({{ $HealthReportDisability->hunchback_count }})', 
        'Dwarfism ({{ $HealthReportDisability->dwarfism_count }})', 
        'Others ({{ $HealthReportDisability->others_count }})'
    ];

    var datasetData = [
        data.hearing_impairment_count,
        data.visual_impairment_count,
        data.mental_retardation_count,
        data.autism_count,
        data.cerebral_palsy_count,
        data.epilepsy_count,
        data.amputee_count,
        data.polio_count,
        data.clubfoot_count,
        data.hunchback_count,
        data.dwarfism_count,
        data.others_count
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
        'rgba(0, 255, 0, 0.2)',
        'rgba(255, 255, 0, 0.2)',
        'rgba(0, 0, 255, 0.2)',
        'rgba(128, 128, 128, 0.2)' 
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
        'rgba(0, 255, 0, 1)',
        'rgba(255, 255, 0, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(128, 128, 128, 1)' 
    ];
    var HealthReportDisability = document.getElementById('HealthReportDisability').getContext('2d');
    var chart = new Chart(HealthReportDisability, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Count',
                data: datasetData,
                backgroundColor: backgroundColors,
                borderColor:  borderColors,
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
                    text: 'Types of Disabilities Distribution Chart ({{$selectedYear}})',
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