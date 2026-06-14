<x-app-layout>

@push('styles')
<style>
    html, body {
        background-color: #0D3B36 !important;
    }
    #page-bg {
        background-color: #0D3B36 !important;
        position: relative;
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- TAB SWITCHER --}}
            <div class="flex items-center gap-3 mb-6">
                <button @click="tab = 'aktif'; fetchLomba()"
                    :class="tab === 'aktif' 
                        ? 'bg-[#0B2B26] text-white shadow-lg shadow-[#0B2B26]/20' 
                        : 'bg-white text-gray-500 border border-gray-200 hover:border-[#0B2B26] hover:text-[#0B2B26]'"
                    class="px-5 py-2.5 rounded-2xl text-sm font-bold transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Lomba Aktif
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black"
                        :class="tab === 'aktif' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500'">
                        {{ $totalAktif }}
                    </span>
                </button>

                <button @click="tab = 'arsip'; fetchLomba()"
                    :class="tab === 'arsip' 
                        ? 'bg-[#0B2B26] text-white shadow-lg shadow-[#0B2B26]/20' 
                        : 'bg-white text-gray-500 border border-gray-200 hover:border-[#0B2B26] hover:text-[#0B2B26]'"
                    class="px-5 py-2.5 rounded-2xl text-sm font-bold transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                    Arsip Lomba
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black"
                        :class="tab === 'arsip' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500'">
                        {{ $totalArsip }}
                    </span>
                </button>
            </div>

            {{-- FILTER SECTION --}}
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Search --}}
                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5 block">Cari Lomba</label>
                        <div class="relative">
                            <input 
                                x-model="search" 
                                @input.debounce.500ms="fetchLomba()" 
                                placeholder="Nama lomba atau penyelenggara..." 
                                class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:border-[#0B2B26] focus:ring-1 focus:ring-[#0B2B26]/30 outline-none transition"
                            >
                            <div class="absolute left-3 top-2.5 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5 block">Kategori</label>
                        <select x-model="kategori" @change="fetchLomba()" 
                            class="w-full py-2.5 px-3 text-sm rounded-xl border border-gray-200 focus:border-[#0B2B26] focus:ring-1 focus:ring-[#0B2B26]/30 outline-none transition">
                            <option value="">Semua Kategori</option>
                            <option value="Sains">Sains</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Seni">Seni</option>
                            <option value="Olahraga">Olahraga</option>
                        </select>
                    </div>

                    {{-- Tingkat --}}
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5 block">Tingkat</label>
                        <select x-model="tingkat" @change="fetchLomba()" 
                            class="w-full py-2.5 px-3 text-sm rounded-xl border border-gray-200 focus:border-[#0B2B26] focus:ring-1 focus:ring-[#0B2B26]/30 outline-none transition">
                            <option value="">Semua Tingkat</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                            <option value="regional">Regional</option>
                        </select>
                    </div>
                </div>

                {{-- Active filter indicator --}}
                <div class="flex items-center gap-2 mt-3" x-show="search || kategori || tingkat" x-cloak>
                    <span class="text-xs text-gray-400">Filter aktif:</span>
                    <template x-if="search">
                        <span class="px-2 py-0.5 bg-[#0B2B26]/10 text-[#0B2B26] text-xs font-bold rounded-lg flex items-center gap-1">
                            <span x-text="'Cari: ' + search"></span>
                            <button @click="search = ''; fetchLomba()" class="hover:text-red-500">×</button>
                        </span>
                    </template>
                    <template x-if="kategori">
                        <span class="px-2 py-0.5 bg-[#0B2B26]/10 text-[#0B2B26] text-xs font-bold rounded-lg flex items-center gap-1">
                            <span x-text="kategori"></span>
                            <button @click="kategori = ''; fetchLomba()" class="hover:text-red-500">×</button>
                        </span>
                    </template>
                    <template x-if="tingkat">
                        <span class="px-2 py-0.5 bg-[#0B2B26]/10 text-[#0B2B26] text-xs font-bold rounded-lg flex items-center gap-1">
                            <span x-text="tingkat"></span>
                            <button @click="tingkat = ''; fetchLomba()" class="hover:text-red-500">×</button>
                        </span>
                    </template>
                    <button @click="search = ''; kategori = ''; tingkat = ''; fetchLomba()" 
                        class="ml-auto text-xs text-red-400 hover:text-red-600 font-bold">
                        Reset semua
                    </button>
                </div>
            </div>

            {{-- LIST SECTION --}}
            <div id="lomba-list" class="relative min-h-[400px]">
                <div x-show="loading" class="absolute inset-0 bg-white/50 backdrop-blur-sm z-10 flex items-center justify-center rounded-3xl">
                    <div class="animate-spin rounded-full h-12 w-12 border-4 border-[#0B2B26] border-t-transparent"></div>
                </div>

                @include('mahasiswa.lomba._list', ['lombas' => $lombas, 'tab' => request('tab', 'aktif')])
            </div>
        </div>
    </div>
</x-app-layout>
