<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Profil | SiLomba</title>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script id="tailwind-config">
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "on-surface-variant": "#414846", "on-primary": "#ffffff", "on-error": "#ffffff",
                "surface-bright": "#f7f9fb", "primary": "#001813", "on-background": "#191c1e",
                "on-secondary": "#ffffff", "surface": "#f7f9fb", "surface-container-high": "#e6e8ea",
                "outline": "#717976", "on-surface": "#191c1e", "surface-container-highest": "#e0e3e5",
                "surface-container-low": "#f2f4f6", "secondary-container": "#6bfe9c",
                "secondary-fixed": "#6bfe9c", "secondary": "#006d37", "tertiary-container": "#0c0091",
                "on-tertiary-container": "#7e81ff", "tertiary-fixed": "#e1e0ff", "tertiary-fixed-dim": "#c0c1ff",
                "error": "#ba1a1a", "surface-container-lowest": "#ffffff", "outline-variant": "#c1c8c5",
                "primary-container": "#062e27", "background": "#f7f9fb", "surface-container": "#eceef0",
                "primary-fixed": "#c3ebe0", "error-container": "#ffdad6", "on-primary-container": "#72978d",
                "on-secondary-container": "#00743a", "on-secondary-fixed": "#00210c",
                "secondary-fixed-dim": "#4ae183", "on-tertiary-fixed": "#07006c", "tertiary": "#040055"
            },
            fontFamily: {
                "headline-lg": ["Hanken Grotesk"], "headline-md": ["Hanken Grotesk"],
                "headline-sm": ["Hanken Grotesk"], "body-md": ["Inter"], "body-lg": ["Inter"],
                "label-md": ["JetBrains Mono"]
            },
            fontSize: {
                "headline-lg": ["32px", {"lineHeight":"40px","letterSpacing":"-0.02em","fontWeight":"700"}],
                "headline-md": ["24px", {"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],
                "headline-sm": ["20px", {"lineHeight":"28px","fontWeight":"600"}],
                "body-md": ["14px", {"lineHeight":"20px","fontWeight":"400"}],
                "body-lg": ["16px", {"lineHeight":"24px","fontWeight":"400"}],
                "label-md": ["12px", {"lineHeight":"16px","letterSpacing":"0.05em","fontWeight":"500"}]
            }
        }
    }
}
</script>
<style>
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
.card-shadow { box-shadow: 0px 4px 20px rgba(0,0,0,0.04); }
body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
[x-cloak] { display: none !important; }
</style>
</head>
<body class="bg-background text-on-surface">

<!-- Sidebar -->
<aside class="hidden md:flex h-screen w-64 fixed left-0 top-0 bg-primary-container flex-col py-6 z-50 border-r border-outline-variant/10">
    <div class="px-6 mb-10 flex items-center gap-3">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
        <div>
            <h1 class="font-headline-sm text-headline-sm font-bold text-secondary-fixed">SiLomba</h1>
            <p class="text-[11px] text-on-primary-container font-label-md tracking-wider opacity-70">PROFIL</p>
        </div>
    </div>
    <nav class="flex-1 space-y-1 px-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-label-md text-label-md">Dashboard</span>
        </a>
        <a href="{{ route('mahasiswa.lomba.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}">
            <span class="material-symbols-outlined">emoji_events</span>
            <span class="font-label-md text-label-md">Direktori Lomba</span>
        </a>
        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}">
            <span class="material-symbols-outlined">group_add</span>
            <span class="font-label-md text-label-md">Tim Finder</span>
        </a>
        <a href="{{ route('mahasiswa.my-teams.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}">
            <span class="material-symbols-outlined">folder_shared</span>
            <span class="font-label-md text-label-md">Tim Saya</span>
        </a>
        <a href="{{ route('mahasiswa.notifikasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}">
            <span class="material-symbols-outlined">notifications</span>
            <span class="font-label-md text-label-md">Notifikasi</span>
        </a>
        <a href="{{ route('mahasiswa.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors bg-secondary-container text-on-secondary-container font-bold">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
            <span class="font-label-md text-label-md">Profil</span>
        </a>
    </nav>
    <div class="px-4 mt-auto pt-6 border-t border-white/10 space-y-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-on-primary-container hover:bg-error/10 hover:text-error transition-colors rounded-xl">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-label-md text-label-md">Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main -->
