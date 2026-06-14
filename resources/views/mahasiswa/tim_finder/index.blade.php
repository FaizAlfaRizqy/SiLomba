<x-app-layout>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    html, body, #page-bg {
        background-color: #16534C !important; 
    }
    
    .custom-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 4px 20px -2px rgba(0, 82, 77, 0.05);
        border: 1px solid rgba(72, 168, 154, 0.2);
        transition: all 0.3s ease;
    }
    
    .custom-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px -5px rgba(0, 82, 77, 0.15);
        border-color: #48A89A;
    }

    .btn-primary {
        background-color: #48A89A;
        color: #ffffff;
    }
    .btn-primary:hover {
        background-color: #00524D;
        color: #ffffff;
    }
    
    .btn-outline {
        background-color: transparent;
        border: 1px solid #48A89A;
        color: #00524D;
    }
    .btn-outline:hover {
        background-color: #48A89A;
        color: #ffffff;
    }

    /* Hide scrollbar for filter container */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush

    <div class="py-6 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <!-- Search & Filters Single Container -->
            <div class="bg-white p-3 rounded-2xl shadow-sm border border-[#48A89A]/30 flex flex-col md:flex-row items-center gap-3 mt-4">
                <form method="GET" action="{{ route('mahasiswa.tim-finder.index') }}" class="relative w-full md:w-auto flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#48A89A]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" placeholder="Cari posisi, skill, atau nama lomba..." 
                        class="block w-full pl-11 pr-4 py-3 bg-[#CBEFEB]/30 border-none rounded-xl text-[#00524D] placeholder-[#48A89A]/70 focus:ring-2 focus:ring-[#48A89A] transition"
                        value="{{ request('search') }}">
                </form>
                
                <div class="flex flex-nowrap overflow-x-auto items-center gap-2 pb-2 md:pb-0 w-full md:w-auto hide-scrollbar">
                    <a href="{{ route('mahasiswa.tim-finder.index') }}" class="whitespace-nowrap px-4 py-2.5 rounded-xl text-sm font-bold {{ !request('kategori') ? 'bg-[#00524D] text-white' : 'bg-[#CBEFEB]/40 text-[#00524D] hover:bg-[#48A89A] hover:text-white' }} transition">Semua</a>
                    <a href="{{ route('mahasiswa.tim-finder.index', ['kategori' => 'ui-ux']) }}" class="whitespace-nowrap px-4 py-2.5 rounded-xl text-sm font-bold {{ request('kategori') == 'ui-ux' ? 'bg-[#00524D] text-white' : 'bg-[#CBEFEB]/40 text-[#00524D] hover:bg-[#48A89A] hover:text-white' }} transition">UI/UX</a>
                    <a href="{{ route('mahasiswa.tim-finder.index', ['kategori' => 'coding']) }}" class="whitespace-nowrap px-4 py-2.5 rounded-xl text-sm font-bold {{ request('kategori') == 'coding' ? 'bg-[#00524D] text-white' : 'bg-[#CBEFEB]/40 text-[#00524D] hover:bg-[#48A89A] hover:text-white' }} transition">Coding</a>
                    <a href="{{ route('mahasiswa.tim-finder.index', ['kategori' => 'bisnis']) }}" class="whitespace-nowrap px-4 py-2.5 rounded-xl text-sm font-bold {{ request('kategori') == 'bisnis' ? 'bg-[#00524D] text-white' : 'bg-[#CBEFEB]/40 text-[#00524D] hover:bg-[#48A89A] hover:text-white' }} transition">Bisnis</a>
                    <a href="{{ route('mahasiswa.tim-finder.index', ['kategori' => 'riset']) }}" class="whitespace-nowrap px-4 py-2.5 rounded-xl text-sm font-bold {{ request('kategori') == 'riset' ? 'bg-[#00524D] text-white' : 'bg-[#CBEFEB]/40 text-[#00524D] hover:bg-[#48A89A] hover:text-white' }} transition">Riset</a>
                </div>
            </div>

            <!-- Recommendations Section -->
            @if($recommendations->isNotEmpty())
                <div class="space-y-6">
                    <div class="flex items-center mb-4">
                        <h3 class="text-2xl font-extrabold text-white">Rekomendasi Untukmu</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recommendations as $slot)
                            @php
                                $matchScore = round($slot->matching_score);
                            @endphp
                            <div class="custom-card p-6 relative overflow-hidden group">
                                <div class="absolute top-0 right-0 px-4 py-1.5 bg-[#48A89A] text-white text-xs font-extrabold rounded-bl-2xl">
                                    {{ $matchScore }}% Match
                                </div>
                                
                                <div class="flex items-start gap-4 mb-5">
                                    <div class="w-14 h-14 rounded-full bg-[#CBEFEB] flex items-center justify-center border-2 border-[#48A89A]">
                                        <span class="text-xl font-bold text-[#00524D]">{{ substr($slot->tim->nama_tim, 0, 1) }}</span>
                                    </div>
                                    <div class="mt-1">
                                        <h4 class="text-lg font-bold text-[#000000] group-hover:text-[#48A89A] transition-colors">{{ $slot->tim->nama_tim }}</h4>
                                        <p class="text-sm font-medium text-[#00524D] line-clamp-1">{{ $slot->tim->lomba->nama }}</p>
                                    </div>
                                </div>
                                
                                <div class="space-y-4 mb-6">
                                    <div class="bg-[#F8FAFC] rounded-xl p-3 border border-[#E2E8F0]">
                                        <span class="text-xs text-[#64748B] block mb-1">Posisi Dicari</span>
                                        <span class="text-sm font-bold text-[#00524D]">{{ $slot->posisi }}</span>
                                    </div>
                                    
                                    <div>
                                        <span class="text-xs text-[#64748B] block mb-2">Keahlian Dibutuhkan</span>
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach($slot->keahlian_dibutuhkan as $skill)
                                                <span class="px-2.5 py-1 bg-[#CBEFEB]/50 text-[#00524D] border border-[#48A89A]/30 text-[10px] font-bold rounded-lg uppercase tracking-wide">{{ $skill }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between mt-auto pt-4 border-t border-[#F1F5F9]">
                                    <div class="flex items-center text-xs font-bold {{ \Carbon\Carbon::parse($slot->batas_waktu)->isPast() ? 'text-red-500' : 'text-[#48A89A]' }}">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $slot->batas_waktu->format('d M Y') }}
                                    </div>
                                </div>
                                
                                <button onclick="window.location='{{ route('mahasiswa.tim-finder.show', $slot->id) }}'" class="w-full mt-5 py-3 btn-primary rounded-xl font-bold transition-all duration-300 flex items-center justify-center group/btn">
                                    Lamar Bergabung
                                    <svg class="w-4 h-4 ml-2 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                @if(!$mahasiswa || empty($mahasiswa->keahlian))
                    <div class="relative overflow-hidden rounded-[2rem] p-8 md:p-10 flex flex-col md:flex-row items-center justify-between bg-[#00524D] border border-[#48A89A]/50 shadow-xl">
                        <div class="relative z-10 mb-6 md:mb-0 max-w-xl text-center md:text-left">
                            <h3 class="text-2xl md:text-3xl font-extrabold mb-2 text-[#CBEFEB]">Lengkapi Profil Keahlianmu</h3>
                            <p class="text-white/80 text-sm md:text-base">Dapatkan rekomendasi tim yang akurat berdasarkan skill yang kamu miliki.</p>
                        </div>
                        <a href="{{ route('mahasiswa.profile.edit') }}" class="relative z-10 px-8 py-3.5 bg-[#CBEFEB] text-[#00524D] rounded-xl font-bold hover:bg-white hover:-translate-y-1 transition-all duration-300 whitespace-nowrap shadow-lg">
                            Lengkapi Sekarang
                        </a>
                    </div>
                @endif
            @endif

            <!-- Main Directory -->
            <div class="space-y-6 pt-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <h3 class="text-2xl font-extrabold text-white flex items-center">
                        Semua Open Slot
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($slots as $slot)
                        <div class="custom-card p-6 flex flex-col h-full group">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-2xl bg-[#CBEFEB]/30 border border-[#48A89A]/20 flex items-center justify-center text-[#00524D]">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#000000] line-clamp-1 group-hover:text-[#48A89A] transition-colors">{{ $slot->tim->nama_tim }}</h4>
                                        <p class="text-xs font-medium text-[#00524D] line-clamp-1">{{ $slot->tim->lomba->nama }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4 flex-grow">
                                <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-[#CBEFEB]/50 text-[#00524D] border border-[#48A89A]/20 text-xs font-bold mb-3">
                                    <span class="w-2 h-2 rounded-full bg-[#48A89A] mr-2 animate-pulse"></span>
                                    Sisa {{ $slot->jumlah_slot }} Slot
                                </div>
                                <h5 class="text-base font-bold text-[#00524D] mb-1">{{ $slot->posisi }}</h5>
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $slot->deskripsi }}</p>
                            </div>
                            
                            <div class="flex flex-wrap gap-1.5 mb-6">
                                @foreach($slot->keahlian_dibutuhkan as $skill)
                                    <span class="px-2.5 py-1 bg-gray-50 text-[#00524D] border border-gray-200 text-[10px] font-bold rounded-lg">{{ $skill }}</span>
                                @endforeach
                            </div>
                            
                            <div class="mt-auto pt-5 border-t border-gray-100 flex items-center justify-between">
                                <div class="text-[11px] font-bold text-[#64748B] flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $slot->batas_waktu->format('d M Y') }}
                                </div>
                                <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}" class="px-4 py-2 btn-outline rounded-xl text-xs font-bold transition-colors shadow-sm">
                                    Detail Slot
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 flex flex-col items-center justify-center text-center custom-card">
                            <div class="w-20 h-20 mb-4 rounded-full bg-[#CBEFEB]/50 flex items-center justify-center">
                                <svg class="w-10 h-10 text-[#48A89A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-[#000000] mb-2">Tidak Ada Slot Ditemukan</h3>
                            <p class="text-[#00524D] max-w-md text-sm">Belum ada tim yang membuka slot untuk saat ini atau coba sesuaikan filter pencarian Anda.</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-8">
                    {{ $slots->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
