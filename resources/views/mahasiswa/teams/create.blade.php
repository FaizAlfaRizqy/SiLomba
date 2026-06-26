<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Buka Open Slot Tim | SiLomba</title>
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
        .form-card {
            background: #ffffff;
            border: 1px solid rgba(142, 182, 155, 0.2);
            box-shadow: 0 4px 20px rgba(5, 31, 32, 0.03);
            border-radius: 2rem;
            padding: 2rem;
        }
        .field-input {
            width: 100%;
            background: #F4F9F6;
            border: 1px solid rgba(142, 182, 155, 0.2);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: #051F20;
            font-size: 14px;
            outline: none;
            transition: all 0.2s;
        }
        .field-input:focus {
            border-color: #235347;
            box-shadow: 0 0 0 3px rgba(35, 83, 71, 0.08);
        }
        .field-input::placeholder { color: rgba(5, 31, 32, 0.35); }
        .field-input option { background: #ffffff; color: #051F20; }
        .field-label {
            display: block;
            font-weight: 700;
            font-size: 11px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #235347;
            margin-bottom: 0.5rem;
        }
        .skill-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.18s ease;
            user-select: none;
            border: 1px solid rgba(142, 182, 155, 0.2);
            background: #F4F9F6;
            color: #235347;
        }
        .skill-badge.selected {
            background: #051F20;
            border-color: transparent;
            color: #ffffff;
        }
        .skill-badge:hover:not(.selected) {
            background: #E8F3E9;
            color: #235347;
        }
        .slot-card-preview {
            background: #ffffff;
            border: 1px solid rgba(142, 182, 155, 0.3);
            box-shadow: 0 4px 20px rgba(5, 31, 32, 0.03);
            border-radius: 1.5rem;
            transition: all 0.25s ease;
        }
        .preview-strip {
            background: #E8F3E9;
            border: 1px solid rgba(142, 182, 155, 0.2);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
        }
        [x-cloak] { display: none !important; }
        .error-msg { color: #dc2626; font-size: 12px; margin-top: 0.35rem; }
    </style>
</head>
<body class="bg-[#E8F3E9] text-[#051F20] font-body-md overflow-x-hidden">
<div class="flex flex-col md:flex-row min-h-screen"
     x-data="{
        namaLomba: '',
        namaTim: '',
        maksAnggota: 3,
        posisi: '',
        jumlahSlot: 1,
        deskripsi: '',
        batasWaktu: '',
        selectedSkills: [],
        allSkills: ['Coding','Desain','Riset','Bisnis','Presentasi','UI/UX','Data Science','Marketing','Mobile Dev','Machine Learning','Backend','Frontend'],
        toggleSkill(skill) {
            const idx = this.selectedSkills.indexOf(skill);
            if (idx === -1) this.selectedSkills.push(skill);
            else this.selectedSkills.splice(idx, 1);
        },
        isSelected(skill) { return this.selectedSkills.includes(skill); },
        formattedDate() {
            if (!this.batasWaktu) return '';
            const d = new Date(this.batasWaktu);
            return d.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        }
     }">

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
                <p class="text-on-primary-container text-[11px] font-label-md tracking-wider opacity-70">TIM SAYA</p>
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
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') || request()->routeIs('mahasiswa.team.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-[#8EB69B]/70 hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') || request()->routeIs('mahasiswa.team.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
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

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 bg-[#E8F3E9]">
        <!-- Scrollable Content -->
        <main class="flex-1 py-10 px-6 md:px-12 max-w-[1600px] mx-auto w-full">

            <!-- Back navigation / Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('mahasiswa.my-teams.index') }}" class="text-[#235347]/70 hover:text-[#051F20] transition-colors flex items-center gap-1 text-[13px] font-bold">
                        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                        Tim Saya
                    </a>
                    <span class="text-[#235347]/30">/</span>
                    <span class="text-[#235347] text-[13px] font-bold">Buka Open Slot</span>
                </div>
                <h2 class="font-bold text-4xl text-[#051F20] font-serif leading-tight">
                    Buka Open Slot Tim
                </h2>
                <p class="text-[#235347]/70 mt-2">Cari anggota yang tepat untuk melengkapi tim lombamu.</p>
            </div>

            <!-- Flash / Validation errors -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl flex items-start gap-3 shadow-sm">
                    <span class="material-symbols-outlined text-[20px] flex-shrink-0 mt-0.5 text-red-600">error</span>
                    <div>
                        <p class="font-bold text-sm mb-1">Terdapat kesalahan pada formulir:</p>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach($errors->all() as $err)
                                <li class="text-[13px]">{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('mahasiswa.team.store') }}" id="open-slot-form">
                @csrf
                <input type="hidden" name="status_publikasi" id="status_publikasi" value="publikasi">

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                    <!-- LEFT COLUMN: Form -->
                    <div class="xl:col-span-2 space-y-5 text-left">

                        <!-- Section 1: Informasi Tim -->
                        <div class="form-card">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-9 h-9 rounded-xl bg-[#E8F3E9] border border-[#8EB69B]/30 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[#235347] text-[18px]">groups</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-[#051F20] text-[16px] font-serif">Informasi Tim</h3>
                                    <p class="text-[#235347]/60 text-[12px]">Pilih lomba dan atur data dasar tim</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <!-- Pilih Lomba -->
                                <div>
                                    <label class="field-label" for="id_lomba">Pilih Lomba <span class="text-red-500">*</span></label>
                                    <select id="id_lomba" name="id_lomba" class="field-input" required
                                            @change="namaLomba = $event.target.options[$event.target.selectedIndex].text.split('(')[0].trim()">
                                        <option value="">— Pilih Lomba Aktif —</option>
                                        @foreach($lombas as $l)
                                            <option value="{{ $l->id }}" {{ (old('id_lomba', $selectedLombaId) == $l->id) ? 'selected' : '' }}>
                                                {{ $l->nama }} (Deadline: {{ $l->deadline->format('d M Y') }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_lomba') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Nama Tim -->
                                    <div>
                                        <label class="field-label" for="nama_tim">Nama Tim <span class="text-red-500">*</span></label>
                                        <input id="nama_tim" name="nama_tim" type="text"
                                               class="field-input" required
                                               placeholder="Misal: Tim Garuda IT"
                                               value="{{ old('nama_tim') }}"
                                               x-model="namaTim"/>
                                        @error('nama_tim') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>

                                    <!-- Maksimal Anggota -->
                                    <div>
                                        <label class="field-label" for="maks_anggota">Maksimal Anggota Tim <span class="text-red-500">*</span></label>
                                        <input id="maks_anggota" name="maks_anggota" type="number"
                                               class="field-input" required min="2" max="10"
                                               value="{{ old('maks_anggota', 3) }}"
                                               x-model.number="maksAnggota"/>
                                        <p class="text-[#235347]/50 text-[11px] mt-1">Termasuk kamu sebagai ketua tim</p>
                                        @error('maks_anggota') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Detail Open Slot -->
                        <div class="form-card">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-9 h-9 rounded-xl bg-amber-500/10 border border-amber-400/25 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-amber-600 text-[18px]">inbox</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-[#051F20] text-[16px] font-serif">Detail Open Slot</h3>
                                    <p class="text-[#235347]/60 text-[12px]">Tentukan posisi dan persyaratan anggota</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Posisi -->
                                    <div>
                                        <label class="field-label" for="posisi">Posisi yang Dibutuhkan <span class="text-red-500">*</span></label>
                                        <input id="posisi" name="posisi" type="text"
                                               class="field-input" required
                                               placeholder="Misal: UI/UX Designer"
                                               value="{{ old('posisi') }}"
                                               x-model="posisi"/>
                                        @error('posisi') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>

                                    <!-- Jumlah Slot -->
                                    <div>
                                        <label class="field-label" for="jumlah_slot">Jumlah Slot <span class="text-red-500">*</span></label>
                                        <input id="jumlah_slot" name="jumlah_slot" type="number"
                                               class="field-input" required min="1"
                                               value="{{ old('jumlah_slot', 1) }}"
                                               x-model.number="jumlahSlot"/>
                                        @error('jumlah_slot') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <!-- Keahlian Minimum -->
                                <div>
                                    <label class="field-label">Keahlian Minimum <span class="text-red-500">*</span></label>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <template x-for="skill in allSkills" :key="skill">
                                            <span class="skill-badge" :class="isSelected(skill) ? 'selected' : ''"
                                                  @click="toggleSkill(skill)">
                                                <template x-if="isSelected(skill)">
                                                    <span class="material-symbols-outlined text-[13px]">check</span>
                                                </template>
                                                <span x-text="skill"></span>
                                            </span>
                                        </template>
                                    </div>
                                    <template x-for="skill in selectedSkills" :key="skill">
                                        <input type="hidden" name="keahlian_dibutuhkan[]" :value="skill">
                                    </template>
                                    <p class="text-[#235347]/50 text-[11px]" x-text="selectedSkills.length > 0 ? selectedSkills.length + ' keahlian dipilih' : 'Klik badge untuk memilih keahlian'"></p>
                                    @error('keahlian_dibutuhkan') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>

                                <!-- Deskripsi Peran -->
                                <div>
                                    <label class="field-label" for="deskripsi_slot">Deskripsi Peran & Tanggung Jawab <span class="text-red-500">*</span></label>
                                    <textarea id="deskripsi_slot" name="deskripsi_slot" rows="4"
                                              class="field-input resize-none"
                                              placeholder="Jelaskan apa yang akan dilakukan anggota di posisi ini, tanggung jawab utama, dan ekspektasi kontribusi..."
                                              required
                                              x-model="deskripsi">{{ old('deskripsi_slot') }}</textarea>
                                    @error('deskripsi_slot') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>

                                <!-- Batas Waktu -->
                                <div>
                                    <label class="field-label" for="batas_waktu">Batas Waktu Open Slot <span class="text-red-500">*</span></label>
                                    <input id="batas_waktu" name="batas_waktu" type="date"
                                           class="field-input" required
                                           value="{{ old('batas_waktu') }}"
                                           x-model="batasWaktu"/>
                                    <p class="text-[#235347]/50 text-[11px] mt-1">Tidak boleh melebihi deadline lomba yang dipilih.</p>
                                    @error('batas_waktu') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="form-card">
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-[#051F20] text-white font-bold text-[13px] rounded-xl hover:bg-opacity-95 transition-all hover:-translate-y-0.5 shadow-sm">
                                <span class="material-symbols-outlined text-[18px]">rocket_launch</span>
                                Publikasikan Open Slot
                            </button>
                        </div>

                    </div>

                    <!-- RIGHT COLUMN: Preview -->
                    <div class="xl:col-span-1 text-left">
                        <div class="sticky top-8 space-y-4">

                            <!-- Preview Header -->
                            <div class="flex items-center gap-2 px-1">
                                <span class="material-symbols-outlined text-[#235347] text-[18px]">preview</span>
                                <h3 class="font-bold text-xs text-[#235347] uppercase tracking-wider">Preview Open Slot</h3>
                            </div>

                            <!-- Info strip -->
                            <div class="preview-strip flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#235347] text-[16px]">info</span>
                                <p class="text-[12px] text-[#235347]/80">Tampilan ini sama dengan card di Tim Finder</p>
                            </div>

                            <!-- Preview Card -->
                            <div class="slot-card-preview p-5 flex flex-col">
                                <!-- Header -->
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="w-11 h-11 rounded-xl bg-[#E8F3E9] border border-[#8EB69B]/30 flex items-center justify-center flex-shrink-0">
                                        <span class="text-lg font-bold text-[#235347]"
                                              x-text="namaTim ? namaTim.charAt(0).toUpperCase() : 'T'"></span>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="font-bold text-[#051F20] text-[15px] truncate font-serif"
                                            x-text="namaTim || 'Nama Tim'"></h4>
                                        <p class="text-[11px] text-[#235347]/70 truncate"
                                            x-text="namaLomba || 'Lomba yang dipilih'"></p>
                                    </div>
                                </div>

                                <!-- Posisi + Slot badge -->
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="px-2.5 py-1 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347] text-[11px] font-bold rounded-lg flex items-center gap-1.5 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#235347] animate-pulse inline-block"></span>
                                        <span x-text="jumlahSlot + ' Slot Tersisa'">1 Slot Tersisa</span>
                                    </span>
                                </div>
                                <h5 class="font-bold text-[#051F20] text-[15px] mb-1 font-serif"
                                    x-text="posisi || 'Posisi yang dibutuhkan'"></h5>
                                <p class="text-[13px] text-[#235347]/80 line-clamp-2 mb-4 flex-grow"
                                   x-text="deskripsi || 'Deskripsi peran dan tanggung jawab akan muncul di sini...'"></p>

                                <!-- Skills -->
                                <div class="flex flex-wrap gap-1.5 mb-4" x-show="selectedSkills.length > 0">
                                    <template x-for="skill in selectedSkills" :key="skill">
                                        <span class="px-2 py-0.5 bg-[#E8F3E9] border border-[#8EB69B]/20 text-[#235347] text-[10px] font-bold rounded-lg"
                                              x-text="skill"></span>
                                    </template>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-4" x-show="selectedSkills.length === 0">
                                    <span class="px-2 py-0.5 bg-gray-50 border border-gray-200 text-gray-400 text-[10px] font-bold rounded-lg italic">Keahlian akan muncul di sini</span>
                                </div>

                                <!-- Footer -->
                                <div class="mt-auto pt-4 border-t border-[#8EB69B]/20 flex items-center justify-between">
                                    <span class="text-[11px] text-[#235347]/70 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        <span x-text="formattedDate() || 'Pilih tanggal'"></span>
                                    </span>
                                    <div class="flex gap-2">
                                        <span class="px-3 py-1.5 bg-[#051F20] text-white text-[11px] font-bold rounded-xl opacity-60">Lamar</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Info card: capacity -->
                            <div class="bg-white border border-[#8EB69B]/20 shadow-sm rounded-2xl p-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#E8F3E9] border border-[#8EB69B]/20 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-[#235347] text-[18px]">group</span>
                                </div>
                                <div>
                                    <p class="text-[11px] text-[#235347]/50 font-bold uppercase tracking-wider">Kapasitas Tim</p>
                                    <p class="text-[#051F20] font-bold text-[14px]">
                                        1 / <span x-text="maksAnggota">3</span> anggota (termasuk kamu)
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </main>
    </div>
</div>
</body>
</html>
