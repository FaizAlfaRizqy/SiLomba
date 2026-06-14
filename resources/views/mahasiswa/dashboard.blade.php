@php
    use Carbon\Carbon;
    use App\Models\AnggotaTim;
    use App\Models\Lamaran;
    use App\Models\Lomba;
    use App\Models\SlotTim;

    $user = Auth::user();
    $now  = Carbon::now()->startOfDay();

    // ── Statistik real-time ──────────────────────────────────────────────────
    $totalTim        = AnggotaTim::where('id_mahasiswa', $user->id)->count();
    $totalLamaran    = Lamaran::where('id_pelamar', $user->id)->count();
    $lamaranDiterima = Lamaran::where('id_pelamar', $user->id)->where('status', 'diterima')->count();
    $lamaranPending  = Lamaran::where('id_pelamar', $user->id)->where('status', 'pending')->count();

    // ── Deadline terdekat (4 item, belum lewat) ──────────────────────────────
    $upcoming = Lomba::where('deadline', '>=', $now)
        ->orderBy('deadline', 'asc')
        ->take(4)
        ->get();

    // ── Rekomendasi tim (slot terbuka yang cocok keahlian, max 10) ───────────
    $mahasiswa       = $user->mahasiswa;
    $recommendations = collect();
    if ($mahasiswa && !empty($mahasiswa->keahlian)) {
        $userSkills   = collect($mahasiswa->keahlian);
        $allOpenSlots = SlotTim::with(['tim.lomba', 'tim.ketua'])
            ->where('status', 'buka')
            ->where('batas_waktu', '>=', $now)
            ->get();

        foreach ($allOpenSlots as $slot) {
            $requiredSkills = collect($slot->keahlian_dibutuhkan);
            if ($requiredSkills->isEmpty()) continue;
            $matched = $userSkills->intersect($requiredSkills)->count();
            $score   = ($matched / $requiredSkills->count()) * 100;
            if ($score > 0) {
                $slot->matching_score = $score;
                $recommendations->push($slot);
            }
        }
        $recommendations = $recommendations->sortByDesc('matching_score')->take(10);
    }

    // ── Lomba aktif terbaru – 4 item ───────────────────────────────────────
    $lombaAktif = Lomba::where('deadline', '>=', $now)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
@endphp

