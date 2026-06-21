<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SiLomba | Portofolio Mahasiswa</title>
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
                    "fontFamily": {
                        "sans": ["Plus Jakarta Sans", "sans-serif"],
                        "serif": ["Playfair Display", "serif"],
                        "label-md": ["Plus Jakarta Sans", "sans-serif"],
                        "headline-sm": ["Playfair Display", "serif"],
                        "headline-md": ["Playfair Display", "serif"],
                        "body-md": ["Plus Jakarta Sans", "sans-serif"],
                        "headline-lg": ["Playfair Display", "serif"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { font-family: 'Material Symbols Outlined' !important; font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(35, 83, 71, 0.05); }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(35, 83, 71, 0.2); border-radius: 10px; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md overflow-hidden">
<div class="flex h-screen">

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col overflow-y-auto custom-scrollbar">
        <!-- Header -->
        <header class="sticky top-0 z-40 flex justify-between items-center px-8 w-full h-16 bg-[#E8F3E9]/80 backdrop-blur-md border-b border-outline-variant/30">
            <div class="flex items-center gap-4">
                <a href="javascript:history.back()" class="text-[#235347] hover:text-[#051F20] transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h2 class="font-headline-sm font-serif text-headline-sm font-bold text-[#051F20]">Portofolio Publik</h2>
            </div>
            <div class="flex items-center gap-3">
                <p class="font-label-md text-[14px] font-bold text-[#051F20]">{{ Auth::user()->name }}</p>
                <img class="w-10 h-10 rounded-full border-2 border-[#051F20] object-cover"
                     src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar"/>
            </div>
        </header>

        <div class="px-8 py-10 max-w-5xl mx-auto w-full">
            <div class="bg-white rounded-[3rem] shadow-xl overflow-hidden border border-[#8EB69B]/20">
                <!-- Cover Area -->
                <div class="h-64 relative overflow-hidden bg-[#051F20] rounded-t-[3rem]">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#051F20] to-[#235347] opacity-90"></div>
                    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-[#8EB69B] opacity-10 blur-3xl rounded-full"></div>
                </div>

                <!-- Profile Picture -->
                <div class="relative px-12 -mt-16 z-10">
                    <div class="w-32 h-32 rounded-[2rem] bg-white p-1.5 shadow-xl">
                        @if($mahasiswa->foto_profil)
                            <img src="{{ asset('storage/' . $mahasiswa->foto_profil) }}" class="w-full h-full object-cover rounded-[1.6rem]">
                        @else
                            <div class="w-full h-full bg-[#E8F3E9] rounded-[1.6rem] flex items-center justify-center text-[#235347] text-4xl font-serif font-bold">
                                {{ substr($mahasiswa->user->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="pt-6 pb-12 px-12 space-y-12">
                    <!-- Basic Info -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                        <div>
                            <h1 class="text-4xl font-serif font-extrabold text-[#051F20]">{{ $mahasiswa->user->name }}</h1>
                            <p class="text-xl text-[#235347] mt-2 font-medium flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">school</span> {{ $mahasiswa->program_studi }} 
                                <span class="opacity-50">•</span> 
                                <span class="material-symbols-outlined text-sm">location_on</span> {{ $mahasiswa->domisili }}
                            </p>
                        </div>
                        <div class="flex space-x-3">
                            @if($mahasiswa->link_portofolio)
                                <a href="{{ $mahasiswa->link_portofolio }}" target="_blank" class="px-6 py-3 bg-[#051F20] text-white rounded-2xl font-bold hover:bg-[#235347] transition shadow-lg flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[20px]">link</span>
                                    View Portfolio
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        <div class="md:col-span-2 space-y-10">
                            <!-- Keahlian -->
                            <section>
                                <h3 class="text-sm font-bold text-[#8EB69B] uppercase tracking-widest mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined">psychology</span> Core Skills
                                </h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($mahasiswa->keahlian as $skill)
                                        <span class="px-4 py-2 bg-[#E8F3E9] text-[#163832] text-sm font-bold rounded-xl border border-[#8EB69B]/20">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </section>

                            <!-- Minat -->
                            <section>
                                <h3 class="text-sm font-bold text-[#8EB69B] uppercase tracking-widest mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined">favorite</span> Interests
                                </h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($mahasiswa->minat_lomba as $interest)
                                        <span class="px-4 py-2 bg-transparent text-[#235347] text-sm font-bold rounded-xl border-2 border-[#235347]/20">{{ $interest }}</span>
                                    @endforeach
                                </div>
                            </section>

                            <!-- Prestasi -->
                            <section>
                                <h3 class="text-sm font-bold text-[#8EB69B] uppercase tracking-widest mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined">workspace_premium</span> Prestasi & Pengalaman
                                </h3>
                                <div class="space-y-4">
                                    <div class="p-6 bg-[#E8F3E9]/50 rounded-3xl border border-[#8EB69B]/20 flex items-center space-x-6 hover:-translate-y-1 transition-transform">
                                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#235347] shadow-sm">
                                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified</span>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-[#051F20] font-serif text-lg">Mahasiswa Aktif SiLomba</h4>
                                            <p class="text-xs text-[#235347]/80">Bergabung sejak {{ $mahasiswa->created_at->format('M Y') }}</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-[#8EB69B] italic text-center py-4 border border-dashed border-[#8EB69B]/30 rounded-2xl">Belum ada rekam jejak lomba yang diselesaikan.</p>
                                </div>
                            </section>
                        </div>

                        <!-- Sidebar Info -->
                        <div class="space-y-8">
                            <div class="p-8 bg-[#051F20] rounded-[2rem] text-white shadow-xl relative overflow-hidden">
                                <div class="absolute -top-12 -right-12 w-32 h-32 bg-[#235347] rounded-full opacity-50 blur-xl"></div>
                                
                                <h3 class="text-lg font-serif font-bold mb-6 text-[#8EB69B]">Contact Info</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center">
                                            <span class="material-symbols-outlined text-[18px]">mail</span>
                                        </div>
                                        <div>
                                            <p class="text-[10px] text-[#8EB69B] uppercase tracking-wider">Email</p>
                                            <p class="text-sm text-white">{{ $mahasiswa->user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center">
                                            <span class="material-symbols-outlined text-[18px]">badge</span>
                                        </div>
                                        <div>
                                            <p class="text-[10px] text-[#8EB69B] uppercase tracking-wider">NIM</p>
                                            <p class="text-sm text-white">{{ $mahasiswa->nim }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
