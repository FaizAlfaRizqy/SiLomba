<x-admin-layout>
    <x-slot name="pageTitle">Manajemen Tim</x-slot>

    <div x-data="{
        search: '',
        confirmDelete(formId) {
            this.confirmModal.trigger(
                'Bubarkan Tim?',
                'Tindakan ini akan membubarkan tim dan menghapus data relasi anggota secara permanen.',
                () => { document.getElementById(formId).submit(); }
            );
        }
    }" class="space-y-8 animate-fade-in">

        <!-- Top Statistics Cards with Count Animation -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div x-data="{ count: 0, target: {{ $tims->total() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-brand-dark via-[#00403c] to-[#002f2c] p-6 rounded-[2rem] border border-brand-teal/20 shadow-xl shadow-brand-dark/20 flex items-center justify-between overflow-hidden hover:-translate-y-1 transition-all duration-500">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-brand-mint/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="absolute top-0 right-0 w-full h-full bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-brand-teal/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-black text-brand-mint uppercase tracking-widest leading-none drop-shadow-sm">Total Tim Terbentuk</span>
                    <span class="block text-4xl font-black text-white mt-2 tracking-tight drop-shadow-md" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-brand-teal/20 text-brand-mint rounded-2xl backdrop-blur-md border border-brand-mint/10 group-hover:rotate-12 group-hover:scale-110 transition duration-500 shadow-inner">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
            </div>

            <div x-data="{ count: 0, target: {{ $tims->filter(fn($tim) => ($tim->anggota->count() + 1) >= $tim->maks_anggota)->count() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-brand-mint to-brand-mint/50 dark:from-brand-dark dark:to-zinc-900 p-6 rounded-[2rem] border border-brand-teal/20 shadow-sm shadow-brand-mint/20 flex items-center justify-between hover:shadow-xl hover:shadow-brand-mint/40 hover:-translate-y-1 transition-all duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-brand-teal/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-brand-dark/70 dark:text-brand-mint uppercase tracking-widest leading-none">Kapasitas Penuh</span>
                    <span class="block text-4xl font-black text-brand-dark dark:text-white mt-2 tracking-tight drop-shadow-sm" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-white/50 dark:bg-brand-dark/50 text-brand-dark dark:text-brand-mint rounded-2xl group-hover:scale-110 group-hover:-rotate-12 transition duration-500 shadow-sm border border-white/50 dark:border-brand-teal/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>

            <div x-data="{ count: 0, target: {{ $tims->filter(fn($tim) => ($tim->anggota->count() + 1) < $tim->maks_anggota)->count() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-800 shadow-sm flex items-center justify-between hover:shadow-xl hover:shadow-brand-teal/10 hover:-translate-y-1 transition-all duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-brand-teal/5 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-brand-dark/50 dark:text-zinc-400 uppercase tracking-widest leading-none">Sedang Merekrut</span>
                    <span class="block text-4xl font-black text-brand-teal mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-gray-50 dark:bg-zinc-800 text-brand-teal rounded-2xl group-hover:scale-110 group-hover:rotate-12 transition duration-500 border border-gray-100 dark:border-zinc-700 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
            </div>
        </div>

        <!-- Top Action Bar with Real-Time Controls -->
        <div class="bg-white dark:bg-zinc-900 p-6 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-4 theme-transition">
            <div>
                <h2 class="text-xl font-bold text-brand-dark dark:text-zinc-100">Kelola Keanggotaan Tim</h2>
                <p class="text-xs text-brand-black/60 dark:text-zinc-400 mt-1">Verifikasi anggota tim dan pastikan kesiapan pendaftaran event lomba.</p>
            </div>
            
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search Box -->
                <div class="relative w-full sm:w-64">
                    <input type="text" x-model="search" placeholder="Cari tim, ketua, atau lomba..." 
                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-zinc-900 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm overflow-hidden theme-transition">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-brand-mint/30 dark:bg-zinc-800/40 border-b border-brand-teal/10 dark:border-zinc-800 text-[10px] font-bold text-brand-dark dark:text-brand-mint uppercase tracking-widest">
                            <th class="px-8 py-5">Nama Tim</th>
                            <th class="px-6 py-5">Event Lomba</th>
                            <th class="px-6 py-5">Ketua Tim</th>
                            <th class="px-6 py-5">Jumlah Anggota</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($tims as $tim)
                            <!-- Row wrapper with expanded subrow -->
                            <tr x-data="{ expanded: false }" 
                                x-show="search === '' || '{{ strtolower($tim->nama_tim) }}'.includes(search.toLowerCase()) || '{{ strtolower($tim->ketua->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($tim->lomba->nama ?? '') }}'.includes(search.toLowerCase())"
                                class="hover:bg-gradient-to-r hover:from-brand-mint/20 hover:to-transparent dark:hover:from-zinc-800 dark:hover:to-transparent transition-all duration-300 group border-l-4 border-transparent hover:border-brand-teal">
                                
                                <td class="px-8 py-5">
                                    <div class="flex items-center space-x-3.5">
                                        <button @click="expanded = !expanded" class="p-1.5 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl transition duration-200">
                                            <svg class="w-3.5 h-3.5 transform transition-transform duration-200 text-brand-teal" :class="expanded ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                        <div class="w-11 h-11 bg-brand-mint dark:bg-brand-dark/40 text-brand-dark dark:text-brand-mint rounded-xl flex items-center justify-center font-black text-sm uppercase border border-brand-teal/20 flex-shrink-0">
                                            {{ substr($tim->nama_tim, 0, 2) }}
                                        </div>
                                        <div>
                                            <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-100 leading-snug">{{ $tim->nama_tim }}</span>
                                            <span class="text-[10px] text-brand-black/50 dark:text-zinc-400 font-semibold mt-0.5 block">ID: {{ $tim->id }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Event Lomba -->
                                <td class="px-6 py-5">
                                    <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-200 leading-tight">
                                        {{ $tim->lomba->nama ?? 'Event Lomba Dihapus' }}
                                    </span>
                                    <span class="inline-block mt-1 px-2.5 py-0.5 bg-brand-dark/10 dark:bg-brand-dark/30 text-brand-dark dark:text-brand-mint text-[9px] font-black uppercase rounded-md border border-brand-teal/5">
                                        {{ $tim->lomba->kategori ?? '-' }}
                                    </span>
                                </td>

                                <!-- Ketua Tim -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-mint to-brand-teal text-brand-dark flex items-center justify-center font-black text-sm shadow-inner flex-shrink-0 group-hover:scale-110 transition-transform">
                                            {{ substr($tim->ketua->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-200 leading-none mb-1 group-hover:text-brand-teal transition-colors">{{ $tim->ketua->name }}</span>
                                            <span class="block text-[10px] text-gray-500 dark:text-zinc-400 font-semibold">{{ $tim->ketua->email }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Jumlah Anggota -->
                                <td class="px-6 py-5">
                                    @php
                                        $currentCount = $tim->anggota->count() + 1;
                                        $maxCount = $tim->maks_anggota;
                                        $percentage = ($currentCount / $maxCount) * 100;
                                    @endphp
                                    <div class="w-32">
                                        <div class="flex items-center justify-between text-xs font-semibold text-brand-dark dark:text-brand-mint mb-1">
                                            <span>Progress</span>
                                            <span class="font-bold">{{ $currentCount }} / {{ $maxCount }}</span>
                                        </div>
                                        <div class="w-full bg-gray-100 dark:bg-zinc-800 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-brand-teal h-1.5 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Aksi -->
                                <td class="px-8 py-5 text-right">
                                    <div class="flex items-center justify-end space-x-2.5">
                                        <a href="{{ route('admin.tim.show', $tim) }}" class="p-2 bg-brand-mint/50 dark:bg-zinc-800 text-brand-dark dark:text-brand-teal hover:bg-brand-dark dark:hover:bg-brand-teal hover:text-white dark:hover:text-zinc-900 rounded-xl transition duration-300" title="Tinjau Anggota Tim">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        </a>
                                        <form id="delete-tim-{{ $tim->id }}" action="{{ route('admin.tim.destroy', $tim) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" @click="confirmDelete('delete-tim-{{ $tim->id }}')" class="p-2 bg-rose-50 dark:bg-rose-950/20 hover:bg-rose-600 text-rose-600 dark:text-rose-400 hover:text-white rounded-xl transition duration-300" title="Hapus Tim">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Expanded subrow for member details -->
                            <tr x-show="expanded" x-cloak x-transition class="bg-gray-50/50 dark:bg-zinc-900/50">
                                <td colspan="5" class="px-12 py-4">
                                    <div class="border-l-2 border-brand-teal pl-6 py-2 space-y-3">
                                        <h5 class="text-[10px] font-black uppercase tracking-widest text-brand-dark dark:text-brand-mint">Daftar Anggota Tim</h5>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <!-- Ketua -->
                                            <div class="flex items-center space-x-4 p-4 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm border border-brand-mint dark:border-brand-teal/30 hover:shadow-lg hover:shadow-brand-teal/10 hover:-translate-y-1 transition-all duration-300 group/ketua">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-dark to-brand-teal text-white flex items-center justify-center font-black text-sm flex-shrink-0 shadow-inner group-hover/ketua:rotate-12 transition-transform">
                                                    {{ substr($tim->ketua->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-200 group-hover/ketua:text-brand-teal transition-colors">{{ $tim->ketua->name }}</span>
                                                    <span class="inline-block mt-1 px-2 py-0.5 bg-brand-teal text-white text-[9px] font-black uppercase tracking-widest rounded">Ketua Tim</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Anggota -->
                                            @foreach($tim->anggota as $anggota)
                                                <div class="flex items-center space-x-4 p-4 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm border border-gray-100 dark:border-zinc-700 hover:shadow-lg hover:shadow-brand-teal/5 hover:-translate-y-1 transition-all duration-300 group/anggota">
                                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 dark:from-zinc-700 dark:to-zinc-800 text-gray-600 dark:text-zinc-300 flex items-center justify-center font-black text-sm flex-shrink-0 group-hover/anggota:rotate-12 transition-transform">
                                                        {{ substr($anggota->user->name, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-200 group-hover/anggota:text-brand-teal transition-colors">{{ $anggota->user->name }}</span>
                                                        <span class="inline-block mt-1 px-2 py-0.5 bg-gray-100 dark:bg-zinc-700 text-gray-500 dark:text-zinc-400 text-[9px] font-black uppercase tracking-widest rounded">Anggota</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4 max-w-md mx-auto">
                                        <svg class="w-40 h-40 text-brand-teal/40 dark:text-brand-teal/20" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="100" cy="100" r="80" fill="currentColor" fill-opacity="0.1"/>
                                            <path d="M120 70H80C68.9543 70 60 78.9543 60 90V130C60 141.046 68.9543 150 80 150H120C131.046 150 140 141.046 140 130V90C140 78.9543 131.046 70 120 70Z" stroke="currentColor" stroke-width="3"/>
                                            <path d="M90 70V60C90 54.4772 94.4772 50 100 50C105.523 50 110 54.4772 110 60V70" stroke="currentColor" stroke-width="3"/>
                                            <circle cx="100" cy="110" r="15" stroke="currentColor" stroke-width="3"/>
                                        </svg>
                                        <h4 class="text-lg font-bold text-brand-dark dark:text-zinc-200">Belum Ada Tim Mahasiswa</h4>
                                        <p class="text-sm text-brand-black/60 dark:text-zinc-400">Tim bentukan mahasiswa akan muncul di sini setelah mereka mengajukan pendaftaran event lomba.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Area -->
            @if($tims->hasPages())
                <div class="px-8 py-5 border-t border-gray-100 dark:border-zinc-800 bg-gray-50/50 dark:bg-zinc-900/50">
                    {{ $tims->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
