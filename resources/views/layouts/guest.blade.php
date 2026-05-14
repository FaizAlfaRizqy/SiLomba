<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SiLomba') }}</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS 3 via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F7EF7',
                        primaryHover: '#3B6EF0',
                        primaryLight: '#DBEAFE',
                        primaryDark: '#1E3A6E',
                        bgPage: '#EFF6FF',
                        surface: '#F8FAFC',
                        textMain: '#1E293B',
                        textMuted: '#64748B',
                        aksen: '#10B981',
                        aksenLight: '#D1FAE5',
                        aksenDark: '#065F46',
                        borderMain: '#E2E8F0',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Alpine.js via CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .active-nav {
            color: #4F7EF7;
            border-bottom: 2px solid #4F7EF7;
            padding-bottom: 0.25rem;
        }
    </style>
</head>
<body class="bg-surface text-textMain antialiased">
    <!-- SECTION 1 — NAVBAR -->
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 50)"
         :class="{ 'shadow-sm': scrolled }"
         class="fixed top-0 left-0 right-0 z-50 bg-surface border-b border-borderMain transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Kiri: Logo -->
            <a href="/" class="flex items-center space-x-1 font-bold text-xl">
                <span class="text-textMain">Si</span><span class="text-primary">Lomba</span>
            </a>

            <!-- Tengah (desktop) -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-sm font-medium text-textMain hover:text-primary transition {{ request()->is('/') ? 'active-nav' : '' }}">Beranda</a>
                <a href="#lomba" class="text-sm font-medium text-textMain hover:text-primary transition">Lomba</a>
                <a href="#tentang" class="text-sm font-medium text-textMain hover:text-primary transition">Tentang</a>
            </div>

            <!-- Kanan: Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-primary text-white rounded-full px-6 py-2 text-sm font-semibold hover:bg-primaryHover transition shadow-lg shadow-primary/20">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="border border-primary text-primary rounded-full px-5 py-2 text-sm font-semibold hover:bg-bgPage transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-primary text-white rounded-full px-5 py-2 text-sm font-semibold hover:bg-primaryHover transition shadow-lg shadow-primary/20">
                        Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-textMain focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" 
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-surface border-t border-borderMain p-6 space-y-4 shadow-xl">
            <a href="#home" @click="open = false" class="block text-sm font-medium text-textMain hover:text-primary transition">Beranda</a>
            <a href="#lomba" @click="open = false" class="block text-sm font-medium text-textMain hover:text-primary transition">Lomba</a>
            <a href="#tentang" @click="open = false" class="block text-sm font-medium text-textMain hover:text-primary transition">Tentang</a>
            <hr class="border-borderMain">
            @auth
                <a href="{{ route('dashboard') }}" class="block w-full text-center bg-primary text-white rounded-full py-3 text-sm font-semibold hover:bg-primaryHover transition">
                    Dashboard
                </a>
            @else
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('login') }}" class="text-center border border-primary text-primary rounded-full py-3 text-sm font-semibold hover:bg-bgPage transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="text-center bg-primary text-white rounded-full py-3 text-sm font-semibold hover:bg-primaryHover transition">
                        Daftar
                    </a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        {{ $slot }}
    </main>

    <!-- SECTION 9 — FOOTER -->
    <footer class="bg-[#1E293B] py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 mb-12">
                <!-- Kolom 1 — Brand -->
                <div class="col-span-2 md:col-span-1">
                    <a href="/" class="flex items-center space-x-1 font-bold text-xl mb-4">
                        <span class="text-white">Si</span><span class="text-primary">Lomba</span>
                    </a>
                    <p class="text-sm text-textMuted leading-relaxed mb-6">
                        Sistem Informasi Lomba & Event Mahasiswa terpadu untuk menemukan kompetisi dan rekan tim terbaik.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#334155] hover:bg-primary transition flex items-center justify-center text-[#94A3B8] text-xs hover:text-white">IG</a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#334155] hover:bg-primary transition flex items-center justify-center text-[#94A3B8] text-xs hover:text-white">X</a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#334155] hover:bg-primary transition flex items-center justify-center text-[#94A3B8] text-xs hover:text-white">IN</a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#334155] hover:bg-primary transition flex items-center justify-center text-[#94A3B8] text-xs hover:text-white">GH</a>
                    </div>
                </div>

                <!-- Kolom 2 — Platform -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Platform</h4>
                    <ul class="space-y-3 text-sm text-textMuted">
                        <li><a href="#" class="hover:text-white transition">Direktori Lomba</a></li>
                        <li><a href="#" class="hover:text-white transition">Portofolio</a></li>
                        <li><a href="#" class="hover:text-white transition">Notifikasi</a></li>
                    </ul>
                </div>

                <!-- Kolom 3 — Informasi -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Informasi</h4>
                    <ul class="space-y-3 text-sm text-textMuted">
                        <li><a href="#" class="hover:text-white transition">Tentang SiLomba</a></li>
                        <li><a href="#" class="hover:text-white transition">Cara Kerja</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 4 — Kontak -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Kontak</h4>
                    <ul class="space-y-4 text-sm text-textMuted">
                        <li class="flex items-start gap-3">
                            <span class="mt-1">📧</span>
                            <span>silomba@unsoed.ac.id</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1">🏛️</span>
                            <span>Universitas Jenderal Soedirman</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1">📍</span>
                            <span>Purwokerto, Jawa Tengah</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-[#334155] pt-8 mt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-textMuted text-center md:text-left">
                <p>© 2026 SiLomba — Sistem Informasi Lomba & Event Mahasiswa</p>
                <p>Informatika · Universitas Jenderal Soedirman</p>
            </div>
        </div>
    </footer>
</body>
</html>
