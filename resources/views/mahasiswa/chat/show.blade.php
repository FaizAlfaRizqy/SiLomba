<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Chat Tim - {{ $tim->nama_tim }} | SiLomba</title>
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
<body class="bg-[#E8F3E9] text-[#051F20] font-body-md overflow-hidden">
<div class="flex h-screen overflow-hidden">

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
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">CHAT TIM</p>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
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
        <div class="mt-auto flex flex-col gap-1 pt-6">
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-stack-md text-red-400 hover:bg-red-500/10 px-4 py-3 transition-all rounded-lg">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="font-label-md text-label-md">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 min-w-0 flex flex-col h-screen bg-[#E8F3E9] overflow-hidden" 
         x-data="chatHandler()" 
         x-init="initChat()">
        
        <!-- Top bar for Mobile -->
        <header class="md:hidden flex items-center justify-between px-6 py-4 bg-primary-container border-b border-[#8EB69B]/10 z-40">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <span class="font-bold text-white tracking-wide">SiLomba</span>
            </div>
            <a href="{{ route('mahasiswa.chat.index') }}" class="text-white">
                <span class="material-symbols-outlined text-[28px]">arrow_back</span>
            </a>
        </header>

        <div class="flex-1 flex overflow-hidden">
            <!-- SIDEBAR: INFO TIM (Hidden on Mobile) -->
            <div class="hidden lg:flex flex-col w-80 bg-[#F4F9F6] border-r border-[#8EB69B]/20">
                <div class="p-8 text-center border-b border-[#8EB69B]/20">
                    <div class="w-24 h-24 rounded-3xl bg-[#E8F3E9] border border-[#8EB69B]/30 text-[#235347] flex items-center justify-center font-serif font-black text-3xl mx-auto mb-6 shadow-sm">
                        {{ strtoupper(substr($tim->nama_tim, 0, 2)) }}
                    </div>
                    <h3 class="text-xl font-bold text-[#051F20] font-serif mb-1">{{ $tim->nama_tim }}</h3>
                    <p class="text-xs text-[#235347]/70 font-semibold leading-relaxed">{{ $tim->lomba->nama }}</p>
                </div>

                <div class="flex-1 overflow-y-auto p-6 space-y-8">
                    <div>
                        <h4 class="text-[10px] font-bold text-[#235347]/60 uppercase tracking-[0.2em] mb-4">Anggota Tim ({{ $tim->anggota->count() }})</h4>
                        <div class="space-y-3">
                            @foreach($tim->anggota as $member)
                                <div class="flex items-center gap-3 p-2 rounded-2xl hover:bg-[#E8F3E9] transition group">
                                    <div class="w-10 h-10 rounded-xl bg-white border border-[#8EB69B]/20 text-[#235347] flex items-center justify-center font-bold text-sm shadow-sm group-hover:bg-[#235347] group-hover:text-white transition">
                                        {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0 text-left">
                                        <p class="text-sm font-bold text-[#051F20] truncate">{{ $member->user->name }}</p>
                                        <p class="text-[10px] text-[#235347]/70 truncate">{{ $member->user->email }}</p>
                                    </div>
                                    @if($member->peran == 'ketua')
                                        <span class="text-xs">👑</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-5 border border-[#8EB69B]/20 shadow-sm text-left">
                        <h4 class="text-[10px] font-bold text-[#235347]/60 uppercase tracking-[0.2em] mb-3 font-label-md">Info Lomba</h4>
                        <p class="text-sm font-bold text-[#051F20] mb-1">{{ $tim->lomba->nama }}</p>
                        <p class="text-[10px] text-red-600 font-bold italic flex items-center gap-1 mt-2">
                            <span class="material-symbols-outlined text-[12px]">calendar_today</span>
                            Deadline: {{ $tim->lomba->deadline->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- MAIN CHAT AREA -->
            <div class="flex-1 flex flex-col relative bg-[#E8F3E9] overflow-hidden">
                
                <!-- HEADER -->
                <div class="bg-white/90 backdrop-blur-md px-6 py-4 border-b border-[#8EB69B]/20 flex items-center justify-between sticky top-0 z-10 shadow-sm">
                    <div class="flex items-center gap-4 text-left">
                        <a href="{{ route('mahasiswa.chat.index') }}" class="lg:hidden p-2 bg-[#F4F9F6] border border-[#8EB69B]/20 rounded-xl text-[#235347]">
                            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        </a>
                        <div class="w-12 h-12 rounded-xl bg-[#E8F3E9] border border-[#8EB69B]/30 text-[#235347] flex items-center justify-center font-serif font-black text-lg shadow-sm">
                            {{ strtoupper(substr($tim->nama_tim, 0, 2)) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-[#051F20] font-serif">{{ $tim->nama_tim }}</h4>
                            <p class="text-[10px] text-[#235347]/70 font-semibold">{{ $tim->anggota->count() }} Anggota • {{ $tim->lomba->nama }}</p>
                        </div>
                    </div>
                </div>

                <!-- MESSAGES AREA -->
                <div id="area-pesan" class="flex-1 overflow-y-auto px-6 py-8 space-y-6 scroll-smooth custom-scrollbar">
                    
                    <!-- Date Separator -->
                    <div class="flex justify-center my-8">
                        <span class="bg-white/80 border border-[#8EB69B]/20 px-4 py-1 rounded-full text-[10px] font-bold text-[#235347]/70 uppercase tracking-widest shadow-sm">Awal Percakapan</span>
                    </div>

                    <template x-for="msg in pesan" :key="msg.id">
                        <div :class="msg.id_pengirim == {{ Auth::id() }} ? 'flex justify-end' : 'flex justify-start'">
                            <div :class="msg.id_pengirim == {{ Auth::id() }} ? 'items-end' : 'items-start'" class="flex flex-col max-w-[80%] lg:max-w-[60%]">
                                
                                <!-- Sender Name -->
                                <template x-if="msg.id_pengirim != {{ Auth::id() }}">
                                    <span class="text-[10px] font-bold text-[#235347]/70 mb-1 ml-4 uppercase tracking-tighter" x-text="msg.pengirim.name"></span>
                                </template>

                                <!-- Message Bubble -->
                                <div :class="msg.id_pengirim == {{ Auth::id() }} 
                                    ? 'bg-[#051F20] text-white rounded-3xl rounded-tr-sm shadow-sm' 
                                    : 'bg-white text-[#051F20] rounded-3xl rounded-tl-sm border border-[#8EB69B]/20 shadow-sm'" 
                                    class="px-5 py-3.5 relative group">
                                    
                                    <!-- File Attachment -->
                                    <template x-if="msg.file_attachment">
                                        <div class="flex items-center gap-3 p-2 bg-black/5 rounded-xl mb-2 text-left">
                                            <div class="text-xl">📎</div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs font-bold truncate" x-text="msg.pesan"></p>
                                            </div>
                                            <a :href="'/storage/' + msg.file_attachment" target="_blank" class="text-[10px] font-bold uppercase tracking-widest bg-white/20 px-2 py-1 rounded hover:bg-white/30 transition">Unduh</a>
                                        </div>
                                    </template>

                                    <!-- Text Message -->
                                    <template x-if="!msg.file_attachment">
                                        <p class="text-sm leading-relaxed whitespace-pre-wrap text-left" x-text="msg.pesan"></p>
                                    </template>

                                    <!-- Pin Badge -->
                                    <template x-if="msg.is_pinned">
                                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-amber-400 rounded-full flex items-center justify-center text-[10px] shadow border-2 border-white">📌</div>
                                    </template>

                                    <!-- Pin Action (For Leader Only) -->
                                    @if(Auth::id() == $tim->id_ketua)
                                        <button @click="pinPesan(msg.id)" class="absolute -left-8 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition p-1 bg-white border border-[#8EB69B]/20 rounded-full shadow text-xs">📌</button>
                                    @endif
                                </div>

                                <!-- Timestamp -->
                                <span :class="msg.id_pengirim == {{ Auth::id() }} ? 'mr-2' : 'ml-2'" class="text-[9px] font-bold text-[#235347]/50 mt-1 uppercase" x-text="formatDate(msg.created_at)"></span>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- PINNED MESSAGE BANNER -->
                <template x-if="pinnedMessage">
                    <div class="absolute top-20 left-0 right-0 px-6 py-2 bg-amber-50/95 backdrop-blur-sm border-b border-amber-200 flex items-center justify-between z-10 animate-fade-down text-left">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <span class="text-lg">📌</span>
                            <div class="truncate">
                                <p class="text-[10px] font-bold text-amber-800 uppercase tracking-widest font-label-md">Pesan Tersemat</p>
                                <p class="text-xs text-amber-950 truncate" x-text="pinnedMessage.pesan"></p>
                            </div>
                        </div>
                        <button @click="scrollAtMsg(pinnedMessage.id)" class="text-[10px] font-bold text-amber-800 hover:underline flex-shrink-0 uppercase tracking-widest">Lihat →</button>
                    </div>
                </template>

                <!-- INPUT AREA -->
                <div class="bg-white px-6 py-5 border-t border-[#8EB69B]/20 shadow-lg relative z-20">
                    <div class="max-w-5xl mx-auto flex items-end gap-3">
                        
                        <!-- Attachment -->
                        <div x-data="{ uploading: false }">
                            <input type="file" id="file-input" class="hidden" @change="uploadFile($event)">
                            <button @click="document.getElementById('file-input').click()" 
                                    :disabled="uploading"
                                    class="w-12 h-12 rounded-2xl bg-[#F4F9F6] border border-[#8EB69B]/20 flex items-center justify-center text-xl hover:bg-[#E8F3E9] hover:border-[#235347]/30 transition group">
                                <span :class="uploading ? 'animate-spin' : 'group-hover:scale-110 transition'">📎</span>
                            </button>
                        </div>

                        <!-- Input Field -->
                        <div class="flex-1 relative">
                            <textarea 
                                x-model="inputPesan"
                                @keydown.enter.prevent="kirimPesan()"
                                rows="1" 
                                style="resize:none"
                                placeholder="Ketik pesan..."
                                class="w-full bg-[#F4F9F6] border border-[#8EB69B]/20 rounded-2xl px-5 py-3.5 text-sm focus:border-[#235347] focus:ring-4 focus:ring-[#235347]/5 transition-all no-scrollbar"
                                @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                            ></textarea>
                        </div>

                        <!-- Send Button -->
                        <button 
                            @click="kirimPesan()"
                            :disabled="!inputPesan.trim()"
                            :class="inputPesan.trim() ? 'bg-[#051F20] shadow hover:bg-opacity-95 scale-100' : 'bg-gray-100 text-gray-400 scale-90'"
                            class="w-12 h-12 rounded-2xl flex items-center justify-center text-white transition-all transform active:scale-95">
                            <svg class="w-6 h-6 transform rotate-90" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function chatHandler() {
        return {
            pesan: @json($messages),
            pinnedMessage: @json($pinnedMessage),
            inputPesan: '',
            lastTimestamp: Date.now(),
            timId: {{ $tim->id }},
            csrfToken: '{{ csrf_token() }}',

            initChat() {
                this.scrollBawah();
                this.mulaiPolling();
            },

            mulaiPolling() {
                setInterval(() => {
                    this.ambilPesanBaru();
                }, 3000);
            },

            async ambilPesanBaru() {
                try {
                    const res = await fetch(`/mahasiswa/chat/${this.timId}/pesan-baru?sejak=${this.lastTimestamp}`);
                    const data = await res.json();
                    if (data.pesan.length > 0) {
                        this.pesan.push(...data.pesan);
                        this.lastTimestamp = data.timestamp;
                        this.$nextTick(() => this.scrollBawah());
                    }
                } catch (e) { console.error('Polling error:', e); }
            },

            async kirimPesan() {
                if (!this.inputPesan.trim()) return;
                const content = this.inputPesan;
                this.inputPesan = '';
                
                try {
                    const res = await fetch(`/mahasiswa/chat/${this.timId}/kirim`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': this.csrfToken
                        },
                        body: JSON.stringify({ pesan: content })
                    });
                    await this.ambilPesanBaru();
                } catch (e) { console.error('Send error:', e); }
            },

            async uploadFile(e) {
                const file = e.target.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append('file', file);

                try {
                    await fetch(`/mahasiswa/chat/${this.timId}/upload`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': this.csrfToken },
                        body: formData
                    });
                    await this.ambilPesanBaru();
                } catch (e) { console.error('Upload error:', e); }
            },

            async pinPesan(msgId) {
                try {
                    const res = await fetch(`/mahasiswa/chat/pesan/${msgId}/pin`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': this.csrfToken }
                    });
                    const data = await res.json();
                    if (data.success) {
                        window.location.reload();
                    }
                } catch (e) { console.error('Pin error:', e); }
            },

            scrollBawah() {
                const area = document.getElementById('area-pesan');
                if (area) {
                    area.scrollTop = area.scrollHeight;
                }
            },

            scrollAtMsg(id) {
                this.scrollBawah();
            },

            formatDate(dateStr) {
                const date = new Date(dateStr);
                return date.getHours().toString().padStart(2, '0') + ':' + 
                       date.getMinutes().toString().padStart(2, '0');
            }
        }
    }
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { bg: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(35, 83, 71, 0.2); border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(35, 83, 71, 0.4); }
    
    [x-cloak] { display: none !important; }
    
    @keyframes fade-down {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-down { animation: fade-down 0.3s ease-out; }
</style>
</body>
</html>
