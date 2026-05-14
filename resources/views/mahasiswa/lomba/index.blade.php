<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Direktori Lomba') }}
        </h2>
    </x-slot>

    <div class="py-8" x-data="{ 
        search: '', 
        kategori: '', 
        tingkat: '', 
        status: '', 
        loading: false,
        fetchLomba() {
            this.loading = true;
            let url = new URL('{{ route('mahasiswa.lomba.index') }}');
            if (this.search) url.searchParams.set('search', this.search);
            if (this.kategori) url.searchParams.set('kategori', this.kategori);
            if (this.tingkat) url.searchParams.set('tingkat', this.tingkat);
            if (this.status) url.searchParams.set('status', this.status);

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
            <!-- Filter Section -->
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="relative">
                        <x-text-input x-model="search" @input.debounce.500ms="fetchLomba()" placeholder="Cari lomba atau penyelenggara..." class="w-full pl-10" />
                        <div class="absolute left-3 top-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>
                    
                    <select x-model="kategori" @change="fetchLomba()" class="rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Semua Kategori</option>
                        <option value="Sains">Sains</option>
                        <option value="Teknologi">Teknologi</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Seni">Seni</option>
                        <option value="Olahraga">Olahraga</option>
                    </select>

                    <select x-model="tingkat" @change="fetchLomba()" class="rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Semua Tingkat</option>
                        <option value="nasional">Nasional</option>
                        <option value="internasional">Internasional</option>
                        <option value="regional">Regional</option>
                    </select>

                    <select x-model="status" @change="fetchLomba()" class="rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="buka">Buka</option>
                        <option value="tutup">Tutup</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>

            <!-- List Section -->
            <div id="lomba-list" class="relative min-h-[400px]">
                <div x-show="loading" class="absolute inset-0 bg-white/50 backdrop-blur-sm z-10 flex items-center justify-center rounded-3xl">
                    <div class="animate-spin rounded-full h-12 w-12 border-4 border-indigo-600 border-t-transparent"></div>
                </div>
                
                @include('mahasiswa.lomba._list', ['lombas' => $lombas])
            </div>
        </div>
    </div>
</x-app-layout>
