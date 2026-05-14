<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
        <div class="flex space-x-3">
            <a href="{{ route('admin.export.pdf') }}" class="px-4 py-2 bg-rose-600 text-white rounded-xl text-sm font-bold hover:bg-rose-700 transition">Export PDF</a>
            <a href="{{ route('admin.export.excel') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-sm font-bold hover:bg-emerald-700 transition">Export Excel</a>
        </div>
    </x-slot>

    <div class="py-8" x-data="{ }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.users.index') }}" class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm flex items-center space-x-6 hover:border-indigo-200 transition">
                    <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-3xl font-extrabold text-gray-900">{{ $stats['total_mahasiswa'] }}</span>
                        <span class="text-sm text-gray-500 font-medium">Mahasiswa Terdaftar</span>
                    </div>
                </a>

                <a href="{{ route('admin.tim.index') }}" class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm flex items-center space-x-6 hover:border-indigo-200 transition">
                    <div class="w-16 h-16 bg-violet-50 rounded-2xl flex items-center justify-center text-violet-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-3xl font-extrabold text-gray-900">{{ $stats['total_tim'] }}</span>
                        <span class="text-sm text-gray-500 font-medium">Tim Terbentuk</span>
                    </div>
                </a>

                <a href="{{ route('admin.lomba.index') }}" class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm flex items-center space-x-6 hover:border-indigo-200 transition">
                    <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-3xl font-extrabold text-gray-900">{{ $stats['total_lomba'] }}</span>
                        <span class="text-sm text-gray-500 font-medium">Lomba Aktif</span>
                    </div>
                </a>
            </div>

            <!-- Charts Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Program Studi Distribution -->
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Distribusi Program Studi</h3>
                    <div class="h-64">
                        <canvas id="prodiChart"></canvas>
                    </div>
                </div>

                <!-- Participation Trends -->
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Tren Partisipasi</h3>
                    <div class="h-64">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Prodi Chart
            const prodiCtx = document.getElementById('prodiChart').getContext('2d');
            new Chart(prodiCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($prodiDist->pluck('program_studi')) !!},
                    datasets: [{
                        label: 'Total Mahasiswa',
                        data: {!! json_encode($prodiDist->pluck('total')) !!},
                        backgroundColor: '#4f46e5',
                        borderRadius: 12,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // Trend Chart
            const trendCtx = document.getElementById('trendChart').getContext('2d');
            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($trends['labels']) !!},
                    datasets: [{
                        label: 'Partisipasi',
                        data: {!! json_encode($trends['data']) !!},
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139, 92, 246, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3,
                        pointBackgroundColor: '#8b5cf6'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
