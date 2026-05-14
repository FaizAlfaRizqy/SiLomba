<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.lomba.index') }}" class="p-2 text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Lomba') }}: {{ $lomba->nama }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.lomba.update', $lomba) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lomba -->
                        <div class="col-span-2">
                            <x-input-label for="nama" :value="__('Nama Lomba')" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $lomba->nama)" required />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <!-- Penyelenggara -->
                        <div>
                            <x-input-label for="penyelenggara" :value="__('Penyelenggara')" />
                            <x-text-input id="penyelenggara" name="penyelenggara" type="text" class="mt-1 block w-full" :value="old('penyelenggara', $lomba->penyelenggara)" required />
                            <x-input-error :messages="$errors->get('penyelenggara')" class="mt-2" />
                        </div>

                        <!-- Kategori -->
                        <div>
                            <x-input-label for="kategori" :value="__('Kategori')" />
                            <select id="kategori" name="kategori" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Teknologi" {{ old('kategori', $lomba->kategori) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                <option value="Seni" {{ old('kategori', $lomba->kategori) == 'Seni' ? 'selected' : '' }}>Seni</option>
                                <option value="Olahraga" {{ old('kategori', $lomba->kategori) == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                <option value="Bisnis" {{ old('kategori', $lomba->kategori) == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                                <option value="Lainnya" {{ old('kategori', $lomba->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                        </div>

                        <!-- Tingkat -->
                        <div>
                            <x-input-label for="tingkat" :value="__('Tingkat')" />
                            <select id="tingkat" name="tingkat" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="regional" {{ old('tingkat', $lomba->tingkat) == 'regional' ? 'selected' : '' }}>Regional</option>
                                <option value="nasional" {{ old('tingkat', $lomba->tingkat) == 'nasional' ? 'selected' : '' }}>Nasional</option>
                                <option value="internasional" {{ old('tingkat', $lomba->tingkat) == 'internasional' ? 'selected' : '' }}>Internasional</option>
                            </select>
                            <x-input-error :messages="$errors->get('tingkat')" class="mt-2" />
                        </div>

                        <!-- Deadline -->
                        <div>
                            <x-input-label for="deadline" :value="__('Deadline Pendaftaran')" />
                            <x-text-input id="deadline" name="deadline" type="date" class="mt-1 block w-full" :value="old('deadline', $lomba->deadline->format('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                        </div>

                        <!-- Hadiah -->
                        <div class="col-span-2">
                            <x-input-label for="hadiah" :value="__('Hadiah')" />
                            <x-text-input id="hadiah" name="hadiah" type="text" class="mt-1 block w-full" :value="old('hadiah', $lomba->hadiah)" placeholder="Contoh: Total Rp 50.000.000" />
                            <x-input-error :messages="$errors->get('hadiah')" class="mt-2" />
                        </div>

                        <!-- Link Resmi -->
                        <div class="col-span-2">
                            <x-input-label for="link_resmi" :value="__('Link Resmi')" />
                            <x-text-input id="link_resmi" name="link_resmi" type="url" class="mt-1 block w-full" :value="old('link_resmi', $lomba->link_resmi)" required placeholder="https://..." />
                            <x-input-error :messages="$errors->get('link_resmi')" class="mt-2" />
                        </div>

                        <!-- Poster -->
                        <div class="col-span-2">
                            <x-input-label for="poster" :value="__('Poster Lomba')" />
                            @if($lomba->poster)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $lomba->poster) }}" alt="Poster" class="w-32 h-32 object-cover rounded-lg border">
                                    <p class="text-xs text-gray-500 mt-1">Poster saat ini</p>
                                </div>
                            @endif
                            <input type="file" id="poster" name="poster" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            <p class="mt-1 text-xs text-gray-500">Maksimal 2MB (Biarkan kosong jika tidak ingin mengubah poster)</p>
                            <x-input-error :messages="$errors->get('poster')" class="mt-2" />
                        </div>

                        <!-- Syarat Peserta -->
                        <div class="col-span-2">
                            <x-input-label for="syarat_peserta" :value="__('Syarat Peserta')" />
                            <textarea id="syarat_peserta" name="syarat_peserta" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('syarat_peserta', $lomba->syarat_peserta) }}</textarea>
                            <x-input-error :messages="$errors->get('syarat_peserta')" class="mt-2" />
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-span-2">
                            <x-input-label for="deskripsi" :value="__('Deskripsi Lomba')" />
                            <textarea id="deskripsi" name="deskripsi" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('deskripsi', $lomba->deskripsi) }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition">
                            Perbarui Lomba
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
