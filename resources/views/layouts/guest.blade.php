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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS 3 via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#235347',
                        primaryHover: '#163832',
                        primaryLight: '#D4E7D6',
                        primaryDark: '#051F20',
                        bgPage: '#F4F9F6',
                        surface: '#FFFFFF',
                        textMain: '#051F20',
                        textMuted: '#235347',
                        aksen: '#8EB69B',
                        aksenLight: '#D4E7D6',
                        aksenDark: '#0B2B26',
                        borderMain: '#D4E7D6',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
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
    <nav x-data="{ open: false, scrolled: false, aktif: 'home' }" 
         @scroll.window="scrolled = (window.pageYOffset > 50)"
         @scroll-section.window="aktif = $event.detail.sectionId"
         :class="{ 'shadow-sm': scrolled }"
         class="fixed top-0 left-0 right-0 z-50 bg-primaryDark/95 backdrop-blur-md border-b border-primary/40 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Kiri: Logo -->
            <a href="/" class="flex items-center space-x-1 font-bold text-xl">
                <img src="{{ asset('images/logo.png') }}?v=3" alt="SiLomba Logo" class="h-10 w-auto object-contain transition duration-300 hover:scale-105">
            </a>

            <!-- Tengah (desktop) -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home"
                   @click="aktif = 'home'"
                   :class="aktif === 'home' 
                     ? 'text-white border-b-2 border-white font-semibold' 
                     : 'text-primaryLight hover:text-white'"
                   class="text-sm pb-1 transition-all duration-300">
                  Beranda
                </a>
                <a href="#lomba"
                   @click="aktif = 'lomba'"
                   :class="aktif === 'lomba' 
                     ? 'text-white border-b-2 border-white font-semibold' 
                     : 'text-primaryLight hover:text-white'"
                   class="text-sm pb-1 transition-all duration-300">
                  Lomba
                </a>
                <a href="#fitur"
                   @click="aktif = 'fitur'"
                   :class="aktif === 'fitur' 
                     ? 'text-white border-b-2 border-white font-semibold' 
                     : 'text-primaryLight hover:text-white'"
                   class="text-sm pb-1 transition-all duration-300">
                  Tim Finder
                </a>
                <a href="#tentang"
                   @click="aktif = 'tentang'"
                   :class="aktif === 'tentang' 
                     ? 'text-white border-b-2 border-white font-semibold' 
                     : 'text-primaryLight hover:text-white'"
                   class="text-sm pb-1 transition-all duration-300">
                  Tentang
                </a>
            </div>

            <!-- Kanan: Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-aksen text-primaryDark rounded-full px-6 py-2 text-sm font-semibold hover:bg-white transition shadow-lg shadow-aksen/20">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="border border-white/50 text-white rounded-full px-5 py-2 text-sm font-semibold hover:bg-white/10 transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-aksen text-primaryDark rounded-full px-5 py-2 text-sm font-semibold hover:bg-white transition shadow-lg shadow-aksen/20">
                        Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
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
             class="md:hidden bg-primaryDark/95 backdrop-blur-md border-t border-primary/40 p-6 space-y-4 shadow-xl">
            <a href="#home" @click="open = false; aktif = 'home'" :class="aktif === 'home' ? 'text-white font-semibold' : 'text-primaryLight hover:text-white'" class="block text-sm transition">Beranda</a>
            <a href="#lomba" @click="open = false; aktif = 'lomba'" :class="aktif === 'lomba' ? 'text-white font-semibold' : 'text-primaryLight hover:text-white'" class="block text-sm transition">Lomba</a>
            <a href="#fitur" @click="open = false; aktif = 'fitur'" :class="aktif === 'fitur' ? 'text-white font-semibold' : 'text-primaryLight hover:text-white'" class="block text-sm transition">Tim Finder</a>
            <a href="#tentang" @click="open = false; aktif = 'tentang'" :class="aktif === 'tentang' ? 'text-white font-semibold' : 'text-primaryLight hover:text-white'" class="block text-sm transition">Tentang</a>
            <hr class="border-primary/40">
            @auth
                <a href="{{ route('dashboard') }}" class="block w-full text-center bg-aksen text-primaryDark rounded-full py-3 text-sm font-semibold hover:bg-white transition">
                    Dashboard
                </a>
            @else
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('login') }}" class="text-center border border-white/50 text-white rounded-full py-3 text-sm font-semibold hover:bg-white/10 transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="text-center bg-aksen text-primaryDark rounded-full py-3 text-sm font-semibold hover:bg-white transition">
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
    <footer class="bg-[#051F20] py-16 px-6 border-t border-[#235347]">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 mb-12">
                <!-- Kolom 1 — Brand -->
                <div class="col-span-2 md:col-span-1">
                    <a href="/" class="flex items-center space-x-1 font-bold text-xl mb-4">
                        <img src="{{ asset('images/logo.png') }}?v=3" alt="SiLomba Logo" class="h-12 w-auto object-contain transition duration-300 hover:scale-105">
                    </a>
                    <p class="text-sm text-[#8EB69B] leading-relaxed mb-6 font-medium">
                        Sistem Informasi Lomba & Event Mahasiswa terpadu untuk menemukan kompetisi dan rekan tim terbaik.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#0B2B26] border border-[#235347] hover:bg-white transition flex items-center justify-center text-[#8EB69B] text-xs hover:text-[#051F20]">IG</a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#0B2B26] border border-[#235347] hover:bg-white transition flex items-center justify-center text-[#8EB69B] text-xs hover:text-[#051F20]">X</a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#0B2B26] border border-[#235347] hover:bg-white transition flex items-center justify-center text-[#8EB69B] text-xs hover:text-[#051F20]">IN</a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-[#0B2B26] border border-[#235347] hover:bg-white transition flex items-center justify-center text-[#8EB69B] text-xs hover:text-[#051F20]">GH</a>
                    </div>
                </div>

                <!-- Kolom 2 — Platform -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Platform</h4>
                    <ul class="space-y-3 text-sm text-[#8EB69B]">
                        <li><a href="#" class="hover:text-white transition">Direktori Lomba</a></li>
                        <li><a href="#" class="hover:text-white transition">Portofolio</a></li>
                        <li><a href="#" class="hover:text-white transition">Notifikasi</a></li>
                    </ul>
                </div>

                <!-- Kolom 3 — Informasi -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Informasi</h4>
                    <ul class="space-y-3 text-sm text-[#8EB69B]">
                        <li><a href="#" class="hover:text-white transition">Tentang SiLomba</a></li>
                        <li><a href="#" class="hover:text-white transition">Cara Kerja</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 4 — Kontak -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Kontak</h4>
                    <div class="space-y-3 text-sm text-[#8EB69B]">
                        <div class="flex items-center gap-2 hover:text-white transition">
                            <span>📧</span>
                            <a href="mailto:silomba@gmail.com" class="hover:text-white transition">silomba@gmail.com</a>
                        </div>
                        <div class="flex items-center gap-2 hover:text-white transition">
                            <span>📱</span>
                            <a href="tel:08312345678" class="hover:text-white transition">083 1234 5678</a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span>📍</span>
                            <span>Purwokerto, Jawa Tengah</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-[#235347] pt-8 mt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-[#8EB69B] text-center md:text-left">
                <p>© 2026 SiLomba — Sistem Informasi Lomba & Event Mahasiswa</p>
                <p>Informatika · Unsoed</p>
            </div>
        </div>
    </footer>
</body>
</html>
