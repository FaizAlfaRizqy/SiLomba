<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('mahasiswa.tim-finder') }}" class="p-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Slot Tim') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 sm:p-12">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="text-xs font-bold text-indigo-600 uppercase tracking-widest">{{ $slot->tim->lomba->nama }}</span>
                            <h1 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $slot->tim->nama_tim }}</h1>
                        </div>
                        <div class="text-right">
                            <span class="block text-xs text-gray-500 uppercase">Deadline Slot</span>
                            <span class="text-lg font-bold text-gray-900">{{ $slot->batas_waktu->format('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Posisi Yang Dicari</h3>
                                <p class="text-2xl font-bold text-gray-900">{{ $slot->posisi }}</p>
                            </div>

                            <div>
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Keahlian Dibutuhkan</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($slot->keahlian_dibutuhkan as $skill)
                                        <span class="px-4 py-2 bg-indigo-50 text-indigo-700 text-sm font-bold rounded-xl">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Peran</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $slot->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="p-6 bg-gray-50 rounded-3xl border border-gray-100">
                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Ketua Tim</h3>
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                                        @if($slot->tim->ketua->mahasiswa->foto_profil)
                                            <img src="{{ asset('storage/' . $slot->tim->ketua->mahasiswa->foto_profil) }}" class="w-full h-full object-cover rounded-2xl">
                                        @else
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $slot->tim->ketua->name }}</h4>
                                        <p class="text-xs text-gray-500">{{ $slot->tim->ketua->mahasiswa->program_studi }}</p>
                                        <a href="{{ route('mahasiswa.portfolio', $slot->tim->ketua->mahasiswa->nim) }}" class="text-xs font-bold text-indigo-600 hover:underline">Lihat Portofolio &rarr;</a>
                                    </div>
                                </div>
                            </div>

                            @php
                                $existingLamaran = \App\Models\Lamaran::where('id_slot', $slot->id)->where('id_pelamar', Auth::id())->first();
                            @endphp

                            @if($existingLamaran)
                                <div class="p-6 bg-amber-50 rounded-3xl border border-amber-100 text-amber-700">
                                    <p class="font-bold">Status Lamaran: <span class="capitalize">{{ $existingLamaran->status }}</span></p>
                                    <p class="text-sm mt-1">Anda sudah mengirimkan lamaran untuk posisi ini.</p>
                                </div>
                            @else
                                <form method="POST" action="{{ route('mahasiswa.team.apply', $slot->id) }}" class="space-y-4">
                                    @csrf
                                    <div>
                                        <x-input-label for="pesan_motivasi" :value="__('Pesan Motivasi')" />
                                        <textarea id="pesan_motivasi" name="pesan_motivasi" rows="4" class="block mt-1 w-full rounded-2xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Jelaskan mengapa kamu cocok untuk posisi ini..." required></textarea>
                                        <x-input-error :messages="$errors->get('pesan_motivasi')" class="mt-2" />
                                    </div>
                                    <x-primary-button class="w-full justify-center py-4 rounded-2xl shadow-lg shadow-indigo-100">
                                        {{ __('Lamar Bergabung') }}
                                    </x-primary-button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
