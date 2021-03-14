<x-admin-master>
    @section('content')

        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
            <p class="mg-b-0">Welcome to CodeHacking.</p>
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="br-section-wrapper">
                <canvas id="myChart"></canvas>
            </div>
        </div><!-- br-pagebody -->

    @endsection

    @section('scripts')

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Posts', 'Categories', 'Comments'],
                        datasets: [{
                            label: 'Data of CodeHacking',
                            data: [{{ $postsCount }}, {{ $categoriesCount }}, {{ $commentsCount }}],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>

    @endsection

</x-admin-master>
