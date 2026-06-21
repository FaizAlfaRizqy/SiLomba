<x-admin-layout>
    <x-slot name="pageTitle">Manajemen Lomba</x-slot>

    <div x-data="{
        search: '',
        filterKategori: 'semua',
        filterStatus: 'semua',
        // Quick view state
        quickView: {
            show: false,
            nama: '',
            penyelenggara: '',
            kategori: '',
            tingkat: '',
            deadline: '',
            hadiah: '',
            syarat: '',
            deskripsi: '',
            link: '',
            posterUrl: ''
        },
        openQuickView(lomba) {
            this.quickView.nama = lomba.nama;
            this.quickView.penyelenggara = lomba.penyelenggara;
            this.quickView.kategori = lomba.kategori;
            this.quickView.tingkat = lomba.tingkat;
            this.quickView.deadline = lomba.deadline_formatted;
            this.quickView.hadiah = lomba.hadiah || 'Tidak disebutkan';
            this.quickView.syarat = lomba.syarat_peserta || 'Tidak ada persyaratan khusus.';
            this.quickView.deskripsi = lomba.deskripsi || 'Tidak ada deskripsi.';
            this.quickView.link = lomba.link_resmi;
            this.quickView.posterUrl = lomba.poster ? '{{ asset('storage') }}/' + lomba.poster : '';
            this.quickView.show = true;
        },
        confirmDelete(formId) {
            this.confirmModal.trigger(
                'Hapus Lomba?',
                'Tindakan ini tidak dapat dibatalkan. Semua data terkait perlombaan ini akan dihapus secara permanen.',
                () => { document.getElementById(formId).submit(); }
            );
        }
    }" class="space-y-8 animate-fade-in">

        <!-- Header Summary Cards with Count Animation -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div x-data="{ count: 0, target: {{ $lombas->total() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-brand-dark to-brand-teal p-6 rounded-[2rem] border border-brand-teal/20 shadow-lg shadow-brand-teal/10 flex items-center justify-between overflow-hidden hover:scale-[1.02] transition-transform duration-300">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-black text-brand-mint/80 uppercase tracking-widest leading-none">Total Event Lomba</span>
                    <span class="block text-4xl font-black text-white mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-white/10 text-brand-mint rounded-2xl backdrop-blur-sm border border-white/10 group-hover:rotate-6 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
            </div>

            <div x-data="{ count: 0, target: {{ $lombas->where('status', 'buka')->count() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-emerald-500/10 hover:-translate-y-1 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-emerald-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">Lomba Buka</span>
                    <span class="block text-4xl font-black text-emerald-600 dark:text-emerald-400 mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl group-hover:scale-110 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>

            <div x-data="{ count: 0, target: {{ $lombas->where('status', 'tutup')->count() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-rose-500/10 hover:-translate-y-1 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-rose-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">Lomba Ditutup</span>
                    <span class="block text-4xl font-black text-rose-600 dark:text-rose-400 mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-2xl group-hover:scale-110 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>
        </div>

        <!-- Top Action Bar with Real-Time Controls -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 bg-white dark:bg-zinc-900 p-6 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm theme-transition">
            <div>
                <h2 class="text-xl font-bold text-brand-dark dark:text-zinc-100">Daftar Event Lomba</h2>
                <p class="text-xs text-brand-black/60 dark:text-zinc-400 mt-1">Kelola, sunting, dan pantau status event lomba mahasiswa.</p>
            </div>
            
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search Box -->
                <div class="relative w-full sm:w-60">
                    <input type="text" x-model="search" placeholder="Cari nama / panitia..." 
                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- Kategori Filter -->
                <select x-model="filterKategori" 
                        class="px-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <option value="semua">Semua Kategori</option>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Seni">Seni</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

                <!-- Status Filter -->
                <select x-model="filterStatus" 
                        class="px-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <option value="semua">Semua Status</option>
                    <option value="buka">Aktif / Buka</option>
                    <option value="tutup">Ditutup</option>
                </select>

                <a href="{{ route('admin.lomba.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-brand-dark via-brand-teal to-brand-dark bg-[length:200%_auto] hover:bg-right text-white font-bold rounded-xl text-xs transition-all duration-500 shadow-md hover:shadow-lg hover:shadow-brand-teal/40 hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    Tambah Lomba
                </a>
            </div>
        </div>

        <!-- Table Section with Glassmorphism Header -->
        <div class="bg-white dark:bg-zinc-900 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm overflow-hidden theme-transition">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-brand-mint/30 dark:bg-zinc-800/40 border-b border-brand-teal/10 dark:border-zinc-800 text-[10px] font-bold text-brand-dark dark:text-brand-mint uppercase tracking-widest">
                            <th class="px-8 py-5">Detail Lomba</th>
                            <th class="px-6 py-5">Kategori & Tingkat</th>
                            <th class="px-6 py-5">Batas Pendaftaran</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($lombas as $lomba)
                            @php
                                $lombaData = [
                                    'id' => $lomba->id,
                                    'nama' => $lomba->nama,
                                    'penyelenggara' => $lomba->penyelenggara,
                                    'kategori' => $lomba->kategori,
                                    'tingkat' => $lomba->tingkat,
                                    'deadline_formatted' => $lomba->deadline->format('d M Y'),
                                    'hadiah' => $lomba->hadiah,
                                    'syarat_peserta' => $lomba->syarat_peserta,
                                    'deskripsi' => $lomba->deskripsi,
                                    'link_resmi' => $lomba->link_resmi,
                                    'poster' => $lomba->poster
                                ];
                            @endphp
                            <tr x-show="(search === '' || '{{ strtolower($lomba->nama) }}'.includes(search.toLowerCase()) || '{{ strtolower($lomba->penyelenggara) }}'.includes(search.toLowerCase())) && (filterKategori === 'semua' || '{{ $lomba->kategori }}' === filterKategori) && (filterStatus === 'semua' || '{{ $lomba->status }}' === filterStatus)"
                                class="hover:bg-gradient-to-r hover:from-brand-mint/30 hover:to-transparent dark:hover:from-zinc-800/80 dark:hover:to-transparent transition-all duration-300 group cursor-pointer border-l-4 border-transparent hover:border-brand-teal">
                                
                                <!-- Detail Lomba (Poster + Title) -->
                                <td class="px-8 py-5" @click="openQuickView({{ json_encode($lombaData) }})">
                                    <div class="flex items-center space-x-4">
                                        @if($lomba->poster)
                                            <div class="overflow-hidden rounded-xl border border-gray-100 dark:border-zinc-700 w-14 h-14 flex-shrink-0 bg-gray-100 dark:bg-zinc-800">
                                                <img src="{{ asset('storage/' . $lomba->poster) }}" alt="Poster" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            </div>
                                        @else
                                            <div class="w-14 h-14 rounded-xl bg-brand-mint/30 dark:bg-brand-dark/40 text-brand-dark dark:text-brand-mint flex flex-col items-center justify-center font-bold border border-brand-teal/20 flex-shrink-0">
                                                <span class="text-[8px] uppercase font-black">No Poster</span>
                                            </div>
                                        @endif
                                        <div>
                                            <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-100 leading-snug group-hover:text-brand-teal transition-colors">{{ $lomba->nama }}</span>
                                            <span class="text-[10px] font-bold text-brand-black/50 dark:text-zinc-400 mt-1 block uppercase tracking-wider">{{ $lomba->penyelenggara }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Kategori & Tingkat -->
                                <td class="px-6 py-5" @click="openQuickView({{ json_encode($lombaData) }})">
                                    <div class="flex flex-col space-y-1.5 items-start">
                                        @php
                                            $kategoriColor = match(strtolower($lomba->kategori)) {
                                                'teknologi' => 'bg-blue-100 text-blue-700 border-blue-200 dark:bg-blue-900/30 dark:text-blue-400 dark:border-blue-800',
                                                'seni' => 'bg-purple-100 text-purple-700 border-purple-200 dark:bg-purple-900/30 dark:text-purple-400 dark:border-purple-800',
                                                'olahraga' => 'bg-orange-100 text-orange-700 border-orange-200 dark:bg-orange-900/30 dark:text-orange-400 dark:border-orange-800',
                                                'bisnis' => 'bg-emerald-100 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800',
                                                default => 'bg-gray-100 text-gray-700 border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700',
                                            };
                                            $tingkatColor = match(strtolower($lomba->tingkat)) {
                                                'internasional' => 'text-amber-600 dark:text-amber-400',
                                                'nasional' => 'text-emerald-600 dark:text-emerald-400',
                                                default => 'text-brand-teal dark:text-brand-mint',
                                            };
                                        @endphp
                                        <span class="inline-flex px-2.5 py-1 text-[9px] font-black rounded-lg uppercase tracking-wider border {{ $kategoriColor }}">
                                            {{ $lomba->kategori }}
                                        </span>
                                        <span class="text-[10px] capitalize font-black {{ $tingkatColor }} flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $lomba->tingkat }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Batas Pendaftaran -->
                                <td class="px-6 py-5" @click="openQuickView({{ json_encode($lombaData) }})">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-black text-brand-dark dark:text-zinc-200">
                                            {{ $lomba->deadline->format('d M Y') }}
                                        </span>
                                        <span class="text-[10px] font-bold mt-1 {{ $lomba->deadline->isPast() ? 'text-rose-500' : 'text-emerald-500' }}">
                                            {{ $lomba->deadline->isPast() ? 'Telah Berlalu (' . $lomba->deadline->diffForHumans() . ')' : 'Menunggu (' . intval($lomba->deadline->diffInDays()) . ' hari lagi)' }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-5" @click="openQuickView({{ json_encode($lombaData) }})">
                                    @if($lomba->status == 'buka')
                                        <span class="inline-flex items-center px-3 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-black uppercase tracking-wider rounded-full border border-emerald-200 dark:border-emerald-800/50 shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                                            Aktif / Buka
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 bg-rose-50 dark:bg-rose-900/20 text-rose-600 dark:text-rose-400 text-[10px] font-black uppercase tracking-wider rounded-full border border-rose-200 dark:border-rose-800/50 shadow-[0_0_10px_rgba(244,63,94,0.1)]">
                                            <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mr-2"></span>
                                            Ditutup
                                        </span>
                                    @endif
                                </td>

                                <td class="px-8 py-5 text-right relative z-20">
                                    <div class="flex items-center justify-end space-x-2.5">
                                        <!-- Toggle Status -->
                                        <form action="{{ route('admin.lomba.toggle-status', $lomba) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" 
                                                    title="{{ $lomba->status === 'buka' ? 'Tutup Lomba' : 'Buka Lomba' }}"
                                                    class="p-2 rounded-xl transition duration-300 shadow-sm
                                                        {{ $lomba->status === 'buka' 
                                                            ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white' 
                                                            : 'bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white' }}">
                                                @if($lomba->status === 'buka')
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                @else
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                @endif
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.lomba.edit', $lomba) }}" class="p-2 bg-gray-50 dark:bg-zinc-800 text-gray-500 hover:bg-brand-teal hover:text-white dark:hover:text-zinc-900 rounded-xl transition duration-300 shadow-sm" title="Edit Lomba">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        </a>
                                        <form id="delete-form-{{ $lomba->id }}" action="{{ route('admin.lomba.destroy', $lomba) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" @click="confirmDelete('delete-form-{{ $lomba->id }}')" class="p-2 bg-rose-50 dark:bg-rose-950/20 hover:bg-rose-600 text-rose-600 dark:text-rose-400 hover:text-white rounded-xl transition duration-300" title="Hapus Lomba">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- Beautiful SVG empty state illustration -->
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4 max-w-md mx-auto">
                                        <svg class="w-40 h-40 text-brand-teal/40 dark:text-brand-teal/20" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="100" cy="100" r="80" fill="currentColor" fill-opacity="0.1"/>
                                            <rect x="75" y="60" width="50" height="70" rx="8" stroke="currentColor" stroke-width="3" stroke-dasharray="6 6"/>
                                            <path d="M60 140 H140" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                            <path d="M100 85 V115 M85 100 H115" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                        </svg>
                                        <h4 class="text-lg font-bold text-brand-dark dark:text-zinc-200">Belum Ada Event Lomba</h4>
                                        <p class="text-sm text-brand-black/60 dark:text-zinc-400">Mulailah dengan menambahkan agenda lomba pertama Anda untuk membuka registrasi tim mahasiswa.</p>
                                        <a href="{{ route('admin.lomba.create') }}" class="px-6 py-2.5 bg-brand-dark dark:bg-brand-teal text-white dark:text-zinc-900 font-bold rounded-xl text-xs uppercase tracking-widest transition duration-300 shadow-md">
                                            Buat Lomba Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Area -->
            @if($lombas->hasPages())
                <div class="px-8 py-5 border-t border-gray-100 dark:border-zinc-800 bg-gray-50/50 dark:bg-zinc-900/50">
                    {{ $lombas->links() }}
                </div>
            @endif
        </div>

        <!-- Quick View Lomba Modal -->
        <div x-show="quickView.show" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/65 backdrop-blur-sm" x-cloak>
            <div x-show="quickView.show" 
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative max-w-2xl w-full bg-white dark:bg-zinc-900 border border-gray-150/10 dark:border-zinc-800 rounded-[2.5rem] shadow-2xl p-8 overflow-y-auto max-h-[90vh]"
                 @click.outside="quickView.show = false">
                
                <button @click="quickView.show = false" class="absolute top-6 right-6 p-2 bg-gray-100 dark:bg-zinc-800 text-gray-500 dark:text-zinc-300 rounded-full hover:bg-gray-200 dark:hover:bg-zinc-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>

                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Poster Preview -->
                    <div class="w-full md:w-1/3 flex-shrink-0">
                        <div class="w-full h-64 rounded-2xl bg-brand-mint/40 dark:bg-brand-dark/30 flex items-center justify-center overflow-hidden border border-brand-teal/15">
                            <template x-if="quickView.posterUrl">
                                <img :src="quickView.posterUrl" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!quickView.posterUrl">
                                <div class="text-center text-brand-dark dark:text-brand-mint font-black uppercase text-[10px] tracking-widest">
                                    [ Poster Lomba ]
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="flex-1 space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 bg-brand-dark text-white text-[9px] font-black uppercase rounded" x-text="quickView.kategori"></span>
                            <span class="px-2.5 py-1 bg-brand-mint dark:bg-brand-dark/40 text-brand-dark dark:text-brand-mint text-[9px] font-black uppercase rounded capitalize" x-text="'Tingkat ' + quickView.tingkat"></span>
                        </div>

                        <h3 class="text-xl font-extrabold text-brand-dark dark:text-white" x-text="quickView.nama"></h3>
                        <p class="text-xs font-semibold text-brand-teal uppercase tracking-widest leading-none" x-text="quickView.penyelenggara"></p>

                        <div class="grid grid-cols-2 gap-4 py-3 border-y border-gray-100 dark:border-zinc-800">
                            <div>
                                <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider">Batas Pendaftaran</span>
                                <span class="block text-xs font-bold text-rose-600 mt-1" x-text="quickView.deadline"></span>
                            </div>
                            <div>
                                <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider">Hadiah Lomba</span>
                                <span class="block text-xs font-bold text-brand-dark dark:text-brand-mint mt-1" x-text="quickView.hadiah"></span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div>
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider">Syarat Peserta</span>
                                <p class="text-xs text-brand-black/80 dark:text-zinc-300 mt-1 whitespace-pre-line leading-relaxed" x-text="quickView.syarat"></p>
                            </div>
                            <div>
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider">Deskripsi</span>
                                <p class="text-xs text-brand-black/80 dark:text-zinc-300 mt-1 whitespace-pre-line leading-relaxed" x-text="quickView.deskripsi"></p>
                            </div>
                        </div>

                        <div class="pt-4 flex justify-between gap-3">
                            <a :href="quickView.link" target="_blank" class="flex-1 py-2.5 bg-brand-teal hover:bg-brand-mint text-brand-dark font-extrabold rounded-xl text-center text-xs transition duration-200">
                                Buka Guidebook / Website &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
