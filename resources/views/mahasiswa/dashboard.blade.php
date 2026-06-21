@php
    use Carbon\Carbon;
    use App\Models\AnggotaTim;
    use App\Models\Lamaran;
    use App\Models\Lomba;
    use App\Models\SlotTim;

    $user = Auth::user();
    $now  = Carbon::now()->startOfDay();

    // -- Statistik real-time
    $totalTim        = AnggotaTim::where(['id_mahasiswa' => $user->id])->count();
    $totalLamaran    = Lamaran::where(['id_pelamar' => $user->id])->count();
    $lamaranDiterima = Lamaran::where(['id_pelamar' => $user->id, 'status' => 'diterima'])->count();
    $lamaranPending  = Lamaran::where(['id_pelamar' => $user->id, 'status' => 'pending'])->count();

    // -- Deadline terdekat (1 item)
    $upcomingFirst = Lomba::where([['deadline', '>=', $now]])
        ->orderByRaw('deadline asc')
        ->first();

    // -- Rekomendasi tim
    $mahasiswa       = $user->mahasiswa;
    $recommendations = collect();
    if ($mahasiswa && !empty($mahasiswa->keahlian)) {
        $userSkills   = collect($mahasiswa->keahlian);
        $allOpenSlots = SlotTim::with(['tim.lomba', 'tim.ketua'])
            ->where(['status' => 'buka'])
            ->where([['batas_waktu', '>=', $now]])
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
        $recommendations = $recommendations->sortByDesc(fn($item) => $item->matching_score)->take(4);
    }

    // -- Lomba terbaru (aktif)
    $lombaAktif = Lomba::where([['deadline', '>=', $now]])
        ->orderByRaw('created_at desc')
        ->take(6)
        ->get();
