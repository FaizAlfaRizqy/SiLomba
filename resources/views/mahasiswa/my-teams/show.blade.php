<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Detail Tim Saya | SiLomba</title>
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
        .content-card {
            background: #ffffff;
            border: 1px solid rgba(142, 182, 155, 0.2);
            box-shadow: 0 4px 20px rgba(5, 31, 32, 0.03);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#E8F3E9] text-[#051F20] font-body-md overflow-x-hidden">
<div class="flex min-h-screen">

    <!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-primary-container border-r border-[#8EB69B]/10 shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">DETAIL TIM</p>
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
    <div class="flex-1 min-w-0 flex flex-col min-h-screen bg-[#E8F3E9]">
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

            <!-- Back navigation / Header -->
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('mahasiswa.my-teams.index') }}" class="p-2 bg-white hover:bg-gray-50 border border-[#8EB69B]/20 rounded-xl transition flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-[#051F20]">arrow_back</span>
                </a>
                <h2 class="font-bold text-xl text-[#051F20] font-serif leading-tight">
                    Detail Tim Saya
                </h2>
            </div>

            <!-- Page Container -->
            <div class="content-card rounded-[2rem] overflow-hidden p-8 md:p-12">
                <div class="flex flex-col md:flex-row justify-between items-start gap-8 mb-12 border-b border-[#8EB69B]/10 pb-8">
                    <div>
                        <span class="px-3 py-1 bg-[#E8F3E9] text-[#235347] border border-[#8EB69B]/30 text-[10px] font-bold rounded-full uppercase tracking-widest mb-4 inline-block">
                            {{ $tim->lomba->kategori }}
                        </span>
                        <h1 class="text-4xl font-serif font-bold text-[#051F20] mb-2">{{ $tim->nama_tim }}</h1>
                        <p class="text-lg text-[#235347]/70 font-semibold">{{ $tim->lomba->nama }}</p>
                    </div>
                    <div class="flex flex-col items-start md:items-end gap-3">
                        <span class="px-4 py-2 bg-[#E8F3E9] text-[#235347] border border-[#8EB69B]/20 rounded-xl text-xs font-bold uppercase tracking-wider shadow-sm">
                            ● Status Lomba: {{ strtoupper($tim->lomba->status) }}
                        </span>
                        <p class="text-sm font-bold text-red-600 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                            Deadline: {{ $tim->lomba->deadline->format('d M Y') }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-2 space-y-12">
                        <!-- Members Section -->
                        <div>
                            <h3 class="text-xl font-bold text-[#051F20] font-serif mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[24px] text-[#235347]">group</span> Anggota Tim
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($tim->anggota as $member)
                                    <div class="flex items-center gap-4 p-4 rounded-3xl bg-[#F4F9F6] border border-[#8EB69B]/20 shadow-sm hover:border-[#235347]/30 transition-colors">
                                        <div class="w-12 h-12 rounded-2xl bg-[#E8F3E9] border border-[#8EB69B]/30 text-[#235347] flex items-center justify-center font-bold text-lg shadow-sm">
                                            {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1 min-w-0 text-left">
                                            <h4 class="font-bold text-[#051F20] truncate">{{ $member->user->name }}</h4>
                                            <p class="text-xs text-[#235347]/70 truncate">{{ $member->user->email }}</p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                            {{ $member->peran == 'ketua' ? 'bg-[#051F20] text-white' : 'bg-[#E8F3E9] text-[#235347] border border-[#8EB69B]/20' }}">
                                            {{ $member->peran }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Slots Section -->
                        <div>
                            <h3 class="text-xl font-bold text-[#051F20] font-serif mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[24px] text-amber-500">campaign</span> Lowongan Slot
                            </h3>
                            <div class="space-y-4">
                                @foreach($tim->slots as $slot)
                                    <div class="p-6 rounded-3xl border border-[#8EB69B]/20 bg-white shadow-sm flex justify-between items-center hover:border-[#235347]/30 transition-all">
                                        <div class="text-left">
                                            <h4 class="font-bold text-[#051F20]">{{ $slot->posisi }}</h4>
                                            <p class="text-sm text-[#235347]/70">{{ $slot->jumlah_slot }} Total Slot • {{ $slot->lamarans->where('status', 'diterima')->count() }} Terisi</p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                            {{ $slot->status == 'buka' ? 'bg-[#E8F3E9] text-[#235347] border border-[#8EB69B]/20' : 'bg-red-50 text-red-500 border border-red-100' }}">
                                            {{ $slot->status }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <!-- Leader Card -->
                        <div class="bg-[#F4F9F6] border border-[#8EB69B]/20 rounded-3xl p-8 text-center shadow-sm">
                            <h4 class="text-xs font-bold text-[#235347]/60 uppercase tracking-widest mb-6">Ketua Tim</h4>
                            <div class="w-24 h-24 rounded-3xl bg-[#E8F3E9] border border-[#8EB69B]/30 text-[#235347] flex items-center justify-center font-black text-4xl mx-auto mb-6 shadow-sm">
                                {{ strtoupper(substr($tim->ketua->name, 0, 1)) }}
                            </div>
                            <h3 class="text-xl font-bold text-[#051F20] mb-1 font-serif">{{ $tim->ketua->name }}</h3>
                            <p class="text-sm text-[#235347]/70 mb-6">{{ $tim->ketua->mahasiswa->program_studi ?? 'Mahasiswa' }}</p>
                            <a href="{{ route('mahasiswa.portfolio', $tim->ketua->mahasiswa->nim) }}" class="inline-block px-6 py-2 bg-white border border-[#8EB69B]/20 text-[#235347] text-xs font-bold rounded-xl hover:bg-[#E8F3E9] transition-all">
                                Lihat Portofolio
                            </a>
                        </div>

                        <!-- Chat Button -->
                        <a href="{{ route('mahasiswa.chat.show', $tim->id) }}" class="block w-full py-5 bg-[#051F20] text-white text-center font-bold rounded-3xl shadow-md hover:bg-opacity-95 transition-all text-lg">
                            💬 Chat Tim Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
