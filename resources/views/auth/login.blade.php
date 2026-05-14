@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex" x-data="{ loading: false }">
    <!-- Kolom KIRI — Branding Panel (Hidden Mobile) -->
    <div class="hidden md:flex w-1/2 bg-primary p-12 flex-col justify-between relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400/20 rounded-full -ml-48 -mb-48 blur-3xl"></div>

        <div class="relative z-10">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-1 font-bold text-2xl">
                <span class="text-white">Si</span><span class="text-white/80">Lomba</span>
            </a>
        </div>

        <div class="relative z-10 flex-1 flex flex-col justify-center">
            <h1 class="text-white text-5xl font-black leading-tight mb-6">
                Satu Platform,<br>
                Semua Lomba<br>
                & Tim Impianmu
            </h1>
            <p class="text-blue-100 text-lg leading-relaxed max-w-sm mb-10">
                Bergabung dengan 2.000+ mahasiswa aktif yang sudah menggunakan SiLomba untuk menemukan lomba dan membentuk tim terbaik mereka.
            </p>

            <div class="space-y-5">
                <div class="flex items-center gap-4 group">
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white group-hover:bg-white/30 transition shadow-lg">
                        <span class="text-sm">✓</span>
                    </div>
                    <span class="text-white font-medium">500+ lomba dari berbagai kategori</span>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white group-hover:bg-white/30 transition shadow-lg">
                        <span class="text-sm">✓</span>
                    </div>
                    <span class="text-white font-medium">Tim Finder — matching otomatis berbasis keahlian</span>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white group-hover:bg-white/30 transition shadow-lg">
                        <span class="text-sm">✓</span>
                    </div>
                    <span class="text-white font-medium">Portofolio prestasi terupdate otomatis</span>
                </div>
            </div>
        </div>

        <!-- Testimoni Card -->
        <div class="relative z-10">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10 shadow-2xl">
                <div class="flex text-white/80 text-xs mb-3">⭐⭐⭐⭐⭐</div>
                <p class="text-white text-sm italic leading-relaxed">
                    "Berkat Tim Finder, saya berhasil ikut hackathon nasional dan juara 2!"
                </p>
                <p class="text-white/70 text-[10px] mt-4 font-bold tracking-wider uppercase">
                    — Rizky Pratama, Teknik Informatika Unsoed
                </p>
            </div>
        </div>
    </div>

    <!-- Kolom KANAN — Form Login -->
    <div class="w-full md:w-1/2 bg-surface flex items-center justify-center p-8 md:p-12 min-h-screen">
        <div class="w-full max-w-md mx-auto">
            <!-- Header Form -->
            <div class="mb-10 text-center md:text-left">
                <!-- Logo Mobile -->
                <a href="/" class="inline-block md:hidden mb-8 font-bold text-2xl">
                    <span class="text-textMain">Si</span><span class="text-primary">Lomba</span>
                </a>
                <h1 class="text-3xl font-black text-textMain mb-3 tracking-tight">Selamat Datang Kembali!</h1>
                <p class="text-sm text-textMuted font-medium">Masuk untuk melanjutkan perjalanan lombamu.</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="bg-aksenLight border border-aksen/30 rounded-2xl p-4 mb-6 text-sm text-aksenDark font-medium flex items-center gap-3">
                    <span class="text-xl">✅</span>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-2xl p-5 mb-6">
                    <p class="text-sm text-red-600 font-bold mb-2 flex items-center gap-2">
                        <span>⚠️</span> Oops! Ada masalah:
                    </p>
                    <ul class="list-disc list-inside text-xs text-red-500 space-y-1 ml-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" @submit="loading = true" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="text-sm font-bold text-textMain mb-2 block">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                           class="w-full px-5 py-3.5 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm"
                           placeholder="email@mhs.unsoed.ac.id">
                </div>

                <!-- Password -->
                <div x-data="{ show: false }">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="text-sm font-bold text-textMain">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-bold text-primary hover:underline transition" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <div class="relative group">
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="current-password"
                               class="w-full px-5 py-3.5 pr-14 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm"
                               placeholder="Masukkan password">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-textMuted hover:text-primary transition p-1 rounded-lg">
                            <span x-show="!show" class="text-xl">👁️</span>
                            <span x-show="show" class="text-xl">🙈</span>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-3">
                    <input id="remember_me" type="checkbox" name="remember" 
                           class="w-5 h-5 rounded-lg border-borderMain text-primary focus:ring-primary shadow-sm transition">
                    <label for="remember_me" class="text-sm font-bold text-textMuted select-none">Ingat saya</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" :disabled="loading"
                        class="w-full py-4 rounded-2xl bg-primary text-white font-bold text-sm hover:bg-primaryHover hover:shadow-xl hover:shadow-primary/20 transition active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed">
                    <span x-show="!loading">Masuk Sekarang</span>
                    <span x-show="loading" class="flex items-center justify-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </span>
                </button>

                <!-- Divider -->
                <div class="flex items-center gap-4 py-4">
                    <div class="flex-1 h-px bg-borderMain"></div>
                    <span class="text-xs font-bold text-[#94A3B8] uppercase tracking-widest">atau</span>
                    <div class="flex-1 h-px bg-borderMain"></div>
                </div>

                <!-- Link Daftar -->
                <div class="text-center">
                    <p class="text-sm text-textMuted font-medium">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-primary font-black hover:underline ml-1 transition">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
