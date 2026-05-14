<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-[2rem] p-8 sm:p-12 text-white shadow-xl shadow-indigo-100 relative overflow-hidden">
                <div class="relative z-10">
                    <h1 class="text-3xl sm:text-5xl font-extrabold mb-4">Halo, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-indigo-100 text-lg max-w-xl">Siap untuk meraih prestasi hari ini? Temukan lomba terbaik dan bangun tim impianmu di SiLomba.</p>
                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('mahasiswa.lomba.index') }}" class="px-6 py-3 bg-white text-indigo-600 rounded-2xl font-bold hover:bg-indigo-50 transition shadow-lg">Jelajahi Lomba</a>
                        <a href="{{ route('mahasiswa.tim-finder') }}" class="px-6 py-3 bg-indigo-500/30 backdrop-blur-md text-white border border-white/20 rounded-2xl font-bold hover:bg-indigo-500/50 transition">Cari Tim</a>
                    </div>
                </div>
                <!-- Abstract blobs -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 bg-violet-400/20 rounded-full blur-3xl"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recommendations Section -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold text-gray-900">Rekomendasi Untukmu</h3>
                        <a href="{{ route('mahasiswa.tim-finder') }}" class="text-indigo-600 font-bold text-sm hover:underline">Lihat Semua &rarr;</a>
                    </div>
                    
                    <!-- Recommendation Card -->
                    <div class="grid grid-cols-1 gap-4">
                        @forelse([] as $rec)
                            <!-- Team recommendations will go here -->
                        @empty
                            <div class="bg-white p-8 rounded-3xl border border-gray-100 text-center">
                                <div class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h4 class="text-lg font-bold text-gray-900">Belum ada rekomendasi tim</h4>
                                <p class="text-gray-500 text-sm mb-6">Mulai ikuti beberapa lomba atau perbarui keahlianmu untuk mendapatkan rekomendasi terbaik.</p>
                                <a href="{{ route('mahasiswa.profile.edit') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">Update Keahlian</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="space-y-8">
                    <!-- Quick Stats -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Statistik Saya</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-2xl">
                                <span class="block text-2xl font-bold text-indigo-600">0</span>
                                <span class="text-xs text-gray-500 uppercase font-bold tracking-wider">Tim Diikuti</span>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-2xl">
                                <span class="block text-2xl font-bold text-violet-600">0</span>
                                <span class="text-xs text-gray-500 uppercase font-bold tracking-wider">Lamaran</span>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Deadlines -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Deadline Terdekat</h4>
                        <div class="space-y-4">
                            @php $upcoming = \App\Models\Lomba::where('status', 'buka')->orderBy('deadline', 'asc')->take(3)->get(); @endphp
                            @foreach($upcoming as $l)
                                <div class="flex items-center space-x-4 group cursor-pointer" onclick="window.location='{{ route('mahasiswa.lomba.show', $l->id) }}'">
                                    <div class="w-12 h-12 rounded-xl bg-indigo-50 flex flex-col items-center justify-center text-indigo-600 flex-shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition">
                                        <span class="text-xs font-bold leading-none">{{ $l->deadline->format('M') }}</span>
                                        <span class="text-lg font-bold leading-none">{{ $l->deadline->format('d') }}</span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h5 class="text-sm font-bold text-gray-900 truncate group-hover:text-indigo-600 transition">{{ $l->nama }}</h5>
                                        <p class="text-xs text-gray-500">{{ $l->penyelenggara }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
