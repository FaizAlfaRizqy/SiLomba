<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Notifikasi | SiLomba</title>
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
        .notif-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 1rem;
            transition: all 0.22s ease;
        }
        .notif-card:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(107,254,156,0.20);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.25);
        }
        .notif-card.unread {
            border-color: rgba(107,254,156,0.18);
            background: rgba(107,254,156,0.04);
        }
        .notif-card.unread:hover {
            border-color: rgba(107,254,156,0.35);
            box-shadow: 0 8px 24px rgba(0,109,55,0.18);
        }
        /* Filter tab */
        .filter-tab {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.04em;
            cursor: pointer;
            transition: all 0.18s;
            border: 1px solid transparent;
            color: rgba(255,255,255,0.50);
            background: transparent;
        }
        .filter-tab:hover { color: rgba(255,255,255,0.80); background: rgba(255,255,255,0.06); }
        .filter-tab.active {
            background: rgba(107,254,156,0.12);
            border-color: rgba(107,254,156,0.30);
            color: #6bfe9c;
        }
        [x-cloak] { display: none !important; }

        /* Pagination dark override */
        nav[aria-label="Pagination Navigation"] a,
        nav[aria-label="Pagination Navigation"] span.relative.inline-flex {
            background-color: rgba(255,255,255,0.06) !important;
            border-color: rgba(255,255,255,0.12) !important;
            color: rgba(255,255,255,0.65) !important;
        }
        nav[aria-label="Pagination Navigation"] a:hover {
            background-color: rgba(107,254,156,0.12) !important;
            color: #6bfe9c !important;
        }
        nav[aria-label="Pagination Navigation"] span[aria-current="page"] span {
            background-color: #6bfe9c !important;
            border-color: #6bfe9c !important;
            color: #00210c !important;
        }
        nav[aria-label="Pagination Navigation"] p { color: rgba(255,255,255,0.40) !important; }
    </style>
