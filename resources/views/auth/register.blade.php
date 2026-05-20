@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-[#000000] flex items-center justify-center px-4 py-8 relative overflow-hidden" x-data="{ loading: false, password: '' }">
    <!-- Elemen Dekoratif Halaman -->
    <div class="fixed top-0 left-0 w-96 h-96 bg-[#00524D] opacity-40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-[#48A89A] opacity-20 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Card besar -->
    <div class="max-w-5xl w-full bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col md:flex-row relative z-10 border border-[#00524D]/20">
        
        <!-- Wave Separator & Gradient Background (Desktop) -->
        <svg class="absolute inset-0 w-full h-full z-0 hidden md:block pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <linearGradient id="panelGradient" x1="30%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#48A89A" />
                    <stop offset="50%" stop-color="#00524D" />
                    <stop offset="100%" stop-color="#001F1D" />
                </linearGradient>
            </defs>
            <path fill="url(#panelGradient)" d="M100,0 L42,0 C 25,25 60,45 42,70 S 25,100 42,100 L100,100 Z" />
        </svg>

        <!-- PANEL KIRI — Dekorasi & Logo -->
        <div class="w-full md:w-5/12 h-64 md:h-auto relative overflow-hidden md:overflow-visible p-10 z-30">
            <!-- Gelembung (Blob) dekoratif dengan efek blur (Aurora Style) -->
            <!-- Kiri Atas Besar -->
            <div class="absolute w-48 h-48 bg-[#CBEFEB] opacity-60 rounded-full blur-3xl -top-10 -left-10 pointer-events-none"></div>
            <!-- Kiri Bawah Besar -->
            <div class="absolute w-56 h-56 bg-[#48A89A] opacity-30 rounded-full blur-3xl -bottom-10 -left-10 pointer-events-none"></div>
            
            <!-- Tambahan Lembut di Tengah & Sudut -->
            <div class="absolute w-24 h-24 bg-[#48A89A] opacity-40 rounded-full blur-xl top-[15%] left-[25%] pointer-events-none"></div>
            <div class="absolute w-32 h-32 bg-[#CBEFEB] opacity-50 rounded-full blur-2xl bottom-[25%] left-[20%] pointer-events-none"></div>
            <div class="absolute w-16 h-16 bg-[#00524D] opacity-20 rounded-full blur-lg top-[55%] left-[10%] pointer-events-none"></div>
            <div class="absolute w-36 h-36 bg-[#CBEFEB] opacity-40 rounded-full blur-2xl top-[5%] left-[50%] transform -translate-x-1/2 pointer-events-none"></div>
            <div class="absolute w-28 h-28 bg-[#48A89A] opacity-20 rounded-full blur-2xl bottom-[5%] left-[45%] transform -translate-x-1/2 pointer-events-none"></div>
            
            <!-- Ekstra Magis -->
            <div class="absolute w-40 h-40 bg-[#93C5FD] opacity-30 rounded-full blur-3xl top-[40%] left-[30%] pointer-events-none"></div>
            <div class="absolute w-20 h-20 bg-[#CBEFEB] opacity-60 rounded-full blur-xl bottom-[15%] left-[5%] pointer-events-none"></div>
            <div class="absolute w-32 h-32 bg-[#48A89A] opacity-30 rounded-full blur-2xl top-[10%] left-[10%] pointer-events-none"></div>
            <div class="absolute w-24 h-24 bg-[#93C5FD] opacity-40 rounded-full blur-2xl bottom-[45%] left-[15%] pointer-events-none"></div>
            
            <!-- Logo di tengah -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 flex items-center justify-center w-full">
                <img src="{{ asset('images/logo.png') }}" alt="SiLomba Logo" class="w-48 h-48 md:w-64 md:h-64 object-contain drop-shadow-xl hover:scale-105 transition-transform duration-300">
            </div>
        </div>

        <!-- PANEL KANAN — Form Register -->
        <div class="w-full md:w-7/12 bg-gradient-to-br from-[#48A89A] to-[#00524D] md:bg-none px-6 py-8 md:px-10 md:py-12 flex flex-col justify-center">
            
            <div class="max-w-md mx-auto w-full relative z-30">
                <h1 class="text-white text-3xl font-bold mb-2 text-center tracking-tight">Buat Akun SiLomba</h1>
                <p class="text-sm text-white/80 font-medium text-center mb-8">Daftar gratis dan mulai temukan lomba impianmu.</p>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-5 mb-6">
                        <p class="text-sm text-red-400 font-bold mb-2 flex items-center gap-2">
                            <span>⚠️</span> Oops! Ada masalah:
                        </p>
                        <ul class="list-disc list-inside text-xs text-red-300 space-y-1 ml-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register') }}" @submit="loading = true" class="space-y-4">
                    @csrf

                    <!-- Row Nama & NIM -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="text-white text-sm font-medium mb-1.5 block">Nama Lengkap</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                   class="w-full px-4 py-3 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                                   placeholder="Nama lengkap">
                        </div>
                        <div>
                            <label for="nim" class="text-white text-sm font-medium mb-1.5 block">NIM</label>
                            <input id="nim" type="text" name="nim" value="{{ old('nim') }}" required maxlength="10"
                                   class="w-full px-4 py-3 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                                   placeholder="H1D0XXXXXX">
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="text-white text-sm font-medium mb-1.5 block">Email Institusi</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               class="w-full px-4 py-3 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                               placeholder="email@mhs.unsoed.ac.id">
                    </div>

                    <!-- Program Studi -->
                    <div>
                        <label for="program_studi" class="text-white text-sm font-medium mb-1.5 block">Program Studi</label>
                        <div class="relative">
                            <select id="program_studi" name="program_studi" required
                                    class="w-full px-4 py-3 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200 appearance-none">
                                <option value="" class="bg-[#00524D] text-white">-- Pilih Program Studi --</option>
                                <option value="Teknik Informatika" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                <option value="Sistem Informasi" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                <option value="Manajemen" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                                <option value="Akuntansi" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                                <option value="Ilmu Komunikasi" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Ilmu Komunikasi' ? 'selected' : '' }}>Ilmu Komunikasi</option>
                                <option value="Hukum" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Hukum' ? 'selected' : '' }}>Hukum</option>
                                <option value="Kedokteran" class="bg-[#00524D] text-white" {{ old('program_studi') == 'Kedokteran' ? 'selected' : '' }}>Kedokteran</option>
                            </select>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-white/60">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Domisili -->
                    <div>
                        <label for="domisili" class="text-white text-sm font-medium mb-1.5 block">Domisili / Kota</label>
                        <input id="domisili" type="text" name="domisili" value="{{ old('domisili') }}" required
                               class="w-full px-4 py-3 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                               placeholder="Purwokerto">
                    </div>

                    <!-- Password Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div x-data="{ show: false }">
                            <label for="password" class="text-white text-sm font-medium mb-1.5 block">Password</label>
                            <div class="relative group">
                                <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="new-password"
                                       x-model="password"
                                       class="w-full px-4 py-3 pr-10 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                                       placeholder="Min 8 karakter">
                                <button type="button" @click="show = !show" class="absolute right-3 top-3 text-white/60 hover:text-white transition">
                                    <span x-show="!show"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg></span>
                                    <span x-show="show" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg></span>
                                </button>
                            </div>
                            <!-- Password Strength Indicator -->
                            <div class="flex gap-1 mt-1.5" x-show="password.length > 0" style="display: none;">
                                <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length > 0 ? (password.length < 5 ? 'bg-red-500' : (password.length < 8 ? 'bg-yellow-500' : 'bg-[#CBEFEB]')) : 'bg-white/20'"></div>
                                <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length >= 5 ? (password.length < 8 ? 'bg-yellow-500' : 'bg-[#CBEFEB]') : 'bg-white/20'"></div>
                                <div class="h-1 flex-1 rounded-full transition-all duration-500" :class="password.length >= 8 ? 'bg-[#CBEFEB]' : 'bg-white/20'"></div>
                            </div>
                        </div>
                        
                        <div x-data="{ show: false }">
                            <label for="password_confirmation" class="text-white text-sm font-medium mb-1.5 block">Konfirmasi</label>
                            <div class="relative group">
                                <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                                       class="w-full px-4 py-3 pr-10 rounded-xl bg-[#000000]/40 border border-[#48A89A]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                                       placeholder="Ulangi password">
                                <button type="button" @click="show = !show" class="absolute right-3 top-3 text-white/60 hover:text-white transition">
                                    <span x-show="!show"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg></span>
                                    <span x-show="show" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Terms & Conditions -->
                    <div class="flex items-start gap-3 mt-4">
                        <input id="terms" type="checkbox" required
                               class="w-4 h-4 mt-0.5 rounded border-none bg-[#000000]/40 text-[#48A89A] focus:ring-2 focus:ring-[#CBEFEB]/30 focus:ring-offset-0 focus:ring-offset-transparent transition">
                        <label for="terms" class="text-xs text-white/70 leading-relaxed font-medium">
                            Dengan mendaftar, saya menyetujui 
                            <a href="#" class="text-white font-bold hover:underline">Syarat & Ketentuan</a> 
                            serta 
                            <a href="#" class="text-white font-bold hover:underline">Kebijakan Privasi</a> 
                            SiLomba.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" :disabled="loading"
                            class="w-full py-3 rounded-xl mt-4 bg-[#48A89A] text-white font-semibold text-sm hover:bg-[#CBEFEB] hover:text-[#00524D] transition duration-300 active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed shadow-lg shadow-[#000000]/20">
                        <span x-show="!loading">Buat Akun Sekarang</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2" style="display: none;">
                            <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </span>
                    </button>

                    <!-- Link Login -->
                    <div class="text-center mt-6 text-sm text-white/80">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-white font-bold hover:underline transition">
                            Masuk di sini
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
