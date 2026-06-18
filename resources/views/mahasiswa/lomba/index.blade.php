<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tim Finder | Direktori Lomba</title>
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
        .card-glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-primary text-on-primary-fixed selection:bg-secondary-fixed selection:text-on-secondary-fixed font-body-md overflow-x-hidden">
<div class="flex min-h-screen" x-data="{ 
    tab: '{{ request('tab', 'aktif') }}',
    search: '{{ request('search', '') }}', 
    kategori: '{{ request('kategori', '') }}', 
    tingkat: '{{ request('tingkat', '') }}', 
    loading: false,
    fetchLomba() {
        this.loading = true;
        let url = new URL('{{ route('mahasiswa.lomba.index') }}');
        url.searchParams.set('tab', this.tab);
        if (this.search) url.searchParams.set('search', this.search);
        if (this.kategori) url.searchParams.set('kategori', this.kategori);
        if (this.tingkat) url.searchParams.set('tingkat', this.tingkat);

        fetch(url, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('lomba-list').innerHTML = html;
            this.loading = false;
        });
    }
}">
    <!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-outline-variant/10 shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DIREKTORI LOMBA</p>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
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

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 bg-[#0e3b31]">


        <!-- Scrollable Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <!-- Header Section -->
            <div class="mb-6">
                <h2 class="font-headline-lg text-headline-lg text-white mb-2">Direktori Lomba</h2>
                <p class="text-white/70 text-body-lg max-w-2xl">
                    Temukan berbagai kompetisi bergengsi untuk mengasah kemampuan, membangun portofolio, dan mengembangkan potensi terbaikmu bersama komunitas pemenang.
                </p>
            </div>

            <!-- Filters & Controls -->
            <div class="space-y-stack-md mb-section-gap">
                <!-- Toggle -->
                <div class="flex items-center gap-stack-md">
                    <button @click="tab = 'aktif'; fetchLomba()" :class="tab === 'aktif' ? 'bg-secondary-fixed text-on-secondary-fixed' : 'text-white/70 hover:text-white bg-white/10'" class="px-6 py-2.5 rounded-full font-headline-sm text-[14px] flex items-center gap-2 transition-colors">
                        Lomba Aktif
                        <span :class="tab === 'aktif' ? 'bg-on-secondary-fixed/20' : 'bg-white/10'" class="px-2 py-0.5 rounded-full text-[12px] font-label-md">{{ $totalAktif }}</span>
                    </button>
                    <button @click="tab = 'arsip'; fetchLomba()" :class="tab === 'arsip' ? 'bg-secondary-fixed text-on-secondary-fixed' : 'text-white/70 hover:text-white bg-white/10'" class="px-6 py-2.5 rounded-full font-headline-sm text-[14px] flex items-center gap-2 transition-colors">
                        Arsip Lomba
                        <span :class="tab === 'arsip' ? 'bg-on-secondary-fixed/20' : 'bg-white/10'" class="px-2 py-0.5 rounded-full text-[12px] font-label-md">{{ $totalArsip }}</span>
                    </button>
                </div>
                <!-- Search Row -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center bg-white/10 border border-white/15 p-4 rounded-2xl">
                    <div class="lg:col-span-5 relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-white/60 text-[20px]">search</span>
                        <input x-model="search" @input.debounce.500ms="fetchLomba()" class="w-full bg-white/10 border border-white/20 rounded-xl pl-10 py-3 text-white placeholder:text-white/50 focus:ring-1 focus:ring-secondary-fixed" placeholder="Nama kompetisi..." type="text"/>
                    </div>
                    <div class="lg:col-span-3">
                        <select x-model="kategori" @change="fetchLomba()" class="w-full bg-white/10 border border-white/20 rounded-xl py-3 text-white focus:ring-1 focus:ring-secondary-fixed cursor-pointer">
                            <option value="" class="bg-[#0a2e25] text-white">Semua Kategori</option>
                            <option value="Sains" class="bg-[#0a2e25] text-white">Sains</option>
                            <option value="Teknologi" class="bg-[#0a2e25] text-white">Teknologi</option>
                            <option value="Bisnis" class="bg-[#0a2e25] text-white">Bisnis</option>
                            <option value="Seni" class="bg-[#0a2e25] text-white">Seni</option>
                            <option value="Olahraga" class="bg-[#0a2e25] text-white">Olahraga</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2">
                        <select x-model="tingkat" @change="fetchLomba()" class="w-full bg-white/10 border border-white/20 rounded-xl py-3 text-white focus:ring-1 focus:ring-secondary-fixed cursor-pointer">
                            <option value="" class="bg-[#0a2e25] text-white">Semua Tingkat</option>
                            <option value="nasional" class="bg-[#0a2e25] text-white">Nasional</option>
                            <option value="internasional" class="bg-[#0a2e25] text-white">Internasional</option>
                            <option value="regional" class="bg-[#0a2e25] text-white">Regional</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2">
                        <button @click="search = ''; kategori = ''; tingkat = ''; fetchLomba()" class="w-full flex items-center justify-center gap-2 text-white/70 hover:text-secondary-fixed transition-colors font-headline-sm text-[14px]">
                            <span class="material-symbols-outlined text-[18px]">filter_alt_off</span>
                            Reset Filter
                        </button>
                    </div>
                </div>

                {{-- Active filter indicator --}}
                <div class="flex items-center gap-2 mt-3" x-show="search || kategori || tingkat" x-cloak>
                    <span class="text-[12px] text-white/60">Filter aktif:</span>
                    <template x-if="search">
                        <span class="px-2 py-0.5 bg-secondary-fixed/20 text-secondary-fixed text-[12px] font-bold rounded-lg flex items-center gap-1">
                            <span x-text="'Cari: ' + search"></span>
                            <button @click="search = ''; fetchLomba()" class="hover:text-error">×</button>
                        </span>
                    </template>
                    <template x-if="kategori">
                        <span class="px-2 py-0.5 bg-secondary-fixed/20 text-secondary-fixed text-[12px] font-bold rounded-lg flex items-center gap-1">
                            <span x-text="kategori"></span>
                            <button @click="kategori = ''; fetchLomba()" class="hover:text-error">×</button>
                        </span>
                    </template>
                    <template x-if="tingkat">
                        <span class="px-2 py-0.5 bg-secondary-fixed/20 text-secondary-fixed text-[12px] font-bold rounded-lg flex items-center gap-1">
                            <span x-text="tingkat"></span>
                            <button @click="tingkat = ''; fetchLomba()" class="hover:text-error">×</button>
                        </span>
                    </template>
                </div>
            </div>

            <!-- List Section -->
            <div class="relative min-h-[400px]">
                <div x-show="loading" class="absolute inset-0 bg-primary/50 backdrop-blur-sm z-10 flex items-center justify-center rounded-3xl" x-cloak>
                    <div class="animate-spin rounded-full h-12 w-12 border-4 border-secondary-fixed border-t-transparent"></div>
                </div>
                <div id="lomba-list">
                    @include('mahasiswa.lomba._list', ['lombas' => $lombas, 'tab' => request('tab', 'aktif')])
                </div>
            </div>

        </main>
    </div>
</div>
<!-- Micro-interaction Scripts -->
<script>
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
