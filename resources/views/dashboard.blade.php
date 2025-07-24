<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-6">
        <div>
            <h2 class="text-lg font-semibold">Statistik</h2>
            <ul class="list-disc pl-5">
                <li>Total Barang: {{ $jumlah_barang ?? 0 }}</li>
                <li>Total Transaksi: {{ $jumlah_transaksi ?? 0 }}</li>
                <li>Total Kategori: {{ $jumlah_kategori ?? 0 }}</li>
                <li>Total Anggota: {{ $jumlah_anggota ?? 0 }}</li>
            </ul>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-neutral-900 rounded-xl p-4 shadow">
                <h3 class="text-center font-medium mb-2">Grafik Jumlah Barang</h3>
                <div class="w-full h-50">
                    <canvas id="barangChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <div class="bg-white dark:bg-neutral-900 rounded-xl p-4 shadow">
                <h3 class="text-center font-medium mb-2">Grafik Status Transaksi</h3>
                <div class="w-full h-50">
                    <canvas id="transaksiChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const barangChart = new Chart(document.getElementById('barangChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: @json($barangChart['labels']),
                datasets: [{
                    label: 'Jumlah Barang',
                    data: @json($barangChart['data']),
                    backgroundColor: '#4caf50'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        const transaksiChart = new Chart(document.getElementById('transaksiChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: @json($transaksiChart['labels']),
                datasets: [{
                    label: 'Status Transaksi',
                    data: @json($transaksiChart['data']),
                    backgroundColor: ['#2196f3', '#8bc34a', '#ffc107', '#e91e63']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</x-layouts.app>
