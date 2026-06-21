<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tim Finder | SiLomba</title>
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
        .card-light {
            background: #ffffff;
            border: 1px solid rgba(142, 182, 155, 0.2);
            box-shadow: 0 4px 20px rgba(5, 31, 32, 0.03);
        }
        .slot-card {
            background: #ffffff;
            border: 1px solid rgba(142, 182, 155, 0.2);
            box-shadow: 0 4px 20px rgba(5, 31, 32, 0.03);
            transition: all 0.25s ease;
        }
        .slot-card:hover {
            background: #ffffff;
            border-color: rgba(35, 83, 71, 0.35);
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(35, 83, 71, 0.08);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-[#051F20] font-body-md overflow-x-hidden">
<div class="flex min-h-screen" x-data="{
    search: '{{ request('search', '') }}',
    kategori: '{{ request('kategori', '') }}'
}">

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
            <!-- Tim Finder — active -->
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
    <div class="flex-1 flex flex-col min-w-0 bg-background">
        <main class="flex-1 p-8 overflow-y-auto">

            <!-- Header -->
            <div class="mb-6">
                <h2 class="font-headline-lg text-headline-lg text-[#051F20] mb-2 font-serif font-bold">Tim Finder</h2>
                <p class="text-[#235347]/80 text-body-lg max-w-2xl">
                    Temukan tim dan posisi yang sesuai dengan kemampuanmu, dan bergabunglah dalam kompetisi bergengsi bersama rekan terbaik.
                </p>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                     class="mb-6 p-4 bg-secondary-fixed/20 border border-secondary-fixed/30 text-secondary-fixed rounded-2xl flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1;">check_circle</span>
                        <p class="text-sm font-semibold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="opacity-60 hover:opacity-100">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
            @endif

            <!-- Search & Filter Bar -->
            <div class="space-y-stack-md mb-section-gap">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center bg-white border border-[#8EB69B]/20 p-4 rounded-2xl shadow-sm">
                    <!-- Search -->
                    <div class="lg:col-span-6 relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#235347]/60 text-[20px]">search</span>
                        <form method="GET" action="{{ route('mahasiswa.tim-finder.index') }}" id="search-form">
                            <input name="search" x-model="search"
                                   @input.debounce.500ms="$el.closest('form').submit()"
                                   class="w-full bg-[#E8F3E9]/50 border border-[#8EB69B]/30 rounded-xl pl-10 py-3 text-[#051F20] placeholder:text-[#235347]/40 focus:ring-1 focus:ring-[#235347] focus:border-[#235347]"
                                   placeholder="Cari posisi, skill, atau nama tim..."
                                   type="text"
                                   value="{{ request('search') }}"/>
                            @if(request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif
                        </form>
                    </div>
                    <!-- Kategori -->
                    <div class="lg:col-span-4">
                        <div class="flex flex-wrap gap-2">
                            @php $cats = ['','UI/UX','Coding','Bisnis','Riset']; $labels = ['Semua','UI/UX','Coding','Bisnis','Riset']; @endphp
                            @foreach($cats as $i => $cat)
                                <a href="{{ route('mahasiswa.tim-finder.index', array_filter(['kategori' => $cat, 'search' => request('search')])) }}"
                                   class="px-4 py-2 rounded-full font-headline-sm text-[13px] transition-colors
                                          {{ request('kategori', '') === $cat ? 'bg-[#051F20] text-white' : 'text-[#235347]/80 hover:text-[#051F20] bg-[#E8F3E9] hover:bg-[#D4E7D6]' }}">
                                    {{ $labels[$i] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Reset -->
                    <div class="lg:col-span-2">
                        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="w-full flex items-center justify-center gap-1.5 text-[#235347]/60 hover:text-[#051F20] transition-colors font-label-md text-[12px] bg-[#E8F3E9]/50 hover:bg-[#D4E7D6] py-2 rounded-full">
                            <span class="material-symbols-outlined text-[16px]">close</span>
                            Reset
                        </a>
                    </div>
                </div>

                <!-- Active filters indicator -->
                @if(request('search') || request('kategori'))
                    <div class="flex items-center gap-2 mt-3">
                        <span class="text-[12px] text-[#235347]/70">Filter aktif:</span>
                        @if(request('search'))
                            <span class="px-2 py-0.5 bg-[#D4E7D6] text-[#051F20] text-[12px] font-bold rounded-lg">Cari: {{ request('search') }}</span>
                        @endif
                        @if(request('kategori'))
                            <span class="px-2 py-0.5 bg-[#D4E7D6] text-[#051F20] text-[12px] font-bold rounded-lg">{{ request('kategori') }}</span>
                        @endif
                    </div>
                @endif
            </div>

            <!-- ─── Rekomendasi ─────────────────────────────── -->
            @if($recommendations->isNotEmpty())
                <div class="mb-section-gap">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="material-symbols-outlined text-[#235347] text-[24px]" style="font-variation-settings:'FILL' 1;">auto_awesome</span>
                        <h3 class="font-headline-sm text-headline-sm text-[#051F20] font-serif font-bold">Rekomendasi Untukmu</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach($recommendations as $slot)
                            @php $matchScore = round($slot->matching_score); @endphp
                            <div class="slot-card rounded-2xl p-5 relative overflow-hidden group">
                                <!-- Match badge -->
                                <div class="absolute top-0 right-0 px-3 py-1.5 bg-[#051F20] text-white text-[10px] font-bold rounded-bl-xl tracking-wider">
                                    {{ $matchScore }}% Match
                                </div>

                                <!-- Team Info -->
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-xl bg-[#E8F3E9] border border-[#8EB69B]/30 flex items-center justify-center flex-shrink-0">
                                        <span class="text-lg font-bold text-[#051F20]">{{ substr($slot->tim->nama_tim, 0, 1) }}</span>
                                    </div>
                                    <div class="mt-0.5 min-w-0">
                                        <h4 class="font-headline-sm text-[15px] text-[#051F20] truncate group-hover:text-[#235347] transition-colors font-bold">{{ $slot->tim->nama_tim }}</h4>
                                        <p class="text-[12px] text-[#235347]/70 truncate">{{ $slot->tim->lomba->nama }}</p>
                                    </div>
                                </div>

                                <!-- Posisi -->
                                <div class="bg-[#E8F3E9]/50 border border-[#8EB69B]/10 rounded-xl p-3 mb-3">
                                    <span class="text-[10px] text-[#235347]/50 uppercase tracking-wider block mb-1">Posisi Dicari</span>
                                    <span class="text-[14px] font-bold text-[#051F20]">{{ $slot->posisi }}</span>
                                </div>

                                <!-- Skills -->
                                <div class="mb-4">
                                    <span class="text-[10px] text-[#235347]/50 uppercase tracking-wider block mb-2">Keahlian Dibutuhkan</span>
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($slot->keahlian_dibutuhkan as $skill)
                                            <span class="px-2.5 py-1 bg-[#E8F3E9] text-[#235347] border border-[#8EB69B]/30 text-[10px] font-bold rounded-lg uppercase tracking-wide">{{ $skill }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="flex items-center justify-between pt-4 border-t border-[#8EB69B]/20">
                                    <span class="text-[11px] text-[#235347]/60 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        {{ $slot->batas_waktu->format('d M Y') }}
                                    </span>
                                    <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}"
                                       class="px-4 py-2 bg-[#051F20] text-white text-[11px] font-bold rounded-xl hover:bg-opacity-90 transition-colors flex items-center gap-1">
                                        Lamar
                                        <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif(!$mahasiswa || empty($mahasiswa->keahlian))
                <!-- Profile completion CTA -->
                <div class="mb-section-gap bg-white rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6 border border-[#8EB69B]/20 shadow-sm">
                    <div>
                        <h3 class="font-headline-sm text-headline-sm text-[#051F20] font-serif font-bold mb-2">Lengkapi Profil Keahlianmu</h3>
                        <p class="text-[#235347]/80 text-body-md">Dapatkan rekomendasi tim yang akurat berdasarkan skill yang kamu miliki.</p>
                    </div>
                    <a href="{{ route('mahasiswa.profile.edit') }}"
                       class="flex-shrink-0 px-6 py-3 bg-[#051F20] text-white rounded-xl font-bold hover:bg-opacity-90 hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap shadow-md">
                        Lengkapi Sekarang
                    </a>
                </div>
            @endif

            <!-- ─── Semua Open Slot ─────────────────────────── -->
            <div>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="font-headline-sm text-headline-sm text-[#051F20] flex items-center gap-2 font-serif font-bold">
                        <span class="material-symbols-outlined text-[#051F20]" style="font-variation-settings:'FILL' 1;">grid_view</span>
                        Semua Open Slot
                    </h3>
                    <span class="px-3 py-1 bg-white border border-[#8EB69B]/20 text-[#235347] text-[12px] font-label-md rounded-full font-semibold">{{ $slots->total() }} slot tersedia</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse($slots as $slot)
                        <div class="slot-card rounded-2xl p-5 flex flex-col group">
                            <!-- Header -->
                            <div class="flex items-start gap-3 mb-4">
                                <div class="w-11 h-11 rounded-xl bg-[#E8F3E9] border border-[#8EB69B]/20 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-[#051F20] text-[20px]">group</span>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold text-[#051F20] text-[15px] line-clamp-1 group-hover:text-[#235347] transition-colors">{{ $slot->tim->nama_tim }}</h4>
                                    <p class="text-[11px] text-[#235347]/70 line-clamp-1">{{ $slot->tim->lomba->nama }}</p>
                                </div>
                            </div>

                            <!-- Posisi + Slot badge -->
                            <div class="flex items-center gap-2 mb-3">
                                <span class="px-2.5 py-1 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347] text-[11px] font-bold rounded-lg flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#163832] animate-pulse inline-block"></span>
                                    {{ $slot->jumlah_slot }} Slot Tersisa
                                </span>
                            </div>
                            <h5 class="font-bold text-[#051F20] text-[15px] mb-1">{{ $slot->posisi }}</h5>
                            <p class="text-[13px] text-[#235347]/80 line-clamp-2 mb-4 flex-grow">{{ $slot->deskripsi }}</p>

                            <!-- Skills -->
                            <div class="flex flex-wrap gap-1.5 mb-4">
                                @foreach($slot->keahlian_dibutuhkan as $skill)
                                    <span class="px-2 py-0.5 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347]/80 text-[10px] font-bold rounded-lg">{{ $skill }}</span>
                                @endforeach
                            </div>

                            <!-- Footer -->
                            <div class="mt-auto pt-4 border-t border-[#8EB69B]/20 flex items-center justify-between">
                                <span class="text-[11px] text-[#235347]/60 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">schedule</span>
                                    {{ $slot->batas_waktu->format('d M Y') }}
                                </span>
                                <div class="flex gap-2">
                                    <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}"
                                       class="px-5 py-1.5 bg-[#051F20] text-white text-[11px] font-bold rounded-xl hover:bg-opacity-90 transition-colors">
                                        Lamar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 flex flex-col items-center justify-center text-center bg-white border border-[#8EB69B]/20 shadow-sm rounded-2xl">
                            <div class="w-20 h-20 mb-5 rounded-full bg-[#E8F3E9] border border-[#8EB69B]/20 flex items-center justify-center">
                                <span class="material-symbols-outlined text-[#051F20] text-[40px]">search_off</span>
                            </div>
                            <h3 class="font-headline-sm text-headline-sm text-[#051F20] font-serif font-bold mb-2">Tidak Ada Slot Ditemukan</h3>
                            <p class="text-[#235347]/80 max-w-md text-body-md">Belum ada tim yang membuka slot untuk saat ini atau coba sesuaikan filter pencarian.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($slots->hasPages())
                    <div class="mt-8 flex justify-center">
                        {{ $slots->links() }}
                    </div>
                @endif
            </div>

        </main>
    </div>
</div>
</body>
</html>
