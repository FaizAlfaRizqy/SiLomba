<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Detail Lowongan Tim | SiLomba</title>
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
<body class="bg-[#E8F3E9] text-[#051F20] font-body-md overflow-x-hidden">
<div class="flex flex-col md:flex-row min-h-screen">
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
<!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-[#8EB69B]/10 shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DIREKTORI LOMBA</p>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <!-- Direktori Lomba -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('mahasiswa.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-label-md">Direktori Lomba</span>
            </a>
            <!-- Tim Finder -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('mahasiswa.tim-finder.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-label-md">Tim Finder</span>
            </a>
            <!-- Tim Saya -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
                <span class="font-label-md text-label-md">Tim Saya</span>
            </a>
            <!-- Notifikasi -->
            <div x-data="{ jumlah: 0 }" 
                 x-init="
                   fetch('{{ route('mahasiswa.notifikasi.unread-count') }}')
                     .then(r => r.json())
                     .then(d => jumlah = d.count)
                 ">
                <a class="flex items-center justify-between gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('mahasiswa.notifikasi.index') }}">
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
    <div class="flex-1 min-w-0 flex flex-col min-h-screen">
        <!-- Top bar for Mobile -->
        <header class="md:hidden flex items-center justify-between px-6 py-4 bg-primary-container border-b border-[#8EB69B]/10 z-40">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <span class="font-bold text-white tracking-wide">SiLomba</span>
            </div>
            <button class="text-white focus:outline-none">
                <span class="material-symbols-outlined text-[28px]">menu</span>
            </button>
        </header>

        <!-- Main Body Wrapper -->
        <main class="flex-1 py-10 px-6 md:px-12 max-w-[1600px] mx-auto w-full">
            
            <!-- Page Title Area with back button -->
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('mahasiswa.tim-finder.index') }}" 
                   class="w-10 h-10 rounded-xl bg-white border border-[#8EB69B]/20 flex items-center justify-center text-[#051F20] hover:bg-[#E8F3E9] transition-colors shadow-sm">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <div>
                    <h2 class="font-headline-md text-headline-md text-[#051F20] font-serif font-bold">Detail Lowongan Tim</h2>
                    <p class="text-[#235347]/70 text-[13px]">Informasi lengkap mengenai peran dan persyaratan tim bentukan mahasiswa</p>
                </div>
            </div>

            <!-- Alert Section -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-white border border-[#8EB69B]/20 shadow-sm rounded-2xl flex items-center gap-3 text-[#235347]">
                    <span class="material-symbols-outlined text-[20px]">check_circle</span>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-white border border-red-200 shadow-sm rounded-2xl flex items-center gap-3 text-red-600">
                    <span class="material-symbols-outlined text-[20px]">error</span>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-white border border-red-200 shadow-sm rounded-2xl flex items-center gap-3 text-red-600">
                    <span class="material-symbols-outlined text-[20px]">error</span>
                    <p class="text-sm font-medium">{{ $errors->first() }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- LEFT COLUMN (2/3) -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Section 1: Info Utama Slot -->
                    <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-8 shadow-sm">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347] text-[10px] font-bold rounded-full uppercase tracking-widest">
                                {{ $slot->tim->lomba->kategori }}
                            </span>
                        </div>
                        
                        <h1 class="text-3xl font-serif font-bold text-[#051F20] mb-2">{{ $slot->posisi }}</h1>
                        <p class="text-lg font-medium text-[#235347] mb-6">{{ $slot->tim->nama_tim }}</p>
                        
                        <div class="bg-[#E8F3E9] border border-[#8EB69B]/20 rounded-xl p-6 mb-8">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center border border-[#8EB69B]/20 shadow-sm text-2xl flex-shrink-0">
                                    🏆
                                </div>
                                <div>
                                    <p class="text-xs text-[#235347]/70 font-bold uppercase tracking-wider">Lomba yang Diikuti</p>
                                    <h4 class="text-lg font-bold text-[#051F20]">{{ $slot->tim->lomba->nama }}</h4>
                                    <p class="text-sm text-[#235347]/80">{{ $slot->tim->lomba->penyelenggara }} • {{ ucfirst($slot->tim->lomba->tingkat) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xs text-[#235347]/70 font-bold uppercase tracking-wider mb-3">Deskripsi Peran</h3>
                                <div class="bg-[#F4F9F6] border border-[#8EB69B]/10 rounded-xl p-5 text-[#235347]/85 text-sm leading-relaxed whitespace-pre-line">
                                    {{ $slot->deskripsi }}
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xs text-[#235347]/70 font-bold uppercase tracking-wider mb-3">Keahlian yang Dibutuhkan</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($slot->keahlian_dibutuhkan as $skill)
                                        <span class="px-4 py-2 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347] text-xs font-bold rounded-xl">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-6 border-t border-[#8EB69B]/20">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-[#235347]/70">Slot Tersedia:</span>
                                    <span class="text-sm font-bold text-[#051F20]">{{ $slotTersisa }} dari {{ $slot->jumlah_slot }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-[#235347]/70">Batas Waktu:</span>
                                    <span class="text-sm font-bold {{ $slot->batas_waktu->diffInDays(now()) <= 3 ? 'text-red-600' : 'text-[#051F20]' }}">
                                        {{ $slot->batas_waktu->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Persyaratan Lamaran -->
                    <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-8 shadow-sm">
                        <h2 class="text-xl font-serif font-bold text-[#051F20] mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#051F20]">assignment</span> Persyaratan Melamar Tim
                        </h2>

                        <div class="space-y-4">
                            <!-- SYARAT 1: Akun Mahasiswa -->
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ Auth::check() ? 'bg-[#E8F3E9]/50 border-[#8EB69B]/20' : 'bg-red-50/50 border-red-100' }}">
                                <div class="mt-1">
                                    @if(Auth::check())
                                        <span class="text-emerald-600">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#051F20]">Akun Mahasiswa Aktif</h4>
                                    <p class="text-xs text-[#235347]/80">
                                        @if(Auth::check())
                                            Terdaftar sebagai mahasiswa aktif di SiLomba
                                        @else
                                            Harus login sebagai mahasiswa aktif
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 2: Profil Lengkap -->
                            @php $profilLengkap = $mahasiswa && !empty($mahasiswa->keahlian); @endphp
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ $profilLengkap ? 'bg-[#E8F3E9]/50 border-[#8EB69B]/20' : 'bg-amber-50/50 border-amber-100' }}">
                                <div class="mt-1">
                                    @if($profilLengkap)
                                        <span class="text-emerald-600">✅</span>
                                    @else
                                        <span class="text-amber-500">⚠️</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold text-[#051F20]">Profil Keahlian Lengkap</h4>
                                    <p class="text-xs text-[#235347]/80">
                                        @if($profilLengkap)
                                            Keahlian sudah diisi di profil
                                        @else
                                            Isi minimal 1 keahlian di halaman profil. 
                                            <a href="{{ route('mahasiswa.profile.edit') }}" class="text-[#051F20] font-bold hover:underline">Lengkapi sekarang →</a>
                                        @endif
                                    </p>
                                    <p class="text-[10px] text-[#235347]/60 mt-1 italic">Ketua tim perlu melihat keahlianmu sebelum memutuskan menerima lamaranmu.</p>
                                </div>
                            </div>

                            <!-- SYARAT 3: Belum di Tim Lain -->
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ !$sudahDiTim ? 'bg-[#E8F3E9]/50 border-[#8EB69B]/20' : 'bg-red-50/50 border-red-100' }}">
                                <div class="mt-1">
                                    @if(!$sudahDiTim)
                                        <span class="text-emerald-600">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#051F20]">Belum Tergabung Tim Lain di Lomba Ini</h4>
                                    <p class="text-xs text-[#235347]/80">
                                        @if(!$sudahDiTim)
                                            Kamu belum bergabung di tim manapun untuk lomba ini
                                        @else
                                            Kamu sudah terdaftar di tim lain untuk lomba ini. Satu mahasiswa hanya boleh di 1 tim per lomba.
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 4: Belum Pernah Melamar -->
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ !$sudahMelamar ? 'bg-[#E8F3E9]/50 border-[#8EB69B]/20' : 'bg-[#E8F3E9]/30 border-[#8EB69B]/20' }}">
                                <div class="mt-1">
                                    @if(!$sudahMelamar)
                                        <span class="text-emerald-600">✅</span>
                                    @else
                                        <span class="text-emerald-600">ℹ️</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#051F20]">Belum Pernah Melamar Slot Ini</h4>
                                    <p class="text-xs text-[#235347]/80">
                                        @if(!$sudahMelamar)
                                            Kamu belum pernah melamar slot ini
                                        @else
                                            Kamu sudah melamar slot ini. Status saat ini: 
                                            <span class="font-bold px-2 py-0.5 rounded-full text-[10px] uppercase
                                                {{ $sudahMelamar->status == 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                                {{ $sudahMelamar->status == 'diterima' ? 'bg-green-100 text-green-700' : '' }}
                                                {{ $sudahMelamar->status == 'ditolak' ? 'bg-red-100 text-red-700' : '' }}">
                                                {{ $sudahMelamar->status }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 5: Slot Masih Tersedia -->
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ $slotTersisa > 0 ? 'bg-[#E8F3E9]/50 border-[#8EB69B]/20' : 'bg-gray-100/50 border-gray-200' }}">
                                <div class="mt-1">
                                    @if($slotTersisa > 0)
                                        <span class="text-emerald-600">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#051F20]">Slot Masih Tersedia</h4>
                                    <p class="text-xs text-[#235347]/80">
                                        @if($slotTersisa > 0)
                                            {{ $slotTersisa }} dari {{ $slot->jumlah_slot }} slot masih terbuka
                                        @else
                                            Slot ini sudah penuh, tidak bisa melamar
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 6: Batas Waktu -->
                            @php $waktuMasihAda = $slot->batas_waktu >= now(); @endphp
                            <div class="flex items-start gap-4 p-4 rounded-xl border {{ $waktuMasihAda ? 'bg-[#E8F3E9]/50 border-[#8EB69B]/20' : 'bg-gray-100/50 border-gray-200' }}">
                                <div class="mt-1">
                                    @if($waktuMasihAda)
                                        <span class="text-emerald-600">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#051F20]">Batas Waktu Belum Lewat</h4>
                                    <p class="text-xs text-[#235347]/80">
                                        @if($waktuMasihAda)
                                            Batas waktu: {{ $slot->batas_waktu->format('d M Y') }}
                                        @else
                                            Batas waktu lamaran sudah berakhir pada {{ $slot->batas_waktu->format('d M Y') }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 7: Batas Lamaran Per Hari -->
                            <div class="flex items-start gap-4 p-4 rounded-xl border bg-white border-[#8EB69B]/20">
                                <div class="mt-1">
                                    <span class="text-emerald-600">ℹ️</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold text-[#051F20]">Batas Lamaran Per Hari</h4>
                                    <p class="text-xs text-[#235347]/80">Maksimal 20 lamaran per hari. Pilih tim yang benar-benar sesuai keahlianmu.</p>
                                    <div class="mt-2 w-full bg-[#E8F3E9] rounded-full h-1.5">
                                        <div class="bg-[#235347] h-1.5 rounded-full" style="width: {{ ($lamaranHariIni / 20) * 100 }}%"></div>
                                    </div>
                                    <p class="text-[10px] text-[#235347] font-bold mt-1">Lamaran hari ini: {{ $lamaranHariIni }}/20</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Form Lamaran -->
                    @php
                        $bisaMelamar = $profilLengkap && !$sudahDiTim && !$sudahMelamar && ($slotTersisa > 0) && $waktuMasihAda && ($lamaranHariIni < 20);
                    @endphp

                    @if($bisaMelamar)
                        <div class="bg-white border border-[#8EB69B]/30 rounded-2xl p-8 shadow-sm" x-data="{ message: '', loading: false }">
                            <div class="mb-6">
                                <h2 class="text-xl font-serif font-bold text-[#051F20] flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[#051F20]">edit_note</span> Tulis Pesan Motivasi
                                </h2>
                                <p class="text-sm text-[#235347]/70 mt-1">Ceritakan mengapa kamu cocok untuk posisi ini. Ketua tim akan membaca ini sebelum memutuskan.</p>
                            </div>

                            <form action="{{ route('mahasiswa.tim-finder.apply', $slot->id) }}" method="POST" @submit="loading = true">
                                @csrf
                                <div class="mb-6">
                                    <textarea 
                                        name="pesan_motivasi" 
                                        rows="6" 
                                        x-model="message"
                                        maxlength="1000"
                                        class="w-full rounded-xl border-[#8EB69B]/20 focus:border-[#051F20] focus:ring focus:ring-[#051F20]/10 p-5 text-sm"
                                        placeholder="Contoh: Halo Ketua Tim! Saya sangat tertarik bergabung karena memiliki keahlian di bidang {{ $slot->keahlian_dibutuhkan[0] ?? 'pencarian' }} dan sudah memiliki pengalaman di beberapa proyek sejenis..."
                                        required
                                    ></textarea>
                                    <div class="flex justify-between mt-2">
                                        <p class="text-[10px] text-red-500" x-show="message.length > 0 && message.length < 50">Minimal 50 karakter</p>
                                        <p class="text-[10px] ml-auto font-medium" :class="message.length >= 50 ? 'text-emerald-700' : 'text-[#235347]/60'">
                                            <span x-text="message.length"></span>/1000 karakter
                                        </p>
                                    </div>
                                </div>

                                <div class="bg-[#E8F3E9] rounded-xl p-4 mb-6 flex items-start gap-3 border border-[#8EB69B]/20">
                                    <span class="material-symbols-outlined text-[#235347]">lightbulb</span>
                                    <p class="text-xs text-[#235347] leading-relaxed">
                                        <strong>Tips:</strong> Sebutkan keahlian spesifik yang relevan, pengalaman lomba atau proyek sebelumnya, dan alasan kamu ingin bergabung di tim ini.
                                    </p>
                                </div>

                                <button 
                                    type="submit" 
                                    :disabled="message.length < 50 || loading"
                                    class="w-full py-4 bg-[#051F20] text-white font-bold rounded-xl hover:bg-opacity-90 transition-all flex items-center justify-center gap-2 disabled:bg-[#E8F3E9] disabled:text-[#235347]/40 disabled:shadow-none"
                                >
                                    <span x-show="!loading" class="flex items-center gap-1">Kirim Lamaran <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
                                    <span x-show="loading" class="flex items-center gap-2">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        Mengirim lamaran...
                                    </span>
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Card Pengganti jika tidak bisa melamar -->
                        @if($sudahMelamar)
                            <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-8 text-center shadow-sm">
                                <div class="w-16 h-16 bg-[#E8F3E9] rounded-full border border-[#8EB69B]/20 flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">✉️</div>
                                <h3 class="text-lg font-serif font-bold text-[#051F20]">Lamaran Sudah Terkirim</h3>
                                <p class="text-sm text-[#235347]/80 mt-1">Kamu sudah mengirimkan lamaran untuk slot ini. Tunggu konfirmasi dari ketua tim.</p>
                                <div class="mt-6 inline-block px-6 py-2 bg-[#E8F3E9] border border-[#8EB69B]/20 rounded-full text-xs font-bold text-[#235347]">
                                    Status: {{ strtoupper($sudahMelamar->status) }}
                                </div>
                            </div>
                        @elseif($sudahDiTim)
                            <div class="bg-white border border-red-200 rounded-2xl p-8 text-center text-red-600 shadow-sm">
                                <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">⚠️</div>
                                <h3 class="text-lg font-bold">Tidak Bisa Melamar</h3>
                                <p class="text-sm mt-1">Kamu sudah tergabung dalam tim lain untuk kompetisi ini.</p>
                            </div>
                        @elseif($slotTersisa <= 0)
                            <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center text-gray-500 shadow-sm">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">🔒</div>
                                <h3 class="text-lg font-bold">Slot Penuh</h3>
                                <p class="text-sm mt-1">Maaf, kuota untuk posisi ini sudah terpenuhi.</p>
                            </div>
                        @elseif(!$waktuMasihAda)
                            <div class="bg-white border border-gray-200 rounded-2xl p-8 text-center text-gray-500 shadow-sm">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">⌛</div>
                                <h3 class="text-lg font-bold">Pendaftaran Ditutup</h3>
                                <p class="text-sm mt-1">Batas waktu untuk melamar slot ini sudah berakhir.</p>
                            </div>
                        @elseif(!$profilLengkap)
                            <div class="bg-white border border-amber-200 rounded-2xl p-8 text-center shadow-sm">
                                <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">👤</div>
                                <h3 class="text-lg font-bold text-amber-700">Profil Belum Lengkap</h3>
                                <p class="text-sm text-amber-600 mt-1 mb-6">Lengkapi data keahlianmu terlebih dahulu agar bisa melamar ke tim.</p>
                                <a href="{{ route('mahasiswa.profile.edit') }}" class="inline-block px-8 py-3 bg-[#051F20] text-white font-bold rounded-xl hover:bg-opacity-90 transition shadow-md">
                                    Lengkapi Profil →
                                </a>
                            </div>
                        @endif
                    @endif
                </div>

                <!-- RIGHT COLUMN (1/3) -->
                <div class="space-y-8">
                    
                    <!-- Card Profil Ketua Tim -->
                    <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#051F20] mb-6 flex items-center gap-2 border-b border-[#8EB69B]/10 pb-3">
                            <span class="material-symbols-outlined text-[18px]">person</span> Ketua Tim
                        </h3>
                        
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#E8F3E9] border border-[#8EB69B]/20 flex items-center justify-center text-[#051F20] font-serif font-black text-xl shadow-sm">
                                {{ strtoupper(substr($slot->tim->ketua->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-[#051F20] text-sm">{{ $slot->tim->ketua->name }}</h4>
                                <p class="text-[10px] text-[#235347]/70">{{ $slot->tim->ketua->mahasiswa->program_studi ?? 'Mahasiswa' }}</p>
                            </div>
                        </div>

                        @if($slot->tim->ketua->mahasiswa && $slot->tim->ketua->mahasiswa->keahlian)
                            <div class="flex flex-wrap gap-1.5 mb-6">
                                @foreach(array_slice($slot->tim->ketua->mahasiswa->keahlian, 0, 3) as $skill)
                                    <span class="px-2 py-0.5 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347] text-[10px] rounded-md">{{ $skill }}</span>
                                @endforeach
                            </div>
                        @endif

                        <a href="{{ route('mahasiswa.portfolio', $slot->tim->ketua->mahasiswa->nim) }}" class="block text-center text-xs font-bold text-[#051F20] hover:underline">
                            Lihat Profil Lengkap →
                        </a>
                    </div>

                    <!-- Card Info Anggota Tim -->
                    <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#051F20] mb-4 flex items-center gap-2 border-b border-[#8EB69B]/10 pb-3">
                            <span class="material-symbols-outlined text-[18px]">groups</span> Anggota Tim Saat Ini
                        </h3>

                        <div class="divide-y divide-[#8EB69B]/10">
                            @forelse($anggotaTim as $anggota)
                                <div class="flex items-center gap-3 py-4">
                                    <div class="w-10 h-10 rounded-full bg-[#E8F3E9] border border-[#8EB69B]/20 flex items-center justify-center text-[#051F20] font-bold text-xs">
                                        {{ strtoupper(substr($anggota->user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xs font-bold text-[#051F20] truncate">{{ $anggota->user->name }}</h4>
                                        <p class="text-[9px] text-[#235347]/70 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[10px]">mail</span>
                                            @php
                                                $email = $anggota->user->email;
                                                $isAuthMember = false;
                                                if(Auth::check()) {
                                                    $isAuthMember = ($anggota->id_mahasiswa == Auth::id()) || 
                                                                   ($slot->tim->id_ketua == Auth::id()) ||
                                                                   (Auth::user()->mahasiswa && \App\Models\AnggotaTim::where('id_tim', $slot->id_tim)->where('id_mahasiswa', Auth::user()->id)->exists());
                                                }
                                                
                                                $showFullEmail = $isAuthMember || ($anggota->mahasiswa && $anggota->mahasiswa->privacy_level == 'publik');
                                                
                                                if (!$showFullEmail) {
                                                    $parts = explode('@', $email);
                                                    $nama = substr($parts[0], 0, 1) . '****';
                                                    $domain = $parts[1];
                                                    $email = $nama . '@' . $domain;
                                                }
                                            @endphp
                                            {{ $email }}
                                            @if(!$showFullEmail)
                                                <span class="text-[8px] text-[#235347]/50 italic">(disembunyikan)</span>
                                            @endif
                                        </p>
                                        <p class="text-[9px] text-[#235347]/60">{{ $anggota->mahasiswa->program_studi ?? 'Mahasiswa' }}</p>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-full text-[8px] font-bold uppercase
                                        {{ $anggota->peran == 'ketua' ? 'bg-[#051F20] text-white' : '' }}
                                        {{ $anggota->peran == 'anggota' ? 'bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347]' : '' }}
                                        {{ $anggota->peran == 'observer' ? 'bg-gray-100 text-gray-500 border border-gray-200' : '' }}">
                                        {{ $anggota->peran }}
                                    </span>
                                </div>
                            @empty
                                <div class="bg-[#E8F3E9] rounded-xl p-4 text-center mt-2 border border-[#8EB69B]/20">
                                    <p class="text-xs text-[#235347]/70 italic">Belum ada anggota lain.</p>
                                    <p class="text-[10px] text-[#235347] font-semibold mt-1">Kamu bisa jadi anggota pertama!</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="flex justify-between items-center mt-6 pt-4 border-t border-[#8EB69B]/10">
                            <span class="text-[10px] text-[#235347]/70">{{ $totalAnggota }} anggota bergabung</span>
                            <span class="text-[10px] font-bold {{ $timPenuh ? 'text-red-500' : 'text-emerald-700' }}">
                                {{ $totalAnggota }}/{{ $maksAnggota }} Kapasitas
                            </span>
                        </div>
                    </div>

                    <!-- Card Statistik Slot -->
                    <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#051F20] mb-6 flex items-center gap-2 border-b border-[#8EB69B]/10 pb-3">
                            <span class="material-symbols-outlined text-[18px]">analytics</span> Statistik Slot
                        </h3>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-[#E8F3E9] p-4 rounded-xl border border-[#8EB69B]/20 text-center">
                                <p class="text-2xl font-bold text-[#051F20]">{{ $totalPelamar }}</p>
                                <p class="text-[9px] font-bold text-[#235347]/70 uppercase tracking-wider">Total Pelamar</p>
                            </div>
                            <div class="bg-[#E8F3E9] p-4 rounded-xl border border-[#8EB69B]/20 text-center">
                                <p class="text-2xl font-bold text-emerald-700">{{ $diterimaCount }}</p>
                                <p class="text-[9px] font-bold text-[#235347]/70 uppercase tracking-wider">Diterima</p>
                            </div>
                            <div class="bg-[#E8F3E9] p-4 rounded-xl border border-[#8EB69B]/20 text-center">
                                <p class="text-2xl font-bold text-amber-600">{{ $menungguCount }}</p>
                                <p class="text-[9px] font-bold text-[#235347]/70 uppercase tracking-wider">Menunggu</p>
                            </div>
                            <div class="bg-[#E8F3E9] p-4 rounded-xl border border-[#8EB69B]/20 text-center">
                                <p class="text-2xl font-bold {{ $slotTersisa > 0 ? 'text-emerald-700' : 'text-red-500' }}">{{ $slotTersisa }}</p>
                                <p class="text-[9px] font-bold text-[#235347]/70 uppercase tracking-wider">Slot Sisa</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Deadline & Status -->
                    <div class="bg-white border border-[#8EB69B]/20 rounded-2xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#051F20] mb-6 flex items-center gap-2 border-b border-[#8EB69B]/10 pb-3">
                            <span class="material-symbols-outlined text-[18px]">schedule</span> Informasi Waktu
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <p class="text-[10px] text-[#235347]/70 font-bold uppercase tracking-wider mb-1">Deadline Lomba</p>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-[#051F20]">{{ $slot->tim->lomba->deadline->format('d M Y') }}</p>
                                    @if($slot->tim->lomba->deadline->diffInDays(now()) <= 7)
                                        <span class="bg-red-50 text-red-500 text-[10px] font-bold px-2 py-0.5 rounded-full">
                                            ⚡ {{ (int) abs($slot->tim->lomba->deadline->diffInDays(now())) }} hari lagi
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <p class="text-[10px] text-[#235347]/70 font-bold uppercase tracking-wider mb-1">Batas Lamar Tim</p>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-[#051F20]">{{ $slot->batas_waktu->format('d M Y') }}</p>
                                    @if($slot->batas_waktu->diffInDays(now()) <= 3)
                                        <span class="bg-red-50 text-red-500 text-[10px] font-bold px-2 py-0.5 rounded-full animate-pulse">
                                            🔥 Segera ditutup!
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-4 border-t border-[#8EB69B]/15">
                                <div class="flex items-center justify-between">
                                    <p class="text-[10px] text-[#235347]/70 font-bold uppercase tracking-wider">Status Slot</p>
                                    @if($waktuMasihAda && $slotTersisa > 0)
                                        <span class="text-emerald-700 text-[10px] font-bold flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 bg-emerald-600 rounded-full animate-pulse"></span>
                                            BUKA
                                        </span>
                                    @else
                                        <span class="text-red-500 text-[10px] font-bold flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                            DITUTUP
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>
</div>
</body>
</html>
