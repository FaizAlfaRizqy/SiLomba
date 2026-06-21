<x-admin-layout>
    <x-slot name="pageTitle">Tambah Lomba Baru</x-slot>

    <!-- Top Action Bar & Step Status -->
    <div x-data="{ 
            step: 1, 
            posterPreview: null,
            loading: false,
            nama: '',
            penyelenggara: '',
            hadiah: '',
            link_resmi: '',
            syarat: '',
            deskripsi: '',
            kategori: 'Teknologi',
            kategori_kustom: '',
            tingkat: 'nasional',
            tanggal_buka: '',
            deadline: '',
            dragover: false,
            
            get completionProgress() {
                let score = 0;
                if (this.nama) score += 15;
                if (this.penyelenggara) score += 15;
                if (this.hadiah) score += 10;
                if (this.link_resmi) score += 15;
                if (this.syarat) score += 15;
                if (this.deskripsi) score += 20;
                if (this.posterPreview) score += 10;
                return score;
            }
         }"
         class="space-y-8 animate-fade-in">
        
        <!-- Hero Section Form & Progress Bar -->
        <div class="bg-gradient-to-r from-brand-dark to-brand-teal text-white p-8 rounded-[2.5rem] border border-brand-teal/20 shadow-xl relative overflow-hidden">
            <div class="absolute right-0 bottom-0 top-0 w-1/3 bg-gradient-to-l from-white/5 to-transparent pointer-events-none"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-extrabold">Buat Event Lomba Baru</h2>
                    <p class="text-sm text-brand-mint/80 mt-1 max-w-xl">Lengkapi detail agenda perlombaan. Progres pengisian form Anda dipantau secara langsung di bawah ini.</p>
                </div>
                
                <!-- Progress completion -->
                <div class="w-48 bg-white/10 p-4 rounded-2xl border border-white/10 text-right">
                    <span class="block text-[10px] uppercase font-bold tracking-widest text-brand-mint">Kelengkapan Form</span>
                    <span class="block text-2xl font-extrabold mt-1" x-text="completionProgress + '%'">0%</span>
                    <div class="w-full bg-white/10 h-1.5 rounded-full mt-2 overflow-hidden">
                        <div class="bg-brand-mint h-1.5 rounded-full transition-all duration-500" :style="'width: ' + completionProgress + '%'"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step Indicator Grid -->
        <div class="grid grid-cols-2 gap-4">
            <button @click="step = 1" 
                    :class="step === 1 ? 'bg-brand-mint text-brand-dark font-extrabold border-brand-teal' : 'bg-white dark:bg-zinc-900 text-gray-500 dark:text-zinc-400 border-gray-100 dark:border-zinc-800'"
                    class="p-4 rounded-2xl border text-center transition-all duration-300 shadow-sm flex items-center justify-center gap-3">
                <span class="w-6 h-6 rounded-full bg-brand-dark text-white flex items-center justify-center text-xs font-bold">1</span>
                Informasi Utama
            </button>
            <button @click="step = 2" 
                    :class="step === 2 ? 'bg-brand-mint text-brand-dark font-extrabold border-brand-teal' : 'bg-white dark:bg-zinc-900 text-gray-500 dark:text-zinc-400 border-gray-100 dark:border-zinc-800'"
                    class="p-4 rounded-2xl border text-center transition-all duration-300 shadow-sm flex items-center justify-center gap-3">
                <span class="w-6 h-6 rounded-full bg-brand-dark text-white flex items-center justify-center text-xs font-bold">2</span>
                Persyaratan & Poster
            </button>
        </div>

        <form action="{{ route('admin.lomba.store') }}" method="POST" enctype="multipart/form-data" 
              @submit="loading = true" 
              class="grid grid-cols-1 lg:grid-cols-3 gap-8" novalidate>
            @csrf

            <!-- Left Form Fields (Span 2) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Step 1: Informasi Utama -->
                <div x-show="step === 1" class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-6 theme-transition">
                    <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100 border-b border-gray-100 dark:border-zinc-800 pb-4">Langkah 1: Detail Agenda Lomba</h3>
                    
                    <!-- Nama Lomba -->
                    <div class="relative">
                        <label for="nama" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Nama Lomba</label>
                        <div class="relative">
                            <input id="nama" name="nama" type="text" x-model="nama" required placeholder="Contoh: Hackathon Nasional SiLomba 2026"
                                   class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </div>
                        @error('nama') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Penyelenggara -->
                    <div>
                        <label for="penyelenggara" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Penyelenggara</label>
                        <div class="relative">
                            <input id="penyelenggara" name="penyelenggara" type="text" x-model="penyelenggara" required placeholder="Himpunan Mahasiswa / Instansi"
                                   class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        @error('penyelenggara') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal Buka -->
                        <div>
                            <label for="tanggal_buka" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Tanggal Buka Pendaftaran</label>
                            <div class="relative">
                                <input id="tanggal_buka" name="tanggal_buka" type="date" x-model="tanggal_buka" required
                                       class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            @error('tanggal_buka') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Tingkat -->
                        <div>
                            <label for="tingkat" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Tingkat Perlombaan</label>
                            <select id="tingkat" name="tingkat" x-model="tingkat" class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                                <option value="regional">Regional</option>
                                <option value="nasional">Nasional</option>
                                <option value="internasional">Internasional</option>
                            </select>
                            @error('tingkat') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal Buka -->
                        <div>
                            <label for="tanggal_buka" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Tanggal Buka Pendaftaran</label>
                            <div class="relative">
                                <input id="tanggal_buka" name="tanggal_buka" type="date" x-model="tanggal_buka" required
                                       class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            @error('tanggal_buka') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label for="deadline" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Batas Pendaftaran</label>
                            <div class="relative">
                                <input id="deadline" name="deadline" type="date" x-model="deadline" required
                                       class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            @error('deadline') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kategori -->
                        <div>
                            <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Kategori Lomba</label>
                            <select id="kategori" name="kategori" x-model="kategori" class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                                <option value="Teknologi">Teknologi</option>
                                <option value="Seni">Seni</option>
                                <option value="Olahraga">Olahraga</option>
                                <option value="Bisnis">Bisnis</option>
                                <option value="Lainnya">Lainnya (Tulis Manual)</option>
                            </select>
                            @error('kategori') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Kategori Kustom -->
                        <div x-show="kategori === 'Lainnya'" x-cloak>
                            <label for="kategori_kustom" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Tulis Kategori Baru</label>
                            <div class="relative">
                                <input id="kategori_kustom" name="kategori_kustom" type="text" x-model="kategori_kustom" :required="kategori === 'Lainnya'" placeholder="Misal: Fotografi"
                                       class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            @error('kategori_kustom') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Hadiah -->
                    <div>
                        <label for="hadiah" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Hadiah Lomba</label>
                        <div class="relative">
                            <input id="hadiah" name="hadiah" type="text" x-model="hadiah" placeholder="Contoh: Total Rp 25.000.000 + Sertifikat"
                                   class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M12 16c1.22 0 2.22-.006 3-.079M12 16h-.01" /></svg>
                        </div>
                        @error('hadiah') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Link Resmi -->
                    <div>
                        <label for="link_resmi" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Link Resmi Informasi / Guidebook</label>
                        <div class="relative">
                            <input id="link_resmi" name="link_resmi" type="url" x-model="link_resmi" required placeholder="https://domain.com/guidebook"
                                   class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                        </div>
                        @error('link_resmi') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="pt-4 flex justify-end">
                        <button type="button" @click="step = 2" class="px-6 py-3 bg-brand-dark dark:bg-brand-teal text-white dark:text-zinc-900 font-bold rounded-2xl text-xs uppercase tracking-widest transition duration-300 shadow-md">
                            Lanjut Langkah 2
                        </button>
                    </div>
                </div>

                <!-- Step 2: Persyaratan & Poster -->
                <div x-show="step === 2" class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-6 theme-transition" x-cloak>
                    <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100 border-b border-gray-100 dark:border-zinc-800 pb-4">Langkah 2: Deskripsi & Gambar</h3>
                    
                    <!-- Syarat Peserta -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="syarat_peserta" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal">Syarat Peserta</label>
                            <span class="text-[10px] text-gray-400" x-text="syarat.length + ' karakter'"></span>
                        </div>
                        <textarea id="syarat_peserta" name="syarat_peserta" rows="3" x-model="syarat"
                                  @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                                  placeholder="Contoh: Mahasiswa aktif Diploma/Sarjana seluruh Indonesia..."
                                  class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white resize-none overflow-hidden"></textarea>
                        @error('syarat_peserta') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal">Deskripsi Lengkap Lomba</label>
                            <span class="text-[10px] text-gray-400" x-text="deskripsi.length + ' karakter'"></span>
                        </div>
                        <textarea id="deskripsi" name="deskripsi" rows="6" x-model="deskripsi"
                                  @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                                  placeholder="Jelaskan mengenai detail event, alur perlombaan, dan informasi penting lainnya..."
                                  class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white resize-none overflow-hidden"></textarea>
                        @error('deskripsi') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Poster Upload -->
                    <div class="flex flex-col items-center">
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2 self-start">Unggah Poster Lomba</label>
                        <div class="relative border-2 border-dashed rounded-2xl p-6 transition-all duration-300 flex flex-col items-center justify-center aspect-[3/4] w-full max-w-[300px] mx-auto"
                             :class="dragover ? 'border-brand-teal bg-brand-mint/20 dark:bg-brand-dark/20 scale-[1.01]' : 'border-brand-teal/20 bg-gray-50/50 dark:bg-zinc-800/40'"
                             @dragover.prevent="dragover = true"
                             @dragleave.prevent="dragover = false"
                             @drop.prevent="
                                 dragover = false;
                                 const file = $event.dataTransfer.files[0];
                                 if (file) {
                                     const reader = new FileReader();
                                     reader.onload = (e) => { posterPreview = e.target.result; };
                                     reader.readAsDataURL(file);
                                     $refs.fileInput.files = $event.dataTransfer.files;
                                 }
                             ">
                            
                            <template x-if="posterPreview">
                                <div class="absolute inset-0 w-full h-full p-2 bg-white dark:bg-zinc-900 rounded-2xl">
                                    <img :src="posterPreview" class="w-full h-full object-cover rounded-xl" alt="Preview">
                                </div>
                            </template>
                            
                            <div class="text-center flex flex-col items-center justify-center space-y-2" x-show="!posterPreview">
                                <div class="w-10 h-10 rounded-xl bg-brand-mint dark:bg-brand-dark/50 flex items-center justify-center text-brand-dark dark:text-brand-mint">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <span class="text-xs font-bold text-brand-dark dark:text-zinc-200">Seret File Gambar atau Cari</span>
                                <span class="text-[9px] text-gray-400">File PNG, JPG Maks. 2MB</span>
                            </div>

                            <input type="file" id="poster" name="poster" x-ref="fileInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                   @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { posterPreview = e.target.result; }; reader.readAsDataURL(file); }">
                        </div>
                        @error('poster') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4 flex justify-between">
                        <button type="button" @click="step = 1" class="px-6 py-3 bg-gray-100 dark:bg-zinc-800 hover:bg-gray-200 text-brand-dark dark:text-zinc-200 font-bold rounded-2xl text-xs uppercase tracking-widest transition duration-300">
                            Kembali Langkah 1
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column: Live Card Preview & Form Submission (Span 1) -->
            <div class="space-y-6">
                <!-- Premium Live Preview Widget -->
                <div class="bg-white dark:bg-zinc-900 p-6 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm theme-transition">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-brand-teal mb-4">Live Preview Lomba</h3>
                    
                    <div class="border border-brand-teal/20 rounded-3xl overflow-hidden bg-gray-50/50 dark:bg-zinc-900/60 p-4 space-y-4">
                        <!-- Poster Preview Area -->
                        <div class="relative w-full aspect-[3/4] rounded-2xl bg-brand-mint/40 dark:bg-brand-dark/30 flex items-center justify-center overflow-hidden border border-brand-teal/10">
                            <template x-if="posterPreview">
                                <img :src="posterPreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!posterPreview">
                                <div class="text-center text-brand-dark dark:text-brand-mint font-bold uppercase tracking-widest text-xs">
                                    [ Poster Lomba ]
                                </div>
                            </template>
                        </div>
                        
                        <!-- Content Preview -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="px-2 py-0.5 bg-brand-dark text-white text-[9px] font-extrabold uppercase rounded" x-text="(kategori === 'Lainnya' ? kategori_kustom : kategori) || 'Kategori'">Kategori</span>
                                <span class="text-[9px] font-bold text-brand-teal uppercase" x-text="'Tingkat ' + tingkat">Tingkat</span>
                            </div>
                            
                            <h4 class="text-sm font-extrabold text-brand-dark dark:text-zinc-100 line-clamp-1" x-text="nama ? nama : 'Nama Lomba Baru'"></h4>
                            <span class="block text-[11px] text-gray-500" x-text="penyelenggara ? penyelenggara : 'Penyelenggara'"></span>
                            
                            <div class="pt-2 border-t border-brand-teal/5 flex justify-between items-center text-[10px]">
                                <span class="font-bold text-rose-600" x-text="deadline ? 'Hingga: ' + deadline : 'Batas pendaftaran belum diatur'"></span>
                                <span class="font-bold text-brand-dark dark:text-brand-mint" x-text="hadiah ? hadiah : 'Hadiah'"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit / Cancel Controls -->
                <div class="bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-3 theme-transition">
                    <button type="submit" :disabled="loading" 
                            class="w-full py-3.5 bg-brand-dark dark:bg-brand-teal text-white dark:text-zinc-900 hover:bg-brand-teal dark:hover:bg-brand-mint font-bold rounded-2xl text-sm transition-all duration-300 shadow-lg flex items-center justify-center gap-2">
                        <template x-if="loading">
                            <svg class="animate-spin h-5 w-5 text-current" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </template>
                        <span x-text="loading ? 'Menyimpan...' : 'Simpan Lomba'">Simpan Lomba</span>
                    </button>
                    <a href="{{ route('admin.lomba.index') }}" class="block w-full py-3.5 bg-gray-100 dark:bg-zinc-800 hover:bg-gray-200 dark:hover:bg-zinc-700 text-brand-dark dark:text-zinc-200 font-bold rounded-2xl text-sm text-center transition-all duration-300">
                        Batal
                    </a>
                </div>
            </div>
        </form>

    </div>
</x-admin-layout>
