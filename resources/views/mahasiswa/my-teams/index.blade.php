<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tim Saya | SiLomba</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
                        "on-background": "#191c1e",
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
                        "on-surface-variant": "#414846",
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
                        "primary": "#001813",
                        "on-error-container": "#93000a",
                        "background": "#f7f9fb",
                        "surface": "#f7f9fb",
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
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #001813; }
        ::-webkit-scrollbar-thumb { background: #005228; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00743a; }
        .card-glass {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.10);
        }
        .team-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(107,254,156,0.12);
            transition: all 0.25s ease;
        }
        .team-card:hover {
            background: rgba(255,255,255,0.09);
            border-color: rgba(107,254,156,0.30);
            box-shadow: 0 10px 30px rgba(0,109,55,0.20);
        }
        .tab-btn {
            position: relative;
            padding: 0.75rem 1.25rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            letter-spacing: 0.05em;
            font-weight: 500;
            color: rgba(255,255,255,0.55);
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
            white-space: nowrap;
            cursor: pointer;
            background: none;
            border-top: none;
            border-left: none;
            border-right: none;
        }
        .tab-btn:hover { color: rgba(255,255,255,0.85); }
        .tab-btn.active {
            color: #6bfe9c;
            border-bottom-color: #6bfe9c;
        }
        .modal-backdrop {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(6px);
            z-index: 100;
            display: flex; align-items: center; justify-content: center;
        }
        .modal-box {
            background: #0b2e24;
            border: 1px solid rgba(107,254,156,0.2);
            border-radius: 1.5rem;
            padding: 2.5rem;
            max-width: 28rem;
            width: 100%;
            box-shadow: 0 32px 64px rgba(0,0,0,0.5);
            animation: scaleIn 0.25s cubic-bezier(0.16,1,0.3,1);
        }
        @keyframes scaleIn {
            from { transform: scale(0.93); opacity: 0; }
            to   { transform: scale(1);    opacity: 1; }
        }
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-primary text-on-primary-fixed selection:bg-secondary-fixed selection:text-on-secondary-fixed font-body-md overflow-x-hidden">
<div class="flex min-h-screen"
     x-data="{ tab: '{{ $totalLamaranMasuk > 0 ? 'lamaran-masuk' : ($timSayaKetuai->count() > 0 ? 'tim-kelola' : ($lamaranPending->count() > 0 ? 'pending' : 'aktif')) }}' }">

    <!-- ═══════════════════════════════════════════
         SIDEBAR — identical to Direktori Lomba
    ═══════════════════════════════════════════ -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-outline-variant/10 shadow-none py-stack-lg px-stack-md z-50">
        <!-- Logo -->
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DIREKTORI LOMBA</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-col gap-2">
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-label-md">Direktori Lomba</span>
            </a>
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.tim-finder.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-label-md">Tim Finder</span>
            </a>
            <!-- Tim Saya — active -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
                <span class="font-label-md text-label-md">Tim Saya</span>
            </a>
            <!-- Notifikasi -->
            <div x-data="{ jumlah: {{ \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count() }} }"
                 x-init="setInterval(() => { fetch('{{ route('mahasiswa.notifikasi.unread-count') }}').then(r => r.json()).then(d => jumlah = d.count) }, 10000)">
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

        <!-- Bottom -->
        <div class="mt-auto flex flex-col gap-1 pt-6">
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

    <!-- ═══════════════════════════════════════════
         MAIN CONTENT
    ═══════════════════════════════════════════ -->
    <div class="flex-1 flex flex-col min-w-0 bg-[#0e3b31]">
        <main class="flex-1 p-8 overflow-y-auto">

            <!-- Page Header -->
            <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-white mb-2">Tim Saya</h2>
                    <p class="text-white/70 text-body-lg max-w-2xl">
                        Kelola tim, anggota, dan lamaran dalam satu tempat.
                    </p>
                </div>
                <div class="flex gap-3 flex-shrink-0">
                    @if($mahasiswa)
                        <a href="{{ route('mahasiswa.team.create') }}"
                           class="flex items-center gap-2 px-5 py-2.5 border border-secondary-fixed/50 text-secondary-fixed text-[13px] font-bold rounded-xl hover:bg-secondary-fixed/10 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">add</span>
                            Buat Tim Baru
                        </a>
                    @endif
                    <a href="{{ route('mahasiswa.tim-finder.index') }}"
                       class="flex items-center gap-2 px-5 py-2.5 bg-secondary-fixed text-on-secondary-fixed text-[13px] font-bold rounded-xl hover:bg-secondary-fixed-dim transition-colors">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                        Cari Tim
                    </a>
                </div>
            </div>

            <!-- Flash Messages -->
            <div x-data="{ tampil: true }" x-show="tampil" x-init="setTimeout(() => tampil = false, 5000)" class="space-y-3 mb-6">
                @if(session('success'))
                    <div class="p-4 bg-secondary-fixed/15 border border-secondary-fixed/30 rounded-2xl flex items-center justify-between gap-3 text-secondary-fixed">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1;">check_circle</span>
                            <p class="text-sm font-semibold">{{ session('success') }}</p>
                        </div>
                        <button @click="tampil = false" class="opacity-60 hover:opacity-100">
                            <span class="material-symbols-outlined text-[18px]">close</span>
                        </button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="p-4 bg-error/15 border border-error/30 rounded-2xl flex items-center justify-between gap-3 text-red-300">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1;">error</span>
                            <p class="text-sm font-semibold">{{ session('error') }}</p>
                        </div>
                        <button @click="tampil = false" class="opacity-60 hover:opacity-100">
                            <span class="material-symbols-outlined text-[18px]">close</span>
                        </button>
                    </div>
                @endif
            </div>

            <!-- ─── Stat Cards ─────────────────────────────────── -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <!-- Lamaran Masuk / Tim Diikuti -->
                @if($timSayaKetuai->count() > 0)
                    <div class="card-glass rounded-2xl p-5 flex items-center gap-4 border-l-4 border-l-amber-400/70">
                        <div class="w-11 h-11 rounded-xl bg-amber-500/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-amber-400 text-[22px]" style="font-variation-settings:'FILL' 1;">mark_email_unread</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-black text-amber-400">{{ $totalLamaranMasuk }}</span>
                            <span class="text-[10px] text-white/50 font-label-md uppercase tracking-wider">Lamaran Masuk</span>
                        </div>
                    </div>
                @else
                    <div class="card-glass rounded-2xl p-5 flex items-center gap-4 opacity-70">
                        <div class="w-11 h-11 rounded-xl bg-secondary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary-fixed text-[22px]" style="font-variation-settings:'FILL' 1;">group</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-black text-white">{{ $timSebagaiAnggota->count() }}</span>
                            <span class="text-[10px] text-white/50 font-label-md uppercase tracking-wider">Tim Diikuti</span>
                        </div>
                    </div>
                @endif

                <!-- Lamaranku Pending -->
                <div class="card-glass rounded-2xl p-5 flex items-center gap-4 relative">
                    <div class="w-11 h-11 rounded-xl bg-blue-500/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-blue-400 text-[22px]" style="font-variation-settings:'FILL' 1;">hourglass_top</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-blue-400">{{ $lamaranPending->count() }}</span>
                        <span class="text-[10px] text-white/50 font-label-md uppercase tracking-wider">Lamaranku</span>
                    </div>
                    @if($lamaranPending->count() > 0)
                        <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                    @endif
                </div>

                <!-- Diterima -->
                <div class="card-glass rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-11 h-11 rounded-xl bg-secondary-fixed/15 flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary-fixed text-[22px]" style="font-variation-settings:'FILL' 1;">check_circle</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-secondary-fixed">{{ $lamaranDiterima->count() }}</span>
                        <span class="text-[10px] text-white/50 font-label-md uppercase tracking-wider">Diterima</span>
                    </div>
                </div>

                <!-- Tim Dikelola / Ditolak -->
                @if($timSayaKetuai->count() > 0)
                    <div class="card-glass rounded-2xl p-5 flex items-center gap-4 border-l-4 border-l-secondary-fixed/50">
                        <div class="w-11 h-11 rounded-xl bg-secondary-fixed/15 flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary-fixed text-[22px]" style="font-variation-settings:'FILL' 1;">workspace_premium</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-black text-secondary-fixed">{{ $timSayaKetuai->count() }}</span>
                            <span class="text-[10px] text-white/50 font-label-md uppercase tracking-wider">Tim Dikelola</span>
                        </div>
                    </div>
                @else
                    <div class="card-glass rounded-2xl p-5 flex items-center gap-4">
                        <div class="w-11 h-11 rounded-xl bg-red-500/15 flex items-center justify-center">
                            <span class="material-symbols-outlined text-red-400 text-[22px]" style="font-variation-settings:'FILL' 1;">cancel</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-black text-red-400">{{ $lamaranDitolak->count() }}</span>
                            <span class="text-[10px] text-white/50 font-label-md uppercase tracking-wider">Ditolak</span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- ─── Tabs ─────────────────────────────────────────── -->
            <div class="mb-section-gap">
                <!-- Tab Navigation -->
                <div class="flex border-b border-white/10 overflow-x-auto no-scrollbar gap-1">
                    @if($timSayaKetuai->count() > 0)
                        <button class="tab-btn" :class="tab === 'lamaran-masuk' ? 'active' : ''" @click="tab = 'lamaran-masuk'">
                            <span class="material-symbols-outlined text-[15px] align-middle mr-1" style="font-variation-settings:'FILL' 1;">mark_email_unread</span>
                            Lamaran Masuk
                            @if($totalLamaranMasuk > 0)
                                <span class="ml-1.5 px-1.5 py-0.5 bg-error text-on-error text-[9px] font-bold rounded-full animate-pulse">{{ $totalLamaranMasuk }}</span>
                            @endif
                        </button>
                        <button class="tab-btn" :class="tab === 'tim-kelola' ? 'active' : ''" @click="tab = 'tim-kelola'">
                            <span class="material-symbols-outlined text-[15px] align-middle mr-1" style="font-variation-settings:'FILL' 1;">workspace_premium</span>
                            Tim Saya Kelola
                            <span class="ml-1.5 px-1.5 py-0.5 bg-secondary-fixed/25 text-secondary-fixed text-[9px] font-bold rounded-full">{{ $timSayaKetuai->count() }}</span>
                        </button>
                    @endif
                    <button class="tab-btn" :class="tab === 'aktif' ? 'active' : ''" @click="tab = 'aktif'">
                        <span class="material-symbols-outlined text-[15px] align-middle mr-1" style="font-variation-settings:'FILL' 1;">group</span>
                        Tim yang Diikuti
                        @if($timSebagaiAnggota->count() > 0)
                            <span class="ml-1.5 px-1.5 py-0.5 bg-secondary-fixed/25 text-secondary-fixed text-[9px] font-bold rounded-full">{{ $timSebagaiAnggota->count() }}</span>
                        @endif
                    </button>
                    <button class="tab-btn" :class="tab === 'pending' ? 'active' : ''" @click="tab = 'pending'">
                        <span class="material-symbols-outlined text-[15px] align-middle mr-1" style="font-variation-settings:'FILL' 1;">hourglass_top</span>
                        Menunggu Review
                        @if($lamaranPending->count() > 0)
                            <span class="ml-1.5 px-1.5 py-0.5 bg-amber-400/30 text-amber-300 text-[9px] font-bold rounded-full">{{ $lamaranPending->count() }}</span>
                        @endif
                    </button>
                    <button class="tab-btn" :class="tab === 'ditolak' ? 'active' : ''" @click="tab = 'ditolak'">
                        <span class="material-symbols-outlined text-[15px] align-middle mr-1" style="font-variation-settings:'FILL' 1;">cancel</span>
                        Ditolak
                    </button>
                    <button class="tab-btn" :class="tab === 'riwayat' ? 'active' : ''" @click="tab = 'riwayat'">
                        <span class="material-symbols-outlined text-[15px] align-middle mr-1">history</span>
                        Riwayat
                    </button>
                </div>
            </div>

            <!-- ═══════════════════════════════════════════════════
                 TAB: LAMARAN MASUK (Ketua Tim)
            ═══════════════════════════════════════════════════ -->
            @if($timSayaKetuai->count() > 0)
            <div x-show="tab === 'lamaran-masuk'" class="space-y-8" x-cloak>
                @if($totalLamaranMasuk > 0)
                    <p class="text-white/60 text-body-md mb-2">Total <span class="font-bold text-white">{{ $totalLamaranMasuk }}</span> lamaran menunggu keputusanmu.</p>
                    @foreach($timSayaKetuai as $tim)
                        @php $lamaranTimIni = $lamaranMasuk->filter(fn($l) => $l->slot->id_tim === $tim->id); @endphp
                        @if($lamaranTimIni->count() > 0)
                            <div class="space-y-4">
                                <!-- Tim badge -->
                                <div class="flex items-center gap-3 flex-wrap">
                                    <span class="px-4 py-1.5 bg-secondary-fixed/20 border border-secondary-fixed/30 text-secondary-fixed text-[11px] font-bold rounded-full uppercase tracking-widest flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[15px]" style="font-variation-settings:'FILL' 1;">workspace_premium</span>
                                        {{ $tim->nama_tim }}
                                    </span>
                                    <span class="text-[11px] text-white/40 font-label-md">{{ $tim->lomba->nama }}</span>
                                    <span class="px-2.5 py-0.5 bg-amber-400/20 text-amber-300 text-[10px] font-bold rounded-full">{{ $lamaranTimIni->count() }} lamaran</span>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    @foreach($lamaranTimIni as $lamaran)
                                        <div class="team-card rounded-2xl p-6">
                                            <div class="flex flex-col md:flex-row justify-between gap-6 mb-5">
                                                <!-- Pelamar Info -->
                                                <div class="flex gap-4">
                                                    <div class="w-14 h-14 rounded-xl bg-secondary/30 border border-secondary-fixed/20 text-secondary-fixed font-black text-xl flex items-center justify-center flex-shrink-0">
                                                        {{ strtoupper(substr($lamaran->pelamar->name, 0, 2)) }}
                                                    </div>
                                                    <div>
                                                        <h4 class="font-bold text-white text-[16px] mb-1">{{ $lamaran->pelamar->name }}</h4>
                                                        <div class="flex flex-wrap gap-x-4 gap-y-1">
                                                            <p class="text-[12px] text-white/50 flex items-center gap-1">
                                                                <span class="material-symbols-outlined text-[13px]">mail</span>
                                                                {{ $lamaran->pelamar->email }}
                                                            </p>
                                                            <p class="text-[12px] text-white/50 flex items-center gap-1">
                                                                <span class="material-symbols-outlined text-[13px]">badge</span>
                                                                NIM: {{ $lamaran->pelamar->mahasiswa->nim }}
                                                            </p>
                                                            <p class="text-[12px] text-white/50 flex items-center gap-1">
                                                                <span class="material-symbols-outlined text-[13px]">school</span>
                                                                {{ $lamaran->pelamar->mahasiswa->program_studi }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Posisi badge -->
                                                <div class="text-right flex-shrink-0">
                                                    <span class="inline-block px-4 py-1.5 bg-secondary-fixed/15 border border-secondary-fixed/30 text-secondary-fixed text-[11px] font-bold rounded-full uppercase tracking-wider">
                                                        {{ $lamaran->slot->posisi }}
                                                    </span>
                                                    <p class="text-[10px] text-white/40 font-label-md mt-2">{{ $lamaran->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>

                                            <!-- Skills -->
                                            <div class="mb-5">
                                                <p class="text-[10px] text-white/40 font-label-md uppercase tracking-wider mb-3">Keahlian Pelamar</p>
                                                <div class="flex flex-wrap gap-2">
                                                    @php
                                                        $keahlianSlot    = is_array($lamaran->slot->keahlian_dibutuhkan) ? $lamaran->slot->keahlian_dibutuhkan : (json_decode($lamaran->slot->keahlian_dibutuhkan, true) ?? []);
                                                        $keahlianPelamar = is_array($lamaran->pelamar->mahasiswa->keahlian) ? $lamaran->pelamar->mahasiswa->keahlian : (json_decode($lamaran->pelamar->mahasiswa->keahlian, true) ?? []);
                                                        $cocok = 0;
                                                        $keahlianSlotLower = array_map('strtolower', $keahlianSlot);
                                                    @endphp
                                                    @foreach($keahlianPelamar as $skill)
                                                        @php $isMatch = in_array(strtolower($skill), $keahlianSlotLower); if($isMatch) $cocok++; @endphp
                                                        <span class="text-[10px] font-bold rounded-full px-3 py-1 border
                                                            {{ $isMatch ? 'bg-secondary-fixed/15 text-secondary-fixed border-secondary-fixed/30' : 'bg-white/5 text-white/40 border-white/10' }}">
                                                            {{ $isMatch ? '✓' : '' }} {{ $skill }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                                @if(count($keahlianSlot) > 0)
                                                    <div class="mt-3 flex items-center gap-3">
                                                        <div class="flex-1 h-1.5 bg-white/10 rounded-full overflow-hidden">
                                                            <div class="h-full bg-secondary-fixed rounded-full transition-all duration-700" style="width: {{ ($cocok / count($keahlianSlot)) * 100 }}%"></div>
                                                        </div>
                                                        <p class="text-[10px] text-white/50 font-label-md whitespace-nowrap">Match: {{ round(($cocok / count($keahlianSlot)) * 100) }}%</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Pesan Motivasi -->
                                            <div x-data="{ buka: false }" class="mb-5">
                                                <button @click="buka = !buka" class="text-[11px] font-bold text-secondary-fixed/80 hover:text-secondary-fixed flex items-center gap-1 font-label-md uppercase tracking-wider transition-colors">
                                                    <span class="material-symbols-outlined text-[14px]" x-text="buka ? 'expand_less' : 'expand_more'"></span>
                                                    <span x-text="buka ? 'Sembunyikan Pesan' : 'Lihat Pesan Motivasi'"></span>
                                                </button>
                                                <div x-show="buka" x-transition class="mt-3 bg-white/5 border-l-2 border-secondary-fixed/40 rounded-r-xl pl-4 pr-4 py-3 text-[13px] text-white/80 italic leading-relaxed">
                                                    "{{ $lamaran->pesan_motivasi }}"
                                                </div>
                                            </div>

                                            @if($lamaran->pelamar->mahasiswa->link_portofolio)
                                                <div class="mb-4 flex items-center gap-2">
                                                    <span class="text-[10px] text-white/40 font-label-md uppercase tracking-wider">Portofolio:</span>
                                                    <a href="{{ $lamaran->pelamar->mahasiswa->link_portofolio }}" target="_blank"
                                                       class="text-[11px] font-bold text-secondary-fixed hover:underline flex items-center gap-1">
                                                        Lihat Portofolio
                                                        <span class="material-symbols-outlined text-[13px]">open_in_new</span>
                                                    </a>
                                                </div>
                                            @endif

                                            <!-- Actions -->
                                            <div class="pt-5 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4">
                                                <a href="{{ route('mahasiswa.portfolio', $lamaran->pelamar->mahasiswa->nim) }}"
                                                   class="text-[11px] font-label-md font-bold text-white/40 hover:text-secondary-fixed uppercase tracking-wider flex items-center gap-1 transition-colors">
                                                    <span class="material-symbols-outlined text-[15px]">person</span>
                                                    Profil Lengkap
                                                </a>
                                                <div class="flex gap-3 w-full sm:w-auto">
                                                    <!-- Tolak modal -->
                                                    <div x-data="{ modal: false, alasan: '' }">
                                                        <button @click="modal = true"
                                                                class="flex items-center gap-1.5 border border-error/40 text-red-400 text-[11px] font-bold uppercase tracking-wider rounded-xl px-5 py-2 hover:bg-error/10 transition-colors">
                                                            <span class="material-symbols-outlined text-[15px]">cancel</span>Tolak
                                                        </button>
                                                        <div x-show="modal" class="modal-backdrop" x-cloak @click.self="modal = false">
                                                            <div class="modal-box">
                                                                <div class="w-16 h-16 bg-error/20 rounded-full flex items-center justify-center mx-auto mb-5">
                                                                    <span class="material-symbols-outlined text-red-400 text-[32px]" style="font-variation-settings:'FILL' 1;">cancel</span>
                                                                </div>
                                                                <h4 class="font-headline-sm text-headline-sm text-white text-center mb-2">Tolak Lamaran?</h4>
                                                                <p class="text-[13px] text-white/60 text-center mb-6">Berikan alasan agar <span class="text-white font-bold">{{ $lamaran->pelamar->name }}</span> bisa belajar lebih baik.</p>
                                                                <textarea x-model="alasan" placeholder="Alasan penolakan (opsional)"
                                                                          class="w-full bg-white/5 border border-white/15 rounded-xl px-4 py-3 text-white text-[13px] placeholder:text-white/30 focus:ring-1 focus:ring-secondary-fixed mb-5 resize-none"
                                                                          rows="3"></textarea>
                                                                <div class="flex gap-3">
                                                                    <button @click="modal = false"
                                                                            class="flex-1 py-3 bg-white/5 text-white/60 font-label-md font-bold uppercase tracking-wider text-[10px] rounded-xl hover:bg-white/10 transition-colors">Batal</button>
                                                                    <form action="{{ route('mahasiswa.my-teams.lamaran.tolak', $lamaran->id) }}" method="POST" class="flex-1">
                                                                        @csrf
                                                                        <input type="hidden" name="alasan" :value="alasan">
                                                                        <button type="submit"
                                                                                class="w-full py-3 bg-error text-on-error font-label-md font-bold uppercase tracking-wider text-[10px] rounded-xl hover:bg-red-700 transition-colors">Ya, Tolak</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Terima modal -->
                                                    <div x-data="{ modal: false }">
                                                        <button @click="modal = true"
                                                                class="flex items-center gap-1.5 bg-secondary-fixed text-on-secondary-fixed text-[11px] font-bold uppercase tracking-wider rounded-xl px-5 py-2 hover:bg-secondary-fixed-dim transition-colors">
                                                            <span class="material-symbols-outlined text-[15px]">check_circle</span>Terima
                                                        </button>
                                                        <div x-show="modal" class="modal-backdrop" x-cloak @click.self="modal = false">
                                                            <div class="modal-box">
                                                                <div class="w-16 h-16 bg-secondary-fixed/20 rounded-full flex items-center justify-center mx-auto mb-5">
                                                                    <span class="material-symbols-outlined text-secondary-fixed text-[32px]" style="font-variation-settings:'FILL' 1;">celebration</span>
                                                                </div>
                                                                <h4 class="font-headline-sm text-headline-sm text-white text-center mb-2">Terima Anggota Baru?</h4>
                                                                <p class="text-[13px] text-white/60 text-center mb-6"><span class="text-white font-bold">{{ $lamaran->pelamar->name }}</span> akan langsung masuk ke grup chat tim.</p>
                                                                <div class="flex gap-3">
                                                                    <button @click="modal = false"
                                                                            class="flex-1 py-3 bg-white/5 text-white/60 font-label-md font-bold uppercase tracking-wider text-[10px] rounded-xl hover:bg-white/10 transition-colors">Batal</button>
                                                                    <form action="{{ route('mahasiswa.my-teams.lamaran.terima', $lamaran->id) }}" method="POST" class="flex-1">
                                                                        @csrf
                                                                        <button type="submit"
                                                                                class="w-full py-3 bg-secondary-fixed text-on-secondary-fixed font-label-md font-bold uppercase tracking-wider text-[10px] rounded-xl hover:bg-secondary-fixed-dim transition-colors">Ya, Terima</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="card-glass rounded-2xl py-20 text-center">
                        <div class="w-20 h-20 bg-amber-500/10 border border-amber-400/20 rounded-full flex items-center justify-center mx-auto mb-5">
                            <span class="material-symbols-outlined text-amber-400 text-[40px]" style="font-variation-settings:'FILL' 1;">mark_email_unread</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-white mb-2">Belum ada lamaran masuk</h3>
                        <p class="text-white/50 text-body-md max-w-sm mx-auto">Pastikan slot tim terbuka agar mahasiswa lain bisa melamar.</p>
                    </div>
                @endif
            </div>
            @endif

            <!-- ═══════════════════════════════════════════════════
                 TAB: TIM SAYA KELOLA (Ketua)
            ═══════════════════════════════════════════════════ -->
            <div x-show="tab === 'tim-kelola'" class="space-y-5" x-cloak>
                @forelse($timSayaKetuai as $tim)
                    <div class="team-card rounded-2xl overflow-hidden border-t-4 border-t-secondary-fixed/50">
                        <div class="p-7">
                            <div class="flex flex-col md:flex-row justify-between gap-5 mb-7">
                                <div>
                                    <div class="flex items-center gap-2 mb-3 flex-wrap">
                                        <span class="px-3 py-1 bg-secondary-fixed/15 border border-secondary-fixed/30 text-secondary-fixed text-[10px] font-bold rounded-full uppercase tracking-widest flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[12px]" style="font-variation-settings:'FILL' 1;">workspace_premium</span>KETUA TIM
                                        </span>
                                        <span class="px-3 py-1 bg-white/5 border border-white/10 text-white/50 text-[10px] font-bold rounded-full">{{ $tim->lomba->nama }}</span>
                                    </div>
                                    <h3 class="font-headline-md text-headline-md text-white">{{ $tim->nama_tim }}</h3>
                                </div>
                                <div class="flex gap-2 flex-shrink-0">
                                    <a href="{{ route('mahasiswa.chat.show', $tim->id) }}"
                                       class="flex items-center gap-2 px-5 py-2.5 bg-secondary-fixed text-on-secondary-fixed text-[11px] font-bold rounded-xl hover:bg-secondary-fixed-dim transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">chat</span>Chat Grup
                                    </a>
                                    <a href="{{ route('mahasiswa.my-teams.show', $tim->id) }}"
                                       class="flex items-center gap-2 px-5 py-2.5 bg-white/5 border border-white/10 text-white text-[11px] font-bold rounded-xl hover:bg-white/10 transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">open_in_new</span>Detail
                                    </a>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
                                <!-- Anggota -->
                                <div>
                                    <h4 class="text-[11px] font-label-md font-bold text-white/50 mb-4 uppercase tracking-wider flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[16px] text-secondary-fixed" style="font-variation-settings:'FILL' 1;">group</span>
                                        Anggota Aktif ({{ $tim->anggota->count() }})
                                    </h4>
                                    <div class="space-y-2">
                                        @foreach($tim->anggota as $member)
                                            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/8">
                                                <div class="w-9 h-9 rounded-full bg-secondary/30 border border-secondary-fixed/20 flex items-center justify-center font-bold text-[13px] text-secondary-fixed flex-shrink-0">
                                                    {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5 class="text-[13px] font-bold text-white truncate">{{ $member->user->name }}</h5>
                                                    <p class="text-[10px] text-white/40">{{ $member->user->email }} · {{ $member->mahasiswa->nim ?? '-' }}</p>
                                                </div>
                                                <span class="px-2 py-0.5 bg-white/5 border border-white/10 text-white/50 text-[9px] font-label-md rounded uppercase">{{ $member->peran }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Slot Status -->
                                <div>
                                    <h4 class="text-[11px] font-label-md font-bold text-white/50 mb-4 uppercase tracking-wider flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[16px] text-amber-400" style="font-variation-settings:'FILL' 1;">inbox</span>
                                        Status Slot Tim
                                    </h4>
                                    <div class="space-y-2">
                                        @foreach($tim->slots as $slot)
                                            @php $pendingCount = $slot->lamarans->where('status', 'pending')->count(); @endphp
                                            <div class="p-3 rounded-xl border {{ $slot->status == 'buka' ? 'bg-white/5 border-secondary-fixed/15' : 'bg-white/3 border-white/5 opacity-60' }}">
                                                <div class="flex justify-between items-start mb-1">
                                                    <h5 class="text-[13px] font-bold text-white">{{ $slot->posisi }}</h5>
                                                    <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase {{ $slot->status == 'buka' ? 'bg-secondary-fixed/15 text-secondary-fixed' : 'bg-red-500/15 text-red-400' }}">
                                                        {{ $slot->status }}
                                                    </span>
                                                </div>
                                                <div class="flex justify-between items-center">
                                                    <p class="text-[10px] text-white/40">{{ $slot->lamarans->where('status','diterima')->count() }}/{{ $slot->jumlah_slot }} Terisi</p>
                                                    @if($pendingCount > 0)
                                                        <button @click="tab = 'lamaran-masuk'"
                                                                class="text-[10px] font-bold text-secondary-fixed hover:underline flex items-center gap-1">
                                                            <span class="material-symbols-outlined text-[12px]">bolt</span>
                                                            {{ $pendingCount }} Pending
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($tim->slots->count() == 0)
                                            <div class="p-6 border-2 border-dashed border-white/10 rounded-xl text-center">
                                                <p class="text-[10px] text-white/30 font-label-md uppercase tracking-wider">Tidak ada slot dibuka</p>
                                                <a href="{{ route('mahasiswa.team.manage', $tim->id) }}" class="text-[11px] text-secondary-fixed font-bold mt-2 inline-block hover:underline">Kelola Tim →</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card-glass rounded-2xl py-20 text-center">
                        <h3 class="font-headline-sm text-headline-sm text-white mb-2">Belum ada tim yang kamu kelola</h3>
                        <p class="text-white/50 text-body-md max-w-sm mx-auto">Buat tim baru untuk mulai membuka slot dan menerima anggota.</p>
                    </div>
                @endforelse
            </div>

            <!-- ═══════════════════════════════════════════════════
                 TAB: TIM YANG DIIKUTI
            ═══════════════════════════════════════════════════ -->
            <div x-show="tab === 'aktif'" class="space-y-5" x-cloak>
                @forelse($timSebagaiAnggota as $anggota)
                    <div class="team-card rounded-2xl overflow-hidden group">
                        <!-- Card Header -->
                        <div class="bg-white/3 px-7 py-5 border-b border-white/8">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div>
                                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                                        <span class="px-3 py-1 bg-white/5 border border-white/10 text-white/50 text-[9px] font-bold rounded uppercase tracking-widest">{{ $anggota->tim->lomba->kategori }}</span>
                                        <span class="px-3 py-1 bg-secondary-fixed/15 text-secondary-fixed text-[9px] font-bold rounded uppercase tracking-widest">● AKTIF</span>
                                    </div>
                                    <h3 class="font-headline-sm text-headline-sm text-white">{{ $anggota->tim->nama_tim }}</h3>
                                    <p class="text-[13px] font-bold text-secondary-fixed/80 mt-1">{{ $anggota->tim->lomba->nama }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="px-3 py-1.5 bg-white/5 border border-white/10 text-white/50 rounded-xl text-[10px] font-label-md uppercase flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[13px]" style="font-variation-settings:'FILL' 1;">person</span>
                                        ANGGOTA TIM
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="p-7">
                            <!-- Quick Stats -->
                            <div class="grid grid-cols-3 gap-4 bg-white/3 rounded-xl p-4 mb-6 border border-white/8">
                                <div class="text-center">
                                    <p class="text-[16px] font-bold text-white">{{ $anggota->tim->lomba->tingkat }}</p>
                                    <p class="text-[9px] text-white/40 font-label-md uppercase tracking-wider mt-1">Tingkat</p>
                                </div>
                                <div class="text-center border-x border-white/8">
                                    <p class="text-[16px] font-bold text-white">{{ $anggota->tim->lomba->deadline->format('d M') }}</p>
                                    <p class="text-[9px] text-white/40 font-label-md uppercase tracking-wider mt-1">Deadline</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-[16px] font-bold text-secondary-fixed">{{ $anggota->tim->anggota->count() }}/{{ $anggota->tim->maks_anggota }}</p>
                                    <p class="text-[9px] text-white/40 font-label-md uppercase tracking-wider mt-1">Kapasitas</p>
                                </div>
                            </div>

                            <!-- Rekan Tim -->
                            <div class="mb-6">
                                <h4 class="text-[10px] font-label-md font-bold text-white/40 mb-3 uppercase tracking-wider">Rekan Tim</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach($anggota->tim->anggota as $member)
                                        <div class="flex items-center gap-3 p-3 rounded-xl bg-white/3 border border-white/8 hover:border-secondary-fixed/20 transition-colors">
                                            <div class="w-8 h-8 rounded-full bg-secondary/25 flex items-center justify-center font-bold text-[11px] text-secondary-fixed flex-shrink-0">
                                                {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <h5 class="text-[12px] font-bold text-white truncate">{{ $member->user->name }}</h5>
                                                <p class="text-[9px] text-white/40 font-label-md uppercase">{{ $member->peran }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Footer Actions -->
                            <div class="pt-5 border-t border-white/8 flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-secondary/25 flex items-center justify-center text-secondary-fixed font-bold text-[12px]">
                                        {{ strtoupper(substr($anggota->tim->ketua->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-white/40 font-label-md uppercase tracking-wider">Ketua Tim</p>
                                        <p class="text-[12px] font-bold text-white">{{ $anggota->tim->ketua->name }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                    <a href="{{ route('mahasiswa.chat.show', $anggota->tim->id) }}"
                                       class="flex-1 sm:flex-none flex items-center justify-center gap-1.5 px-5 py-2.5 bg-secondary-fixed text-on-secondary-fixed text-[11px] font-bold rounded-xl hover:bg-secondary-fixed-dim transition-colors">
                                        <span class="material-symbols-outlined text-[15px]">chat</span>Chat Tim
                                    </a>
                                    <a href="{{ route('mahasiswa.my-teams.show', $anggota->tim->id) }}"
                                       class="flex-1 sm:flex-none flex items-center justify-center gap-1.5 px-5 py-2.5 bg-white/5 border border-white/10 text-white text-[11px] font-bold rounded-xl hover:bg-white/10 transition-colors">
                                        <span class="material-symbols-outlined text-[15px]">open_in_new</span>Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card-glass rounded-2xl py-20 text-center">
                        <div class="w-20 h-20 bg-secondary/15 border border-secondary-fixed/20 rounded-full flex items-center justify-center mx-auto mb-5">
                            <span class="material-symbols-outlined text-secondary-fixed text-[40px]" style="font-variation-settings:'FILL' 1;">group</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-white mb-2">Belum bergabung di tim manapun</h3>
                        <p class="text-white/50 text-body-md max-w-sm mx-auto mb-8">Mulai jelajahi tim-tim yang mencari anggota atau buat timmu sendiri.</p>
                        <a href="{{ route('mahasiswa.tim-finder.index') }}"
                           class="inline-flex items-center gap-2 px-7 py-3 bg-secondary-fixed text-on-secondary-fixed font-bold rounded-xl hover:bg-secondary-fixed-dim transition-colors">
                            <span class="material-symbols-outlined text-[18px]">search</span>
                            Cari Tim Sekarang
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- ═══════════════════════════════════════════════════
                 TAB: MENUNGGU REVIEW
            ═══════════════════════════════════════════════════ -->
            <div x-show="tab === 'pending'" class="space-y-4" x-cloak>
                @forelse($lamaranPending as $lamaran)
                    <div class="team-card rounded-2xl p-6 border-l-4 border-l-amber-400/50">
                        <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-5">
                            <div>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-400/15 border border-amber-400/30 text-amber-300 text-[10px] font-bold rounded-full uppercase tracking-wider mb-3">
                                    <span class="material-symbols-outlined text-[13px]" style="font-variation-settings:'FILL' 1;">hourglass_top</span>
                                    Menunggu Review
                                </span>
                                <h3 class="font-headline-sm text-headline-sm text-white">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                <p class="text-[13px] font-bold text-secondary-fixed/80 mt-1">Posisi: {{ $lamaran->slot->posisi }}</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="text-[10px] text-white/40 font-label-md uppercase tracking-wider">Dikirim pada</p>
                                <p class="text-[13px] font-bold text-white">{{ $lamaran->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>

                        <div class="bg-white/3 rounded-xl p-5 grid grid-cols-1 md:grid-cols-2 gap-4 border border-white/8 mb-5">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-secondary-fixed/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-secondary-fixed text-[20px]" style="font-variation-settings:'FILL' 1;">emoji_events</span>
                                </div>
                                <div>
                                    <p class="text-[10px] text-white/40 font-label-md uppercase tracking-wider">Lomba</p>
                                    <p class="text-[13px] font-bold text-white">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                    <p class="text-[10px] text-white/40 mt-0.5">{{ $lamaran->slot->tim->lomba->kategori }} · {{ $lamaran->slot->tim->lomba->tingkat }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-secondary-fixed/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-secondary-fixed text-[20px]" style="font-variation-settings:'FILL' 1;">calendar_today</span>
                                </div>
                                <div>
                                    <p class="text-[10px] text-white/40 font-label-md uppercase tracking-wider">Deadline Lomba</p>
                                    <p class="text-[13px] font-bold {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7 ? 'text-red-400' : 'text-white' }}">
                                        {{ $lamaran->slot->tim->lomba->deadline->format('d M Y') }}
                                        @if($lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7)
                                            <span class="ml-2 text-[9px] font-label-md bg-red-500/15 text-red-400 px-2 py-0.5 rounded-full">
                                                ⚡ {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) }} HARI LAGI
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5 border-t border-white/8 flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-secondary/25 flex items-center justify-center text-secondary-fixed font-bold text-[12px]">
                                    {{ strtoupper(substr($lamaran->slot->tim->ketua->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-[9px] text-white/40 font-label-md uppercase tracking-wider">Ketua Tim</p>
                                    <p class="text-[12px] font-bold text-white">{{ $lamaran->slot->tim->ketua->name }}</p>
                                </div>
                            </div>
                            <div x-data="{ konfirmasi: false }">
                                <button @click="konfirmasi = true"
                                        class="flex items-center gap-1.5 border border-error/40 text-red-400 text-[11px] font-bold uppercase tracking-wider rounded-xl px-6 py-2.5 hover:bg-error/10 transition-colors">
                                    Batalkan Lamaran
                                </button>
                                <div x-show="konfirmasi" class="modal-backdrop" x-cloak @click.self="konfirmasi = false">
                                    <div class="modal-box text-center">
                                        <div class="w-16 h-16 bg-error/15 rounded-full flex items-center justify-center mx-auto mb-5">
                                            <span class="material-symbols-outlined text-red-400 text-[32px]" style="font-variation-settings:'FILL' 1;">warning</span>
                                        </div>
                                        <h4 class="font-headline-sm text-headline-sm text-white mb-2">Batal Melamar?</h4>
                                        <p class="text-[13px] text-white/60 mb-6">Yakin ingin menarik kembali lamaran untuk tim <span class="text-white font-bold">{{ $lamaran->slot->tim->nama_tim }}</span>?</p>
                                        <div class="flex gap-3">
                                            <button @click="konfirmasi = false"
                                                    class="flex-1 py-3 bg-white/5 text-white/60 font-label-md font-bold uppercase tracking-wider text-[10px] rounded-xl hover:bg-white/10 transition-colors">Kembali</button>
                                            <form action="{{ route('mahasiswa.my-teams.cancel', $lamaran->id) }}" method="POST" class="flex-1">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="w-full py-3 bg-error text-on-error font-label-md font-bold uppercase tracking-wider text-[10px] rounded-xl hover:bg-red-700 transition-colors">Ya, Batalkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card-glass rounded-2xl py-20 text-center">
                        <div class="w-20 h-20 bg-amber-500/10 border border-amber-400/20 rounded-full flex items-center justify-center mx-auto mb-5">
                            <span class="material-symbols-outlined text-amber-400 text-[40px]" style="font-variation-settings:'FILL' 1;">hourglass_top</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-white mb-2">Belum ada lamaran pending</h3>
                        <p class="text-white/50 text-body-md max-w-sm mx-auto mb-8">Lamaran yang kamu kirim melalui Tim Finder akan muncul di sini.</p>
                        <a href="{{ route('mahasiswa.tim-finder.index') }}"
                           class="inline-flex items-center gap-2 px-7 py-3 bg-secondary-fixed text-on-secondary-fixed font-bold rounded-xl hover:bg-secondary-fixed-dim transition-colors">
                            <span class="material-symbols-outlined text-[18px]">search</span>
                            Jelajahi Tim Finder
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- ═══════════════════════════════════════════════════
                 TAB: DITOLAK
            ═══════════════════════════════════════════════════ -->
            <div x-show="tab === 'ditolak'" class="space-y-4" x-cloak>
                @forelse($lamaranDitolak as $lamaran)
                    <div class="team-card rounded-2xl p-6 border-l-4 border-l-error/30">
                        <div class="flex flex-col md:flex-row items-start gap-5">
                            <div class="w-14 h-14 rounded-xl bg-error/15 border border-error/20 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-red-400 text-[28px]" style="font-variation-settings:'FILL' 1;">cancel</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col md:flex-row justify-between items-start mb-4 gap-2">
                                    <span class="px-3 py-1.5 bg-red-500/15 border border-red-500/30 text-red-400 text-[10px] font-bold rounded-full uppercase tracking-wider">Lamaran Ditolak</span>
                                    <span class="text-[10px] text-white/40 font-label-md">Diproses: {{ $lamaran->processed_at ? $lamaran->processed_at->format('d M Y') : $lamaran->updated_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="font-headline-sm text-headline-sm text-white mb-1">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                <p class="text-[13px] font-bold text-white/50 mb-1">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                <p class="text-[12px] text-white/40">Posisi: <span class="text-red-400">{{ $lamaran->slot->posisi }}</span></p>

                                @if($lamaran->alasan_penolakan)
                                    <div class="mt-5 bg-red-500/10 border-l-2 border-red-400/40 rounded-r-xl pl-4 pr-4 py-3 relative">
                                        <span class="absolute -top-2.5 left-4 px-2 bg-red-500/80 text-white text-[9px] font-bold uppercase tracking-widest rounded-full py-0.5">Pesan dari Ketua</span>
                                        <p class="text-[13px] text-red-300 italic mt-1">"{{ $lamaran->alasan_penolakan }}"</p>
                                    </div>
                                @else
                                    <p class="text-[12px] text-white/30 italic mt-5 border-l-2 border-white/10 pl-3">Ketua tim tidak menyertakan alasan penolakan.</p>
                                @endif

                                <div class="mt-6 pt-5 border-t border-white/8">
                                    <a href="{{ route('mahasiswa.tim-finder.index') }}"
                                       class="text-[11px] font-bold text-secondary-fixed hover:underline flex items-center gap-1">
                                        Cari Tim Lain yang Sesuai
                                        <span class="material-symbols-outlined text-[15px]">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card-glass rounded-2xl py-20 text-center">
                        <p class="text-white/40 font-label-md uppercase tracking-wider text-[11px]">Tidak ada lamaran yang ditolak.</p>
                    </div>
                @endforelse
            </div>

            <!-- ═══════════════════════════════════════════════════
                 TAB: RIWAYAT
            ═══════════════════════════════════════════════════ -->
            <div x-show="tab === 'riwayat'" class="space-y-4" x-cloak>
                @php $riwayat = $lamaranPending->filter(fn($l) => $l->slot->batas_waktu < now()); @endphp
                @forelse($riwayat as $lamaran)
                    <div class="team-card rounded-2xl p-6 opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <span class="px-3 py-1.5 bg-white/5 border border-white/10 text-white/50 text-[10px] font-bold rounded-full uppercase tracking-wider flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[13px]">history</span>
                                Kadaluarsa
                            </span>
                            <span class="text-[10px] text-white/40 font-label-md">Terkirim: {{ $lamaran->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-white mb-1">{{ $lamaran->slot->tim->nama_tim }}</h3>
                        <p class="text-[13px] font-bold text-white/50 mb-4">{{ $lamaran->slot->tim->lomba->nama }}</p>
                        <div class="p-4 bg-white/3 rounded-xl border border-dashed border-white/10 text-center">
                            <p class="text-[10px] text-white/30 font-label-md uppercase tracking-wider italic">Slot ini sudah ditutup sebelum lamaranmu diproses.</p>
                        </div>
                    </div>
                @empty
                    <div class="card-glass rounded-2xl py-20 text-center">
                        <p class="text-white/40 font-label-md uppercase tracking-wider text-[11px]">Belum ada riwayat lamaran kadaluarsa.</p>
                    </div>
                @endforelse
            </div>

        </main>
    </div>
</div>
</body>
</html>
