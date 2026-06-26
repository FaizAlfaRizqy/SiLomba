@php
    use Carbon\Carbon;
    $user = Auth::user();
    $now  = Carbon::now()->startOfDay();
    $daysLeft = $now->diffInDays($lomba->deadline, false);
@endphp
<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $lomba->nama }} | SiLomba</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-container": "#163832",
                        "surface-bright": "#E8F3E9",
                        "secondary": "#235347",
                        "on-background": "#051F20",
                        "inverse-primary": "#8EB69B",
                        "inverse-on-surface": "#F4F9F6",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "tertiary-fixed-dim": "#D4E7D6",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#8EB69B",
                        "primary-container": "#051F20",
                        "on-primary-fixed": "#E8F3E9",
                        "on-error": "#ffffff",
                        "on-surface-variant": "#8EB69B",
                        "surface-container-highest": "#D4E7D6",
                        "on-tertiary-fixed-variant": "#163832",
                        "on-surface": "#051F20",
                        "on-secondary-fixed-variant": "#163832",
                        "primary-fixed": "#D4E7D6",
                        "tertiary-fixed": "#D4E7D6",
                        "error": "#ba1a1a",
                        "surface-container-high": "#F4F9F6",
                        "on-tertiary-fixed": "#0B2B26",
                        "inverse-surface": "#051F20",
                        "surface-tint": "#235347",
                        "surface-container-lowest": "#ffffff",
                        "tertiary": "#0B2B26",
                        "secondary-container": "#8EB69B",
                        "outline": "#8EB69B",
                        "on-primary-container": "#D4E7D6",
                        "secondary-fixed-dim": "#8EB69B",
                        "on-tertiary-container": "#8EB69B",
                        "surface-variant": "#D4E7D6",
                        "surface-container-low": "#E8F3E9",
                        "tertiary-container": "#051F20",
                        "on-primary-fixed-variant": "#235347",
                        "primary": "#051F20",
                        "background": "#E8F3E9",
                        "on-error-container": "#93000a",
                        "surface": "#E8F3E9",
                        "surface-container": "#D4E7D6",
                        "on-secondary-fixed": "#051F20",
                        "primary-fixed-dim": "#8EB69B",
                        "error-container": "#ffdad6",
                        "outline-variant": "#235347",
                        "surface-dim": "#D4E7D6"
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
                        "sans": ["Plus Jakarta Sans", "sans-serif"],
                        "serif": ["Playfair Display", "serif"],
                        "label-md": ["Plus Jakarta Sans", "sans-serif"],
                        "headline-sm": ["Playfair Display", "serif"],
                        "headline-md": ["Playfair Display", "serif"],
                        "body-md": ["Plus Jakarta Sans", "sans-serif"],
                        "headline-lg": ["Playfair Display", "serif"],
                        "body-lg": ["Plus Jakarta Sans", "sans-serif"],
                        "headline-lg-mobile": ["Playfair Display", "serif"]
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
            font-family: 'Material Symbols Outlined' !important;
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(35, 83, 71, 0.05);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(35, 83, 71, 0.2);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(35, 83, 71, 0.4);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-hidden">
<div class="flex flex-col md:flex-row h-screen">

    <!-- SideNavBar (Exact same as Dashboard/Lomba Index) -->
        <!-- Mobile Top Navbar -->
    <div class="md:hidden flex items-center justify-between bg-primary-container px-4 py-3 sticky top-0 z-50 w-full shadow-md" x-data="{ mobileMenuOpen: false }">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-8 h-8 object-contain">
            <h1 class="font-headline-sm text-[18px] font-bold text-secondary-fixed">SiLomba</h1>
        </div>
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-secondary-fixed transition-colors">
            <span class="material-symbols-outlined text-2xl" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
        </button>

        <!-- Mobile Dropdown -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="absolute top-full left-0 right-0 bg-primary-container border-t border-outline-variant/10 shadow-xl z-50" x-cloak>
            <nav class="flex flex-col p-4 gap-2 max-h-[80vh] overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('dashboard') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">dashboard</span> Dashboard
                </a>
                @role('mahasiswa|ketua_tim')
                <a href="{{ route('mahasiswa.lomba.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">emoji_events</span> Direktori Lomba
                </a>
                <a href="{{ route('mahasiswa.tim-finder.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">group</span> Tim Finder
                </a>
                <a href="{{ route('mahasiswa.my-teams.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">groups</span> Tim Saya
                </a>
                <a href="{{ route('mahasiswa.notifikasi.index') }}" class="flex items-center justify-between px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined">notifications</span> Notifikasi
                    </div>
                    @php $unread = \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count(); @endphp
                    @if($unread > 0)
                        <span class="px-2 py-0.5 bg-error text-on-error font-bold text-[10px] rounded-full">{{ $unread > 9 ? '9+' : $unread }}</span>
                    @endif
                </a>
                @endrole
                @role('admin')
                <a href="{{ route('admin.lomba.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('admin.lomba.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">emoji_events</span> Kelola Lomba
                </a>
                <a href="{{ route('admin.tim.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('admin.tim.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">group</span> Kelola Tim
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-surface-variant hover:bg-secondary/20 {{ request()->routeIs('admin.users.*') ? 'bg-secondary text-on-secondary' : '' }}">
                    <span class="material-symbols-outlined">person</span> Pengguna
                </a>
                @endrole
                <div class="mt-2 pt-4 border-t border-outline-variant/10">
                    <a href="{{ route('mahasiswa.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/5 rounded-lg mb-2">
                        <img alt="Profile" class="w-8 h-8 rounded-full border-2 border-secondary-fixed/30" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"/>
                        <div class="overflow-hidden">
                            <p class="font-headline-sm text-[13px] text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="font-label-md text-[10px] text-on-surface-variant truncate">Profil & Pengaturan</p>
                        </div>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-error hover:bg-error/10 rounded-lg transition-colors">
                            <span class="material-symbols-outlined">logout</span> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
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
                <img alt="Profile" class="w-10 h-10 rounded-full border-2 border-secondary-fixed/30 group-hover:border-secondary-fixed transition-colors object-cover" src="{{ (Auth::user()->mahasiswa && Auth::user()->mahasiswa->foto_profil) ? asset('storage/' . Auth::user()->mahasiswa->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"/>
                <div class="overflow-hidden flex-1">
                    <p class="font-headline-sm text-[14px] text-white truncate group-hover:text-secondary-fixed transition-colors">{{ Auth::user()->name }}</p>
                    <p class="font-label-md text-[10px] text-on-surface-variant truncate">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
                </div>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col overflow-y-auto custom-scrollbar bg-background">
        @if($isArsip)
        <div class="m-8 p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center gap-4 text-red-900 shadow-sm">
            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-red-600">warning</span>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-red-700">Lomba Ini Sudah Berakhir</p>
                <p class="text-xs text-red-600 mt-0.5">Deadline berakhir pada {{ $lomba->deadline->format('d M Y') }}. Halaman ini tersedia untuk keperluan evaluasi dan referensi saja.</p>
            </div>
        </div>
        @endif

        <!-- Hero Section -->
        <section class="relative w-full min-h-[400px] overflow-hidden flex flex-col md:flex-row items-center pt-32 pb-16 px-12 gap-10">
            <!-- Back Button -->
            <a href="{{ route('mahasiswa.lomba.index') }}" class="absolute top-8 left-8 md:top-12 md:left-12 z-20 flex items-center gap-2 px-4 py-2 bg-white hover:bg-[#D4E7D6] text-[#051F20] rounded-full border border-[#8EB69B]/30 shadow-md transition-all group">
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
                <span class="inline-block bg-[#051F20] text-white px-4 py-1 rounded-full font-label-md text-label-md mb-6 uppercase tracking-widest">{{ $lomba->tingkat }} Kompetisi</span>
                <h1 class="font-headline-lg text-4xl md:text-5xl lg:text-6xl text-[#051F20] mb-4 font-serif leading-tight">{{ $lomba->nama }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-[#235347]/80">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#051F20]/60">apartment</span>
                        <p class="font-headline-sm text-headline-sm text-[#051F20]">Diselenggarakan oleh {{ $lomba->penyelenggara }}</p>
                    </div>
                    <span class="hidden md:inline mx-2 text-[#8EB69B]">•</span>
                    <div class="flex items-center gap-2">
                        <p class="font-body-lg text-body-lg font-semibold text-[#235347]">{{ $lomba->kategori }}</p>
                    </div>
                </div>
            </div>
        </section>        <!-- Quick Info Grid -->
        <section class="px-12 -mt-8 relative z-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Deadline Card -->
                <div class="bg-white p-6 rounded-xl border border-[#8EB69B]/20 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-red-50 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined">event</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-[#235347]/70 uppercase font-bold">Deadline</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-[#051F20]">{{ $lomba->deadline->format('d M Y') }}</p>
                    </div>
                </div>
                <!-- Category Card -->
                <div class="bg-white p-6 rounded-xl border border-[#8EB69B]/20 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-[#E8F3E9] flex items-center justify-center text-[#235347]">
                        <span class="material-symbols-outlined">psychology</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-[#235347]/70 uppercase font-bold">Kategori</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-[#051F20]">{{ $lomba->kategori }}</p>
                    </div>
                </div>
                <!-- Status Card -->
                <div class="bg-white p-6 rounded-xl border border-[#8EB69B]/20 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                        <span class="material-symbols-outlined">flag</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-[#235347]/70 uppercase font-bold">Status</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-[#051F20] capitalize">{{ $isArsip ? 'Berakhir' : $lomba->status }}</p>
                    </div>
                </div>
                <!-- Location / Tingkat Card -->
                <div class="bg-white p-6 rounded-xl border border-[#8EB69B]/20 shadow-sm flex items-center gap-5">
                    <div class="w-12 h-12 rounded-lg bg-[#E8F3E9] flex items-center justify-center text-[#163832]">
                        <span class="material-symbols-outlined">public</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-[#235347]/70 uppercase font-bold">Tingkat</p>
                        <p class="font-headline-sm text-headline-sm font-bold text-[#051F20] capitalize">{{ $lomba->tingkat }}</p>
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
                    <h2 class="font-headline-md text-headline-md text-[#051F20] mb-6 flex items-center gap-2 font-serif font-bold">
                        <span class="w-2 h-8 bg-[#051F20] rounded-full"></span>
                        Deskripsi
                    </h2>
                    <div class="prose prose-lg text-[#235347] max-w-none whitespace-pre-line leading-relaxed">
                        {{ $lomba->deskripsi }}
                    </div>
                </div>
                @endif

                @if($lomba->syarat_peserta)
                <div>
                    <h2 class="font-headline-md text-headline-md text-[#051F20] mb-6 flex items-center gap-2 font-serif font-bold">
                        <span class="w-2 h-8 bg-[#051F20] rounded-full"></span>
                        Persyaratan Peserta
                    </h2>
                    <div class="bg-white p-6 rounded-2xl border border-[#8EB69B]/20 shadow-sm text-[#235347]">
                        <p class="whitespace-pre-line leading-relaxed">{{ $lomba->syarat_peserta }}</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column: Grand Prizes & CTA -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Grand Prize Card -->
                @if($lomba->hadiah)
                <div class="bg-[#051F20] border border-[#8EB69B]/20 p-8 rounded-2xl shadow-xl relative overflow-hidden group text-white">
                    <!-- Subtle Glow effect -->
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-secondary rounded-full blur-[100px] opacity-20"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="font-headline-md text-headline-md text-white font-serif">Detail Hadiah</h3>
                            <span class="material-symbols-outlined text-[#8EB69B] scale-150" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
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
                <div class="bg-white p-6 rounded-2xl border border-[#8EB69B]/20 shadow-sm space-y-4">
                    @if($isArsip)
                        <div class="w-full py-4 bg-gray-50 border border-gray-200 rounded-xl text-center">
                            <p class="text-sm font-bold text-gray-400">Pendaftaran Ditutup</p>
                            <p class="text-xs text-gray-500 mt-0.5">Deadline sudah berakhir</p>
                        </div>
                        @if($lomba->link_resmi)
                            <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-4 bg-[#E8F3E9] text-[#235347] hover:bg-[#D4E7D6] border border-[#8EB69B]/30 rounded-xl font-bold transition-all">
                                <span class="material-symbols-outlined mr-2 text-sm">language</span>
                                Kunjungi Website Resmi
                            </a>
                        @endif
                    @else
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('mahasiswa.tim-finder.index', ['lomba_id' => $lomba->id]) }}" class="flex items-center justify-center gap-2 py-3 border border-[#051F20] text-[#051F20] hover:bg-[#E8F3E9] font-headline-sm text-sm rounded-xl transition-colors">
                                <span class="material-symbols-outlined text-[18px]">search</span>
                                Cari Tim
                            </a>
                            <a href="{{ route('mahasiswa.my-teams.index') }}" class="flex items-center justify-center gap-2 py-3 bg-[#051F20] text-white hover:bg-opacity-90 font-headline-sm text-sm rounded-xl transition-all shadow-md">
                                <span class="material-symbols-outlined text-[18px]">group_add</span>
                                Buat Tim
                            </a>
                        </div>
                        @if($lomba->link_resmi)
                            <a href="{{ $lomba->link_resmi }}" target="_blank" class="flex items-center justify-center w-full py-3 bg-[#E8F3E9] text-[#235347] hover:bg-[#D4E7D6] rounded-xl font-bold transition-all text-sm border border-[#8EB69B]/30">
                                <span class="material-symbols-outlined mr-2 text-sm">language</span>
                                Kunjungi Website Resmi
                            </a>
                        @endif
                        <p class="text-center font-body-md text-xs text-[#235347]">
                            Pendaftaran ditutup dalam
                            @if($daysLeft > 0)
                                <span class="font-bold text-[#163832]">{{ $daysLeft }} hari</span>
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
