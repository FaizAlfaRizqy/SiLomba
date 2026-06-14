<x-admin-layout>
    <x-slot name="pageTitle">Dashboard Utama</x-slot>

    <div class="space-y-8 animate-fade-in">
        
        <!-- Header Actions -->
        <div class="flex flex-col sm:flex-row justify-between items-end gap-4 mb-2 animate-fade-in">
            <div>
                <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-brand-dark via-brand-teal to-brand-dark animate-gradient-x">Halo Min! 👋</h2>
                <p class="text-sm font-bold text-gray-500 dark:text-zinc-400 mt-1">Semangat terus kerjanya, ini rangkuman data kita hari ini!</p>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.export.excel') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white dark:bg-zinc-800 hover:bg-gradient-to-r hover:from-emerald-50 hover:to-emerald-100 dark:hover:from-emerald-900/40 dark:hover:to-emerald-800/40 text-emerald-600 dark:text-emerald-400 font-black rounded-[1.25rem] text-xs uppercase tracking-widest transition-all duration-500 border-2 border-gray-100 dark:border-zinc-700 hover:border-emerald-400/50 group shadow-sm hover:shadow-emerald-500/20 hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    Export Excel
                </a>
                <a href="{{ route('admin.lomba.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-brand-teal via-brand-mint to-brand-teal animate-gradient-x text-brand-dark font-black rounded-[1.25rem] text-xs uppercase tracking-widest transition-all duration-500 shadow-lg shadow-brand-teal/30 hover:shadow-brand-teal/50 hover:scale-105 group border-2 border-transparent">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-180 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
                    Buat Lomba Baru
                </a>
            </div>
        </div>

        <!-- Dynamic Statistics Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card: Mahasiswa Terdaftar -->
            <div x-data="{ count: 0, target: {{ $stats['total_mahasiswa'] }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-white to-gray-50 dark:from-zinc-900 dark:to-zinc-800 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-emerald-500/10 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">Mahasiswa Terdaftar</span>
                    <div class="flex items-end gap-2 mt-2">
                        <span class="block text-4xl font-black text-brand-dark dark:text-white tracking-tight" x-text="count">0</span>
                    </div>
                </div>
                <div class="relative z-10 p-4 bg-emerald-100/50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl group-hover:scale-110 group-hover:rotate-3 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
            </div>

            <!-- Card: Tim Berkompetisi -->
            <div x-data="{ count: 0, target: {{ $stats['total_tim'] }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-white to-gray-50 dark:from-zinc-900 dark:to-zinc-800 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-indigo-500/10 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">Tim Terdaftar</span>
                    <div class="flex items-end gap-2 mt-2">
                        <span class="block text-4xl font-black text-indigo-600 dark:text-indigo-400 tracking-tight" x-text="count">0</span>
                    </div>
                </div>
                <div class="relative z-10 p-4 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-2xl group-hover:scale-110 group-hover:rotate-3 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
            </div>

            <!-- Card: Lomba Dibuka -->
            <div x-data="{ count: 0, target: {{ $stats['total_lomba'] }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-white to-gray-50 dark:from-zinc-900 dark:to-zinc-800 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-amber-500/10 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">Lomba Aktif</span>
                    <div class="flex items-end gap-2 mt-2">
                        <span class="block text-4xl font-black text-amber-500 tracking-tight" x-text="count">0</span>
                    </div>
                </div>
                <div class="relative z-10 p-4 bg-amber-50 dark:bg-amber-900/30 text-amber-500 rounded-2xl group-hover:scale-110 group-hover:rotate-3 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
            </div>

            <!-- Card: Total Pengguna -->
            <div x-data="{ count: 0, target: {{ $stats['total_user'] }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-white to-gray-50 dark:from-zinc-900 dark:to-zinc-800 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-rose-500/10 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-rose-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">Akses Sistem</span>
                    <div class="flex items-end gap-2 mt-2">
                        <span class="block text-4xl font-black text-rose-500 tracking-tight" x-text="count">0</span>
                    </div>
                </div>
                <div class="relative z-10 p-4 bg-rose-50 dark:bg-rose-900/30 text-rose-500 rounded-2xl group-hover:scale-110 group-hover:rotate-3 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Tren Partisipasi -->
            <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm theme-transition">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100">Tren Partisipasi Lomba</h3>
                        <p class="text-xs text-brand-black/60 dark:text-zinc-400 mt-1">Statistik tim mendaftar per bulan</p>
                    </div>
                    <select class="px-4 py-2 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs font-semibold text-brand-dark dark:text-white transition-all duration-300 cursor-pointer">
                        <option>6 Bulan Terakhir</option>
                        <option>Tahun Ini</option>
                        <option>Keseluruhan</option>
                    </select>
                </div>
                <div class="relative h-64 w-full">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>

            <!-- Distribusi Program Studi -->
            <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm theme-transition">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100">Distribusi Program Studi</h3>
                        <p class="text-xs text-brand-black/60 dark:text-zinc-400 mt-1">Penyebaran asal jurusan peserta aktif</p>
                    </div>
                </div>
                <div class="relative h-64 w-full flex justify-center">
                    <canvas id="prodiChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Detail Lists Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Deadline Terdekat -->
            <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-150/50 dark:border-zinc-800 shadow-sm theme-transition lg:col-span-1" x-data="{ filter: '' }">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100 flex items-center gap-2">
                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Deadline Terdekat
                        </h3>
                    </div>
                </div>
                
                <div class="relative mb-6">
                    <input type="text" x-model="filter" placeholder="Cari nama lomba..." class="w-full pl-11 pr-4 py-3 bg-gray-50/50 dark:bg-zinc-800/50 border border-gray-200 dark:border-zinc-700 focus:border-rose-400 focus:ring-2 focus:ring-rose-400/30 rounded-2xl text-xs transition-all duration-300 dark:text-white">
                    <svg class="w-4 h-4 text-gray-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>

                <div class="space-y-4 max-h-[340px] overflow-y-auto pr-2 custom-scrollbar">
                    @forelse($upcomingDeadlines as $lomba)
                        <div x-show="filter === '' || '{{ strtolower($lomba->nama) }}'.includes(filter.toLowerCase())" 
                             class="flex items-center gap-4 p-4 rounded-2xl bg-white dark:bg-zinc-800 border border-gray-100 dark:border-zinc-700 shadow-sm hover:shadow-md hover:border-brand-teal transition-all group relative overflow-hidden cursor-pointer" onclick="window.location.href='{{ route('admin.lomba.edit', $lomba->id) }}'">
                            <div class="absolute inset-0 bg-gradient-to-r from-rose-500/0 via-rose-500/5 to-rose-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                            <div class="absolute top-0 left-0 bottom-0 w-1 bg-rose-500 rounded-l-2xl group-hover:w-2 transition-all"></div>
                            
                            <div class="flex flex-col items-center justify-center w-12 h-12 bg-rose-50 dark:bg-rose-900/30 rounded-xl text-rose-600 dark:text-rose-400 flex-shrink-0 group-hover:scale-105 transition-transform">
                                <span class="text-[10px] font-black uppercase">{{ $lomba->deadline->format('M') }}</span>
                                <span class="text-lg font-black leading-none">{{ $lomba->deadline->format('d') }}</span>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase tracking-widest bg-gray-100 text-gray-500 dark:bg-zinc-700 dark:text-zinc-300">{{ $lomba->kategori }}</span>
                                    @if(intval($lomba->deadline->diffInDays()) <= 3)
                                        <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase tracking-widest bg-rose-100 text-rose-600 dark:bg-rose-900/40 dark:text-rose-400 animate-pulse">Urgent</span>
                                    @endif
                                </div>
                                <h4 class="text-sm font-extrabold text-brand-dark dark:text-zinc-100 truncate group-hover:text-brand-teal transition-colors">{{ $lomba->nama }}</h4>
                                <p class="text-[10px] font-bold text-rose-500 mt-1 flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                                    Tersisa {{ intval($lomba->deadline->diffInDays()) }} hari lagi
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center py-10 text-center">
                            <svg class="w-16 h-16 text-gray-200 dark:text-zinc-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                            <p class="text-sm font-bold text-gray-400 dark:text-zinc-500">Tidak ada deadline dalam waktu dekat.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Lomba Terpopuler -->
            <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-150/50 dark:border-zinc-800 shadow-sm theme-transition lg:col-span-2">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                            Lomba Terpopuler
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-zinc-400 mt-1">Lomba dengan jumlah pendaftar tim terbanyak.</p>
                    </div>
                    <a href="{{ route('admin.lomba.index') }}" class="px-5 py-2.5 bg-brand-mint/30 dark:bg-brand-dark/30 hover:bg-brand-mint text-brand-dark dark:text-brand-mint font-bold rounded-xl text-xs uppercase tracking-wider transition-all duration-300 hover:scale-105">
                        Lihat Semua
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse($popularLombas as $lomba)
                        <div onclick="window.location.href='{{ route('admin.lomba.edit', $lomba->id) }}'" class="group relative bg-white dark:bg-zinc-800 rounded-3xl border border-gray-150/50 dark:border-zinc-700 overflow-hidden cursor-pointer shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            
                            <!-- Animated Background Gradient on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-br from-brand-teal/0 via-brand-teal/0 to-brand-mint/0 group-hover:from-brand-teal/10 group-hover:via-transparent group-hover:to-brand-mint/20 opacity-0 group-hover:opacity-100 transition-all duration-700 pointer-events-none z-0"></div>

                            <!-- Poster / Thumbnail -->
                            <div class="w-full h-36 bg-gray-100 dark:bg-zinc-900 relative overflow-hidden z-10">
                                @if($lomba->poster)
                                    <img src="{{ asset('storage/' . $lomba->poster) }}" alt="{{ $lomba->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gradient-to-br from-brand-mint/20 to-brand-teal/10 dark:from-brand-dark/30 dark:to-zinc-800 group-hover:scale-110 transition-transform duration-700">
                                        <svg class="w-8 h-8 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                        <span class="text-[9px] font-black uppercase tracking-widest">No Poster</span>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                
                                <!-- Rank Badge -->
                                <div class="absolute top-3 left-3 w-8 h-8 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-xl flex items-center justify-center font-black text-sm shadow-lg border border-white/20 z-10 group-hover:rotate-[24deg] group-hover:scale-110 transition-transform duration-300">
                                    #{{ $loop->iteration }}
                                </div>
                                
                                <!-- Tim Count Badge -->
                                <div class="absolute bottom-3 right-3 px-2.5 py-1 bg-white/20 backdrop-blur-md border border-white/30 text-white text-[10px] font-bold rounded-lg shadow-sm flex items-center gap-1.5 group-hover:bg-brand-teal/80 transition-colors duration-300">
                                    <svg class="w-3 h-3 text-brand-mint group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" /></svg>
                                    {{ $lomba->tims_count }} Tim
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-4 relative z-10">
                                <span class="inline-block px-2 py-0.5 bg-brand-mint/50 dark:bg-brand-dark/40 text-brand-dark dark:text-brand-mint text-[9px] font-black uppercase tracking-widest rounded mb-2 border border-brand-teal/20 group-hover:bg-brand-teal group-hover:text-white transition-colors duration-300">
                                    {{ $lomba->kategori }}
                                </span>
                                <h4 class="text-sm font-extrabold text-brand-dark dark:text-zinc-100 line-clamp-1 group-hover:text-brand-teal transition-colors">{{ $lomba->nama }}</h4>
                                <p class="text-[10px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-1 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors">{{ $lomba->penyelenggara }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-10 text-center">
                            <svg class="w-16 h-16 text-gray-200 dark:text-zinc-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            <p class="text-sm font-bold text-gray-400 dark:text-zinc-500">Belum ada data pendaftar untuk lomba apapun.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isDark = document.documentElement.classList.contains('dark');
            const textColor = isDark ? '#a1a1aa' : '#52525b';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)';
            const tooltipBg = isDark ? '#18181b' : '#ffffff';
            const tooltipText = isDark ? '#ffffff' : '#000000';

            // Trend Chart Line
            const trendCtx = document.getElementById('trendChart').getContext('2d');
            const trendGradient = trendCtx.createLinearGradient(0, 0, 0, 400);
            trendGradient.addColorStop(0, 'rgba(72, 168, 154, 0.5)');
            trendGradient.addColorStop(1, 'rgba(72, 168, 154, 0.0)');

            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($trends['labels']) !!},
                    datasets: [{
                        label: 'Total Pendaftaran Tim',
                        data: {!! json_encode($trends['data']) !!},
                        borderColor: '#48A89A',
                        backgroundColor: trendGradient,
                        borderWidth: 3,
                        pointBackgroundColor: '#00524D',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: tooltipBg,
                            titleColor: tooltipText,
                            bodyColor: tooltipText,
                            borderColor: gridColor,
                            borderWidth: 1,
                            padding: 12,
                            boxPadding: 6,
                            usePointStyle: true,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: gridColor, drawBorder: false },
                            ticks: { color: textColor, font: { family: 'Outfit', size: 11, weight: '600' }, padding: 10 }
                        },
                        x: {
                            grid: { display: false, drawBorder: false },
                            ticks: { color: textColor, font: { family: 'Outfit', size: 11, weight: '600' }, padding: 10 }
                        }
                    },
                    interaction: { intersect: false, mode: 'index' }
                }
            });

            // Prodi Chart Doughnut
            const prodiCtx = document.getElementById('prodiChart').getContext('2d');
            new Chart(prodiCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($prodiDist->pluck('program_studi')) !!},
                    datasets: [{
                        data: {!! json_encode($prodiDist->pluck('total')) !!},
                        backgroundColor: [
                            '#00524D', '#48A89A', '#CBEFEB', '#0ea5e9', '#6366f1', '#8b5cf6', '#d946ef'
                        ],
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: textColor,
                                font: { family: 'Outfit', size: 11, weight: 'bold' },
                                usePointStyle: true,
                                padding: 20
                            }
                        },
                        tooltip: {
                            backgroundColor: tooltipBg,
                            titleColor: tooltipText,
                            bodyColor: tooltipText,
                            borderColor: gridColor,
                            borderWidth: 1,
                            padding: 12,
                            usePointStyle: true,
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-admin-layout>
