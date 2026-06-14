<x-app-layout>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
    body {
        background-color: #16534C !important;
        font-family: 'Inter', sans-serif;
    }
    #page-bg {
        background-color: #16534C !important;
    }
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .font-headline {
        font-family: 'Hanken Grotesk', sans-serif;
    }
    .custom-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
    }
</style>
@endpush

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Banner Arsip --}}
            @if($isArsip)
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center gap-4 text-red-800">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-red-600">error</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold font-headline">Lomba Ini Sudah Berakhir</p>
                        <p class="text-xs mt-0.5 opacity-80">Deadline berakhir pada {{ $lomba->deadline->format('d M Y') }}. Halaman ini tersedia untuk keperluan evaluasi dan referensi saja. Pendaftaran sudah ditutup.</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-12 gap-8 mb-10">
                <!-- Left Content -->
                <div class="col-span-12 lg:col-span-8">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="bg-[#00524D] text-[#CBEFEB] px-3 py-1 rounded-lg text-xs font-bold tracking-wider uppercase border border-[#48A89A]/30 shadow-sm">{{ $lomba->penyelenggara ?? 'Penyelenggara' }}</span>
                        <span class="flex items-center gap-1 text-white/80 text-xs font-bold uppercase tracking-widest">
                            <span class="material-symbols-outlined text-[18px]">event</span>
                            @if($isArsip)
                                Berakhir
                            @else
                                {{ $lomba->deadline->diffForHumans() }}
                            @endif
                        </span>
                    </div>
                    
                    <h1 class="font-headline text-4xl font-bold text-white mb-4 leading-tight">{{ $lomba->nama }}</h1>
                    
                    <div class="flex flex-wrap gap-2 mb-8">
                        <span class="px-4 py-1.5 bg-white/10 text-white rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-sm border border-white/20">{{ $lomba->tingkat }}</span>
                        <span class="px-4 py-1.5 bg-white/10 text-white rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-sm border border-white/20">{{ $lomba->kategori }}</span>
                        <span class="px-4 py-1.5 {{ $lomba->status == 'buka' ? 'bg-[#48A89A] text-white shadow-lg shadow-[#48A89A]/20' : 'bg-white/10 text-white/70' }} rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-sm">{{ $lomba->status }}</span>
                    </div>

                    <!-- Prize Section (only if exists) -->
                    @if($lomba->hadiah)
                    <div class="relative overflow-hidden rounded-2xl bg-[#00524D] p-8 text-white shadow-xl mb-12">
                        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-[#48A89A]/20 rounded-full blur-3xl"></div>
                        <div class="flex flex-col md:flex-row md:items-center justify-between relative z-10 gap-4">
                            <div>
                                <h3 class="font-headline text-2xl font-bold text-[#48A89A] mb-1">Hadiah Utama</h3>
                                <p class="text-[#CBEFEB] text-sm md:mb-0">Apresiasi untuk pemenang lomba</p>
                            </div>
                            <div class="text-left md:text-right">
                                <span class="font-headline text-2xl md:text-3xl font-bold text-white block">{{ $lomba->hadiah }}</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Detailed Content -->
                    <section class="space-y-8">
                        @if($lomba->deskripsi)
                        <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                            <h4 class="font-headline text-xl font-bold text-[#00524D] mb-4 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#48A89A]">description</span>
                                Deskripsi Lomba
                            </h4>
                            <div class="text-base text-gray-600 leading-relaxed whitespace-pre-line">
                                {{ $lomba->deskripsi }}
                            </div>
                        </div>
                        @endif

                        @if($lomba->syarat_peserta)
                        <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                            <h4 class="font-headline text-xl font-bold text-[#00524D] mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#48A89A]">verified</span>
                                Syarat Peserta
                            </h4>
                            <div class="text-base text-gray-600 leading-relaxed whitespace-pre-line bg-gray-50 p-6 rounded-xl border border-gray-100">
                                {{ $lomba->syarat_peserta }}
                            </div>
                        </div>
                        @endif
                    </section>
                </div>

                <!-- Right Sidebar / Action Column -->
                <div class="col-span-12 lg:col-span-4 space-y-6 relative">
                    <!-- Poster Card -->
                    @if($lomba->poster)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-6">
                        <img src="{{ asset('storage/' . $lomba->poster) }}" class="w-full h-auto object-cover {{ $isArsip ? 'grayscale' : '' }}" alt="Poster {{ $lomba->nama }}">
                    </div>
                    @endif

                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <h5 class="font-headline text-lg font-bold text-[#00524D] mb-6">Tindakan Cepat</h5>
                        <div class="flex flex-col gap-3">
                            
                            @if($isArsip)
                                <div class="w-full bg-gray-100 text-gray-500 font-bold py-4 rounded-xl text-center">
                                    Pendaftaran Ditutup
                                </div>
                                @if($lomba->link_resmi)
                                    <a href="{{ $lomba->link_resmi }}" target="_blank" class="w-full border-2 border-gray-200 text-gray-600 font-bold py-4 rounded-xl hover:bg-gray-50 transition-all flex items-center justify-center gap-2 active:scale-95">
                                        Website Resmi
                                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                                    </a>
                                @endif
                            @else
                                @if($lomba->link_resmi)
                                <a href="{{ $lomba->link_resmi }}" target="_blank" class="w-full bg-[#00524D] text-white font-bold py-4 rounded-xl hover:bg-[#48A89A] hover:shadow-lg transition-all flex items-center justify-center gap-2 group active:scale-95">
                                    Daftar Lomba
                                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                </a>
                                @endif

                                <a href="{{ route('mahasiswa.tim-finder.index', ['lomba_id' => $lomba->id]) }}" class="w-full bg-gray-100 text-[#00524D] font-bold py-4 rounded-xl hover:bg-[#CBEFEB] transition-all flex items-center justify-center gap-2 active:scale-95">
                                    <span class="material-symbols-outlined">person_search</span>
                                    Cari Tim
                                </a>

                                <a href="{{ route('mahasiswa.team.create', ['lomba_id' => $lomba->id]) }}" class="w-full border-2 border-gray-200 text-gray-600 font-bold py-4 rounded-xl hover:border-[#48A89A] hover:text-[#48A89A] transition-all flex items-center justify-center gap-2 active:scale-95">
                                    <span class="material-symbols-outlined">add_box</span>
                                    Buat Tim Baru
                                </a>
                            @endif
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <p class="text-xs font-bold text-gray-400 mb-4 tracking-wider uppercase">Informasi Lomba</p>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">Tingkat</span>
                                    <span class="font-bold text-[#00524D] capitalize">{{ $lomba->tingkat }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">Kategori</span>
                                    <span class="font-bold text-[#00524D]">{{ $lomba->kategori }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">Batas Waktu</span>
                                    <span class="font-bold {{ $lomba->deadline->diffInDays(now()) <= 7 && !$isArsip ? 'text-red-500' : 'text-[#00524D]' }}">{{ $lomba->deadline->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Secondary Info Card -->
                    @if(!$isArsip)
                    <div class="bg-gradient-to-br from-[#00524D] to-[#042826] text-white p-6 rounded-2xl shadow-sm overflow-hidden relative group">
                        <div class="absolute inset-0 bg-[#48A89A]/10 opacity-50"></div>
                        <div class="relative z-10">
                            <span class="material-symbols-outlined text-[#CBEFEB] mb-4">lightbulb</span>
                            <h6 class="font-headline text-lg font-bold mb-2">Ingin Juara?</h6>
                            <p class="text-[#CBEFEB] text-sm mb-4 opacity-90">Lengkapi profil Anda untuk mendapatkan rekomendasi tim yang cocok dengan keahlian Anda.</p>
                            <a href="{{ route('mahasiswa.profile.edit') }}" class="text-[#48A89A] font-bold text-sm hover:underline flex items-center gap-1">
                                Update Profil
                                <span class="material-symbols-outlined text-sm">open_in_new</span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
