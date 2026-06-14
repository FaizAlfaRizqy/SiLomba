@php
    use Carbon\Carbon;
    use App\Models\AnggotaTim;
    use App\Models\Lamaran;
    use App\Models\Lomba;
    use App\Models\SlotTim;

    $user = Auth::user();
    $now  = Carbon::now()->startOfDay();

    // -- Statistik real-time
    $totalTim        = AnggotaTim::where('id_mahasiswa', $user->id)->count();
    $totalLamaran    = Lamaran::where('id_pelamar', $user->id)->count();
    $lamaranDiterima = Lamaran::where('id_pelamar', $user->id)->where('status', 'diterima')->count();
    $lamaranPending  = Lamaran::where('id_pelamar', $user->id)->where('status', 'pending')->count();

    // -- Deadline terdekat (4 item)
    $upcoming = Lomba::where('deadline', '>=', $now)
        ->orderBy('deadline', 'asc')
        ->take(4)
        ->get();

    // -- Rekomendasi tim
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

    // -- Lomba terbaru (aktif)
    $lombaAktif = Lomba::where('deadline', '>=', $now)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
@endphp

<x-app-layout>

@push('styles')
<style>
    html, body {
        background-color: #FDF8F0 !important;
        font-family: 'Outfit', sans-serif;
    }
    #page-bg {
        background-color: #FDF8F0 !important;
        position: relative;
    }
    .font-serif {
        font-family: 'Playfair Display', serif;
    }
    .bg-cream { background-color: #FDF8F0; }
    .bg-card-brown { background-color: #DBC8B6; }
    .bg-card-green { background-color: #62725D; }
    .bg-card-light { background-color: #EFE9DF; }
    .text-dark { color: #111111; }
    
    /* Overriding nav to match cream theme if needed, but since it's dashboard, we might let the app.blade.php handle it. */
    /* Wait, the user asked for green navbar earlier, but Flowblox is cream. Let's make the dashboard body cream, and card elements Flowblox style. */

    .deadline-poster {
        width: 72px;
        height: 72px;
        flex-shrink: 0;
        border-radius: 1rem;
        overflow: hidden;
        object-fit: cover;
    }
    .deadline-poster-placeholder {
        width: 72px;
        height: 72px;
        flex-shrink: 0;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .rekom-scroll {
        max-height: 480px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #DBC8B6 transparent;
    }
    .rekom-scroll::-webkit-scrollbar { width: 4px; }
    .rekom-scroll::-webkit-scrollbar-thumb { background: #DBC8B6; border-radius: 99px; }
</style>
@endpush

    <div class="py-8 min-h-screen bg-cream">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- -- WELCOME BANNER (FLOWBLOX STYLE) -- --}}
            <div class="bg-card-light rounded-[2.5rem] p-10 sm:p-14 text-dark shadow-sm relative overflow-hidden flex flex-col md:flex-row items-center justify-between">
                <div class="relative z-10 max-w-2xl">
                    <h1 class="text-4xl sm:text-6xl font-serif mb-4 leading-tight">Streamline Your Team,<br>Supercharge Your Workflow.</h1>
                    <p class="text-gray-600 text-lg sm:text-xl max-w-xl mb-8">Halo, <span class="font-bold">{{ $user->name }}</span>! Siap untuk meraih prestasi hari ini? Temukan lomba terbaik dan bangun tim impianmu secara terpusat.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('mahasiswa.lomba.index') }}" class="px-8 py-3.5 bg-[#111111] text-white rounded-full font-medium hover:bg-gray-800 transition shadow-xl">Jelajahi Lomba</a>
                        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-3.5 bg-white text-dark border border-gray-200 rounded-full font-medium hover:bg-gray-50 transition shadow-sm">Cari Tim</a>
                    </div>
                </div>
                <div class="hidden md:block w-1/3 relative z-10">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Team" class="rounded-[2rem] shadow-2xl object-cover h-64 w-full grayscale opacity-80 mix-blend-multiply">
                </div>
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white/40 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 bg-[#DBC8B6]/30 rounded-full blur-3xl pointer-events-none"></div>
            </div>

            {{-- -- MAIN GRID: BENTO STYLE -- --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- -- KOLOM KIRI (2/3) -- --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- BENTO ROW 1: LOMBA AKTIF TERBARU --}}
                    <div class="bg-card-green rounded-[2.5rem] p-8 text-white relative overflow-hidden group min-h-[400px] flex flex-col">
                        <div class="absolute inset-0 w-full h-full">
                            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-20 mix-blend-overlay transition duration-700 group-hover:scale-105">
                        </div>
                        <div class="relative z-10 flex-1 flex flex-col">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h3 class="text-3xl font-serif font-bold text-white mb-1">Lomba Aktif Terbaru</h3>
                                    <p class="text-white/80 text-sm">Kompetisi terbaru yang bisa kamu ikuti.</p>
                                </div>
                                <a href="{{ route('mahasiswa.lomba.index') }}" class="px-5 py-2 bg-white/10 backdrop-blur-md rounded-full text-sm font-bold hover:bg-white/20 transition border border-white/20">Lihat Semua</a>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-auto">
                                @forelse($lombaAktif as $lomba)
                                    @php $daysRemaining = Carbon::now()->diffInDays($lomba->deadline, false); @endphp
                                    <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}" class="bg-white/10 backdrop-blur-md rounded-[1.5rem] p-4 border border-white/10 hover:bg-white/20 transition">
                                        <div class="flex items-start gap-3">
                                            @if($lomba->poster)
                                                <img src="{{ asset('storage/' . $lomba->poster) }}" class="w-16 h-16 rounded-xl object-cover">
                                            @else
                                                <div class="w-16 h-16 rounded-xl bg-black/20 flex items-center justify-center">??</div>
                                            @endif
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start mb-1">
                                                    <span class="text-[10px] uppercase font-bold text-white/70">{{ $lomba->kategori }}</span>
                                                    @if($daysRemaining <= 3 && $daysRemaining >= 0)
                                                        <span class="text-[10px] bg-red-500 text-white px-2 py-0.5 rounded-full animate-pulse">{{ $daysRemaining }}h lagi</span>
                                                    @endif
                                                </div>
                                                <h4 class="font-bold text-sm leading-tight mb-1 line-clamp-2">{{ $lomba->nama }}</h4>
                                                <p class="text-xs text-white/60 truncate">{{ $lomba->penyelenggara }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="col-span-2 py-8 text-center text-white/50 bg-black/10 rounded-2xl">
                                        Belum ada lomba aktif saat ini.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- BENTO ROW 2: DEADLINE TERDEKAT --}}
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-serif font-bold text-dark">Deadline Terdekat</h3>
                            <a href="{{ route('mahasiswa.lomba.index') }}" class="text-sm font-bold text-gray-500 hover:text-dark transition">Lihat Semua ?</a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @forelse($upcoming as $l)
                                @php $daysLeft = $now->diffInDays($l->deadline, false); @endphp
                                <a href="{{ route('mahasiswa.lomba.show', $l->id) }}" class="group flex items-start gap-4 p-4 rounded-[1.5rem] bg-gray-50 hover:bg-gray-100 transition border border-transparent hover:border-gray-200">
                                    @if($l->poster)
                                        <img src="{{ asset('storage/' . $l->poster) }}" class="w-16 h-16 rounded-xl object-cover shadow-sm group-hover:scale-105 transition">
                                    @else
                                        <div class="w-16 h-16 rounded-xl bg-[#EFE9DF] flex items-center justify-center text-xl shadow-sm">??</div>
                                    @endif
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-full {{ $daysLeft <= 3 ? 'bg-red-100 text-red-600' : 'bg-[#DBC8B6] text-dark' }}">{{ $l->kategori }}</span>
                                            @if($daysLeft <= 3)
                                                <span class="text-[10px] font-black text-red-500 animate-pulse">?? {{ $daysLeft }}h lagi!</span>
                                            @endif
                                        </div>
                                        <h5 class="text-sm font-bold text-dark line-clamp-2 leading-snug">{{ $l->nama }}</h5>
                                        <div class="flex items-center gap-1 mt-2 text-xs text-gray-500 font-medium">
                                            <span>??</span>
                                            {{ $l->deadline->format('d M Y') }}
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-2 py-8 text-center text-gray-400">
                                    Tidak ada deadline mendatang
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>{{-- end kolom kiri --}}

                {{-- -- KOLOM KANAN (1/3) -- --}}
                <div class="space-y-6">

                    {{-- STATISTIK SAYA --}}
                    <div class="bg-card-brown rounded-[2.5rem] p-8 text-dark shadow-sm min-h-[220px] flex flex-col justify-center">
                        <h4 class="text-2xl font-serif font-bold mb-6">Performance Insights</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="block text-4xl font-extrabold">{{ $totalTim }}</span>
                                <span class="text-[10px] uppercase font-bold tracking-wider opacity-70 mt-1 block">Tim Diikuti</span>
                            </div>
                            <div>
                                <span class="block text-4xl font-extrabold">{{ $totalLamaran }}</span>
                                <span class="text-[10px] uppercase font-bold tracking-wider opacity-70 mt-1 block">Total Lamaran</span>
                            </div>
                            <div>
                                <span class="block text-4xl font-extrabold text-[#62725D]">{{ $lamaranDiterima }}</span>
                                <span class="text-[10px] uppercase font-bold tracking-wider opacity-70 mt-1 block">Diterima</span>
                            </div>
                            <div>
                                <span class="block text-4xl font-extrabold text-amber-700">{{ $lamaranPending }}</span>
                                <span class="text-[10px] uppercase font-bold tracking-wider opacity-70 mt-1 block">Menunggu</span>
                            </div>
                        </div>
                    </div>

                    {{-- REKOMENDASI TIM --}}
                    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col" style="height: calc(100% - 244px);">
                        <div class="px-8 pt-8 pb-4 border-b border-gray-50 flex items-center justify-between">
                            <h4 class="text-xl font-serif font-bold text-dark">Rekomendasi Tim</h4>
                        </div>
                        
                        <div class="flex-1 overflow-hidden relative">
                            @if($recommendations->isEmpty())
                                <div class="px-8 py-10 text-center h-full flex flex-col justify-center items-center">
                                    <div class="w-16 h-16 bg-[#EFE9DF] rounded-full flex items-center justify-center mb-4 text-2xl">??</div>
                                    <h5 class="text-sm font-bold text-dark mb-2">Belum ada rekomendasi</h5>
                                    <p class="text-gray-500 text-xs mb-6">Perbarui keahlianmu agar kami bisa mencarikan tim yang sesuai.</p>
                                    <a href="{{ route('mahasiswa.profile.edit') }}" class="px-5 py-2.5 bg-dark text-white rounded-full text-xs font-bold hover:bg-gray-800 transition">Update Keahlian</a>
                                </div>
                            @else
                                <div class="rekom-scroll absolute inset-0 divide-y divide-gray-50">
                                    @foreach($recommendations as $slot)
                                        @php
                                            $score = round($slot->matching_score);
                                            $scoreColor = $score >= 80 ? 'text-[#62725D] bg-[#62725D]/10' : ($score >= 50 ? 'text-amber-700 bg-amber-50' : 'text-blue-600 bg-blue-50');
                                        @endphp
                                        <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}" class="group flex items-center gap-4 px-8 py-4 hover:bg-gray-50 transition">
                                            <div class="w-12 h-12 rounded-[1rem] bg-[#EFE9DF] flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition">
                                                <span class="text-xl">??</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <h5 class="text-sm font-bold text-dark truncate">{{ $slot->tim->nama_tim }}</h5>
                                                    <span class="text-[9px] font-black px-1.5 py-0.5 rounded-full flex-shrink-0 {{ $scoreColor }}">{{ $score }}%</span>
                                                </div>
                                                <p class="text-[11px] text-gray-500 truncate mb-1">{{ $slot->tim->lomba->nama ?? '-' }}</p>
                                                <span class="text-[10px] px-2 py-0.5 bg-gray-100 text-dark rounded-full font-medium inline-block">{{ $slot->posisi }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                </div>{{-- end kolom kanan --}}

            </div>{{-- end main grid --}}

        </div>
    </div>
</x-app-layout>
