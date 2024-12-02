<x-admin-layout>
    <div class="p-6">
        <!-- Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-blue-900">Dashboard</h1>
        </div>

        <!-- Graph Section -->
        <div class="bg-yellow-50 rounded-lg shadow p-4 mb-6">
            <h2 class="text-lg font-semibold text-blue-800 mb-4">Weekly Statistics</h2>
            <div class="relative w-full h-64">
                <!-- Replace this with a chart library like Chart.js -->
                <canvas id="weeklyChart"></canvas>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="grid grid-cols-3 gap-6">
            <!-- Visitor Login -->
            <div class="bg-blue-100 rounded-lg shadow p-4 flex flex-col items-center">
                <div class="text-xl font-semibold text-blue-800">Visitor Login</div>
                <div class="text-3xl font-bold text-blue-900">12,000</div>
            </div>

            <!-- View Products -->
            <div class="bg-blue-100 rounded-lg shadow p-4 flex flex-col items-center">
                <div class="text-xl font-semibold text-blue-800">View Products</div>
                <div class="text-3xl font-bold text-blue-900">12,000</div>
            </div>

            <!-- Find Yours -->
            <div class="bg-blue-100 rounded-lg shadow p-4 flex flex-col items-center">
                <div class="text-xl font-semibold text-blue-800">Find Yours</div>
                <div class="text-3xl font-bold text-blue-900">12,000</div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Weekly statistics chart
        const ctx = document.getElementById('weeklyChart').getContext('2d');
        const weeklyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [
                    {
                        label: 'Visitor Login',
                        data: [3000, 4000, 5000, 3500, 4200, 3900, 3800],
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'View Products',
                        data: [2000, 3000, 4500, 3000, 4000, 3500, 3300],
                        backgroundColor: 'rgba(255, 206, 86, 0.7)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Find Yours',
                        data: [1500, 2500, 3500, 2000, 3000, 2500, 2200],
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush



</x-admin-layout>