<main class="md:ml-64 min-h-screen">
    <!-- Top Header -->
    <header class="sticky top-0 z-40 flex justify-between items-center px-8 w-full h-16 bg-surface-bright/80 backdrop-blur-md border-b border-outline-variant">
        <h2 class="font-headline-sm text-headline-sm font-bold text-primary">Edit Profil</h2>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="font-label-md text-[14px] font-bold text-primary">{{ $user->name }}</p>
                <p class="text-[10px] text-outline uppercase tracking-wider">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
            </div>
            <img class="w-10 h-10 rounded-full border-2 border-secondary-container object-cover"
                 src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar"/>
        </div>
    </header>

    <!-- Page Content -->
    <div class="px-8 py-8 max-w-7xl mx-auto">

        @if(session('status'))
        <div class="mb-6 p-4 bg-secondary-container/30 border border-secondary/20 rounded-xl flex items-center gap-3 text-secondary font-bold">
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
                <section class="bg-surface-container-lowest rounded-xl p-8 card-shadow border border-outline-variant/30 overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-secondary to-primary"></div>
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mt-2">

                        <!-- Photo Upload -->
                        <div class="relative" x-data="{ photoPreview: null }">
                            <div class="w-32 h-32 rounded-3xl overflow-hidden border-4 border-surface shadow-lg bg-surface-container">
                                <template x-if="!photoPreview">
                                    @if($mahasiswa->foto_profil)
                                        <img src="{{ asset('storage/' . $mahasiswa->foto_profil) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-surface-container-high">
                                            <span class="material-symbols-outlined text-5xl text-on-surface-variant">person</span>
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
                                class="absolute -bottom-2 -right-2 bg-secondary text-on-primary p-2 rounded-xl shadow-lg border-2 border-surface active:scale-90 transition-transform">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                        </div>

                        <!-- User Info -->
                        <div class="flex-1 text-center md:text-left">
                            <div class="flex flex-col md:flex-row md:items-center gap-3 mb-3">
                                <h2 class="font-headline-lg text-headline-lg text-primary">{{ $user->name }}</h2>
                                <span class="px-3 py-1 bg-secondary-container text-on-secondary-container font-label-md text-[11px] rounded-full flex items-center justify-center w-max mx-auto md:mx-0">
                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary mr-2 animate-pulse"></span>
                                    Open for Collaboration
                                </span>
                            </div>
                            <p class="text-on-surface-variant text-body-md flex items-center justify-center md:justify-start gap-2 mb-6">
                                <span class="material-symbols-outlined text-secondary text-sm">badge</span>
                                NIM: {{ $mahasiswa->nim ?? '-' }}
                            </p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Program Studi -->
                                <div class="bg-surface-container-low p-4 rounded-lg">
                                    <label for="program_studi" class="block font-label-md text-[11px] text-on-surface-variant mb-2">Program Studi</label>
                                    <input id="program_studi" type="text" name="program_studi"
                                        value="{{ old('program_studi', $mahasiswa->program_studi) }}"
                                        class="w-full bg-transparent border-0 border-b border-outline-variant focus:border-secondary focus:ring-0 font-headline-sm text-[15px] text-primary p-0 pb-1"
                                        required>
                                    @error('program_studi')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                <!-- Domisili -->
                                <div class="bg-surface-container-low p-4 rounded-lg">
                                    <label for="domisili" class="block font-label-md text-[11px] text-on-surface-variant mb-2">
                                        <span class="material-symbols-outlined text-secondary text-sm align-middle">location_on</span> Domisili
                                    </label>
                                    <input id="domisili" type="text" name="domisili"
                                        value="{{ old('domisili', $mahasiswa->domisili) }}"
                                        class="w-full bg-transparent border-0 border-b border-outline-variant focus:border-secondary focus:ring-0 font-headline-sm text-[15px] text-primary p-0 pb-1"
                                        required>
                                    @error('domisili')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Skills Section -->
                <section class="bg-surface-container-lowest rounded-xl p-8 card-shadow border border-outline-variant/30">
                    <h3 class="font-headline-md text-headline-md text-primary mb-6">Keahlian & Minat</h3>

                    <!-- Keahlian -->
                    <div class="mb-8">
                        <p class="font-label-md text-[11px] text-on-surface-variant uppercase tracking-wider mb-4">Keahlian (Pilih minimal 1)</p>
                        @php $skills = ['Coding', 'Desain', 'Riset', 'Bisnis', 'Presentasi', 'UI/UX', 'Data Science', 'Marketing']; @endphp
                        <div class="flex flex-wrap gap-3">
                            @foreach($skills as $skill)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="keahlian[]" value="{{ $skill }}" class="sr-only peer"
                                    {{ in_array($skill, (array)$mahasiswa->keahlian) ? 'checked' : '' }}>
                                <span class="peer-checked:bg-secondary peer-checked:text-on-primary bg-surface-container text-on-surface-variant font-label-md px-4 py-2 rounded-full transition-all select-none flex items-center gap-1.5 border border-transparent peer-checked:border-secondary/30">
                                    {{ $skill }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('keahlian')<p class="text-error text-xs mt-2">{{ $message }}</p>@enderror
                    </div>

                    <!-- Minat Lomba -->
                    <div>
                        <p class="font-label-md text-[11px] text-on-surface-variant uppercase tracking-wider mb-4">Minat Kategori Lomba</p>
                        @php $categories = ['Sains', 'Teknologi', 'Bisnis', 'Seni', 'Olahraga', 'Kemanusiaan']; @endphp
                        <div class="flex flex-wrap gap-3">
                            @foreach($categories as $cat)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="minat_lomba[]" value="{{ $cat }}" class="sr-only peer"
                                    {{ in_array($cat, (array)$mahasiswa->minat_lomba) ? 'checked' : '' }}>
                                <span class="peer-checked:bg-primary peer-checked:text-on-primary bg-surface-container text-on-surface-variant font-label-md px-4 py-2 rounded-full transition-all select-none border border-transparent peer-checked:border-primary/30">
                                    {{ $cat }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('minat_lomba')<p class="text-error text-xs mt-2">{{ $message }}</p>@enderror
                    </div>
                </section>

                <!-- Extra Info Section -->
                <section class="bg-surface-container-lowest rounded-xl p-8 card-shadow border border-outline-variant/30">
                    <h3 class="font-headline-md text-headline-md text-primary mb-6">Info Tambahan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Link Portofolio -->
                        <div>
                            <label for="link_portofolio" class="block font-label-md text-[11px] text-on-surface-variant uppercase tracking-wider mb-2">Link Portofolio</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">link</span>
                                <input id="link_portofolio" type="url" name="link_portofolio"
                                    value="{{ old('link_portofolio', $mahasiswa->link_portofolio) }}"
                                    placeholder="https://github.com/..."
                                    class="w-full pl-10 pr-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-secondary focus:ring-0 text-body-md">
                            </div>
                            @error('link_portofolio')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Ketersediaan Waktu -->
                        <div>
                            <label for="ketersediaan_waktu" class="block font-label-md text-[11px] text-on-surface-variant uppercase tracking-wider mb-2">Ketersediaan Waktu</label>
                            <select id="ketersediaan_waktu" name="ketersediaan_waktu"
                                class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:border-secondary focus:ring-0 text-body-md">
                                <option value="Full-time" {{ $mahasiswa->ketersediaan_waktu == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ $mahasiswa->ketersediaan_waktu == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Weekends only" {{ $mahasiswa->ketersediaan_waktu == 'Weekends only' ? 'selected' : '' }}>Weekends only</option>
                            </select>
                            @error('ketersediaan_waktu')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <!-- Level Privasi -->
                    <div class="mt-6">
                        <p class="font-label-md text-[11px] text-on-surface-variant uppercase tracking-wider mb-3">Visibilitas Profil</p>
                        <div class="flex flex-wrap gap-4">
                            @foreach(['publik', 'privat', 'tim saja'] as $level)
                            <label class="cursor-pointer">
                                <input type="radio" name="level_privasi" value="{{ $level }}" class="sr-only peer"
                                    {{ $mahasiswa->level_privasi == $level ? 'checked' : '' }}>
                                <span class="peer-checked:bg-secondary peer-checked:text-on-primary bg-surface-container text-on-surface-variant font-label-md px-5 py-2.5 rounded-xl transition-all select-none border border-outline-variant/30 peer-checked:border-secondary capitalize">
                                    {{ $level }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('level_privasi')<p class="text-error text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </section>
            </div>

            <!-- Right Column (4 cols) -->
            <div class="lg:col-span-4 space-y-6">

                <!-- Profile Completeness -->
                @php
                    $filled = collect([$mahasiswa->program_studi, $mahasiswa->domisili, $mahasiswa->link_portofolio, $mahasiswa->ketersediaan_waktu, $mahasiswa->foto_profil])->filter()->count();
                    $strength = intval(($filled / 5) * 100);
                    $hasSkills = !empty((array)$mahasiswa->keahlian);
                    if ($hasSkills) $strength = min(100, $strength + 10);
                @endphp
                <section class="bg-surface-container-lowest rounded-xl p-6 card-shadow border border-outline-variant/30">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-headline-sm text-sm">Kelengkapan Profil</h3>
                        <span class="text-secondary font-bold font-headline-sm">{{ $strength }}%</span>
                    </div>
                    <div class="w-full bg-surface-container-high h-3 rounded-full mb-4 overflow-hidden">
                        <div class="bg-gradient-to-r from-secondary to-primary h-full transition-all duration-1000" style="width: {{ $strength }}%"></div>
                    </div>
                    <p class="font-body-md text-xs text-on-surface-variant leading-relaxed">
                        @if($strength >= 90) Profil kamu hampir sempurna! Terus perbarui untuk meningkatkan peluang match.
                        @elseif($strength >= 60) Profil sudah cukup baik. Lengkapi sisa informasi untuk hasil terbaik.
                        @else Lengkapi profilmu agar sistem bisa merekomendasikan tim yang tepat untukmu.
                        @endif
                    </p>
                </section>

                <!-- Info Card -->
                <section class="bg-surface-container-lowest rounded-xl p-6 card-shadow border border-outline-variant/30">
                    <h3 class="font-headline-sm text-sm mb-4">Info Akun</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-low">
                            <span class="material-symbols-outlined text-secondary text-sm">email</span>
                            <div>
                                <p class="font-label-md text-[10px] text-on-surface-variant">Email</p>
                                <p class="text-body-md text-primary">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 rounded-lg bg-surface-container-low">
                            <span class="material-symbols-outlined text-secondary text-sm">schedule</span>
                            <div>
                                <p class="font-label-md text-[10px] text-on-surface-variant">Bergabung</p>
                                <p class="text-body-md text-primary">{{ $user->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button type="submit"
                        class="w-full bg-secondary text-on-primary py-4 rounded-xl font-bold font-headline-sm text-sm shadow-md hover:opacity-90 transition-all active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard') }}"
                        class="block w-full text-center bg-transparent text-on-surface-variant border-2 border-outline-variant py-4 rounded-xl font-bold font-headline-sm text-sm hover:bg-surface-container transition-colors active:scale-[0.98]">
                        Batal
                    </a>
                </div>

                <!-- Pro Tip -->
                <div class="p-6 bg-primary-container rounded-xl text-on-primary-container">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-secondary-fixed" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
                        <div class="space-y-1">
                            <p class="font-headline-sm text-[13px] text-secondary-fixed">Pro Tip</p>
                            <p class="text-xs leading-relaxed opacity-80">Tim mencari anggota dengan minimal 3 keahlian. Lengkapi profilmu untuk meningkatkan peluang ditemukan!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </form>
    </div>
</main>

</body>
</html>
