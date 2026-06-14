<x-admin-layout>
    <x-slot name="pageTitle">Edit Lomba</x-slot>

    <!-- Form State -->
    <div x-data="{ 
            posterPreview: '{{ $lomba->poster ? asset('storage/' . $lomba->poster) : null }}',
            loading: false,
            nama: '{{ addslashes($lomba->nama) }}',
            penyelenggara: '{{ addslashes($lomba->penyelenggara) }}',
            hadiah: '{{ addslashes($lomba->hadiah) }}',
            link_resmi: '{{ addslashes($lomba->link_resmi) }}',
            syarat: '{{ addslashes(preg_replace('/\s+/',' ',$lomba->syarat_peserta)) }}',
            deskripsi: '{{ addslashes(preg_replace('/\s+/',' ',$lomba->deskripsi)) }}',
            kategori: '{{ in_array($lomba->kategori, ['Teknologi', 'Seni', 'Olahraga', 'Bisnis']) ? $lomba->kategori : 'Lainnya' }}',
            kategori_kustom: '{{ in_array($lomba->kategori, ['Teknologi', 'Seni', 'Olahraga', 'Bisnis']) ? '' : addslashes($lomba->kategori) }}',
            tingkat: '{{ $lomba->tingkat }}',
            tanggal_buka: '{{ $lomba->tanggal_buka ? $lomba->tanggal_buka->format('Y-m-d') : '' }}',
            deadline: '{{ $lomba->deadline->format('Y-m-d') }}',
            dragover: false
         }"
         }"
         class="space-y-6 animate-fade-in relative z-0">
         
        <!-- Ambient Background -->
        <div class="fixed top-20 left-10 w-[500px] h-[500px] bg-brand-mint/20 dark:bg-brand-teal/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
        <div class="fixed bottom-20 right-10 w-[400px] h-[400px] bg-brand-teal/10 dark:bg-brand-dark/20 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
        
        <div class="flex items-center justify-between bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-800 shadow-sm">
            <div>
                <h2 class="text-xl font-extrabold text-brand-dark dark:text-zinc-100">Edit Data Lomba</h2>
                <p class="text-xs text-gray-500 dark:text-zinc-400 mt-1">Lakukan perubahan informasi lomba dalam satu form praktis.</p>
            </div>
            <a href="{{ route('admin.lomba.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-zinc-800 dark:hover:bg-zinc-700 text-brand-dark dark:text-zinc-200 font-bold rounded-xl text-xs uppercase tracking-wider transition-all duration-300">
                Kembali
            </a>
        </div>

        <form action="{{ route('admin.lomba.update', $lomba) }}" method="POST" enctype="multipart/form-data" 
              @submit="loading = true" 
              class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @csrf
            @method('PUT')

            <!-- Main Form Fields (Span 2) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-6 theme-transition">
                    <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100 border-b border-gray-100 dark:border-zinc-800 pb-4">Informasi Utama</h3>
                    
                    <!-- Nama Lomba -->
                    <div class="relative">
                        <label for="nama" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Nama Lomba</label>
                        <input id="nama" name="nama" type="text" x-model="nama" required
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                        @error('nama') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Penyelenggara -->
                        <div>
                            <label for="penyelenggara" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Penyelenggara</label>
                            <input id="penyelenggara" name="penyelenggara" type="text" x-model="penyelenggara" required
                                   class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            @error('penyelenggara') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
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
                            <input id="tanggal_buka" name="tanggal_buka" type="date" x-model="tanggal_buka" required
                                   class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            @error('tanggal_buka') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label for="deadline" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Batas Pendaftaran</label>
                            <input id="deadline" name="deadline" type="date" x-model="deadline" required
                                   class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            @error('deadline') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        
                        <div x-show="kategori === 'Lainnya'" x-cloak>
                            <label for="kategori_kustom" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Tulis Kategori Baru</label>
                            <input id="kategori_kustom" name="kategori_kustom" type="text" x-model="kategori_kustom" placeholder="Misal: Fotografi"
                                   :required="kategori === 'Lainnya'"
                                   class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                            @error('kategori_kustom') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Hadiah -->
                    <div>
                        <label for="hadiah" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Hadiah Lomba</label>
                        <input id="hadiah" name="hadiah" type="text" x-model="hadiah"
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                        @error('hadiah') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Link Resmi -->
                    <div>
                        <label for="link_resmi" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Link Resmi Informasi / Guidebook</label>
                        <input id="link_resmi" name="link_resmi" type="url" x-model="link_resmi" required
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white">
                        @error('link_resmi') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Deskripsi & Poster -->
                <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-6 theme-transition">
                    <h3 class="text-lg font-bold text-brand-dark dark:text-zinc-100 border-b border-gray-100 dark:border-zinc-800 pb-4">Syarat, Deskripsi & Poster</h3>
                    
                    <!-- Syarat Peserta -->
                    <div>
                        <label for="syarat_peserta" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Syarat Peserta</label>
                        <textarea id="syarat_peserta" name="syarat_peserta" rows="3" x-model="syarat"
                                  @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                                  class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white resize-none overflow-hidden"></textarea>
                        @error('syarat_peserta') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Deskripsi Lengkap Lomba</label>
                        <textarea id="deskripsi" name="deskripsi" rows="6" x-model="deskripsi"
                                  @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                                  class="w-full px-4 py-3 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 focus:bg-white dark:focus:bg-zinc-900 rounded-xl text-sm transition-all duration-300 dark:text-white resize-none overflow-hidden"></textarea>
                        @error('deskripsi') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Poster Upload -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-dark dark:text-brand-teal mb-2">Unggah Poster Lomba</label>
                        <div class="relative border-2 border-dashed rounded-2xl p-6 transition-all duration-300 flex flex-col items-center justify-center min-h-[200px]"
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
                        <p class="text-[10px] text-gray-400 mt-2">Biarkan kosong jika tidak ingin mengubah poster saat ini.</p>
                        @error('poster') <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Submission & Preview (Span 1) -->
            <div class="space-y-6 lg:sticky lg:top-24 h-max">
                
                <!-- Live Preview Card -->
                <div class="bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl rounded-[2rem] border border-gray-100 dark:border-zinc-800 shadow-xl overflow-hidden hidden lg:block">
                    <div class="p-4 bg-brand-mint/30 dark:bg-zinc-800/50 border-b border-gray-100 dark:border-zinc-800">
                        <h3 class="text-xs font-extrabold uppercase tracking-wider text-brand-teal flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">visibility</span> Live Preview
                        </h3>
                    </div>
                    <div class="p-4 relative group">
                        <div class="w-full h-40 bg-gray-100 dark:bg-zinc-800 rounded-xl overflow-hidden mb-4 relative shadow-inner">
                            <template x-if="posterPreview">
                                <img :src="posterPreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!posterPreview">
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gradient-to-br from-brand-mint/20 to-brand-teal/10 dark:from-zinc-800 dark:to-zinc-900">
                                    <span class="material-symbols-outlined text-3xl opacity-50 mb-1">image</span>
                                    <span class="text-[9px] uppercase tracking-widest font-bold">No Poster</span>
                                </div>
                            </template>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80"></div>
                            <div class="absolute bottom-3 right-3 px-2 py-1 bg-brand-teal text-white text-[9px] font-bold rounded-lg shadow-md capitalize" x-text="tingkat || 'Tingkat'"></div>
                        </div>
                        <span class="inline-block px-2 py-0.5 bg-brand-mint/50 dark:bg-brand-dark/40 text-brand-dark dark:text-brand-mint text-[9px] font-black uppercase tracking-widest rounded mb-2 border border-brand-teal/20" x-text="(kategori === 'Lainnya' ? kategori_kustom : kategori) || 'Kategori'"></span>
                        <h4 class="text-sm font-extrabold text-brand-dark dark:text-zinc-100 line-clamp-1" x-text="nama || 'Nama Lomba'"></h4>
                        <p class="text-[10px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-1" x-text="penyelenggara || 'Penyelenggara Lomba'"></p>
                    </div>
                </div>

                <!-- Submit / Cancel Controls -->
                <div class="bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl p-6 rounded-[2rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-3 theme-transition">
                    <h3 class="text-xs font-extrabold uppercase tracking-wider text-brand-teal mb-4">Aksi</h3>
                    <button type="submit" :disabled="loading" 
                            class="w-full py-3.5 bg-gradient-to-r from-brand-dark via-brand-teal to-brand-dark bg-[length:200%_auto] hover:bg-right text-white font-bold rounded-2xl text-sm transition-all duration-500 shadow-lg hover:shadow-brand-teal/40 flex items-center justify-center gap-2 hover:-translate-y-0.5">
                        <template x-if="loading">
                            <svg class="animate-spin h-5 w-5 text-current" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </template>
                        <span x-text="loading ? 'Menyimpan...' : 'Simpan Perubahan'">Simpan Perubahan</span>
                    </button>
                    <a href="{{ route('admin.lomba.index') }}" class="block w-full py-3.5 bg-gray-100 dark:bg-zinc-800 hover:bg-gray-200 dark:hover:bg-zinc-700 text-brand-dark dark:text-zinc-200 font-bold rounded-2xl text-sm text-center transition-all duration-300">
                        Batal
                    </a>
                </div>
            </div>
        </form>

    </div>
</x-admin-layout>
