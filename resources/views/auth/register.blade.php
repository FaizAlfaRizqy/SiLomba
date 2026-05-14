@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex" x-data="{ loading: false, password: '' }">
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

    <!-- Kolom KANAN — Form Register -->
    <div class="w-full md:w-1/2 bg-surface flex items-start justify-center p-8 md:p-12 overflow-y-auto min-h-screen">
        <div class="w-full max-w-md mx-auto py-8">
            <!-- Header Form -->
            <div class="mb-8 text-center md:text-left">
                <!-- Logo Mobile -->
                <a href="/" class="inline-block md:hidden mb-8 font-bold text-2xl">
                    <span class="text-textMain">Si</span><span class="text-primary">Lomba</span>
                </a>
                <h1 class="text-3xl font-black text-textMain mb-3 tracking-tight">Buat Akun SiLomba</h1>
                <p class="text-sm text-textMuted font-medium">Daftar gratis dan mulai temukan lomba impianmu.</p>
            </div>

            <!-- Progress Steps (Visual Only) -->
            <div class="flex items-center gap-4 mb-10 px-2">
                <div class="flex flex-col items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-xs font-bold shadow-lg shadow-primary/20 ring-4 ring-primary/10">1</div>
                    <span class="text-[10px] font-bold text-primary uppercase tracking-widest">Akun</span>
                </div>
                <div class="flex-1 h-px bg-borderMain mb-4"></div>
                <div class="flex flex-col items-center gap-2 text-textMuted">
                    <div class="w-8 h-8 rounded-full bg-borderMain flex items-center justify-center text-xs font-bold">2</div>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Profil</span>
                </div>
                <div class="flex-1 h-px bg-borderMain mb-4"></div>
                <div class="flex flex-col items-center gap-2 text-textMuted">
                    <div class="w-8 h-8 rounded-full bg-borderMain flex items-center justify-center text-xs font-bold">3</div>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Selesai</span>
                </div>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-2xl p-5 mb-8">
                    <p class="text-sm text-red-600 font-bold mb-2 flex items-center gap-2">
                        <span>⚠️</span> Mohon perbaiki kesalahan berikut:
                    </p>
                    <ul class="list-disc list-inside text-xs text-red-500 space-y-1 ml-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" @submit="loading = true" class="space-y-5">
                @csrf

                <!-- Row Nama & NIM -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="text-sm font-bold text-textMain mb-2 block">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               class="w-full px-5 py-3.5 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm @error('name') border-red-400 @enderror"
                               placeholder="Nama lengkap">
                    </div>
                    <div>
                        <label for="nim" class="text-sm font-bold text-textMain mb-2 block">NIM</label>
                        <input id="nim" type="text" name="nim" value="{{ old('nim') }}" required maxlength="10"
                               class="w-full px-5 py-3.5 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm @error('nim') border-red-400 @enderror"
                               placeholder="H1D0XXXXXX">
                    </div>
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="text-sm font-bold text-textMain mb-2 block">Email Institusi</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                           class="w-full px-5 py-3.5 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm @error('email') border-red-400 @enderror"
                           placeholder="email@mhs.unsoed.ac.id">
                </div>

                <!-- Program Studi -->
                <div>
                    <label for="program_studi" class="text-sm font-bold text-textMain mb-2 block">Program Studi</label>
                    <div class="relative">
                        <select id="program_studi" name="program_studi" required
                                class="w-full px-5 py-3.5 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm appearance-none @error('program_studi') border-red-400 @enderror">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Informatika" {{ old('program_studi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                            <option value="Sistem Informasi" {{ old('program_studi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                            <option value="Manajemen" {{ old('program_studi') == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                            <option value="Akuntansi" {{ old('program_studi') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                            <option value="Ilmu Komunikasi" {{ old('program_studi') == 'Ilmu Komunikasi' ? 'selected' : '' }}>Ilmu Komunikasi</option>
                            <option value="Hukum" {{ old('program_studi') == 'Hukum' ? 'selected' : '' }}>Hukum</option>
                            <option value="Kedokteran" {{ old('program_studi') == 'Kedokteran' ? 'selected' : '' }}>Kedokteran</option>
                        </select>
                        <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-textMuted">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Domisili -->
                <div>
                    <label for="domisili" class="text-sm font-bold text-textMain mb-2 block">Domisili / Kota</label>
                    <input id="domisili" type="text" name="domisili" value="{{ old('domisili') }}" required
                           class="w-full px-5 py-3.5 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm @error('domisili') border-red-400 @enderror"
                           placeholder="Purwokerto">
                </div>

                <!-- Password -->
                <div x-data="{ show: false }">
                    <label for="password" class="text-sm font-bold text-textMain mb-2 block">Password</label>
                    <div class="relative group">
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="new-password"
                               x-model="password"
                               class="w-full px-5 py-3.5 pr-14 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm @error('password') border-red-400 @enderror"
                               placeholder="Minimal 8 karakter">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-textMuted hover:text-primary transition p-1 rounded-lg">
                            <span x-show="!show" class="text-xl">👁️</span>
                            <span x-show="show" class="text-xl">🙈</span>
                        </button>
                    </div>
                    
                    <!-- Password Strength Indicator -->
                    <div class="flex gap-1 mt-3" x-show="password.length > 0">
                        <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length > 0 ? (password.length < 5 ? 'bg-red-500' : (password.length < 8 ? 'bg-yellow-500' : (password.length < 12 ? 'bg-primary' : 'bg-aksen'))) : 'bg-borderMain'"></div>
                        <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length >= 5 ? (password.length < 8 ? 'bg-yellow-500' : (password.length < 12 ? 'bg-primary' : 'bg-aksen')) : 'bg-borderMain'"></div>
                        <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length >= 8 ? (password.length < 12 ? 'bg-primary' : 'bg-aksen') : 'bg-borderMain'"></div>
                        <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length >= 12 ? 'bg-aksen' : 'bg-borderMain'"></div>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div x-data="{ show: false }">
                    <label for="password_confirmation" class="text-sm font-bold text-textMain mb-2 block">Konfirmasi Password</label>
                    <div class="relative group">
                        <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                               class="w-full px-5 py-3.5 pr-14 rounded-2xl border border-borderMain bg-white text-textMain text-sm focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition shadow-sm"
                               placeholder="Ulangi password">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-textMuted hover:text-primary transition p-1 rounded-lg">
                            <span x-show="!show" class="text-xl">👁️</span>
                            <span x-show="show" class="text-xl">🙈</span>
                        </button>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="flex items-start gap-3 pt-2">
                    <input id="terms" type="checkbox" required
                           class="w-5 h-5 mt-0.5 rounded-lg border-borderMain text-primary focus:ring-primary shadow-sm transition">
                    <label for="terms" class="text-xs text-textMuted leading-relaxed font-medium">
                        Dengan mendaftar, saya menyetujui 
                        <a href="#" class="text-primary font-bold hover:underline">Syarat & Ketentuan</a> 
                        serta 
                        <a href="#" class="text-primary font-bold hover:underline">Kebijakan Privasi</a> 
                        SiLomba.
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" :disabled="loading"
                        class="w-full py-4 rounded-2xl bg-primary text-white font-bold text-sm hover:bg-primaryHover hover:shadow-xl hover:shadow-primary/20 transition active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed">
                    <span x-show="!loading">Buat Akun Sekarang</span>
                    <span x-show="loading" class="flex items-center justify-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </span>
                </button>

                <!-- Link Login -->
                <div class="text-center pt-2 pb-10">
                    <p class="text-sm text-textMuted font-medium">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-primary font-black hover:underline ml-1 transition">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
