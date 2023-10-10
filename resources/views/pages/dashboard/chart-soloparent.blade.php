<div class="card ">
    <div class="card-header fw-bold">
        Educational Status
    </div>
    <div class="card-body p-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <canvas id="DashboardEducationLevel" class="img-fluid"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var data = @json($DashboardEducationLevel);

        var DashboardEducationLevel = document.getElementById('DashboardEducationLevel').getContext('2d');

        var myChart = new Chart(DashboardEducationLevel, {
            type: 'doughnut',
            data: {
                labels: ['Not in School-Age', 'No Education', 'Elementary', 'High School', 'Junior High', 'Senior High', 'Post-Baccalaureate', 'OSY'],
                datasets: [{
                    data: [
                        data.not_in_school_age_count,
                        data.no_education_count,
                        data.elementary_count,
                        data.high_school_count,
                        data.junior_high_count,
                        data.senior_high_count,
                        data.post_baccalaureate_count,
                        data.osy_count
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(100, 100, 100, 0.6)',
                        'rgba(200, 100, 50, 0.6)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'right'
                }
            }
        });
    </script>
@endpush