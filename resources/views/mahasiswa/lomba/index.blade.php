<x-app-layout>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    html, body, #page-bg {
        background-color: #16534C !important; /* Sedikit lebih terang dari #0D3B36 */
        position: relative;
    }
    .glass-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .custom-input {
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        color: #00524D;
    }
    .custom-input:focus {
        border-color: #48A89A;
        box-shadow: 0 0 0 2px rgba(72, 168, 154, 0.2);
    }
</style>
@endpush

    <div class="py-8 min-h-screen" x-data="{ 
        tab: '{{ request('tab', 'aktif') }}',
        search: '{{ request('search', '') }}', 
        kategori: '{{ request('kategori', '') }}', 
        tingkat: '{{ request('tingkat', '') }}', 
        loading: false,
        fetchLomba() {
            this.loading = true;
            let url = new URL('{{ route('mahasiswa.lomba.index') }}');
            url.searchParams.set('tab', this.tab);
            if (this.search) url.searchParams.set('search', this.search);
            if (this.kategori) url.searchParams.set('kategori', this.kategori);
            if (this.tingkat) url.searchParams.set('tingkat', this.tingkat);

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('lomba-list').innerHTML = html;
                this.loading = false;
            });
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- HEADER TITLE --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-2">
                <div>
                    <h2 class="text-3xl font-extrabold text-white">Direktori Lomba</h2>
                    <p class="text-white/80 text-sm mt-1">Temukan dan ikuti kompetisi terbaik untuk mengembangkan potensimu.</p>
                </div>
            </div>

            {{-- TAB SWITCHER --}}
            <div class="flex items-center gap-3">
                <button @click="tab = 'aktif'; fetchLomba()"
                    :class="tab === 'aktif' 
                        ? 'bg-[#48A89A] text-white shadow-lg shadow-[#48A89A]/30 border-transparent' 
                        : 'bg-white/10 text-white border border-white/20 hover:bg-white/20'"
                    class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 flex items-center gap-2 backdrop-blur-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Lomba Aktif
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black"
                        :class="tab === 'aktif' ? 'bg-white/20 text-white' : 'bg-white/20 text-white'">
                        {{ $totalAktif }}
                    </span>
                </button>

                <button @click="tab = 'arsip'; fetchLomba()"
                    :class="tab === 'arsip' 
                        ? 'bg-[#48A89A] text-white shadow-lg shadow-[#48A89A]/30 border-transparent' 
                        : 'bg-white/10 text-white border border-white/20 hover:bg-white/20'"
                    class="px-6 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 flex items-center gap-2 backdrop-blur-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                    Arsip Lomba
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black"
                        :class="tab === 'arsip' ? 'bg-white/20 text-white' : 'bg-white/20 text-white'">
                        {{ $totalArsip }}
                    </span>
                </button>
            </div>

            {{-- FILTER SECTION --}}
            <div class="glass-card p-6">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
                    {{-- Search --}}
                    <div class="md:col-span-6 relative">
                        <label class="text-[11px] font-bold text-[#00524D] uppercase tracking-wider mb-2 block">Cari Lomba</label>
                        <div class="relative">
                            <input 
                                x-model="search" 
                                @input.debounce.500ms="fetchLomba()" 
                                placeholder="Nama lomba atau penyelenggara..." 
                                class="custom-input w-full pl-11 pr-4 py-3 text-sm rounded-xl outline-none transition"
                            >
                            <div class="absolute left-3.5 top-3.5 text-[#48A89A]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="md:col-span-3">
                        <label class="text-[11px] font-bold text-[#00524D] uppercase tracking-wider mb-2 block">Kategori</label>
                        <select x-model="kategori" @change="fetchLomba()" 
                            class="custom-input w-full py-3 px-4 text-sm rounded-xl outline-none transition font-medium">
                            <option value="">Semua Kategori</option>
                            <option value="Sains">Sains</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Seni">Seni</option>
                            <option value="Olahraga">Olahraga</option>
                        </select>
                    </div>

                    {{-- Tingkat --}}
                    <div class="md:col-span-3">
                        <label class="text-[11px] font-bold text-[#00524D] uppercase tracking-wider mb-2 block">Tingkat</label>
                        <select x-model="tingkat" @change="fetchLomba()" 
                            class="custom-input w-full py-3 px-4 text-sm rounded-xl outline-none transition font-medium">
                            <option value="">Semua Tingkat</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                            <option value="regional">Regional</option>
                        </select>
                    </div>
                </div>

                {{-- Active filter indicator --}}
                <div class="flex flex-wrap items-center gap-2 mt-4" x-show="search || kategori || tingkat" x-cloak>
                    <span class="text-xs font-bold text-gray-400">Filter aktif:</span>
                    <template x-if="search">
                        <span class="px-3 py-1 bg-[#CBEFEB]/50 text-[#00524D] text-[11px] font-bold rounded-lg flex items-center gap-2">
                            <span x-text="'Cari: ' + search"></span>
                            <button @click="search = ''; fetchLomba()" class="hover:text-red-500 rounded-full bg-white/50 w-4 h-4 flex items-center justify-center">×</button>
                        </span>
                    </template>
                    <template x-if="kategori">
                        <span class="px-3 py-1 bg-[#CBEFEB]/50 text-[#00524D] text-[11px] font-bold rounded-lg flex items-center gap-2">
                            <span x-text="kategori"></span>
                            <button @click="kategori = ''; fetchLomba()" class="hover:text-red-500 rounded-full bg-white/50 w-4 h-4 flex items-center justify-center">×</button>
                        </span>
                    </template>
                    <template x-if="tingkat">
                        <span class="px-3 py-1 bg-[#CBEFEB]/50 text-[#00524D] text-[11px] font-bold rounded-lg flex items-center gap-2">
                            <span x-text="tingkat"></span>
                            <button @click="tingkat = ''; fetchLomba()" class="hover:text-red-500 rounded-full bg-white/50 w-4 h-4 flex items-center justify-center">×</button>
                        </span>
                    </template>
                    <button @click="search = ''; kategori = ''; tingkat = ''; fetchLomba()" 
                        class="ml-auto text-xs text-rose-500 hover:text-rose-700 font-bold transition-colors">
                        Reset semua
                    </button>
                </div>
            </div>

            {{-- LIST SECTION --}}
            <div id="lomba-list" class="relative min-h-[400px]">
                <div x-show="loading" class="absolute inset-0 bg-[#16534C]/50 backdrop-blur-sm z-10 flex items-center justify-center rounded-3xl transition-opacity duration-300">
                    <div class="animate-spin rounded-full h-14 w-14 border-4 border-white/20 border-t-[#48A89A] shadow-lg"></div>
                </div>

                @include('mahasiswa.lomba._list', ['lombas' => $lombas, 'tab' => request('tab', 'aktif')])
            </div>
        </div>
    </div>
</x-app-layout>