<x-app-layout>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    html, body, #page-bg {
        background-color: #16534C !important;
        position: relative;
    }

    /* Deadline card poster */
    .deadline-poster {
        width: 72px;
        height: 72px;
        flex-shrink: 0;
        border-radius: 14px;
        overflow: hidden;
        object-fit: cover;
    }
    .deadline-poster-placeholder {
        width: 72px;
        height: 72px;
        flex-shrink: 0;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    /* Rekomendasi scroll area */
    .rekom-scroll {
        max-height: 480px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #48A89A33 transparent;
    }
    .rekom-scroll::-webkit-scrollbar { width: 4px; }
    .rekom-scroll::-webkit-scrollbar-thumb { background: #48A89A55; border-radius: 99px; }
</style>
@endpush

    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">



            {{-- ══ MAIN GRID: kiri (Deadline) | kanan (Statistik + Rekomendasi) ══ --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- ── KOLOM KIRI (2/3) ─────────────────────────────────────── --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- DEADLINE TERDEKAT --}}
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden h-full">
                        <div class="flex items-center justify-between px-6 pt-6 pb-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-xl bg-rose-50 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900">Deadline Terdekat</h3>
                            </div>
                            <a href="{{ route('mahasiswa.lomba.index') }}" class="text-xs text-[#00524D] font-bold hover:underline">Lihat Semua →</a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-6 pb-6">
                            @forelse($upcoming as $l)
                                @php $daysLeft = $now->diffInDays($l->deadline, false); @endphp
                                <a href="{{ route('mahasiswa.lomba.show', $l->id) }}" class="group flex items-start gap-3 p-4 rounded-2xl border border-gray-100 hover:border-[#00524D]/30 hover:shadow-md transition duration-200 bg-gray-50/50">

                                    {{-- Poster --}}
                                    @if($l->poster)
                                        <img src="{{ asset('storage/' . $l->poster) }}"
                                             alt="{{ $l->nama }}"
                                             class="deadline-poster group-hover:scale-105 transition duration-300">
                                    @else
                                        <div class="deadline-poster-placeholder {{ $daysLeft <= 3 ? 'bg-rose-100' : 'bg-[#00524D]/10' }}">
                                            <svg class="w-7 h-7 {{ $daysLeft <= 3 ? 'text-rose-400' : 'text-[#00524D]/40' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                    @endif

                                    {{-- Info --}}
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-1.5 mb-1">
                                            <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-full
                                                {{ $daysLeft <= 3 ? 'bg-rose-100 text-rose-600' : 'bg-[#00524D]/10 text-[#00524D]' }}">
                                                {{ $l->kategori }}
                                            </span>
                                            @if($daysLeft <= 3)
                                                <span class="text-[9px] font-black text-rose-500 animate-pulse">🔴 {{ $daysLeft }}h lagi!</span>
                                            @endif
                                        </div>
                                        <h5 class="text-sm font-bold text-gray-900 group-hover:text-[#00524D] line-clamp-2 leading-snug transition">{{ $l->nama }}</h5>
                                        <p class="text-[11px] text-gray-400 truncate mt-0.5">{{ $l->penyelenggara }}</p>
                                        <div class="flex items-center gap-1 mt-2">
                                            <svg class="w-3.5 h-3.5 text-[#48A89A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-[11px] text-gray-500 font-medium">{{ $l->deadline->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-2 py-10 text-center text-gray-400">
                                    <svg class="w-10 h-10 mx-auto mb-2 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-sm">Tidak ada deadline mendatang</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>{{-- end kolom kiri --}}

                {{-- ── KOLOM KANAN (1/3) ────────────────────────────────────── --}}
                <div class="space-y-6">

                    {{-- STATISTIK SAYA --}}
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm h-full flex flex-col justify-center">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Statistik Saya</h4>
                        <div class="grid grid-cols-2 gap-3 flex-1">
                            <div class="bg-[#00524D]/5 p-4 rounded-2xl flex flex-col justify-center">
                                <span class="block text-3xl font-extrabold text-[#00524D]">{{ $totalTim }}</span>
                                <span class="text-[10px] text-gray-500 uppercase font-bold tracking-wider leading-tight block mt-1">Tim Diikuti</span>
                            </div>
                            <div class="bg-[#48A89A]/10 p-4 rounded-2xl flex flex-col justify-center">
                                <span class="block text-3xl font-extrabold text-[#48A89A]">{{ $totalLamaran }}</span>
                                <span class="text-[10px] text-gray-500 uppercase font-bold tracking-wider leading-tight block mt-1">Total Lamaran</span>
                            </div>
                            <div class="bg-emerald-50 p-4 rounded-2xl flex flex-col justify-center">
                                <span class="block text-3xl font-extrabold text-emerald-600">{{ $lamaranDiterima }}</span>
                                <span class="text-[10px] text-gray-500 uppercase font-bold tracking-wider leading-tight block mt-1">Diterima</span>
                            </div>
                            <div class="bg-amber-50 p-4 rounded-2xl flex flex-col justify-center">
                                <span class="block text-3xl font-extrabold text-amber-500">{{ $lamaranPending }}</span>
                                <span class="text-[10px] text-gray-500 uppercase font-bold tracking-wider leading-tight block mt-1">Menunggu</span>
                            </div>
                        </div>
                    </div>

                </div>{{-- end kolom kanan --}}

            </div>{{-- end main grid --}}

            {{-- ══ LOMBA AKTIF TERBARU (FULL WIDTH GRID 4 KOLOM) ══ --}}
            <div class="pt-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white">Lomba Aktif Terbaru</h3>
                    <a href="{{ route('mahasiswa.lomba.index') }}" class="text-[#48A89A] font-bold text-sm hover:underline hover:text-white transition">Lihat Semua →</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @forelse($lombaAktif as $lomba)
                        @php $daysRemaining = \Carbon\Carbon::now()->diffInDays($lomba->deadline, false); @endphp
                        <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}"
                           class="group bg-white rounded-3xl border border-gray-100 hover:shadow-xl hover:-translate-y-1 shadow-sm transition duration-300 overflow-hidden flex flex-col cursor-pointer">
                            
                            {{-- Poster / Image — portrait ratio (3:4) --}}
                            <div class="relative w-full overflow-hidden" style="aspect-ratio: 3/4; max-height: 280px;">
                                <div class="absolute inset-0 bg-gradient-to-br from-[#48A89A] to-[#00524D] flex items-center justify-center text-white">
                                    @if($lomba->poster)
                                        <img src="{{ asset('storage/' . $lomba->poster) }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                             alt="{{ $lomba->nama }}">
                                    @else
                                        <svg class="w-12 h-12 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    @endif
                                </div>

                                {{-- Kategori Badge --}}
                                <div class="absolute top-3 left-3">
                                    <span class="px-2.5 py-1 bg-white/90 backdrop-blur-md text-[10px] font-bold rounded-full text-[#00524D] shadow-sm capitalize">
                                        {{ $lomba->kategori }}
                                    </span>
                                </div>

                                {{-- Status Badge kanan atas --}}
                                @if($daysRemaining <= 3 && $daysRemaining >= 0)
                                    <div class="absolute top-3 right-3 animate-pulse">
                                        <span class="px-2.5 py-1 bg-rose-600 text-white text-[10px] font-bold rounded-full shadow-lg">
                                            Segera Berakhir!
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="p-4 flex-1 flex flex-col">
                                <div class="mb-3">
                                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider block truncate">{{ $lomba->penyelenggara }}</span>
                                    <h3 class="text-sm font-bold text-gray-900 group-hover:text-[#00524D] transition line-clamp-2 leading-snug mt-0.5">{{ $lomba->nama }}</h3>
                                </div>

                                <div class="space-y-2 flex-1">
                                    {{-- Deadline --}}
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-3.5 h-3.5 me-1.5 text-[#48A89A] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span>{{ $lomba->deadline->format('d M Y') }}</span>
                                    </div>
                                    {{-- Hadiah --}}
                                    <div class="flex items-center text-xs text-gray-500">
                                        <svg class="w-3.5 h-3.5 me-1.5 text-[#48A89A] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span class="truncate">{{ $lomba->hadiah }}</span>
                                    </div>
                                    {{-- Tingkat & Status --}}
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <span class="px-2 py-0.5 rounded-md text-[9px] font-bold uppercase {{ $lomba->tingkat == 'nasional' ? 'bg-amber-100 text-amber-700' : ($lomba->tingkat == 'internasional' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700') }}">
                                            {{ $lomba->tingkat }}
                                        </span>
                                        <span class="px-2 py-0.5 rounded-md text-[9px] font-bold uppercase {{ $lomba->status == 'buka' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                                            {{ $lomba->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-4 py-12 text-center text-gray-400 bg-white/10 rounded-3xl border border-white/20">
                            <p class="text-sm">Belum ada lomba aktif saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- ══ BOTTOM GRID: REKOMENDASI TIM ══ --}}
            <div class="pt-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- REKOMENDASI TIM --}}
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="flex items-center justify-between px-6 pt-6 pb-4">
                            <h4 class="text-lg font-bold text-gray-900">Rekomendasi Tim</h4>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="text-xs text-[#00524D] font-bold hover:underline">Lihat Semua →</a>
                        </div>

                        @if($recommendations->isEmpty())
                            <div class="px-6 pb-8 text-center">
                                <div class="w-16 h-16 bg-[#00524D]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-[#00524D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h5 class="text-base font-bold text-gray-900 mb-2">Belum ada rekomendasi</h5>
                                <p class="text-gray-500 text-sm mb-5">Perbarui keahlianmu agar kami bisa mencarikan tim yang sesuai.</p>
                                <a href="{{ route('mahasiswa.profile.edit') }}" class="px-5 py-2.5 bg-[#00524D] text-white rounded-xl text-sm font-bold hover:bg-[#48A89A] transition shadow-sm">Update Keahlian</a>
                            </div>
                        @else
                            <div class="rekom-scroll divide-y divide-gray-50 pb-4">
                                @foreach($recommendations as $slot)
                                    @php
                                        $score = round($slot->matching_score);
                                        $scoreColor = $score >= 80 ? 'text-emerald-600 bg-emerald-50' : ($score >= 50 ? 'text-amber-600 bg-amber-50' : 'text-blue-600 bg-blue-50');
                                    @endphp
                                    <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}" class="group flex items-center gap-4 px-6 py-4 hover:bg-[#00524D]/5 transition duration-200">
                                        <div class="w-12 h-12 rounded-xl bg-[#00524D]/10 flex items-center justify-center flex-shrink-0 group-hover:bg-[#00524D] transition duration-200">
                                            <svg class="w-6 h-6 text-[#00524D] group-hover:text-white transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h5 class="text-sm font-bold text-gray-900 group-hover:text-[#00524D] truncate transition">{{ $slot->tim->nama_tim }}</h5>
                                                <span class="text-[10px] font-black px-2 py-0.5 rounded-full flex-shrink-0 {{ $scoreColor }}">{{ $score }}% Match</span>
                                            </div>
                                            <p class="text-[12px] text-gray-400 truncate">{{ $slot->tim->lomba->nama ?? '-' }}</p>
                                            <span class="text-[10px] px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full font-bold mt-1.5 inline-block">{{ $slot->posisi }}</span>
                                        </div>
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center group-hover:bg-[#48A89A]/10 transition flex-shrink-0">
                                            <svg class="w-4 h-4 text-gray-300 group-hover:text-[#48A89A] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Quick tip --}}
                    <div>
                        <div class="bg-gradient-to-br from-[#00524D] to-[#16534C] p-8 rounded-3xl text-white relative overflow-hidden shadow-xl">
                            <div class="relative z-10">
                                <span class="text-4xl block mb-4">🏆</span>
                                <h4 class="text-2xl font-extrabold mb-2">Ingin Juara?</h4>
                                <p class="text-[#CBEFEB]/90 text-sm leading-relaxed mb-6">Lengkapi profil dan keahlianmu untuk mendapatkan rekomendasi tim terbaik dan tingkatkan peluangmu untuk direkrut.</p>
                                <a href="{{ route('mahasiswa.profile.edit') }}" class="inline-flex items-center justify-center px-6 py-3 bg-[#48A89A] text-white font-bold rounded-xl hover:bg-[#CBEFEB] hover:text-[#00524D] transition-all duration-300">
                                    Update Profil Sekarang
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                            <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-[#48A89A]/30 rounded-full blur-3xl"></div>
                            <div class="absolute bottom-0 right-10 -mb-10 w-32 h-32 bg-[#CBEFEB]/20 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
