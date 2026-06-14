<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buka Open Slot Tim') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 sm:p-10">
                    <form method="POST" action="{{ route('mahasiswa.team.store') }}" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Pilih Lomba -->
                            <div class="md:col-span-2">
                                <x-input-label for="id_lomba" :value="__('Pilih Lomba')" />
                                <select id="id_lomba" name="id_lomba" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">-- Pilih Lomba Aktif --</option>
                                    @foreach($lombas as $l)
                                        <option value="{{ $l->id }}" {{ (old('id_lomba', $selectedLombaId) == $l->id) ? 'selected' : '' }}>
                                            {{ $l->nama }} (Deadline: {{ $l->deadline->format('d M') }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('id_lomba')" class="mt-2" />
                            </div>

                            <!-- Nama Tim -->
                            <div>
                                <x-input-label for="nama_tim" :value="__('Nama Tim')" />
                                <x-text-input id="nama_tim" class="block mt-1 w-full" type="text" name="nama_tim" :value="old('nama_tim')" required placeholder="Misal: Tim Garuda IT" />
                                <x-input-error :messages="$errors->get('nama_tim')" class="mt-2" />
                            </div>

                            <!-- Maks Anggota -->
                            <div>
                                <x-input-label for="maks_anggota" :value="__('Maksimal Anggota Tim')" />
                                <x-text-input id="maks_anggota" class="block mt-1 w-full" type="number" name="maks_anggota" :value="old('maks_anggota', 3)" min="2" max="10" required />
                                <x-input-error :messages="$errors->get('maks_anggota')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900">Detail Open Slot</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Posisi -->
                                <div>
                                    <x-input-label for="posisi" :value="__('Posisi Yang Dibutuhkan')" />
                                    <x-text-input id="posisi" class="block mt-1 w-full" type="text" name="posisi" required placeholder="Misal: UI/UX Designer" />
                                </div>

                                <!-- Jumlah Slot -->
                                <div>
                                    <x-input-label for="jumlah_slot" :value="__('Jumlah Slot')" />
                                    <x-text-input id="jumlah_slot" class="block mt-1 w-full" type="number" name="jumlah_slot" value="1" min="1" required />
                                </div>

                                <!-- Keahlian (Checkboxes) -->
                                <div class="md:col-span-2 space-y-3">
                                    <x-input-label :value="__('Keahlian Minimum')" />
                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                        @php $skills = ['Coding', 'Desain', 'Riset', 'Bisnis', 'Presentasi', 'UI/UX', 'Data Science', 'Marketing']; @endphp
                                        @foreach($skills as $skill)
                                            <label class="relative flex items-center p-3 rounded-xl border border-gray-200 hover:bg-indigo-50 cursor-pointer transition group">
                                                <input type="checkbox" name="keahlian_dibutuhkan[]" value="{{ $skill }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <span class="ms-3 text-sm font-medium text-gray-700 group-hover:text-indigo-700">{{ $skill }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Deskripsi Peran -->
                                <div class="md:col-span-2">
                                    <x-input-label for="deskripsi_slot" :value="__('Deskripsi Peran & Tanggung Jawab')" />
                                    <textarea id="deskripsi_slot" name="deskripsi_slot" rows="3" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Jelaskan apa yang akan dilakukan posisi ini..." required></textarea>
                                </div>

                                <!-- Batas Waktu Slot -->
                                <div>
                                    <x-input-label for="batas_waktu" :value="__('Batas Waktu Open Slot')" />
                                    <x-text-input id="batas_waktu" class="block mt-1 w-full" type="date" name="batas_waktu" required />
                                    <p class="text-[10px] text-gray-400 mt-1">Tidak boleh melebihi deadline lomba.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <x-primary-button class="w-full justify-center py-4 rounded-2xl text-lg shadow-xl shadow-indigo-100">
                                {{ __('Publikasikan Open Slot') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
