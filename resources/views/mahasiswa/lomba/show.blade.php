<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('mahasiswa.lomba.index', ['tab' => $isArsip ? 'arsip' : 'aktif']) }}" class="p-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Detail Lomba') }}
                </h2>
                @if($isArsip)
                    <span class="text-xs text-gray-400 font-medium">📚 Arsip — Hanya untuk referensi & evaluasi</span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Banner Arsip --}}
            @if($isArsip)
                <div class="mb-6 p-4 bg-gray-800 rounded-2xl flex items-center gap-4 text-white">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold">Lomba Ini Sudah Berakhir</p>
                        <p class="text-xs text-gray-400 mt-0.5">Deadline berakhir pada {{ $lomba->deadline->format('d M Y') }}. Halaman ini tersedia untuk keperluan evaluasi dan referensi saja. Pendaftaran sudah ditutup.</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="h-64 {{ $isArsip ? 'bg-gradient-to-br from-gray-500 to-gray-700' : 'bg-gradient-to-br from-[#48A89A] to-[#00524D]' }} flex items-center justify-center text-white">
                            @if($lomba->poster)
                                <img src="{{ asset('storage/' . $lomba->poster) }}" class="w-full h-full object-cover {{ $isArsip ? 'grayscale' : '' }}">
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
                                @if($isArsip)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 text-xs font-bold rounded-full uppercase">Tutup</span>
                                @else
                                    <span class="px-3 py-1 {{ $lomba->status == 'buka' ? 'bg-emerald-50 text-emerald-600' : 'bg-gray-100 text-gray-500' }} text-xs font-bold rounded-full uppercase">{{ $lomba->status }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-3">
                            @if($isArsip)
                                {{-- Mode Arsip: tombol dinonaktifkan --}}
                                <div class="w-full py-4 bg-gray-100 rounded-2xl text-center">
                                    <p class="text-sm font-bold text-gray-400">🔒 Pendaftaran Ditutup</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Deadline sudah berakhir</p>
                                </div>
                                @if($lomba->link_resmi)
                                    <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-3 bg-gray-50 border border-gray-200 text-gray-500 rounded-2xl text-sm font-bold hover:bg-gray-100 transition">
                                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        Kunjungi Website Resmi
                                    </a>
                                @endif
                            @else
                                {{-- Mode Aktif: tombol normal --}}
                                <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-4 bg-[#00524D] text-white rounded-2xl font-bold shadow-lg shadow-[#00524D]/20 hover:bg-[#48A89A] transition">
                                    <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    Daftar Lomba
                                </a>
                                
                                <a href="{{ route('mahasiswa.tim-finder.index', ['lomba_id' => $lomba->id]) }}" class="flex items-center justify-center w-full py-4 bg-white border-2 border-[#00524D] text-[#00524D] rounded-2xl font-bold hover:bg-[#00524D]/5 transition">
                                    <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Cari Tim
                                </a>

                                <button class="flex items-center justify-center w-full py-4 bg-gray-50 text-gray-500 rounded-2xl font-bold hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Buat Tim Baru
                                </button>
                            @endif
                        </div>
                    </div>

                    @if(!$isArsip)
                    <div class="bg-[#00524D] p-8 rounded-3xl text-white shadow-xl relative overflow-hidden">
                        <div class="relative z-10">
                            <h4 class="text-xl font-bold mb-2">Ingin Juara?</h4>
                            <p class="text-[#CBEFEB]/80 text-sm mb-4">Lengkapi profil Anda untuk mendapatkan rekomendasi tim yang cocok dengan keahlian Anda.</p>
                            <a href="{{ route('mahasiswa.profile.edit') }}" class="text-sm font-bold underline hover:text-white transition">Update Profil &rarr;</a>
                        </div>
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
                    </div>
                    @else
                    <div class="bg-gray-800 p-6 rounded-3xl text-white shadow-xl">
                        <h4 class="text-base font-bold mb-2">💡 Tips Evaluasi</h4>
                        <p class="text-gray-400 text-sm">Gunakan data lomba ini sebagai referensi untuk mempersiapkan diri mengikuti lomba serupa di masa mendatang.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
