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
                <canvas id="weeklyChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <!-- Visitor Login -->
            <div class="bg-blue-100 rounded-lg shadow p-4 flex flex-col items-center">
                <div class="text-xl font-semibold text-blue-800">Visitor Login</div>
                <div class="text-3xl font-bold text-blue-900">{{ number_format($totalLogins) }}</div>
            </div>


            <div class="bg-blue-100 rounded-lg shadow p-4 flex flex-col items-center">
                <div class="text-xl font-semibold text-blue-800">Products</div>
                <div class="text-3xl font-bold text-blue-900">{{ number_format($totalProducts) }}</div>
            </div>

            <div class="bg-blue-100 rounded-lg shadow p-4 flex flex-col items-center">
                <div class="text-xl font-semibold text-blue-800">User</div>
                <div class="text-3xl font-bold text-blue-900">{{ number_format($totalUsers) }}</div>
            </div>
        </div>


    </div>

    <script>
        // Ambil data dari PHP yang dikirim ke view
        const chartLabels = @json($chartData['labels']);
        const chartData = @json($chartData['data']);

        // Inisialisasi Chart.js
        const ctx = document.getElementById('weeklyChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Tipe chart: bar, line, pie, dll.
            data: {
                labels: chartLabels, // Label untuk sumbu X
                datasets: [{
                    label: 'Login Statistics',
                    data: chartData, // Data jumlah login
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang chart
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true // Mulai sumbu Y dari 0
                    }
                }
            }
        });
    </script>

</x-admin-layout>
