<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Buka Open Slot Tim | SiLomba</title>
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
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #001813; }
        ::-webkit-scrollbar-thumb { background: #005228; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00743a; }
        .card-glass {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.10);
        }
        .form-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(107,254,156,0.10);
            border-radius: 1.5rem;
        }
        .section-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 1rem;
            padding: 1.5rem;
        }
        .field-input {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: black;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .field-input:focus {
            border-color: rgba(107,254,156,0.5);
            box-shadow: 0 0 0 3px rgba(107,254,156,0.08);
        }
        .field-input::placeholder { color: rgba(0,0,0,0.35); }
        .field-input option { background: #062e27; color: white; }
        .field-label {
            display: block;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.55);
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
            font-family: 'JetBrains Mono', monospace;
            cursor: pointer;
            transition: all 0.18s ease;
            user-select: none;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.60);
        }
        .skill-badge.selected {
            background: rgba(107,254,156,0.15);
            border-color: rgba(107,254,156,0.45);
            color: #6bfe9c;
        }
        .skill-badge:hover:not(.selected) {
            background: rgba(255,255,255,0.10);
            color: rgba(255,255,255,0.85);
        }
        .slot-card-preview {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(107,254,156,0.12);
            border-radius: 1rem;
            transition: all 0.25s ease;
        }
        .preview-strip {
            background: linear-gradient(135deg, rgba(107,254,156,0.08) 0%, rgba(0,109,55,0.12) 100%);
            border: 1px solid rgba(107,254,156,0.15);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
        }
        [x-cloak] { display: none !important; }
        .error-msg { color: #f87171; font-size: 12px; margin-top: 0.35rem; font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-primary text-on-primary-fixed selection:bg-secondary-fixed selection:text-on-secondary-fixed font-body-md overflow-x-hidden">
<div class="flex min-h-screen"
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
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.lomba.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">emoji_events</span>
                <span class="font-label-md text-label-md">Direktori Lomba</span>
            </a>
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.tim-finder.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">group</span>
                <span class="font-label-md text-label-md">Tim Finder</span>
            </a>
            <!-- Tim Saya — active -->
            <a class="flex items-center gap-stack-md px-4 py-3 rounded-lg transition-all {{ request()->routeIs('mahasiswa.my-teams.*') || request()->routeIs('mahasiswa.team.*') ? 'bg-secondary text-on-secondary scale-98' : 'text-surface-variant hover:bg-secondary/20' }}" href="{{ route('mahasiswa.my-teams.index') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') || request()->routeIs('mahasiswa.team.*') ? "font-variation-settings: 'FILL' 1;" : '' }}">groups</span>
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
    <div class="flex-1 flex flex-col min-w-0 bg-[#0e3b31]">
        <main class="flex-1 p-8 overflow-y-auto">

            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-1">
                    <a href="{{ route('mahasiswa.my-teams.index') }}" class="text-white/40 hover:text-secondary-fixed transition-colors flex items-center gap-1 text-[13px] font-label-md">
                        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                        Tim Saya
                    </a>
                    <span class="text-white/20">/</span>
                    <span class="text-secondary-fixed text-[13px] font-label-md">Buka Open Slot</span>
                </div>
                <h2 class="font-headline-lg text-headline-lg text-white mb-2">Buka Open Slot Tim</h2>
                <p class="text-white/70 text-body-lg max-w-2xl">
                    Cari anggota yang tepat untuk melengkapi tim lombamu.
                </p>
            </div>

            <!-- Flash / Validation errors -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-error/15 border border-error/30 text-red-300 rounded-2xl flex items-start gap-3">
                    <span class="material-symbols-outlined text-[20px] flex-shrink-0 mt-0.5" style="font-variation-settings:'FILL' 1;">error</span>
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

                    <!-- ── LEFT COLUMN: Form ── -->
                    <div class="xl:col-span-2 space-y-5">

                        <!-- Section 1: Informasi Tim -->
                        <div class="form-card p-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-9 h-9 rounded-xl bg-secondary-fixed/15 border border-secondary-fixed/20 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary-fixed text-[18px]" style="font-variation-settings:'FILL' 1;">groups</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-sm text-white text-[16px]">Informasi Tim</h3>
                                    <p class="text-white/45 text-[12px] font-label-md">Pilih lomba dan atur data dasar tim</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <!-- Pilih Lomba -->
                                <div>
                                    <label class="field-label" for="id_lomba">Pilih Lomba <span class="text-secondary-fixed">*</span></label>
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
                                        <label class="field-label" for="nama_tim">Nama Tim <span class="text-secondary-fixed">*</span></label>
                                        <input id="nama_tim" name="nama_tim" type="text"
                                               class="field-input" required
                                               placeholder="Misal: Tim Garuda IT"
                                               value="{{ old('nama_tim') }}"
                                               x-model="namaTim"/>
                                        @error('nama_tim') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>

                                    <!-- Maksimal Anggota -->
                                    <div>
                                        <label class="field-label" for="maks_anggota">Maksimal Anggota Tim <span class="text-secondary-fixed">*</span></label>
                                        <input id="maks_anggota" name="maks_anggota" type="number"
                                               class="field-input" required min="2" max="10"
                                               value="{{ old('maks_anggota', 3) }}"
                                               x-model.number="maksAnggota"/>
                                        <p class="text-white/30 text-[11px] mt-1 font-label-md">Termasuk kamu sebagai ketua tim</p>
                                        @error('maks_anggota') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Detail Open Slot -->
                        <div class="form-card p-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-9 h-9 rounded-xl bg-amber-500/15 border border-amber-400/20 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-amber-400 text-[18px]" style="font-variation-settings:'FILL' 1;">inbox</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-sm text-white text-[16px]">Detail Open Slot</h3>
                                    <p class="text-white/45 text-[12px] font-label-md">Tentukan posisi dan persyaratan anggota</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Posisi -->
                                    <div>
                                        <label class="field-label" for="posisi">Posisi yang Dibutuhkan <span class="text-secondary-fixed">*</span></label>
                                        <input id="posisi" name="posisi" type="text"
                                               class="field-input" required
                                               placeholder="Misal: UI/UX Designer"
                                               value="{{ old('posisi') }}"
                                               x-model="posisi"/>
                                        @error('posisi') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>

                                    <!-- Jumlah Slot -->
                                    <div>
                                        <label class="field-label" for="jumlah_slot">Jumlah Slot <span class="text-secondary-fixed">*</span></label>
                                        <input id="jumlah_slot" name="jumlah_slot" type="number"
                                               class="field-input" required min="1"
                                               value="{{ old('jumlah_slot', 1) }}"
                                               x-model.number="jumlahSlot"/>
                                        @error('jumlah_slot') <p class="error-msg">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <!-- Keahlian Minimum (multi-select badge) -->
                                <div>
                                    <label class="field-label">Keahlian Minimum <span class="text-secondary-fixed">*</span></label>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <template x-for="skill in allSkills" :key="skill">
                                            <span class="skill-badge" :class="isSelected(skill) ? 'selected' : ''"
                                                  @click="toggleSkill(skill)">
                                                <template x-if="isSelected(skill)">
                                                    <span class="material-symbols-outlined text-[13px]" style="font-variation-settings:'FILL' 1;">check</span>
                                                </template>
                                                <span x-text="skill"></span>
                                            </span>
                                        </template>
                                    </div>
                                    <!-- Hidden inputs for selected skills -->
                                    <template x-for="skill in selectedSkills" :key="skill">
                                        <input type="hidden" name="keahlian_dibutuhkan[]" :value="skill">
                                    </template>
                                    <p class="text-white/30 text-[11px] font-label-md" x-text="selectedSkills.length > 0 ? selectedSkills.length + ' keahlian dipilih' : 'Klik badge untuk memilih keahlian'"></p>
                                    @error('keahlian_dibutuhkan') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>

                                <!-- Deskripsi Peran -->
                                <div>
                                    <label class="field-label" for="deskripsi_slot">Deskripsi Peran & Tanggung Jawab <span class="text-secondary-fixed">*</span></label>
                                    <textarea id="deskripsi_slot" name="deskripsi_slot" rows="4"
                                              class="field-input resize-none"
                                              placeholder="Jelaskan apa yang akan dilakukan anggota di posisi ini, tanggung jawab utama, dan ekspektasi kontribusi..."
                                              required
                                              x-model="deskripsi">{{ old('deskripsi_slot') }}</textarea>
                                    @error('deskripsi_slot') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>

                                <!-- Batas Waktu -->
                                <div>
                                    <label class="field-label" for="batas_waktu">Batas Waktu Open Slot <span class="text-secondary-fixed">*</span></label>
                                    <input id="batas_waktu" name="batas_waktu" type="date"
                                           class="field-input" required
                                           value="{{ old('batas_waktu') }}"
                                           x-model="batasWaktu"/>
                                    <p class="text-white/30 text-[11px] mt-1 font-label-md">Tidak boleh melebihi deadline lomba yang dipilih.</p>
                                    @error('batas_waktu') <p class="error-msg">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="form-card p-6">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <!-- Simpan Draft -->
                                <button type="button"
                                        @click="document.getElementById('status_publikasi').value='draft'; document.getElementById('open-slot-form').submit();"
                                        class="flex-1 flex items-center justify-center gap-2 px-6 py-3.5 bg-white/8 border border-white/15 text-white/80 font-bold text-[13px] rounded-xl hover:bg-white/12 hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-[18px]">draft</span>
                                    Simpan Draft
                                </button>
                                <!-- Publikasikan -->
                                <button type="submit"
                                        class="flex-1 flex items-center justify-center gap-2 px-6 py-3.5 bg-secondary-fixed text-on-secondary-fixed font-bold text-[13px] rounded-xl hover:bg-secondary-fixed-dim transition-all hover:-translate-y-0.5 shadow-lg shadow-secondary/20">
                                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings:'FILL' 1;">rocket_launch</span>
                                    Publikasikan Open Slot
                                </button>
                            </div>
                            <p class="text-center text-white/30 text-[11px] font-label-md mt-3">
                                Draft tidak ditampilkan ke publik. Publikasikan kapan pun kamu siap.
                            </p>
                        </div>

                    </div>

                    <!-- ── RIGHT COLUMN: Preview ── -->
                    <div class="xl:col-span-1">
                        <div class="sticky top-8 space-y-4">

                            <!-- Preview Header -->
                            <div class="flex items-center gap-2 px-1">
                                <span class="material-symbols-outlined text-secondary-fixed text-[18px]" style="font-variation-settings:'FILL' 1;">preview</span>
                                <h3 class="font-label-md text-label-md text-secondary-fixed uppercase tracking-wider">Preview Open Slot</h3>
                            </div>

                            <!-- Info strip -->
                            <div class="preview-strip flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary-fixed text-[16px]" style="font-variation-settings:'FILL' 1;">info</span>
                                <p class="text-[12px] text-white/60">Tampilan ini sama dengan card di Tim Finder</p>
                            </div>

                            <!-- Preview Card -->
                            <div class="slot-card-preview p-5 flex flex-col">
                                <!-- Header -->
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="w-11 h-11 rounded-xl bg-secondary/30 border border-secondary-fixed/15 flex items-center justify-center flex-shrink-0">
                                        <span class="text-lg font-bold text-secondary-fixed"
                                              x-text="namaTim ? namaTim.charAt(0).toUpperCase() : 'T'"></span>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="font-bold text-white text-[15px] truncate"
                                            x-text="namaTim || 'Nama Tim'"></h4>
                                        <p class="text-[11px] text-white/50 truncate"
                                           x-text="namaLomba || 'Lomba yang dipilih'"></p>
                                    </div>
                                </div>

                                <!-- Posisi + Slot badge -->
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="px-2.5 py-1 bg-secondary/30 border border-secondary-fixed/20 text-secondary-fixed text-[11px] font-bold rounded-lg flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary-fixed animate-pulse inline-block"></span>
                                        <span x-text="jumlahSlot + ' Slot Tersisa'">1 Slot Tersisa</span>
                                    </span>
                                </div>
                                <h5 class="font-bold text-white text-[15px] mb-1"
                                    x-text="posisi || 'Posisi yang dibutuhkan'"></h5>
                                <p class="text-[13px] text-white/60 line-clamp-2 mb-4 flex-grow"
                                   x-text="deskripsi || 'Deskripsi peran dan tanggung jawab akan muncul di sini...'"></p>

                                <!-- Skills -->
                                <div class="flex flex-wrap gap-1.5 mb-4" x-show="selectedSkills.length > 0">
                                    <template x-for="skill in selectedSkills" :key="skill">
                                        <span class="px-2 py-0.5 bg-white/5 border border-white/10 text-white/70 text-[10px] font-bold rounded-lg"
                                              x-text="skill"></span>
                                    </template>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-4" x-show="selectedSkills.length === 0">
                                    <span class="px-2 py-0.5 bg-white/5 border border-white/10 text-white/30 text-[10px] font-bold rounded-lg italic">Keahlian akan muncul di sini</span>
                                </div>

                                <!-- Footer -->
                                <div class="mt-auto pt-4 border-t border-white/10 flex items-center justify-between">
                                    <span class="text-[11px] text-white/50 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        <span x-text="formattedDate() || 'Pilih tanggal'"></span>
                                    </span>
                                    <div class="flex gap-2">
                                        <span class="px-3 py-1.5 border border-secondary-fixed/40 text-secondary-fixed text-[11px] font-bold rounded-xl opacity-50">Detail</span>
                                        <span class="px-3 py-1.5 bg-secondary-fixed text-on-secondary-fixed text-[11px] font-bold rounded-xl opacity-50">Lamar</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Info card: capacity -->
                            <div class="card-glass rounded-2xl p-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-secondary/20 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-secondary-fixed text-[18px]" style="font-variation-settings:'FILL' 1;">group</span>
                                </div>
                                <div>
                                    <p class="text-[11px] text-white/40 font-label-md uppercase tracking-wider">Kapasitas Tim</p>
                                    <p class="text-white font-bold text-[14px]">
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
