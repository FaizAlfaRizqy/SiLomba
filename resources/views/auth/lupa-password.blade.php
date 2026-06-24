@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-[#051F20] flex items-center justify-center px-4 py-8 relative overflow-hidden" x-data="{ loading: false }">
    <!-- Elemen Dekoratif Halaman -->
    <div class="fixed top-0 left-0 w-96 h-96 bg-[#0B2B26] opacity-40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-[#235347] opacity-20 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Card besar -->
    <div class="max-w-4xl w-full bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col md:flex-row relative z-10 border border-[#0B2B26]/20">
        
        <!-- Wave Separator & Gradient Background (Desktop) -->
        <svg class="absolute inset-0 w-full h-full z-0 hidden md:block pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <linearGradient id="panelGradient" x1="30%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#235347" />
                    <stop offset="50%" stop-color="#0B2B26" />
                    <stop offset="100%" stop-color="#051F20" />
                </linearGradient>
            </defs>
            <path fill="url(#panelGradient)" d="M100,0 L42,0 C 25,25 60,45 42,70 S 25,100 42,100 L100,100 Z" />
        </svg>

        <!-- PANEL KIRI — Dekorasi & Ilustrasi -->
        <div class="w-full md:w-5/12 h-64 md:h-auto relative overflow-hidden md:overflow-visible p-10 z-30">
            <!-- Blob Dekoratif -->
            <div class="absolute w-48 h-48 bg-[#8EB69B] opacity-60 rounded-full blur-3xl -top-10 -left-10 pointer-events-none"></div>
            <div class="absolute w-56 h-56 bg-[#235347] opacity-30 rounded-full blur-3xl -bottom-10 -left-10 pointer-events-none"></div>
            <div class="absolute w-24 h-24 bg-[#235347] opacity-40 rounded-full blur-xl top-[15%] left-[25%] pointer-events-none"></div>
            <div class="absolute w-32 h-32 bg-[#8EB69B] opacity-50 rounded-full blur-2xl bottom-[25%] left-[20%] pointer-events-none"></div>
            <div class="absolute w-16 h-16 bg-[#0B2B26] opacity-20 rounded-full blur-lg top-[55%] left-[10%] pointer-events-none"></div>
            <div class="absolute w-36 h-36 bg-[#8EB69B] opacity-40 rounded-full blur-2xl top-[5%] left-[50%] transform -translate-x-1/2 pointer-events-none"></div>
            <div class="absolute w-40 h-40 bg-[#8EB69B] opacity-30 rounded-full blur-3xl top-[40%] left-[30%] pointer-events-none"></div>
            <div class="absolute w-12 h-12 bg-[#235347] opacity-40 rounded-full top-[20%] left-[10%] pointer-events-none"></div>
            <div class="absolute w-6 h-6 bg-[#0B2B26] opacity-30 rounded-full top-[15%] left-[25%] pointer-events-none"></div>
            <div class="absolute w-16 h-16 bg-[#8EB69B] opacity-60 rounded-full bottom-[25%] left-[15%] pointer-events-none"></div>
            
            <!-- Ikon Kunci di Tengah -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 flex flex-col items-center justify-center gap-4">
                <div class="w-24 h-24 md:w-32 md:h-32 bg-white/10 backdrop-blur-md rounded-[2rem] flex items-center justify-center shadow-2xl border border-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 md:w-16 md:h-16 text-white drop-shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <p class="text-white/80 text-sm font-medium text-center px-4 hidden md:block">Masukkan email terdaftar<br>untuk mereset password</p>
            </div>
        </div>

        <!-- PANEL KANAN — Form -->
        <div class="w-full md:w-7/12 bg-gradient-to-br from-[#235347] to-[#0B2B26] md:bg-none px-6 py-8 md:px-10 md:py-12 flex flex-col justify-center">
            
            <div class="max-w-sm mx-auto w-full relative z-30">
                <!-- Breadcrumb / Step Indicator -->
                <div class="flex items-center gap-2 mb-6">
                    <div class="flex items-center gap-1.5">
                        <div class="w-7 h-7 rounded-full bg-white text-[#051F20] flex items-center justify-center text-xs font-bold">1</div>
                        <span class="text-white text-xs font-medium">Verifikasi Email</span>
                    </div>
                    <div class="flex-1 h-px bg-white/30"></div>
                    <div class="flex items-center gap-1.5">
                        <div class="w-7 h-7 rounded-full bg-white/20 text-white/60 flex items-center justify-center text-xs font-bold">2</div>
                        <span class="text-white/60 text-xs">Password Baru</span>
                    </div>
                </div>

                <h1 class="text-white text-3xl font-bold mb-2">Lupa Password?</h1>
                <p class="text-white/70 text-sm mb-7">Masukkan email yang terdaftar. Password lama akan dihapus dan kamu bisa membuat yang baru.</p>

                <!-- Session Status / Success -->
                @if (session('status'))
                    <div class="bg-[#8EB69B]/20 border border-[#8EB69B]/40 rounded-xl p-4 mb-5 text-sm text-white font-medium flex items-center gap-3">
                        <span class="text-xl">✅</span>
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-5 mb-5">
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

                <form method="POST" action="{{ route('password.direct.verify') }}" @submit="loading = true" class="space-y-5">
                    @csrf

                    <!-- FIELD EMAIL -->
                    <div>
                        <label for="email" class="text-white text-sm font-medium mb-1.5 block">Email Terdaftar</label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="email"
                            class="w-full px-4 py-3 rounded-xl bg-[#051F20]/40 border border-[#235347]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                            placeholder="Masukkan email terdaftar kamu"
                        >
                    </div>

                    <!-- TOMBOL VERIFIKASI -->
                    <button type="submit" :disabled="loading"
                            class="w-full py-3 rounded-xl mt-2 bg-[#235347] text-white font-semibold text-sm hover:bg-[#8EB69B] hover:text-[#0B2B26] transition duration-300 active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed shadow-lg shadow-[#051F20]/20">
                        <span x-show="!loading">Verifikasi Email →</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2" style="display: none;">
                            <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memverifikasi...
                        </span>
                    </button>

                    <!-- LINK KEMBALI LOGIN -->
                    <div class="text-center mt-4 text-sm text-white/70">
                        Ingat password kamu?
                        <a href="{{ route('login') }}" class="text-white font-bold hover:underline transition ml-1">
                            Masuk
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
