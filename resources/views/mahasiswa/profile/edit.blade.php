<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SiLomba | Dashboard Mahasiswa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
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
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.5rem;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(35, 83, 71, 0.05);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(35, 83, 71, 0.2);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(35, 83, 71, 0.4);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-hidden">
<div class="flex h-screen">

    <!-- SideNavBar -->
    <aside class="hidden md:flex flex-col h-screen w-64 sticky left-0 top-0 bg-[#051F20] border-r border-outline-variant/10 shadow-none py-stack-lg px-stack-md z-50">
        <div class="mb-section-gap px-2 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
            <div>
                <h1 class="font-headline-sm font-serif text-headline-sm font-bold text-[#8EB69B]">SiLomba</h1>
                <p class="text-white text-[11px] font-label-md tracking-wider opacity-70">DASHBOARD</p>
            </div>
        </div>
        <nav class="flex flex-col gap-2">
            <!-- Dashboard -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? 'bg-[#051F20] text-on-secondary scale-98' : 'text-surface-variant hover:bg-[#051F20]/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <!-- Direktori Lomba -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-[#051F20] text-on-secondary scale-98' : 'text-surface-variant hover:bg-[#051F20]/20' }}" href="{{ route('mahasiswa.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-label-md">Direktori Lomba</span>
            </a>
            <!-- Tim Finder -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-[#051F20] text-on-secondary scale-98' : 'text-surface-variant hover:bg-[#051F20]/20' }}" href="{{ route('mahasiswa.tim-finder.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-label-md">Tim Finder</span>
            </a>
            <!-- Tim Saya -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-[#051F20] text-on-secondary scale-98' : 'text-surface-variant hover:bg-[#051F20]/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
                <span class="font-label-md text-label-md">Tim Saya</span>
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
                <a class="flex items-center justify-between gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-[#051F20] text-on-secondary scale-98' : 'text-surface-variant hover:bg-[#051F20]/20' }}" href="{{ route('mahasiswa.notifikasi.index') }}">
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
                <img alt="Profile" class="w-10 h-10 rounded-full border-2 border-[#8EB69B]/30 group-hover:border-[#8EB69B] transition-colors" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"/>
                <div class="overflow-hidden flex-1">
                    <p class="font-headline-sm font-serif text-[14px] text-white truncate group-hover:text-[#8EB69B] transition-colors">{{ Auth::user()->name }}</p>
                    <p class="font-label-md text-[10px] text-[#235347] truncate">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
                </div>
            </a>
        </div>
    </aside>

<!-- Main -->
<main class="flex-1 flex flex-col overflow-y-auto custom-scrollbar bg-background">
    <!-- Top Header -->
    <header class="sticky top-0 z-40 flex justify-between items-center px-8 w-full h-16 bg-[#E8F3E9]/80 backdrop-blur-md border-b border-outline-variant">
        <h2 class="font-headline-sm font-serif text-headline-sm font-bold text-[#051F20]">Edit Profil</h2>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="font-label-md text-[14px] font-bold text-[#051F20]">{{ $user->name }}</p>
                <p class="text-[10px] text-outline uppercase tracking-wider">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
            </div>
            <img class="w-10 h-10 rounded-full border-2 border-[#051F20] object-cover"
                 src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar"/>
        </div>
    </header>

    <!-- Page Content -->
    <div class="px-8 py-8 max-w-7xl mx-auto">

        @if(session('status'))
        <div class="mb-6 p-4 bg-[#051F20]/30 border border-[#051F20]/20 rounded-xl flex items-center gap-3 text-[#235347] font-bold">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('mahasiswa.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Left Column (8 cols) -->
            <div class="lg:col-span-8 space-y-8">

                <!-- Profile Header Card -->
                <section class="bg-white border border-[#8EB69B]/20 rounded-xl p-8 card-shadow border border-outline-variant/30 overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-secondary to-primary"></div>
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mt-2">

                        <!-- Photo Upload -->
                        <div class="relative" x-data="{ photoPreview: null }">
                            <div class="w-32 h-32 rounded-3xl overflow-hidden border-4 border-surface shadow-lg bg-[#E8F3E9]">
                                <template x-if="!photoPreview">
                                    @if($mahasiswa->foto_profil)
                                        <img src="{{ asset('storage/' . $mahasiswa->foto_profil) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-[#E8F3E9]">
                                            <span class="material-symbols-outlined text-5xl text-[#235347]">person</span>
                                        </div>
                                    @endif
                                </template>
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" class="w-full h-full object-cover">
                                </template>
                            </div>
                            <input type="file" name="foto_profil" class="hidden" x-ref="photo"
                                @change="
                                    const reader = new FileReader();
                                    reader.onload = (e) => { photoPreview = e.target.result; };
                                    reader.readAsDataURL($refs.photo.files[0]);
                                ">
                            <button type="button" @click="$refs.photo.click()"
                                class="absolute -bottom-2 -right-2 bg-[#051F20] text-on-primary p-2 rounded-xl shadow-lg border-2 border-surface active:scale-90 transition-transform">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                        </div>

                        <!-- User Info -->
                        <div class="flex-1 text-center md:text-left">
                            <div class="flex flex-col md:flex-row md:items-center gap-3 mb-3">
                                <h2 class="font-headline-lg font-serif text-headline-lg text-[#051F20]">{{ $user->name }}</h2>

                            </div>
                            <p class="text-[#235347] text-body-md flex items-center justify-center md:justify-start gap-2 mb-6">
                                <span class="material-symbols-outlined text-[#235347] text-sm">badge</span>
                                NIM: {{ $mahasiswa->nim ?? '-' }}
                            </p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Program Studi -->
                                <div class="bg-[#E8F3E9]/55 border border-[#8EB69B]/40 p-4 rounded-lg">
                                    <label for="program_studi" class="block font-label-md text-[11px] text-[#235347] mb-2">Program Studi</label>
                                    <input id="program_studi" type="text" name="program_studi"
                                        value="{{ old('program_studi', $mahasiswa->program_studi) }}"
                                        class="w-full bg-transparent border-0 border-b border-outline-variant focus:border-[#051F20] focus:ring-0 font-headline-sm font-serif text-[15px] text-[#051F20] p-0 pb-1"
                                        required>
                                    @error('program_studi')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                <!-- Domisili -->
                                <div class="bg-[#E8F3E9]/55 border border-[#8EB69B]/40 p-4 rounded-lg">
                                    <label for="domisili" class="block font-label-md text-[11px] text-[#235347] mb-2">
                                        <span class="material-symbols-outlined text-[#235347] text-sm align-middle">location_on</span> Domisili
                                    </label>
                                    <input id="domisili" type="text" name="domisili"
                                        value="{{ old('domisili', $mahasiswa->domisili) }}"
                                        class="w-full bg-transparent border-0 border-b border-outline-variant focus:border-[#051F20] focus:ring-0 font-headline-sm font-serif text-[15px] text-[#051F20] p-0 pb-1"
                                        required>
                                    @error('domisili')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Skills Section -->
                <section class="bg-white border border-[#8EB69B]/20 rounded-xl p-8 card-shadow border border-outline-variant/30">
                    <h3 class="font-headline-md font-serif text-headline-md text-[#051F20] mb-6">Keahlian & Minat</h3>

                    <!-- Keahlian -->
                    <div class="mb-8">
                        <p class="font-label-md text-[11px] text-[#235347] uppercase tracking-wider mb-4">Keahlian (Pilih minimal 1)</p>
                        @php $skills = ['Coding', 'Desain', 'Riset', 'Bisnis', 'Presentasi', 'UI/UX', 'Data Science', 'Marketing']; @endphp
                        <div class="flex flex-wrap gap-3">
                            @foreach($skills as $skill)
                            <label class="relative cursor-pointer">
                                <input type="checkbox" name="keahlian[]" value="{{ $skill }}" class="sr-only peer"
                                    {{ in_array($skill, (array)$mahasiswa->keahlian) ? 'checked' : '' }}>
                                <span class="peer-checked:bg-[#051F20] peer-checked:text-on-primary bg-[#E8F3E9] text-[#235347] font-label-md px-4 py-2 rounded-full transition-all select-none flex items-center gap-1.5 border border-transparent peer-checked:border-[#051F20]/30">
                                    {{ $skill }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('keahlian')<p class="text-error text-xs mt-2">{{ $message }}</p>@enderror
                    </div>

                    <!-- Minat Lomba -->
                    <div>
                        <p class="font-label-md text-[11px] text-[#235347] uppercase tracking-wider mb-4">Minat Kategori Lomba</p>
                        @php $categories = ['Sains', 'Teknologi', 'Bisnis', 'Seni', 'Olahraga']; @endphp
                        <div class="flex flex-wrap gap-3">
                            @foreach($categories as $cat)
                            <label class="relative cursor-pointer">
                                <input type="checkbox" name="minat_lomba[]" value="{{ $cat }}" class="sr-only peer"
                                    {{ in_array($cat, (array)$mahasiswa->minat_lomba) ? 'checked' : '' }}>
                                <span class="peer-checked:bg-primary peer-checked:text-on-primary bg-[#E8F3E9] text-[#235347] font-label-md px-4 py-2 rounded-full transition-all select-none border border-transparent peer-checked:border-primary/30">
                                    {{ $cat }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('minat_lomba')<p class="text-error text-xs mt-2">{{ $message }}</p>@enderror
                    </div>
                </section>

                <!-- Extra Info Section -->
                <section class="bg-white border border-[#8EB69B]/20 rounded-xl p-8 card-shadow border border-outline-variant/30">
                    <h3 class="font-headline-md font-serif text-headline-md text-[#051F20] mb-6">Info Tambahan</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                        <!-- Link Portofolio -->
                        <div>
                            <label for="link_portofolio" class="block font-label-md text-[11px] text-[#235347] uppercase tracking-wider mb-2">Link Portofolio</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#235347] text-sm">link</span>
                                <input id="link_portofolio" type="url" name="link_portofolio"
                                    value="{{ old('link_portofolio', $mahasiswa->link_portofolio) }}"
                                    placeholder="https://github.com/..."
                                    class="w-full pl-10 pr-4 py-3 bg-[#E8F3E9]/55 border border-[#8EB69B]/40 rounded-xl focus:border-[#051F20] focus:ring-0 text-body-md">
                            </div>
                            @error('link_portofolio')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Level Privasi -->
                        <div>
                            <p class="block font-label-md text-[11px] text-[#235347] uppercase tracking-wider mb-2">Visibilitas Profil</p>
                            <div class="flex gap-2">
                                @foreach(['publik', 'privat', 'tim saja'] as $level)
                                <label class="relative cursor-pointer flex-1">
                                    <input type="radio" name="level_privasi" value="{{ $level }}" class="sr-only peer"
                                        {{ $mahasiswa->level_privasi == $level ? 'checked' : '' }}>
                                    <span class="peer-checked:bg-[#051F20] peer-checked:text-on-primary bg-[#E8F3E9] text-[#235347] font-label-md w-full py-3 rounded-xl transition-all select-none border border-outline-variant/30 peer-checked:border-[#051F20] capitalize block text-center">
                                        {{ $level }}
                                    </span>
                                </label>
                                @endforeach
                            </div>
                            @error('level_privasi')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column (4 cols) -->
            <div class="lg:col-span-4 space-y-6">

                <!-- Profile Completeness -->
                @php
                    $filled = collect([$mahasiswa->program_studi, $mahasiswa->domisili, $mahasiswa->link_portofolio, $mahasiswa->foto_profil])->filter()->count();
                    $strength = intval(($filled / 4) * 100);
                    $hasSkills = !empty((array)$mahasiswa->keahlian);
                    if ($hasSkills) $strength = min(100, $strength + 10);
                @endphp
                <section class="bg-white border border-[#8EB69B]/20 rounded-xl p-6 card-shadow border border-outline-variant/30">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-headline-sm font-serif text-sm">Kelengkapan Profil</h3>
                        <span class="text-[#235347] font-bold font-headline-sm font-serif">{{ $strength }}%</span>
                    </div>
                    <div class="w-full bg-[#E8F3E9] h-3 rounded-full mb-4 overflow-hidden">
                        <div class="bg-gradient-to-r from-secondary to-primary h-full transition-all duration-1000" style="width: {{ $strength }}%"></div>
                    </div>
                    <p class="font-body-md text-xs text-[#235347] leading-relaxed">
                        @if($strength >= 90) Profil kamu hampir sempurna! Terus perbarui untuk meningkatkan peluang match.
                        @elseif($strength >= 60) Profil sudah cukup baik. Lengkapi sisa informasi untuk hasil terbaik.
                        @else Lengkapi profilmu agar sistem bisa merekomendasikan tim yang tepat untukmu.
                        @endif
                    </p>
                </section>

                <!-- Info Card -->
                <section class="bg-white border border-[#8EB69B]/20 rounded-xl p-6 card-shadow border border-outline-variant/30">
                    <h3 class="font-headline-sm font-serif text-sm mb-4">Info Akun</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 rounded-lg bg-[#E8F3E9]/55 border border-[#8EB69B]/40">
                            <span class="material-symbols-outlined text-[#235347] text-sm">email</span>
                            <div>
                                <p class="font-label-md text-[10px] text-[#235347]">Email</p>
                                <p class="text-body-md text-[#051F20]">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-lg bg-[#E8F3E9]/55 border border-[#8EB69B]/40">
                            <span class="material-symbols-outlined text-[#235347] text-sm">schedule</span>
                            <div>
                                <p class="font-label-md text-[10px] text-[#235347]">Bergabung</p>
                                <p class="text-body-md text-[#051F20]">{{ $user->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button type="submit"
                        class="w-full bg-[#051F20] text-on-primary py-4 rounded-xl font-bold font-headline-sm font-serif text-sm shadow-md hover:opacity-90 transition-all active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard') }}"
                        class="block w-full text-center bg-transparent text-[#235347] border-2 border-outline-variant py-4 rounded-xl font-bold font-headline-sm font-serif text-sm hover:bg-[#E8F3E9] transition-colors active:scale-[0.98]">
                        Batal
                    </a>
                </div>

                <!-- Pro Tip -->
                <div class="p-6 bg-[#051F20] rounded-xl text-white">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-[#8EB69B]" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
                        <div class="space-y-1">
                            <p class="font-headline-sm font-serif text-[13px] text-[#8EB69B]">Pro Tip</p>
                            <p class="text-xs leading-relaxed opacity-80">Tim mencari anggota dengan minimal 3 keahlian. Lengkapi profilmu untuk meningkatkan peluang ditemukan!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </form>
    </div>
</main>

</div>
</body>
</html>
