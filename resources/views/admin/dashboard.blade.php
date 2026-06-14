<x-app-layout>

    @push('styles')
    <style>
        html, body {
            background-color: #FDF8F0 !important;
            font-family: 'Outfit', sans-serif;
        }
        #page-bg {
            background-color: #FDF8F0 !important;
            position: relative;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
        .bg-cream { background-color: #FDF8F0; }
        .text-dark { color: #111111; }
        .bg-card-brown { background-color: #DBC8B6; }
        .bg-card-green { background-color: #62725D; }
        .bg-card-light { background-color: #EFE9DF; }
    </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-serif text-3xl font-bold text-dark leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <a href="{{ route('admin.export.pdf') }}" class="px-5 py-2.5 bg-[#111111] text-white rounded-full text-sm font-bold hover:bg-gray-800 transition shadow-sm border border-transparent">Export PDF</a>
            <a href="{{ route('admin.export.excel') }}" class="px-5 py-2.5 bg-white text-dark border border-gray-200 rounded-full text-sm font-bold hover:bg-gray-50 transition shadow-sm">Export Excel</a>
        </div>
    </x-slot>

    <div class="py-8 bg-cream min-h-screen" x-data="{ }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Stats Grid (Flowblox Style) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Mahasiswa Terdaftar -->
                <a href="{{ route('admin.users.index') }}" class="bg-card-light p-10 rounded-[2.5rem] flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition duration-300 relative overflow-hidden group">
                    <div class="w-16 h-16 bg-white/50 rounded-[1.5rem] flex items-center justify-center text-dark mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-5xl font-serif font-bold text-dark mb-2">{{ $stats['total_mahasiswa'] }}</span>
                        <span class="text-sm text-gray-600 font-bold tracking-wide">Mahasiswa Terdaftar</span>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-10">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </a>

                <!-- Tim Terbentuk -->
                <a href="{{ route('admin.tim.index') }}" class="bg-card-brown p-10 rounded-[2.5rem] flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition duration-300 relative overflow-hidden group">
                    <div class="w-16 h-16 bg-white/30 rounded-[1.5rem] flex items-center justify-center text-dark mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-5xl font-serif font-bold text-dark mb-2">{{ $stats['total_tim'] }}</span>
                        <span class="text-sm text-dark/70 font-bold tracking-wide">Tim Terbentuk</span>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-10">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                </a>

                <!-- Lomba Aktif -->
                <a href="{{ route('admin.lomba.index') }}" class="bg-card-green p-10 rounded-[2.5rem] flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition duration-300 relative overflow-hidden group">
                    <div class="w-16 h-16 bg-white/20 rounded-[1.5rem] flex items-center justify-center text-white mb-6 group-hover:scale-110 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <span class="block text-5xl font-serif font-bold text-white mb-2">{{ $stats['total_lomba'] }}</span>
                        <span class="text-sm text-white/80 font-bold tracking-wide">Lomba Aktif</span>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-10 text-white">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </a>
            </div>

            <!-- Charts Grid (Flowblox Style) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Program Studi Distribution -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 relative">
                    <h3 class="text-2xl font-serif font-bold text-dark mb-8">Distribusi Program Studi</h3>
                    <div class="h-72">
                        <canvas id="prodiChart"></canvas>
                    </div>
                </div>

                <!-- Participation Trends -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 relative">
                    <h3 class="text-2xl font-serif font-bold text-dark mb-8">Tren Partisipasi</h3>
                    <div class="h-72">
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
            // Flowblox modern palette
            const palette = ['#111111', '#62725D', '#DBC8B6', '#EFE9DF', '#A3B19B'];
            
            // Prodi Chart
            const prodiCtx = document.getElementById('prodiChart').getContext('2d');
            new Chart(prodiCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($prodiDist->pluck('program_studi')) !!},
                    datasets: [{
                        label: 'Total Mahasiswa',
                        data: {!! json_encode($prodiDist->pluck('total')) !!},
                        backgroundColor: palette,
                        borderRadius: 16,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { 
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#111111',
                            titleFont: { family: 'Playfair Display', size: 14 },
                            bodyFont: { family: 'Outfit', size: 13 },
                            padding: 12,
                            cornerRadius: 12
                        }
                    },
                    scales: { 
                        y: { 
                            beginAtZero: true,
                            grid: { borderDash: [4, 4], color: '#f3f4f6' },
                            border: { display: false }
                        },
                        x: {
                            grid: { display: false },
                            border: { display: false }
                        }
                    }
                }
            });

            // Trend Chart
            const trendCtx = document.getElementById('trendChart').getContext('2d');
            
            // Create Gradient
            let gradient = trendCtx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(98, 114, 93, 0.4)'); // #62725D
            gradient.addColorStop(1, 'rgba(98, 114, 93, 0.0)');

            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($trends['labels']) !!},
                    datasets: [{
                        label: 'Partisipasi',
                        data: {!! json_encode($trends['data']) !!},
                        borderColor: '#62725D',
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3,
                        pointBackgroundColor: '#111111',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { 
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#111111',
                            titleFont: { family: 'Playfair Display', size: 14 },
                            bodyFont: { family: 'Outfit', size: 13 },
                            padding: 12,
                            cornerRadius: 12
                        }
                    },
                    scales: { 
                        y: { 
                            beginAtZero: true,
                            grid: { borderDash: [4, 4], color: '#f3f4f6' },
                            border: { display: false }
                        },
                        x: {
                            grid: { display: false },
                            border: { display: false }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
