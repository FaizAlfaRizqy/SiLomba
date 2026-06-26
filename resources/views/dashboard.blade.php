<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SiLomba | Dashboard</title>
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
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #001813;
        }
        ::-webkit-scrollbar-thumb {
            background: #005228;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00743a;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-primary text-on-primary-fixed selection:bg-secondary-fixed selection:text-on-secondary-fixed font-body-md overflow-x-hidden">
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
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap">
            <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
            <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DASHBOARD</p>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            
            @role('mahasiswa|ketua_tim')
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
            @endrole

            @role('admin')
            <!-- Kelola Lomba -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.lomba.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('admin.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-label-md">Kelola Lomba</span>
            </a>
            <!-- Kelola Tim -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.tim.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('admin.tim.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.tim.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-label-md">Kelola Tim</span>
            </a>
            <!-- Pengguna -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.users.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('admin.users.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.users.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">person</span>
                <span class="font-label-md text-label-md">Pengguna</span>
            </a>
            @endrole
        </nav>
        
        <div class="mt-auto flex flex-col gap-1 pt-6">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-stack-md text-error hover:bg-error/10 px-4 py-3 transition-all rounded-lg">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="font-label-md text-label-md">Logout</span>
                </button>
            </form>
            <a href="{{ route('mahasiswa.profile.edit') }}" class="mt-2 pt-4 border-t border-outline-variant/10 flex items-center gap-3 px-2 hover:bg-secondary/10 pb-2 rounded-lg transition-colors cursor-pointer group">
                <img alt="Profile" class="w-10 h-10 rounded-full border-2 border-secondary-fixed/30 group-hover:border-secondary-fixed transition-colors object-cover" src="{{ (Auth::user()->mahasiswa && Auth::user()->mahasiswa->foto_profil) ? asset('storage/' . Auth::user()->mahasiswa->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"/>
                <div class="overflow-hidden flex-1">
                    <p class="font-headline-sm text-[14px] text-on-primary-fixed truncate group-hover:text-secondary transition-colors">{{ Auth::user()->name }}</p>
                    <p class="font-label-md text-[10px] text-on-primary-container truncate">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
                </div>
            </a>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Scrollable Content -->
        <main class="flex-1 p-container-padding overflow-y-auto">
            <div class="mb-stack-lg">
                <h2 class="font-headline-lg text-headline-lg text-on-primary-fixed mb-2">Dashboard</h2>
                <p class="text-on-primary-container text-body-lg max-w-2xl">
                    Selamat datang kembali, {{ Auth::user()->name }}.
                </p>
            </div>
            
            <div class="bg-primary-container p-6 rounded-3xl border border-outline-variant/10 shadow-sm">
                <h3 class="font-headline-md text-on-primary-fixed mb-2">Status Akun</h3>
                <p class="text-on-primary-container text-body-md">Anda berhasil login ke dalam sistem SiLomba.</p>
            </div>
        </main>
    </div>
</div>
</body>
</html>
