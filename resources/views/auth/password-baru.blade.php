@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-[#051F20] flex items-center justify-center px-4 py-8 relative overflow-hidden" x-data="{ loading: false, showPass: false, showConfirm: false }">
    <!-- Elemen Dekoratif Halaman -->
    <div class="fixed top-0 left-0 w-96 h-96 bg-[#0B2B26] opacity-40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-[#235347] opacity-20 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Card besar -->
    <div class="max-w-4xl w-full bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col md:flex-row relative z-10 border border-[#0B2B26]/20">
        
        <!-- Wave Separator & Gradient Background (Desktop) -->
        <svg class="absolute inset-0 w-full h-full z-0 hidden md:block pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <linearGradient id="panelGradient2" x1="30%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#235347" />
                    <stop offset="50%" stop-color="#0B2B26" />
                    <stop offset="100%" stop-color="#051F20" />
                </linearGradient>
            </defs>
            <path fill="url(#panelGradient2)" d="M100,0 L42,0 C 25,25 60,45 42,70 S 25,100 42,100 L100,100 Z" />
        </svg>

        <!-- PANEL KIRI — Dekorasi & Ilustrasi -->
        <div class="w-full md:w-5/12 h-64 md:h-auto relative overflow-hidden md:overflow-visible p-10 z-30">
            <!-- Blob Dekoratif -->
            <div class="absolute w-48 h-48 bg-[#8EB69B] opacity-60 rounded-full blur-3xl -top-10 -left-10 pointer-events-none"></div>
            <div class="absolute w-56 h-56 bg-[#235347] opacity-30 rounded-full blur-3xl -bottom-10 -left-10 pointer-events-none"></div>
            <div class="absolute w-24 h-24 bg-[#235347] opacity-40 rounded-full blur-xl top-[15%] left-[25%] pointer-events-none"></div>
            <div class="absolute w-32 h-32 bg-[#8EB69B] opacity-50 rounded-full blur-2xl bottom-[25%] left-[20%] pointer-events-none"></div>
            <div class="absolute w-36 h-36 bg-[#8EB69B] opacity-40 rounded-full blur-2xl top-[5%] left-[50%] transform -translate-x-1/2 pointer-events-none"></div>
            <div class="absolute w-40 h-40 bg-[#8EB69B] opacity-30 rounded-full blur-3xl top-[40%] left-[30%] pointer-events-none"></div>
            <div class="absolute w-12 h-12 bg-[#235347] opacity-40 rounded-full top-[20%] left-[10%] pointer-events-none"></div>
            <div class="absolute w-16 h-16 bg-[#8EB69B] opacity-60 rounded-full bottom-[25%] left-[15%] pointer-events-none"></div>
            
            <!-- Ikon Shield / Password di Tengah -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 flex flex-col items-center justify-center gap-4">
                <div class="w-24 h-24 md:w-32 md:h-32 bg-white/10 backdrop-blur-md rounded-[2rem] flex items-center justify-center shadow-2xl border border-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 md:w-16 md:h-16 text-white drop-shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <p class="text-white/80 text-sm font-medium text-center px-4 hidden md:block">Buat password baru<br>yang kuat dan mudah diingat</p>
            </div>
        </div>

        <!-- PANEL KANAN — Form Password Baru -->
        <div class="w-full md:w-7/12 bg-gradient-to-br from-[#235347] to-[#0B2B26] md:bg-none px-6 py-8 md:px-10 md:py-12 flex flex-col justify-center">
            
            <div class="max-w-sm mx-auto w-full relative z-30">
                <!-- Breadcrumb / Step Indicator -->
                <div class="flex items-center gap-2 mb-6">
                    <div class="flex items-center gap-1.5">
                        <div class="w-7 h-7 rounded-full bg-[#8EB69B]/40 text-white/60 flex items-center justify-center text-xs font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-white/60 text-xs">Verifikasi Email</span>
                    </div>
                    <div class="flex-1 h-px bg-white/50"></div>
                    <div class="flex items-center gap-1.5">
                        <div class="w-7 h-7 rounded-full bg-white text-[#051F20] flex items-center justify-center text-xs font-bold">2</div>
                        <span class="text-white text-xs font-medium">Password Baru</span>
                    </div>
                </div>

                <h1 class="text-white text-3xl font-bold mb-2">Buat Password Baru</h1>
                <p class="text-white/70 text-sm mb-1">
                    untuk akun 
                    <span class="text-[#8EB69B] font-semibold">{{ $email }}</span>
                </p>
                <p class="text-white/50 text-xs mb-7">Password lama telah dihapus. Buat password yang kuat.</p>

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

                <form method="POST" action="{{ route('password.direct.store') }}" @submit="loading = true" class="space-y-5">
                    @csrf

                    <!-- FIELD PASSWORD BARU -->
                    <div x-data="{ show: false }">
                        <label for="password" class="text-white text-sm font-medium mb-1.5 block">Password Baru</label>
                        <div class="relative">
                            <input 
                                :type="show ? 'text' : 'password'" 
                                id="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                class="w-full px-4 py-3 rounded-xl bg-[#051F20]/40 border border-[#235347]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                                placeholder="Minimal 8 karakter"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 top-3.5 text-white/60 hover:text-white transition">
                                <span x-show="!show">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </span>
                                <span x-show="show" style="display: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- FIELD KONFIRMASI PASSWORD -->
                    <div x-data="{ show: false }">
                        <label for="password_confirmation" class="text-white text-sm font-medium mb-1.5 block">Konfirmasi Password</label>
                        <div class="relative">
                            <input 
                                :type="show ? 'text' : 'password'" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                class="w-full px-4 py-3 rounded-xl bg-[#051F20]/40 border border-[#235347]/50 text-white text-sm placeholder:text-white/40 focus:outline-none focus:border-white focus:ring-2 focus:ring-white/30 transition duration-200"
                                placeholder="Ulangi password baru"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 top-3.5 text-white/60 hover:text-white transition">
                                <span x-show="!show">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </span>
                                <span x-show="show" style="display: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Tips Password -->
                    <div class="bg-[#051F20]/30 border border-[#235347]/50 rounded-xl p-3 text-xs text-white/60 space-y-1">
                        <p class="font-medium text-white/80 mb-1">Tips password kuat:</p>
                        <p>• Minimal 8 karakter</p>
                        <p>• Kombinasikan huruf besar, kecil, angka & simbol</p>
                        <p>• Jangan gunakan info pribadi</p>
                    </div>

                    <!-- TOMBOL SIMPAN -->
                    <button type="submit" :disabled="loading"
                            class="w-full py-3 rounded-xl mt-2 bg-[#235347] text-white font-semibold text-sm hover:bg-[#8EB69B] hover:text-[#0B2B26] transition duration-300 active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed shadow-lg shadow-[#051F20]/20">
                        <span x-show="!loading">Simpan Password Baru ✓</span>
                        <span x-show="loading" class="flex items-center justify-center gap-2" style="display: none;">
                            <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menyimpan...
                        </span>
                    </button>

                    <!-- LINK KEMBALI -->
                    <div class="text-center mt-3 text-sm text-white/60">
                        <a href="{{ route('password.direct.request') }}" class="hover:text-white transition">
                            ← Kembali ke verifikasi email
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
