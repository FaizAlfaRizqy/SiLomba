@php
    use Carbon\Carbon;
    $user = Auth::user();
    $now  = Carbon::now()->startOfDay();
    $daysLeft = $now->diffInDays($lomba->deadline, false);
@endphp
<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $lomba->nama }} | SiLomba</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>
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
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-hidden">
<div class="flex h-screen">

    <!-- SideNavBar (Exact same as Dashboard/Lomba Index) -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-outline-variant/10 shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DETAIL LOMBA</p>
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
            <div x-data="{ jumlah: {{ \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count() }} }" 
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
        @if($isArsip)
        <div class="m-8 p-4 bg-error/20 border border-error/30 rounded-2xl flex items-center gap-4 text-white">
            <div class="w-10 h-10 bg-error/30 rounded-xl flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-error">warning</span>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-error">Lomba Ini Sudah Berakhir</p>
                <p class="text-xs text-white/70 mt-0.5">Deadline berakhir pada {{ $lomba->deadline->format('d M Y') }}. Halaman ini tersedia untuk keperluan evaluasi dan referensi saja.</p>
            </div>
        </div>
        @endif

        <!-- Hero Section -->
        <section class="relative w-full min-h-[400px] overflow-hidden flex flex-col md:flex-row items-center pt-32 pb-16 px-12 gap-10">
            <!-- Back Button -->
            <a href="{{ route('mahasiswa.lomba.index') }}" class="absolute top-8 left-8 md:top-12 md:left-12 z-20 flex items-center gap-2 px-4 py-2 bg-black/40 hover:bg-black/60 text-white rounded-full backdrop-blur-md border border-white/20 transition-all group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span>
                <span class="font-label-md text-sm font-medium">Kembali</span>
            </a>

            <!-- Background Blur -->
            <div class="absolute inset-0 z-0">
                @if($lomba->poster)
                    <img alt="Background Blur" class="w-full h-full object-cover blur-[80px] opacity-30 {{ $isArsip ? 'grayscale' : '' }}" src="{{ asset('storage/' . $lomba->poster) }}"/>
                @else
                    <div class="w-full h-full bg-gradient-to-br from-primary-container to-[#021410]"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-background"></div>
            </div>

            <!-- Poster Container (Portrait) -->
            @if($lomba->poster)
            <div class="relative z-10 w-full md:w-1/3 max-w-[320px] flex-shrink-0">
                <img alt="Poster Lomba" class="w-full h-auto object-contain rounded-2xl shadow-2xl border border-white/10 {{ $isArsip ? 'grayscale' : '' }}" src="{{ asset('storage/' . $lomba->poster) }}"/>
            </div>
            @endif

            <!-- Info Lomba -->
            <div class="relative z-10 w-full flex-1">
                <span class="inline-block bg-secondary-container text-on-secondary-fixed-variant px-4 py-1 rounded-full font-label-md text-label-md mb-6 uppercase tracking-widest">{{ $lomba->tingkat }} Kompetisi</span>
                <h1 class="font-headline-lg text-4xl md:text-5xl lg:text-6xl text-white font-extrabold tracking-tighter mb-4">{{ $lomba->nama }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-white/80">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined">apartment</span>
                        <p class="font-headline-sm text-headline-sm">Diselenggarakan oleh {{ $lomba->penyelenggara }}</p>
                    </div>
                    <span class="hidden md:inline mx-2">•</span>
                    <div class="flex items-center gap-2">
                        <p class="font-body-lg text-body-lg">{{ $lomba->kategori }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Info Grid -->
        <section class="px-12 -mt-8 relative z-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Deadline Card -->
                <div class="bg-white/5 backdrop-blur-md p-6 rounded-xl border border-white/10 flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-error-container/20 flex items-center justify-center text-error">
                        <span class="material-symbols-outlined">event</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-white/60 uppercase">Deadline</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-white">{{ $lomba->deadline->format('d M Y') }}</p>
                    </div>
                </div>
                <!-- Category Card -->
                <div class="bg-white/5 backdrop-blur-md p-6 rounded-xl border border-white/10 flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-secondary-container/20 flex items-center justify-center text-secondary-fixed">
                        <span class="material-symbols-outlined">psychology</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-white/60 uppercase">Kategori</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-white">{{ $lomba->kategori }}</p>
                    </div>
                </div>
                <!-- Status Card -->
                <div class="bg-white/5 backdrop-blur-md p-6 rounded-xl border border-white/10 flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400">
                        <span class="material-symbols-outlined">flag</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-white/60 uppercase">Status</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-white capitalize">{{ $isArsip ? 'Berakhir' : $lomba->status }}</p>
                    </div>
                </div>
                <!-- Location / Tingkat Card -->
                <div class="bg-white/5 backdrop-blur-md p-6 rounded-xl border border-white/10 flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-white/10 flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">public</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-white/60 uppercase">Tingkat</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-white capitalize">{{ $lomba->tingkat }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Body Content -->
        <section class="px-12 py-12 grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left Column: Details -->
            <div class="lg:col-span-8 space-y-12">
                @if($lomba->deskripsi)
                <div>
                    <h2 class="font-headline-md text-headline-md text-white mb-6 flex items-center gap-2">
                        <span class="w-2 h-8 bg-secondary rounded-full"></span>
                        Deskripsi
                    </h2>
                    <div class="prose prose-invert prose-lg text-on-surface-variant max-w-none whitespace-pre-line leading-relaxed">
                        {{ $lomba->deskripsi }}
                    </div>
                </div>
                @endif

                @if($lomba->syarat_peserta)
                <div>
                    <h2 class="font-headline-md text-headline-md text-white mb-6 flex items-center gap-2">
                        <span class="w-2 h-8 bg-secondary rounded-full"></span>
                        Persyaratan Peserta
                    </h2>
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
                        <p class="text-on-surface-variant whitespace-pre-line leading-relaxed">{{ $lomba->syarat_peserta }}</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column: Grand Prizes & CTA -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Grand Prize Card -->
                @if($lomba->hadiah)
                <div class="bg-primary-container border border-white/10 p-8 rounded-2xl shadow-xl relative overflow-hidden group">
                    <!-- Subtle Glow effect -->
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-secondary rounded-full blur-[100px] opacity-20"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="font-headline-md text-headline-md text-white">Detail Hadiah</h3>
                            <span class="material-symbols-outlined text-secondary-container scale-150" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
                        </div>
                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="text-white/80 whitespace-pre-line text-sm leading-relaxed">
                                    {{ $lomba->hadiah }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Call to Action Bar -->
                <div class="bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-white/10 shadow-sm space-y-4">
                    @if($isArsip)
                        <div class="w-full py-4 bg-white/5 border border-white/10 rounded-xl text-center">
                            <p class="text-sm font-bold text-gray-400">Pendaftaran Ditutup</p>
                            <p class="text-xs text-gray-500 mt-0.5">Deadline sudah berakhir</p>
                        </div>
                        @if($lomba->link_resmi)
                            <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-4 bg-white/10 text-white rounded-xl font-bold hover:bg-white/20 transition-all">
                                <span class="material-symbols-outlined mr-2 text-sm">language</span>
                                Kunjungi Website Resmi
                            </a>
                        @endif
                    @else
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('mahasiswa.tim-finder.index', ['lomba_id' => $lomba->id]) }}" class="flex items-center justify-center gap-2 py-3 border border-secondary text-secondary-fixed font-headline-sm text-sm rounded-xl hover:bg-secondary/10 transition-colors">
                                <span class="material-symbols-outlined text-[18px]">search</span>
                                Cari Tim
                            </a>
                            <a href="{{ route('mahasiswa.my-teams.index') }}" class="flex items-center justify-center gap-2 py-3 border border-secondary text-secondary-fixed font-headline-sm text-sm rounded-xl hover:bg-secondary/10 transition-colors">
                                <span class="material-symbols-outlined text-[18px]">group_add</span>
                                Buat Tim
                            </a>
                        </div>
                        @if($lomba->link_resmi)
                            <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-3 bg-white/10 text-white/80 rounded-xl font-bold hover:bg-white/20 transition-all text-sm">
                                <span class="material-symbols-outlined mr-2 text-sm">language</span>
                                Kunjungi Website Resmi
                            </a>
                        @endif
                        <p class="text-center font-body-md text-xs text-on-surface-variant">
                            Pendaftaran ditutup dalam
                            @if($daysLeft > 0)
                                <span class="font-bold text-secondary-fixed">{{ $daysLeft }} hari</span>
                            @else
                                <span class="font-bold text-error">Hari ini</span>
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </section>

    </main>

    <!-- Floating Micro-interaction Background -->
    <div class="fixed inset-0 pointer-events-none z-[-1] opacity-20">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-container rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-secondary-container rounded-full blur-[100px] animate-bounce" style="animation-duration: 8s;"></div>
    </div>
</div>
</body>
</html>
