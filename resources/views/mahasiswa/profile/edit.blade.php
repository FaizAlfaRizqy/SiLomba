<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lengkapi Profil Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 sm:p-10">
                    <form method="POST" action="{{ route('mahasiswa.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- Profile Header -->
                        <div class="flex items-center space-x-6">
                            <div class="relative group" x-data="{ photoName: null, photoPreview: null }">
                                <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center relative">
                                    <template x-if="!photoPreview">
                                        @if($mahasiswa->foto_profil)
                                            <img src="{{ asset('storage/' . $mahasiswa->foto_profil) }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        @endif
                                    </template>
                                    <template x-if="photoPreview">
                                        <img :src="photoPreview" class="w-full h-full object-cover">
                                    </template>
                                </div>
                                <input type="file" name="foto_profil" class="hidden" x-ref="photo" 
                                    @change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                    ">
                                <button type="button" @click="$refs.photo.click()" class="absolute -bottom-2 -right-2 bg-indigo-600 text-white p-2 rounded-lg shadow-lg hover:bg-indigo-700 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </button>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h3>
                                <p class="text-gray-500">{{ $mahasiswa->nim }} • {{ $mahasiswa->program_studi }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Program Studi (Edit) -->
                            <div>
                                <x-input-label for="program_studi" :value="__('Program Studi')" />
                                <x-text-input id="program_studi" class="block mt-1 w-full" type="text" name="program_studi" :value="old('program_studi', $mahasiswa->program_studi)" required />
                                <x-input-error :messages="$errors->get('program_studi')" class="mt-2" />
                            </div>

                            <!-- Domisili -->
                            <div>
                                <x-input-label for="domisili" :value="__('Domisili')" />
                                <x-text-input id="domisili" class="block mt-1 w-full" type="text" name="domisili" :value="old('domisili', $mahasiswa->domisili)" required />
                                <x-input-error :messages="$errors->get('domisili')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Keahlian (Checkboxes) -->
                        <div class="space-y-3">
                            <x-input-label :value="__('Keahlian (Pilih minimal 1)')" />
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                @php $skills = ['Coding', 'Desain', 'Riset', 'Bisnis', 'Presentasi', 'UI/UX', 'Data Science', 'Marketing']; @endphp
                                @foreach($skills as $skill)
                                    <label class="relative flex items-center p-3 rounded-xl border border-gray-200 hover:bg-indigo-50 cursor-pointer transition group">
                                        <input type="checkbox" name="keahlian[]" value="{{ $skill }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array($skill, (array)$mahasiswa->keahlian) ? 'checked' : '' }}>
                                        <span class="ms-3 text-sm font-medium text-gray-700 group-hover:text-indigo-700">{{ $skill }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('keahlian')" class="mt-2" />
                        </div>

                        <!-- Minat Lomba (Checkboxes) -->
                        <div class="space-y-3">
                            <x-input-label :value="__('Minat Kategori Lomba')" />
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                @php $categories = ['Sains', 'Teknologi', 'Bisnis', 'Seni', 'Olahraga', 'Kemanusiaan']; @endphp
                                @foreach($categories as $cat)
                                    <label class="relative flex items-center p-3 rounded-xl border border-gray-200 hover:bg-violet-50 cursor-pointer transition group">
                                        <input type="checkbox" name="minat_lomba[]" value="{{ $cat }}" class="rounded border-gray-300 text-violet-600 focus:ring-violet-500" {{ in_array($cat, (array)$mahasiswa->minat_lomba) ? 'checked' : '' }}>
                                        <span class="ms-3 text-sm font-medium text-gray-700 group-hover:text-violet-700">{{ $cat }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('minat_lomba')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Link Portofolio -->
                            <div>
                                <x-input-label for="link_portofolio" :value="__('Link Portofolio (GitHub/Behance/Drive)')" />
                                <x-text-input id="link_portofolio" class="block mt-1 w-full" type="url" name="link_portofolio" :value="old('link_portofolio', $mahasiswa->link_portofolio)" placeholder="https://..." />
                                <x-input-error :messages="$errors->get('link_portofolio')" class="mt-2" />
                            </div>

                            <!-- Ketersediaan Waktu -->
                            <div>
                                <x-input-label for="ketersediaan_waktu" :value="__('Ketersediaan Waktu')" />
                                <select id="ketersediaan_waktu" name="ketersediaan_waktu" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="Full-time" {{ $mahasiswa->ketersediaan_waktu == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ $mahasiswa->ketersediaan_waktu == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Weekends only" {{ $mahasiswa->ketersediaan_waktu == 'Weekends only' ? 'selected' : '' }}>Weekends only</option>
                                </select>
                                <x-input-error :messages="$errors->get('ketersediaan_waktu')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Level Privasi -->
                        <div>
                            <x-input-label for="level_privasi" :value="__('Visibilitas Profil')" />
                            <div class="mt-2 flex space-x-4">
                                @foreach(['publik', 'privat', 'tim saja'] as $level)
                                    <label class="flex items-center">
                                        <input type="radio" name="level_privasi" value="{{ $level }}" class="text-indigo-600 focus:ring-indigo-500" {{ $mahasiswa->level_privasi == $level ? 'checked' : '' }}>
                                        <span class="ms-2 text-sm text-gray-700 capitalize">{{ $level }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-6 flex justify-end">
                            <x-primary-button class="px-8 py-3 rounded-2xl text-lg">
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
