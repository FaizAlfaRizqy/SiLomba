<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Notifikasi | SiLomba</title>
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
                    "fontFamily": {
                        "label-md": ["JetBrains Mono"],
                        "headline-sm": ["Hanken Grotesk"],
                        "headline-md": ["Hanken Grotesk"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Hanken Grotesk"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Hanken Grotesk"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #001813; }
        ::-webkit-scrollbar-thumb { background: #005228; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00743a; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-hidden">
<div class="flex h-screen">

    <!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-outline-variant/10 shadow-none py-6 px-4 z-50">
        <div class="mb-10 px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-[20px] font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">NOTIFIKASI</p>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-4 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-[12px]">Dashboard</span>
            </a>
            <!-- Direktori Lomba -->
            <a class="flex items-center gap-4 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-[12px]">Direktori Lomba</span>
            </a>
            <!-- Tim Finder -->
            <a class="flex items-center gap-4 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.tim-finder.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-[12px]">Tim Finder</span>
            </a>
            <!-- Tim Saya -->
            <a class="flex items-center gap-4 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
                <span class="font-label-md text-[12px]">Tim Saya</span>
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
                <a class="flex items-center justify-between gap-4 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.notifikasi.index') }}">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.notifikasi.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">notifications</span>
                        <span class="font-label-md text-[12px]">Notifikasi</span>
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
                <button type="submit" class="w-full flex items-center gap-4 text-error hover:bg-error/10 px-4 py-3 transition-all rounded-lg">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="font-label-md text-[12px]">Logout</span>
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

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 bg-[#0e3b31]">
        <!-- Scrollable Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="flex items-end justify-between mb-8 pb-6 border-b border-white/10">
                    <div>
                        <h2 class="font-headline-lg text-[32px] text-white font-bold mb-2">Notifikasi</h2>
                        <p class="text-white/60 text-[14px] flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                            {{ \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count() }} belum dibaca
                        </p>
                    </div>
                    @if(\App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->exists())
                        <form action="{{ route('mahasiswa.notifikasi.baca-semua') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-[13px] font-bold text-secondary-fixed hover:text-secondary-fixed-dim transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">done_all</span>
                                Tandai Semua Dibaca
                            </button>
                        </form>
                    @endif
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-secondary-fixed/20 border border-secondary-fixed/30 rounded-2xl flex items-center gap-3 text-secondary-fixed">
                        <span class="material-symbols-outlined">check_circle</span>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Daftar Notifikasi -->
                <div class="space-y-4">
                    @forelse($notifikasis as $notif)
                        <div class="relative group">
                            <form action="{{ route('mahasiswa.notifikasi.baca', $notif->id) }}" method="POST" id="form-notif-{{ $notif->id }}">
                                @csrf
                                <button type="submit" class="w-full text-left">
                                    <div class="p-5 rounded-2xl transition-all flex items-start gap-5 
                                        {{ $notif->is_read ? 'bg-white/5 border border-white/10 opacity-70' : 'bg-white/10 border border-secondary-fixed/30 shadow-lg shadow-secondary-fixed/5' }}
                                        hover:bg-white/15 hover:border-secondary-fixed/50 group">
                                        
                                        <div class="flex-1 min-w-0">
                                            <div class="flex justify-between items-start mb-1">
                                                <h4 class="text-[15px] font-bold {{ $notif->is_read ? 'text-white/70' : 'text-white' }} group-hover:text-secondary-fixed transition-colors">
                                                    {{ $notif->judul }}
                                                </h4>
                                                @if(!$notif->is_read)
                                                    <div class="w-2.5 h-2.5 bg-secondary-fixed rounded-full shadow-[0_0_8px_rgba(107,254,156,0.5)] flex-shrink-0 mt-1"></div>
                                                @endif
                                            </div>
                                            <p class="text-[14px] {{ $notif->is_read ? 'text-white/50' : 'text-white/80' }} leading-relaxed line-clamp-2">
                                                {{ $notif->isi }}
                                            </p>
                                            <div class="flex items-center justify-between mt-4">
                                                <span class="text-[11px] font-label-md text-white/40 uppercase tracking-wider flex items-center gap-1.5">
                                                    <span class="material-symbols-outlined text-[14px]">schedule</span>
                                                    {{ $notif->created_at->diffForHumans() }}
                                                </span>
                                                @if($notif->link)
                                                    <span class="text-[11px] font-bold text-secondary-fixed uppercase tracking-wider flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                                        Lihat Detail <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="py-24 text-center bg-white/5 rounded-[2rem] border border-white/10">
                            <h3 class="text-[18px] font-bold text-white">Belum ada notifikasi</h3>
                            <p class="text-[14px] text-white/50 mt-2">Semua aktivitas penting akan muncul di sini.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $notifikasis->links() }}
                </div>
            </div>

        </main>
    </div>
</div>
</body>
</html>