@endphp
<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SiLomba | Dashboard Mahasiswa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-container": "#00743a",
                        "surface-bright": "#f7f9fb",
                        "secondary": "#006d37",
                        "on-background": "#ffffff",
                        "inverse-primary": "#a8cfc4",
                        "inverse-on-surface": "#eff1f3",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "tertiary-fixed-dim": "#c0c1ff",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#6bfe9c",
                        "primary-container": "#062e27",
                        "on-primary-fixed": "#00201a",
                        "on-error": "#ffffff",
                        "on-surface-variant": "#c1c8c5",
                        "surface-container-highest": "#e0e3e5",
                        "on-tertiary-fixed-variant": "#2f2ebe",
                        "on-surface": "#191c1e",
                        "on-secondary-fixed-variant": "#005228",
                        "primary-fixed": "#c3ebe0",
                        "tertiary-fixed": "#e1e0ff",
                        "error": "#ba1a1a",
                        "surface-container-high": "#e6e8ea",
                        "on-tertiary-fixed": "#07006c",
                        "inverse-surface": "#2d3133",
                        "surface-tint": "#41655d",
                        "surface-container-lowest": "#ffffff",
                        "tertiary": "#040055",
                        "secondary-container": "#6bfe9c",
                        "outline": "#717976",
                        "on-primary-container": "#72978d",
                        "secondary-fixed-dim": "#4ae183",
                        "on-tertiary-container": "#7e81ff",
                        "surface-variant": "#e0e3e5",
                        "surface-container-low": "#f2f4f6",
                        "tertiary-container": "#0c0091",
                        "on-primary-fixed-variant": "#294d45",
                        "primary": "#062e27",
                        "background": "#062e27",
                        "on-error-container": "#93000a",
                        "surface": "#062e27",
                        "surface-container": "#eceef0",
                        "on-secondary-fixed": "#00210c",
                        "primary-fixed-dim": "#a8cfc4",
                        "error-container": "#ffdad6",
                        "outline-variant": "#c1c8c5",
                        "surface-dim": "#d8dadc"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-sm": "0.5rem",
                        "stack-lg": "1.5rem",
                        "stack-md": "1rem",
                        "gutter": "1rem",
                        "container-padding": "1.25rem",
                        "section-gap": "2.5rem"
                    },
                    "fontFamily": {
                        "label-md": ["JetBrains Mono"],
                        "headline-sm": ["Hanken Grotesk"],
                        "headline-md": ["Hanken Grotesk"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Hanken Grotesk"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Hanken Grotesk"]
                    },
                    "fontSize": {
                        "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "500" }],
                        "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-lg-mobile": ["28px", { "lineHeight": "36px", "fontWeight": "700" }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.5rem;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-hidden">
<div class="flex h-screen">

    <!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-outline-variant/10 shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DASHBOARD</p>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <!-- Direktori Lomba -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-label-md">Direktori Lomba</span>
            </a>
            <!-- Tim Finder -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.tim-finder.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-label-md">Tim Finder</span>
            </a>
            <!-- Tim Saya -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
                <span class="font-label-md text-label-md">Tim Saya</span>
            </a>
            <!-- Notifikasi -->
            <div x-data="{ jumlah: {{ \App\Models\Notification::where(['id_penerima' => Auth::id(), 'is_read' => false])->count() }} }" 
                 x-init="
                   setInterval(() => {
                     fetch('{{ route('mahasiswa.notifikasi.unread-count') }}')
                       .then(r => r.json())
                       .then(d => jumlah = d.count)
                   }, 10000)
                 ">
                <a class="flex items-center justify-between gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.notifikasi.index') }}">
                    <div class="flex items-center gap-stack-md">
                        <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.notifikasi.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">notifications</span>
                        <span class="font-label-md text-label-md">Notifikasi</span>
                    </div>
                    <template x-if="jumlah > 0">
                        <span class="px-2 py-0.5 bg-error text-on-error font-bold text-[10px] rounded-full animate-pulse" x-text="jumlah > 9 ? '9+' : jumlah"></span>
                    </template>
                </a>
            </div>
        </nav>
        <div class="mt-auto flex flex-col gap-1 pt-6">
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-stack-md text-error hover:bg-error/10 px-4 py-3 transition-all rounded-lg">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="font-label-md text-label-md">Logout</span>
                </button>
            </form>
            <a href="{{ route('mahasiswa.profile.edit') }}" class="mt-2 pt-4 border-t border-outline-variant/10 flex items-center gap-3 px-2 hover:bg-white/5 pb-2 rounded-lg transition-colors cursor-pointer group">
                <img alt="Profile" class="w-10 h-10 rounded-full border-2 border-secondary-fixed/30 group-hover:border-secondary-fixed transition-colors" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"/>
                <div class="overflow-hidden flex-1">
                    <p class="font-headline-sm text-[14px] text-white truncate group-hover:text-secondary-fixed transition-colors">{{ Auth::user()->name }}</p>
                    <p class="font-label-md text-[10px] text-on-surface-variant truncate">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
                </div>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col overflow-y-auto custom-scrollbar bg-[#0e3b31]">
        <div class="p-8 space-y-section-gap">
            <!-- Hero Grid: Deadline & Stats -->
            <section class="bento-grid">
                <!-- Deadline Terdekat -->
                @if($upcomingFirst)
                <div class="col-span-12 lg:col-span-8 bg-white/5 border border-white/10 rounded-3xl overflow-hidden p-8 flex flex-col justify-between min-h-80 relative">
                    <div class="absolute top-0 right-0 p-8">
                        <span class="px-4 py-2 bg-error/20 text-error rounded-full text-label-md font-bold uppercase tracking-wider">H-{{ $now->diffInDays($upcomingFirst->deadline, false) }} Deadline</span>
                    </div>
                    <div>
                        <h3 class="font-headline-lg text-headline-lg text-white mb-2">{{ $upcomingFirst->nama }}</h3>
                        <p class="text-on-surface-variant text-body-lg max-w-md">{{ $upcomingFirst->penyelenggara }}</p>
                    </div>
                    <div class="flex items-end justify-between mt-8 relative z-10">
                        <div class="flex items-center gap-4">
                            @if($upcomingFirst->poster)
                                <img src="{{ asset('storage/' . $upcomingFirst->poster) }}" alt="Poster" class="w-16 h-16 rounded-xl border-2 border-primary object-cover">
                            @endif
                            <div>
                                <p class="text-white font-bold">{{ $upcomingFirst->kategori }}</p>
                                <p class="text-on-surface-variant text-sm text-body-md">Selesaikan pendaftaran tim kamu sebelum deadline.</p>
                            </div>
                        </div>
                        <a href="{{ route('mahasiswa.lomba.show', $upcomingFirst->id) }}" class="bg-secondary-fixed text-on-secondary-fixed px-8 py-4 rounded-2xl font-bold hover:scale-105 transition-transform flex items-center gap-2">
                            Lihat Detail <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                    <!-- Background Accent -->
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-secondary opacity-10 blur-[100px] rounded-full"></div>
                </div>
                @else
                <div class="col-span-12 lg:col-span-8 bg-white/5 border border-white/10 rounded-3xl overflow-hidden p-8 flex flex-col justify-center min-h-80 relative">
                    <h3 class="font-headline-lg text-headline-lg text-white mb-2">Selamat Datang, {{ Auth::user()->name }}</h3>
                    <p class="text-on-surface-variant text-body-lg max-w-md">Belum ada deadline terdekat. Mulai eksplorasi kompetisi sekarang!</p>
                    <div class="mt-8">
                        <a href="{{ route('mahasiswa.lomba.index') }}" class="bg-secondary-fixed text-on-secondary-fixed px-8 py-4 rounded-2xl font-bold hover:scale-105 transition-transform inline-flex items-center gap-2">
                            Eksplorasi Lomba <span class="material-symbols-outlined">explore</span>
                        </a>
                    </div>
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-secondary opacity-10 blur-[100px] rounded-full"></div>
                </div>
                @endif

                <!-- Statistik Saya -->
                <div class="col-span-12 lg:col-span-4 grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-3xl p-6 flex flex-col justify-between shadow-lg hover:-translate-y-1 transition-transform">
                        <span class="material-symbols-outlined text-secondary-fixed-dim text-3xl">verified</span>
                        <div class="mt-4">
                            <p class="text-gray-500 text-label-md font-bold uppercase">Diterima</p>
                            <h4 class="text-black font-headline-md text-headline-md">{{ $lamaranDiterima }}</h4>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl p-6 flex flex-col justify-between shadow-lg hover:-translate-y-1 transition-transform">
                        <span class="material-symbols-outlined text-tertiary-container text-3xl">groups</span>
                        <div class="mt-4">
                            <p class="text-gray-500 text-label-md font-bold uppercase">Tim Diikuti</p>
                            <h4 class="text-black font-headline-md text-headline-md">{{ $totalTim }}</h4>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl p-6 flex flex-col justify-between shadow-lg hover:-translate-y-1 transition-transform">
                        <span class="material-symbols-outlined text-secondary text-3xl">emoji_events</span>
                        <div class="mt-4">
                            <p class="text-gray-500 text-label-md font-bold uppercase">Total Lamaran</p>
                            <h4 class="text-black font-headline-md text-headline-md">{{ $totalLamaran }}</h4>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl p-6 flex flex-col justify-between shadow-lg hover:-translate-y-1 transition-transform">
                        <span class="material-symbols-outlined text-error text-3xl">schedule</span>
                        <div class="mt-4">
                            <p class="text-gray-500 text-label-md font-bold uppercase">Menunggu</p>
                            <h4 class="text-black font-headline-md text-headline-md">{{ $lamaranPending }}</h4>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Lomba Aktif Terbaru -->
            <section>
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-8 bg-secondary rounded-full"></span>
                        <h3 class="font-headline-md text-headline-md text-white">Lomba Aktif Terbaru</h3>
                    </div>
                    <a class="text-secondary-fixed font-bold flex items-center gap-1 hover:underline" href="{{ route('mahasiswa.lomba.index') }}">
                        Lihat Semua <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
                <div class="flex gap-6 overflow-x-auto pb-4 custom-scrollbar">
                    @forelse($lombaAktif as $lomba)
                    @php $daysRemaining = Carbon::now()->diffInDays($lomba->deadline, false); @endphp
                    <!-- Competition Card -->
                    <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}" class="flex min-w-70 w-70 flex-col group relative bg-white/10 border border-white/15 rounded-3xl overflow-hidden shadow-xl transition-all hover:-translate-y-2 hover:bg-white/15">
                        <div class="relative h-64 overflow-hidden">
                            @if($lomba->poster)
                                <img alt="{{ $lomba->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('storage/' . $lomba->poster) }}"/>
                            @else
                                <div class="w-full h-full bg-primary/80 flex items-center justify-center text-on-primary-container">
                                    <span class="material-symbols-outlined text-[48px] opacity-20">image</span>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-primary/80 backdrop-blur-md px-3 py-1 rounded-full">
                                <span class="font-label-md text-label-md text-secondary-fixed uppercase">{{ $lomba->kategori }}</span>
                            </div>
                            <div class="absolute top-3 right-3 flex flex-col gap-2 items-end">
                                @if($daysRemaining <= 3 && $daysRemaining >= 0)
                                    <span class="bg-error text-on-error font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg animate-pulse">TERBATAS</span>
                                @else
                                    <span class="bg-secondary-fixed text-on-secondary-fixed font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg">BUKA</span>
                                @endif
                            </div>
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="mb-3">
                                <p class="text-white/60 text-[12px] font-medium uppercase tracking-wider mb-1 truncate">{{ $lomba->penyelenggara }}</p>
                                <h5 class="font-headline-md text-white leading-tight group-hover:text-secondary-fixed transition-colors line-clamp-2">{{ $lomba->nama }}</h5>
                            </div>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center gap-2 text-white/70">
                                    <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                                    <span class="text-body-md text-[13px]">Deadline: {{ Carbon::parse($lomba->deadline)->format('d M Y') }}</span>
                                </div>
                                @if($lomba->hadiah)
                                <div class="flex items-center gap-2 text-white/70">
                                    <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
                                    <span class="text-body-md text-[13px] font-semibold text-secondary-fixed truncate">{{ $lomba->hadiah }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="mt-auto flex flex-wrap gap-2 pt-3 border-t border-white/10">
                                <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-label-md text-white/80 uppercase">{{ $lomba->tingkat }}</span>
                                <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-label-md text-white/80 uppercase">{{ $lomba->status }}</span>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="py-8 px-6 text-on-surface-variant bg-white/5 rounded-2xl w-full">
                        Belum ada lomba aktif saat ini.
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- Rekomendasi Tim -->
            <section class="bento-grid">
                <div class="col-span-12 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-8 bg-secondary rounded-full"></span>
                        <h3 class="font-headline-md text-headline-md text-white">Rekomendasi Tim Untukmu</h3>
                    </div>
                    <a class="text-secondary-fixed font-bold flex items-center gap-1 hover:underline" href="{{ route('mahasiswa.tim-finder.index') }}">
                        Cari Tim Lain <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
                
                @forelse($recommendations as $slot)
                    <!-- Tim Card -->
                    <div class="col-span-12 lg:col-span-6 bg-white rounded-3xl p-8 relative overflow-hidden shadow-2xl group flex flex-col justify-between">
                        <div class="absolute top-0 right-0 bg-tertiary-container text-white px-6 py-2 rounded-bl-3xl font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">stars</span> {{ round($slot->matching_score) }}% Match
                        </div>
                        <div class="flex gap-6 mb-6">
                            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center shrink-0">
                                @if($slot->tim->lomba->poster)
                                    <img src="{{ asset('storage/' . $slot->tim->lomba->poster) }}" class="w-full h-full object-cover rounded-2xl">
                                @else
                                    <span class="material-symbols-outlined text-4xl text-black">groups_3</span>
                                @endif
                            </div>
                            <div>
                                <h4 class="text-black font-headline-md text-headline-md">{{ $slot->tim->nama_tim }}</h4>
                                <p class="text-gray-500 text-body-md">{{ $slot->tim->lomba->nama ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="space-y-4 flex-1">
                            <div class="flex items-center gap-3">
                                <span class="text-label-md font-bold text-secondary bg-secondary/10 px-3 py-1 rounded-lg">POSISI: {{ strtoupper($slot->posisi) }}</span>
                                <span class="text-gray-500 text-body-md line-clamp-1">{{ $slot->deskripsi_tugas ?? 'Cocok dengan keahlianmu' }}</span>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($slot->keahlian_dibutuhkan as $keahlian)
                                    <span class="font-label-md text-[10px] bg-gray-100 text-gray-700 px-3 py-1 rounded-full uppercase tracking-wider">{{ $keahlian }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center">
                            <div class="flex items-center gap-2 text-gray-500 text-sm">
                                <span class="material-symbols-outlined text-lg">person</span>
                                Ketua: {{ $slot->tim->ketua->name ?? '-' }}
                            </div>
                            <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}" class="bg-black text-white px-6 py-3 rounded-xl font-bold hover:bg-secondary transition-colors">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-12 bg-white/5 rounded-3xl p-8 text-center">
                        <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center text-white mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl">psychology</span>
                        </div>
                        <h5 class="text-white font-bold text-lg mb-2">Belum ada rekomendasi</h5>
                        <p class="text-on-surface-variant text-body-md mb-6">Perbarui profil dan tambahkan keahlianmu agar sistem bisa merekomendasikan tim yang tepat.</p>
                        <a href="{{ route('mahasiswa.profile.edit') }}" class="bg-secondary-fixed text-on-secondary-fixed px-6 py-2.5 rounded-full font-bold hover:scale-105 transition-transform inline-block">Update Keahlian</a>
                    </div>
                @endforelse
            </section>

            <!-- CTA Card -->
            <section class="pb-12">
                <div class="bg-linear-to-r from-secondary-fixed to-secondary-fixed-dim rounded-[40px] p-12 relative overflow-hidden flex items-center justify-between">
                    <div class="relative z-10">
                        <h2 class="text-on-secondary-fixed font-headline-lg text-headline-lg mb-4">Ingin Menjadi Juara?</h2>
                        <p class="text-on-secondary-fixed/80 text-body-lg max-w-lg mb-8">Eksplorasi ribuan kompetisi yang tersedia di platform kami. Temukan tim impian dan asah kemampuan terbaikmu.</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('mahasiswa.lomba.index') }}" class="bg-primary text-white px-8 py-4 rounded-2xl font-bold hover:shadow-2xl transition-all">Jelajahi Kompetisi</a>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="border-2 border-on-secondary-fixed text-on-secondary-fixed px-8 py-4 rounded-2xl font-bold hover:bg-on-secondary-fixed/5 transition-all">Cari Rekan Tim</a>
                        </div>
                    </div>
                    <!-- Decorative Icon -->
                    <div class="relative z-10 pr-12 hidden lg:block">
                        <div class="w-48 h-48 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/30 animate-bounce duration-3000">
                            <span class="material-symbols-outlined text-[100px] text-on-secondary-fixed">workspace_premium</span>
                        </div>
                    </div>
                    <!-- Abstract Circles -->
                    <div class="absolute -top-12 -right-12 w-64 h-64 bg-white/10 rounded-full"></div>
                    <div class="absolute -bottom-12 right-24 w-40 h-40 bg-white/10 rounded-full"></div>
                </div>
            </section>
        </div>
    </main>

</div>

<script>
    // Simple Micro-interactions
    document.querySelectorAll('.group').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-4px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
</script>
</body>
</html>
