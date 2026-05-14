<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('mahasiswa.lomba.index') }}" class="p-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Lomba') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="h-64 bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center text-white">
                            @if($lomba->poster)
                                <img src="{{ asset('storage/' . $lomba->poster) }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-24 h-24 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center space-x-2 mb-4">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full uppercase">{{ $lomba->kategori }}</span>
                                <span class="px-3 py-1 bg-amber-50 text-amber-600 text-xs font-bold rounded-full uppercase">{{ $lomba->tingkat }}</span>
                            </div>
                            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $lomba->nama }}</h1>
                            <p class="text-xl text-gray-500 mb-6">{{ $lomba->penyelenggara }}</p>

                            <div class="prose prose-indigo max-w-none">
                                <h3 class="text-lg font-bold text-gray-900">Deskripsi</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $lomba->deskripsi }}</p>

                                <h3 class="text-lg font-bold text-gray-900 mt-6">Syarat Peserta</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $lomba->syarat_peserta }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar / Actions -->
                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center justify-between py-3 border-b border-gray-50">
                                <span class="text-gray-500 text-sm">Deadline</span>
                                <span class="font-bold text-gray-900">{{ $lomba->deadline->format('d M Y') }}</span>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-50">
                                <span class="text-gray-500 text-sm">Hadiah</span>
                                <span class="font-bold text-indigo-600">{{ $lomba->hadiah }}</span>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-50">
                                <span class="text-gray-500 text-sm">Status</span>
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full uppercase">{{ $lomba->status }}</span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                                <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                Daftar Lomba
                            </a>
                            
                            <a href="{{ route('mahasiswa.tim-finder', ['lomba_id' => $lomba->id]) }}" class="flex items-center justify-center w-full py-4 bg-white border-2 border-indigo-600 text-indigo-600 rounded-2xl font-bold hover:bg-indigo-50 transition">
                                <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Cari Tim
                            </a>

                            <button class="flex items-center justify-center w-full py-4 bg-gray-50 text-gray-500 rounded-2xl font-bold hover:bg-gray-100 transition">
                                <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Buat Tim Baru
                            </button>
                        </div>
                    </div>

                    <div class="bg-indigo-900 p-8 rounded-3xl text-white shadow-xl relative overflow-hidden">
                        <div class="relative z-10">
                            <h4 class="text-xl font-bold mb-2">Ingin Juara?</h4>
                            <p class="text-indigo-200 text-sm mb-4">Lengkapi profil Anda untuk mendapatkan rekomendasi tim yang cocok dengan keahlian Anda.</p>
                            <a href="{{ route('mahasiswa.profile.edit') }}" class="text-sm font-bold underline hover:text-white transition">Update Profil &rarr;</a>
                        </div>
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