</head>
<body class="bg-primary text-on-primary-fixed selection:bg-secondary-fixed selection:text-on-secondary-fixed font-body-md overflow-x-hidden">
<div class="flex min-h-screen" x-data="{ activeFilter: 'semua' }">

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
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
                <span class="font-label-md text-label-md">Tim Saya</span>
            </a>
            <!-- Notifikasi — active -->
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

        <!-- Bottom: logout + profile -->
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

            <!-- ── Page Header ── -->
            <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-white mb-2">Notifikasi</h2>
                    <p class="text-white/70 text-body-lg max-w-2xl">
                        Semua aktivitas penting terkait lomba dan tim.
                    </p>
                </div>

                <!-- Stats + Mark all read -->
                <div class="flex items-center gap-3 flex-shrink-0">
                    @php
                        $totalNotif = $notifikasis->total();
                        $unreadCount = \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count();
                    @endphp
                    @if($totalNotif > 0)
                        <span class="px-3 py-1.5 bg-white/8 border border-white/12 text-white/60 text-[12px] font-label-md rounded-full">
                            {{ $totalNotif }} notifikasi
                        </span>
                    @endif
                    @if($unreadCount > 0)
                        <form action="{{ route('mahasiswa.notifikasi.baca-semua') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-secondary-fixed/10 border border-secondary-fixed/25 text-secondary-fixed text-[12px] font-bold rounded-xl hover:bg-secondary-fixed/18 transition-colors">
                                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings:'FILL' 1;">done_all</span>
                                Tandai Semua Dibaca
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Flash Message -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                     class="mb-6 p-4 bg-secondary-fixed/15 border border-secondary-fixed/30 text-secondary-fixed rounded-2xl flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1;">check_circle</span>
                        <p class="text-sm font-semibold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="opacity-60 hover:opacity-100">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
            @endif

            <!-- ── Filter Tabs ── -->
            @if($notifikasis->total() > 0)
                <div class="flex flex-wrap gap-2 mb-6 p-1 bg-white/4 border border-white/8 rounded-2xl w-fit">
                    @php
                        $tipeCounts = \App\Models\Notification::where('id_penerima', Auth::id())
                            ->selectRaw('tipe, count(*) as total')
                            ->groupBy('tipe')
                            ->pluck('total', 'tipe')
                            ->toArray();
                    @endphp
                    <button class="filter-tab active" :class="activeFilter === 'semua' ? 'active' : ''" @click="activeFilter = 'semua'">
                        Semua <span class="ml-1 opacity-60">{{ $notifikasis->total() }}</span>
                    </button>
                    @if(isset($tipeCounts['lamaran_masuk']))
                        <button class="filter-tab" :class="activeFilter === 'lamaran_masuk' ? 'active' : ''" @click="activeFilter = 'lamaran_masuk'">
                            Lamaran Masuk <span class="ml-1 opacity-60">{{ $tipeCounts['lamaran_masuk'] }}</span>
                        </button>
                    @endif
                    @if(isset($tipeCounts['lamaran_diterima']))
                        <button class="filter-tab" :class="activeFilter === 'lamaran_diterima' ? 'active' : ''" @click="activeFilter = 'lamaran_diterima'">
                            Diterima <span class="ml-1 opacity-60">{{ $tipeCounts['lamaran_diterima'] }}</span>
                        </button>
                    @endif
                    @if(isset($tipeCounts['lamaran_ditolak']))
                        <button class="filter-tab" :class="activeFilter === 'lamaran_ditolak' ? 'active' : ''" @click="activeFilter = 'lamaran_ditolak'">
                            Ditolak <span class="ml-1 opacity-60">{{ $tipeCounts['lamaran_ditolak'] }}</span>
                        </button>
                    @endif
                    @if(isset($tipeCounts['application']))
                        <button class="filter-tab" :class="activeFilter === 'application' ? 'active' : ''" @click="activeFilter = 'application'">
                            Lamaran <span class="ml-1 opacity-60">{{ $tipeCounts['application'] }}</span>
                        </button>
                    @endif
                    @if(isset($tipeCounts['deadline']))
                        <button class="filter-tab" :class="activeFilter === 'deadline' ? 'active' : ''" @click="activeFilter = 'deadline'">
                            Deadline <span class="ml-1 opacity-60">{{ $tipeCounts['deadline'] }}</span>
                        </button>
                    @endif
                </div>
            @endif

            <!-- ── Notification List ── -->
            @php
                $typeConfig = [
                    'lamaran_masuk'    => ['icon' => 'mark_email_unread', 'bg' => 'bg-blue-500/15',   'color' => 'text-blue-400',          'label' => 'Lamaran Masuk',     'border' => 'border-blue-400/20'],
                    'lamaran_diterima' => ['icon' => 'celebration',       'bg' => 'bg-secondary-fixed/12','color' => 'text-secondary-fixed', 'label' => 'Diterima',         'border' => 'border-secondary-fixed/20'],
                    'lamaran_ditolak'  => ['icon' => 'cancel',            'bg' => 'bg-red-500/15',    'color' => 'text-red-400',           'label' => 'Ditolak',           'border' => 'border-red-500/20'],
                    'anggota_baru'     => ['icon' => 'person_add',        'bg' => 'bg-purple-500/15', 'color' => 'text-purple-400',        'label' => 'Anggota Baru',      'border' => 'border-purple-400/20'],
                    'anggota_keluar'   => ['icon' => 'person_remove',     'bg' => 'bg-red-500/15',    'color' => 'text-red-400',           'label' => 'Anggota Keluar',    'border' => 'border-red-500/20'],
                    'slot_hampir'      => ['icon' => 'timer',             'bg' => 'bg-amber-500/15',  'color' => 'text-amber-400',         'label' => 'Slot Hampir Berakhir','border' => 'border-amber-400/20'],
                    'deadline'         => ['icon' => 'event_busy',        'bg' => 'bg-amber-500/15',  'color' => 'text-amber-400',         'label' => 'Deadline',          'border' => 'border-amber-400/20'],
                    'application'      => ['icon' => 'assignment',        'bg' => 'bg-blue-500/15',   'color' => 'text-blue-400',          'label' => 'Lamaran',           'border' => 'border-blue-400/20'],
                    'system'           => ['icon' => 'info',              'bg' => 'bg-white/8',       'color' => 'text-white/60',          'label' => 'Sistem',            'border' => 'border-white/12'],
                    'competition'      => ['icon' => 'emoji_events',      'bg' => 'bg-secondary-fixed/12','color' => 'text-secondary-fixed','label' => 'Kompetisi',        'border' => 'border-secondary-fixed/20'],
                    'chat_baru'        => ['icon' => 'chat',              'bg' => 'bg-teal-500/15',   'color' => 'text-teal-400',          'label' => 'Chat Baru',         'border' => 'border-teal-400/20'],
                    '_default'         => ['icon' => 'notifications',     'bg' => 'bg-white/8',       'color' => 'text-white/60',          'label' => 'Informasi',         'border' => 'border-white/12'],
                ];
            @endphp

            <div class="space-y-3" id="notif-list">
                @forelse($notifikasis as $notif)
                    @php
                        $cfg = $typeConfig[$notif->tipe] ?? $typeConfig['_default'];
                        $isUnread = !$notif->is_read;
                    @endphp

                    <div class="notif-card {{ $isUnread ? 'unread' : '' }} relative overflow-hidden"
                         x-show="activeFilter === 'semua' || activeFilter === '{{ $notif->tipe }}'">

                        <!-- Unread left accent -->
                        @if($isUnread)
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-secondary-fixed rounded-l-xl"></div>
                        @endif

                        <div class="p-5 {{ $isUnread ? 'pl-6' : '' }} flex items-start gap-4">

                            <!-- Icon -->
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-2xl {{ $cfg['bg'] }} border {{ $cfg['border'] }} flex items-center justify-center">
                                    <span class="material-symbols-outlined {{ $cfg['color'] }} text-[22px]" style="font-variation-settings:'FILL' 1;">{{ $cfg['icon'] }}</span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-1">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <!-- Type badge -->
                                        <span class="px-2 py-0.5 {{ $cfg['bg'] }} {{ $cfg['color'] }} border {{ $cfg['border'] }} text-[9px] font-bold font-label-md rounded uppercase tracking-widest">
                                            {{ $cfg['label'] }}
                                        </span>
                                        <!-- Title -->
                                        <h4 class="font-bold {{ $isUnread ? 'text-white' : 'text-white/70' }} text-[14px]">{{ $notif->judul }}</h4>
                                    </div>
                                    <div class="flex items-center gap-2 flex-shrink-0">
                                        <!-- Read/unread indicator -->
                                        @if($isUnread)
                                            <span class="px-2 py-0.5 bg-secondary-fixed/15 text-secondary-fixed text-[9px] font-bold font-label-md rounded-full uppercase tracking-widest animate-pulse">
                                                Baru
                                            </span>
                                        @else
                                            <span class="px-2 py-0.5 bg-white/5 text-white/30 text-[9px] font-bold font-label-md rounded-full uppercase tracking-widest">
                                                Dibaca
                                            </span>
                                        @endif
                                        <!-- Timestamp -->
                                        <span class="text-[11px] text-white/40 font-label-md whitespace-nowrap flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[13px]">schedule</span>
                                            {{ $notif->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Description -->
                                <p class="text-[13px] {{ $isUnread ? 'text-white/75' : 'text-white/45' }} leading-relaxed mb-3">{{ $notif->isi }}</p>

                                <!-- Link action -->
                                @if($notif->link)
                                    <form action="{{ route('mahasiswa.notifikasi.baca', $notif->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-[11px] font-bold text-secondary-fixed hover:text-secondary-fixed-dim flex items-center gap-1 font-label-md uppercase tracking-wider transition-colors">
                                            Lihat Detail
                                            <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                        </button>
                                    </form>
                                @elseif($isUnread)
                                    <form action="{{ route('mahasiswa.notifikasi.baca', $notif->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-[11px] text-white/30 hover:text-white/60 flex items-center gap-1 font-label-md uppercase tracking-wider transition-colors">
                                            <span class="material-symbols-outlined text-[13px]">done</span>
                                            Tandai Dibaca
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                @empty
                    <!-- ── Empty State ── -->
                    <div class="py-24 flex flex-col items-center justify-center text-center card-glass rounded-2xl">
                        <div class="w-24 h-24 mb-6 rounded-full bg-secondary/10 border border-secondary-fixed/15 flex items-center justify-center">
                            <span class="material-symbols-outlined text-secondary-fixed text-[48px]" style="font-variation-settings:'FILL' 1;">notifications_off</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-white mb-2">Belum ada notifikasi</h3>
                        <p class="text-white/50 text-body-md max-w-sm mb-8">
                            Semua aktivitas penting terkait lomba, tim, dan lamaran akan muncul di sini.
                        </p>
                        <div class="flex flex-wrap gap-3 justify-center">
                            <a href="{{ route('mahasiswa.tim-finder.index') }}"
                               class="flex items-center gap-2 px-6 py-3 bg-secondary-fixed text-on-secondary-fixed font-bold rounded-xl hover:bg-secondary-fixed-dim transition-colors text-[13px]">
                                <span class="material-symbols-outlined text-[18px]">group</span>
                                Jelajahi Tim Finder
                            </a>
                            <a href="{{ route('mahasiswa.lomba.index') }}"
                               class="flex items-center gap-2 px-6 py-3 bg-white/8 border border-white/12 text-white font-bold rounded-xl hover:bg-white/12 transition-colors text-[13px]">
                                <span class="material-symbols-outlined text-[18px]">emoji_events</span>
                                Lihat Direktori Lomba
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- ── Empty filter state ── -->
            @if($notifikasis->total() > 0)
                <div x-show="activeFilter !== 'semua'"
                     x-cloak
                     class="mt-4 py-12 text-center" id="empty-filter-state" style="display:none;">
                    <p class="text-white/40 font-label-md uppercase tracking-wider text-[11px]">
                        Tidak ada notifikasi untuk kategori ini.
                    </p>
                </div>
            @endif

            <!-- ── Pagination ── -->
            @if($notifikasis->hasPages())
                <div class="mt-10 flex justify-center">
                    {{ $notifikasis->links() }}
                </div>
            @endif

        </main>
    </div>
</div>

<script>
    // Check if any visible items exist after filter change
    document.addEventListener('alpine:initialized', () => {
        // handled by x-show on each card
    });
</script>
</body>
</html>
