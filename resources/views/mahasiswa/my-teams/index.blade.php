<x-app-layout>

@push('styles')
<style>
    html, body {
        background-color: #0D3B36 !important;
    }
    #page-bg {
        background-color: #0D3B36 !important;
        position: relative;
    }
</style>
@endpush
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-[#1E293B] leading-tight">
                    {{ __('My Teams') }}
                </h2>
                <p class="text-sm text-[#64748B]">{{ __('Kelola semua lamaran dan tim lombamu dalam satu dashboard') }}</p>
            </div>
            <div class="flex gap-2">
                @if($mahasiswa)
                <a href="{{ route('mahasiswa.team.create') }}" class="px-5 py-2.5 bg-white text-[#4F7EF7] border border-[#4F7EF7] text-sm font-bold rounded-xl hover:bg-[#EFF6FF] transition">
                    Buat Tim Baru
                </a>
                @endif
                <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-5 py-2.5 bg-[#4F7EF7] text-white text-sm font-bold rounded-xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                    Cari Tim Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Sticky Flash Messages -->
            <div class="sticky top-4 z-40 space-y-3" x-data="{ tampil: true }" x-show="tampil" x-init="setTimeout(() => tampil = false, 5000)">
                @if(session('success'))
                    <div class="p-4 bg-[#D1FAE5] border border-[#10B981]/30 rounded-2xl flex items-center justify-between gap-3 text-[#065F46] shadow-lg animate-bounce-subtle">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">✅</span>
                            <p class="text-sm font-semibold">{{ session('success') }}</p>
                        </div>
                        <button @click="tampil = false" class="text-[#065F46]/50 hover:text-[#065F46]">✕</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center justify-between gap-3 text-red-600 shadow-lg">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">❌</span>
                            <p class="text-sm font-semibold">{{ session('error') }}</p>
                        </div>
                        <button @click="tampil = false" class="text-red-600/50 hover:text-red-600">✕</button>
                    </div>
                @endif
            </div>

            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Card 1: Lamaran Masuk (Khusus Ketua) -->
                @if($timSayaKetuai->count() > 0)
                <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 shadow-sm border-l-4 border-l-amber-400">
                    <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center text-2xl">
                        📨
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-amber-500">{{ $totalLamaranMasuk }}</span>
                        <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Lamaran Masuk</span>
                    </div>
                </div>
                @else
                <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 opacity-75">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-2xl">
                        👥
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-[#64748B]">{{ $timSebagaiAnggota->count() }}</span>
                        <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Tim Diikuti</span>
                    </div>
                </div>
                @endif

                <!-- Card 2: Menunggu Review -->
                <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 shadow-sm relative">
                    <div class="w-12 h-12 rounded-full bg-[#EFF6FF] flex items-center justify-center text-2xl">
                        ⏳
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-[#4F7EF7]">{{ $lamaranPending->count() }}</span>
                        <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Lamaranku</span>
                    </div>
                    @if($lamaranPending->count() > 0)
                        <div class="absolute top-4 right-4 w-2 h-2 bg-[#4F7EF7] rounded-full animate-pulse"></div>
                    @endif
                </div>

                <!-- Card 3: Lamaran Diterima -->
                <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 shadow-sm">
                    <div class="w-12 h-12 rounded-full bg-[#F0FDF4] flex items-center justify-center text-2xl">
                        ✅
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-[#10B981]">{{ $lamaranDiterima->count() }}</span>
                        <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Diterima</span>
                    </div>
                </div>

                <!-- Card 4: Tim Dikelola -->
                @if($timSayaKetuai->count() > 0)
                <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 shadow-sm border-l-4 border-l-[#4F7EF7]">
                    <div class="w-12 h-12 rounded-full bg-[#EFF6FF] flex items-center justify-center text-2xl">
                        👑
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-[#4F7EF7]">{{ $timSayaKetuai->count() }}</span>
                        <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Tim Dikelola</span>
                    </div>
                </div>
                @else
                <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 shadow-sm">
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center text-2xl">
                        ❌
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-red-400">{{ $lamaranDitolak->count() }}</span>
                        <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Ditolak</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- TABS SECTION -->
            <div x-data="{ tab: '{{ $totalLamaranMasuk > 0 ? 'lamaran-masuk' : ($timSayaKetuai->count() > 0 ? 'tim-kelola' : ($lamaranPending->count() > 0 ? 'pending' : 'aktif')) }}' }">
                <!-- Tab Navigation -->
                <div class="flex border-b border-[#E2E8F0] overflow-x-auto no-scrollbar mb-8 gap-2">
                    @if($timSayaKetuai->count() > 0)
                    <button @click="tab = 'lamaran-masuk'" :class="tab === 'lamaran-masuk' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-bold bg-white' : 'text-[#64748B] hover:text-[#1E293B]'" class="px-6 py-4 text-sm transition-all whitespace-nowrap flex items-center rounded-t-xl">
                        📨 Lamaran Masuk
                        @if($totalLamaranMasuk > 0)
                            <span class="ml-2 bg-red-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full animate-pulse">{{ $totalLamaranMasuk }}</span>
                        @endif
                    </button>
                    <button @click="tab = 'tim-kelola'" :class="tab === 'tim-kelola' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-bold bg-white' : 'text-[#64748B] hover:text-[#1E293B]'" class="px-6 py-4 text-sm transition-all whitespace-nowrap flex items-center rounded-t-xl">
                        👑 Tim Saya Kelola
                        <span class="ml-2 bg-[#4F7EF7] text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $timSayaKetuai->count() }}</span>
                    </button>
                    @endif

                    <button @click="tab = 'pending'" :class="tab === 'pending' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-bold bg-white' : 'text-[#64748B] hover:text-[#1E293B]'" class="px-6 py-4 text-sm transition-all whitespace-nowrap flex items-center rounded-t-xl">
                        ⏳ Menunggu Review
                        @if($lamaranPending->count() > 0)
                            <span class="ml-2 bg-amber-400 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $lamaranPending->count() }}</span>
                        @endif
                    </button>

                    <button @click="tab = 'aktif'" :class="tab === 'aktif' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-bold bg-white' : 'text-[#64748B] hover:text-[#1E293B]'" class="px-6 py-4 text-sm transition-all whitespace-nowrap flex items-center rounded-t-xl">
                        ✅ Tim yang Diikuti
                        @if($timSebagaiAnggota->count() > 0)
                            <span class="ml-2 bg-[#10B981] text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $timSebagaiAnggota->count() }}</span>
                        @endif
                    </button>

                    <button @click="tab = 'ditolak'" :class="tab === 'ditolak' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-bold bg-white' : 'text-[#64748B] hover:text-[#1E293B]'" class="px-6 py-4 text-sm transition-all whitespace-nowrap rounded-t-xl">
                        ❌ Ditolak
                    </button>

                    <button @click="tab = 'riwayat'" :class="tab === 'riwayat' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-bold bg-white' : 'text-[#64748B] hover:text-[#1E293B]'" class="px-6 py-4 text-sm transition-all whitespace-nowrap rounded-t-xl">
                        🕐 Riwayat
                    </button>
                </div>

                <!-- TAB CONTENT: LAMARAN MASUK (KETUA) -->
                @if($timSayaKetuai->count() > 0)
                <div x-show="tab === 'lamaran-masuk'" class="space-y-8">
                    @if($totalLamaranMasuk > 0)
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-sm text-[#64748B]">Total <span class="font-bold text-[#1E293B]">{{ $totalLamaranMasuk }}</span> lamaran menunggu keputusanmu</p>
                        </div>

                        @foreach($timSayaKetuai as $tim)
                            @php 
                                $lamaranTimIni = $lamaranMasuk->filter(fn($l) => $l->slot->id_tim === $tim->id);
                            @endphp

                            @if($lamaranTimIni->count() > 0)
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="bg-[#4F7EF7] text-white rounded-full px-4 py-1.5 text-xs font-black uppercase tracking-wider shadow-sm shadow-[#4F7EF7]/20">
                                        👑 {{ $tim->nama_tim }}
                                    </span>
                                    <span class="text-[10px] text-[#64748B] font-bold uppercase tracking-widest">— {{ $tim->lomba->nama }}</span>
                                    <span class="bg-amber-400 text-white text-[10px] font-black rounded-full px-2.5 py-0.5">{{ $lamaranTimIni->count() }} lamaran</span>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    @foreach($lamaranTimIni as $lamaran)
                                        <div class="bg-white border border-[#E2E8F0] rounded-[2rem] p-6 hover:shadow-xl transition-all group">
                                            <div class="flex flex-col md:flex-row justify-between gap-6">
                                                <!-- Kiri: Info Pelamar -->
                                                <div class="flex gap-5 flex-1">
                                                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4F7EF7] to-[#3B6EF0] text-white font-black text-2xl flex items-center justify-center shadow-lg group-hover:scale-105 transition">
                                                        {{ strtoupper(substr($lamaran->pelamar->name, 0, 2)) }}
                                                    </div>
                                                    <div class="space-y-1">
                                                        <h4 class="font-black text-[#1E293B] text-lg">{{ $lamaran->pelamar->name }}</h4>
                                                        <div class="flex flex-wrap gap-x-4 gap-y-1">
                                                            <p class="text-xs text-[#64748B] flex items-center gap-1">
                                                                <span class="text-[#4F7EF7]">📧</span> {{ $lamaran->pelamar->email }}
                                                            </p>
                                                            <p class="text-xs text-[#64748B] flex items-center gap-1">
                                                                <span class="text-[#4F7EF7]">🆔</span> NIM: {{ $lamaran->pelamar->mahasiswa->nim }}
                                                            </p>
                                                            <p class="text-xs text-[#64748B] flex items-center gap-1">
                                                                <span class="text-[#4F7EF7]">🎓</span> {{ $lamaran->pelamar->mahasiswa->program_studi }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Kanan: Info Posisi -->
                                                <div class="text-right">
                                                    <span class="inline-block bg-[#DBEAFE] text-[#1E3A6E] text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-widest border border-[#4F7EF7]/10">
                                                        {{ $lamaran->slot->posisi }}
                                                    </span>
                                                    <p class="text-[10px] text-[#94A3B8] font-bold mt-2 uppercase tracking-tighter">Dikirim {{ $lamaran->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>

                                            <!-- Keahlian Pelamar -->
                                            <div class="mt-6">
                                                <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-widest mb-3 flex items-center gap-2">
                                                    Keahlian Pelamar <span class="h-px bg-[#E2E8F0] flex-1"></span>
                                                </p>
                                                <div class="flex flex-wrap gap-2">
                                                    @php
                                                        $keahlianSlot = is_array($lamaran->slot->keahlian_dibutuhkan) ? $lamaran->slot->keahlian_dibutuhkan : (json_decode($lamaran->slot->keahlian_dibutuhkan, true) ?? []);
                                                        $keahlianPelamar = is_array($lamaran->pelamar->mahasiswa->keahlian) ? $lamaran->pelamar->mahasiswa->keahlian : (json_decode($lamaran->pelamar->mahasiswa->keahlian, true) ?? []);
                                                        $cocok = 0;
                                                        $keahlianSlotLower = array_map('strtolower', $keahlianSlot);
                                                    @endphp
                                                    @foreach($keahlianPelamar as $skill)
                                                        @php 
                                                            $isMatch = in_array(strtolower($skill), $keahlianSlotLower);
                                                            if($isMatch) $cocok++;
                                                        @endphp
                                                        <span class="text-[10px] font-bold rounded-full px-3 py-1 border transition-all
                                                            {{ $isMatch ? 'bg-[#D1FAE5] text-[#065F46] border-[#10B981]/30 shadow-sm shadow-green-100' : 'bg-[#F8FAFC] text-[#94A3B8] border-[#E2E8F0]' }}">
                                                            {{ $isMatch ? '✓' : '' }} {{ $skill }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                                @if(count($keahlianSlot) > 0)
                                                <div class="mt-3 flex items-center gap-2">
                                                    <div class="flex-1 h-1 bg-[#E2E8F0] rounded-full overflow-hidden">
                                                        <div class="h-full bg-[#10B981] rounded-full transition-all duration-1000" style="width: {{ ($cocok / count($keahlianSlot)) * 100 }}%"></div>
                                                    </div>
                                                    <p class="text-[10px] text-[#64748B] font-black uppercase">Matching: {{ round(($cocok / count($keahlianSlot)) * 100) }}%</p>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- Pesan Motivasi -->
                                            <div class="mt-6" x-data="{ buka: false }">
                                                <button @click="buka = !buka" class="text-[10px] font-black text-[#4F7EF7] hover:underline flex items-center gap-1 uppercase tracking-widest">
                                                    <span x-text="buka ? '▲ Sembunyikan Pesan' : '▼ Lihat Pesan Motivasi'"></span>
                                                </button>
                                                <div x-show="buka" x-transition class="mt-3 bg-[#EFF6FF] border-l-4 border-[#4F7EF7] rounded-xl p-4 text-sm text-[#1E293B] leading-relaxed italic shadow-inner">
                                                    "{{ $lamaran->pesan_motivasi }}"
                                                </div>
                                            </div>

                                            @if($lamaran->pelamar->mahasiswa->link_portofolio)
                                            <div class="mt-4 flex items-center gap-2">
                                                <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-widest">Portofolio:</p>
                                                <a href="{{ $lamaran->pelamar->mahasiswa->link_portofolio }}" target="_blank" class="text-[10px] font-black text-[#4F7EF7] hover:underline flex items-center gap-1">
                                                    Lihat Portofolio Pelamar ↗
                                                </a>
                                            </div>
                                            @endif

                                            <div class="mt-6 pt-6 border-t border-[#E2E8F0] flex flex-col sm:flex-row justify-between items-center gap-4">
                                                <a href="{{ route('mahasiswa.portfolio', $lamaran->pelamar->mahasiswa->nim) }}" class="text-[10px] font-black text-[#64748B] hover:text-[#4F7EF7] uppercase tracking-widest flex items-center gap-1">
                                                    👁 Lihat Profil Lengkap
                                                </a>

                                                <div class="flex gap-3 w-full sm:w-auto">
                                                    <!-- Modal Tolak -->
                                                    <div x-data="{ modal: false, alasan: '' }">
                                                        <button @click="modal = true" class="w-full sm:w-auto border border-red-300 text-red-500 text-[10px] font-black uppercase tracking-widest rounded-xl px-6 py-2.5 hover:bg-red-50 transition">
                                                            ❌ Tolak
                                                        </button>
                                                        <div x-show="modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4" x-cloak>
                                                            <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full shadow-2xl scale-up" @click.away="modal = false">
                                                                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">🚫</div>
                                                                <h4 class="text-2xl font-black text-[#1E293B] text-center mb-2">Tolak Lamaran?</h4>
                                                                <p class="text-sm text-[#64748B] text-center mb-8">Tolak lamaran dari <span class="font-bold text-[#1E293B]">{{ $lamaran->pelamar->name }}</span>? Berikan alasan agar pelamar bisa belajar lebih baik.</p>
                                                                
                                                                <textarea x-model="alasan" placeholder="Alasan penolakan (opsional)" class="w-full px-5 py-4 rounded-2xl border-[#E2E8F0] focus:border-[#4F7EF7] focus:ring-4 focus:ring-[#4F7EF7]/10 text-sm mb-6 resize-none" rows="3"></textarea>

                                                                <div class="flex gap-3">
                                                                    <button @click="modal = false" class="flex-1 py-4 bg-[#F1F5F9] text-[#64748B] font-black uppercase tracking-widest text-[10px] rounded-2xl">Batal</button>
                                                                    <form action="{{ route('mahasiswa.my-teams.lamaran.tolak', $lamaran->id) }}" method="POST" class="flex-1">
                                                                        @csrf
                                                                        <input type="hidden" name="alasan" :value="alasan">
                                                                        <button type="submit" class="w-full py-4 bg-red-500 text-white font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-lg shadow-red-200">Ya, Tolak</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Terima -->
                                                    <div x-data="{ modal: false }">
                                                        <button @click="modal = true" class="w-full sm:w-auto bg-[#10B981] text-white text-[10px] font-black uppercase tracking-widest rounded-xl px-8 py-2.5 shadow-lg shadow-green-200 hover:bg-[#059669] transition">
                                                            ✅ Terima
                                                        </button>
                                                        <div x-show="modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4" x-cloak>
                                                            <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full shadow-2xl scale-up" @click.away="modal = false">
                                                                <div class="w-20 h-20 bg-[#F0FDF4] text-[#10B981] rounded-full flex items-center justify-center text-4xl mx-auto mb-6">🎉</div>
                                                                <h4 class="text-2xl font-black text-[#1E293B] text-center mb-2">Terima Anggota Baru?</h4>
                                                                <p class="text-sm text-[#64748B] text-center mb-8">Terima <span class="font-bold text-[#1E293B]">{{ $lamaran->pelamar->name }}</span> sebagai anggota tim? Mahasiswa ini akan langsung masuk ke grup chat tim.</p>
                                                                
                                                                <div class="flex gap-3">
                                                                    <button @click="modal = false" class="flex-1 py-4 bg-[#F1F5F9] text-[#64748B] font-black uppercase tracking-widest text-[10px] rounded-2xl">Batal</button>
                                                                    <form action="{{ route('mahasiswa.my-teams.lamaran.terima', $lamaran->id) }}" method="POST" class="flex-1">
                                                                        @csrf
                                                                        <button type="submit" class="w-full py-4 bg-[#10B981] text-white font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-lg shadow-green-200">Ya, Terima</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-[#E2E8F0]">
                            <div class="w-24 h-24 bg-amber-50 rounded-full flex items-center justify-center text-5xl mx-auto mb-6">📨</div>
                            <h3 class="text-2xl font-black text-[#1E293B]">Belum ada lamaran masuk</h3>
                            <p class="text-sm text-[#64748B] mt-2 max-w-sm mx-auto">Tim-mu belum menerima lamaran baru. Pastikan slot tim terbuka agar mahasiswa lain bisa melamar.</p>
                        </div>
                    @endif
                </div>

                <!-- TAB CONTENT: TIM SAYA KELOLA (KETUA) -->
                <div x-show="tab === 'tim-kelola'" class="space-y-6">
                    @forelse($timSayaKetuai as $tim)
                        <div class="bg-white border border-[#E2E8F0] rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all border-t-8 border-t-[#4F7EF7]">
                            <div class="p-8">
                                <div class="flex flex-col md:flex-row justify-between gap-6 mb-8">
                                    <div>
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="px-3 py-1 bg-[#4F7EF7] text-white text-[10px] font-black rounded-full uppercase tracking-widest">👑 KETUA TIM</span>
                                            <span class="px-3 py-1 bg-white border border-[#E2E8F0] text-[#64748B] text-[10px] font-bold rounded-full uppercase tracking-widest">{{ $tim->lomba->nama }}</span>
                                        </div>
                                        <h3 class="text-3xl font-black text-[#1E293B]">{{ $tim->nama_tim }}</h3>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ route('mahasiswa.chat.show', $tim->id) }}" class="px-6 py-3 bg-[#10B981] text-white text-xs font-black uppercase tracking-widest rounded-2xl shadow-lg shadow-green-100 hover:bg-[#059669] transition">
                                            💬 Chat Grup
                                        </a>
                                        <a href="{{ route('mahasiswa.my-teams.show', $tim->id) }}" class="px-6 py-3 bg-[#F8FAFC] border border-[#E2E8F0] text-[#1E293B] text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-gray-50 transition">
                                            Detail
                                        </a>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Anggota Terdaftar -->
                                    <div>
                                        <h4 class="text-xs font-black text-[#1E293B] mb-4 uppercase tracking-widest flex items-center gap-2">
                                            <span class="w-8 h-8 rounded-lg bg-blue-50 text-[#4F7EF7] flex items-center justify-center">👥</span> 
                                            Anggota Aktif ({{ $tim->anggota->count() }})
                                        </h4>
                                        <div class="space-y-3">
                                            @foreach($tim->anggota as $member)
                                                <div class="flex items-center gap-4 p-4 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0]">
                                                    <div class="w-10 h-10 rounded-full bg-white text-[#4F7EF7] border border-[#4F7EF7]/20 flex items-center justify-center font-black text-sm shadow-sm">
                                                        {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                                    </div>
                                                    <div class="flex-1">
                                                        <h5 class="text-sm font-bold text-[#1E293B]">{{ $member->user->name }}</h5>
                                                        <p class="text-[10px] text-[#64748B] font-medium uppercase">{{ $member->user->email }} • {{ $member->mahasiswa->nim ?? '-' }}</p>
                                                    </div>
                                                    <span class="px-3 py-1 bg-white rounded-full text-[8px] font-black uppercase border border-[#E2E8F0]">
                                                        {{ $member->peran }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Slot & Lamaran -->
                                    <div>
                                        <h4 class="text-xs font-black text-[#1E293B] mb-4 uppercase tracking-widest flex items-center gap-2">
                                            <span class="w-8 h-8 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center">📥</span> 
                                            Status Slot Tim
                                        </h4>
                                        <div class="space-y-3">
                                            @foreach($tim->slots as $slot)
                                                @php $pendingCount = $slot->lamarans->where('status', 'pending')->count(); @endphp
                                                <div class="p-4 rounded-2xl border border-[#E2E8F0] {{ $slot->status == 'buka' ? 'bg-white' : 'bg-gray-50 opacity-60' }}">
                                                    <div class="flex justify-between items-start mb-2">
                                                        <h5 class="text-sm font-black text-[#1E293B]">{{ $slot->posisi }}</h5>
                                                        <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase {{ $slot->status == 'buka' ? 'bg-[#D1FAE5] text-[#065F46]' : 'bg-red-50 text-red-500' }}">
                                                            {{ $slot->status }}
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-between items-center">
                                                        <p class="text-[10px] text-[#64748B] font-bold uppercase">{{ $slot->lamarans->where('status', 'diterima')->count() }} / {{ $slot->jumlah_slot }} Terisi</p>
                                                        @if($pendingCount > 0)
                                                            <button @click="tab = 'lamaran-masuk'" class="text-[10px] font-black text-[#4F7EF7] hover:underline uppercase tracking-widest">
                                                                ⚡ {{ $pendingCount }} Lamaran Pending
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if($tim->slots->count() == 0)
                                                <div class="p-8 border-2 border-dashed border-[#E2E8F0] rounded-3xl text-center">
                                                    <p class="text-[10px] text-[#94A3B8] font-black uppercase tracking-widest">Tidak ada slot dibuka</p>
                                                    <a href="{{ route('mahasiswa.team.manage', $tim->id) }}" class="text-[10px] text-[#4F7EF7] font-black uppercase mt-2 inline-block">Kelola Tim →</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-[#E2E8F0]">
                            <p class="text-[#64748B] font-medium">Anda belum membuat tim untuk lomba manapun.</p>
                        </div>
                    @endforelse
                </div>
                @endif

                <!-- TAB CONTENT: PENDING (LAMARANKU) -->
                <div x-show="tab === 'pending'" class="space-y-4">
                    @forelse($lamaranPending as $lamaran)
                        <div class="bg-white border border-amber-200 rounded-[2rem] p-6 shadow-sm hover:shadow-lg transition-all">
                            <div class="flex flex-col md:flex-row justify-between items-start gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-wider">
                                            ⏳ Menunggu Review
                                        </span>
                                    </div>
                                    <h3 class="text-2xl font-black text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                    <p class="text-sm font-black text-[#4F7EF7] uppercase tracking-widest">Posisi: {{ $lamaran->slot->posisi }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] text-[#94A3B8] font-black uppercase tracking-widest">Dikirim pada</p>
                                    <p class="text-sm font-black text-[#1E293B]">{{ $lamaran->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="bg-[#F8FAFC] rounded-[1.5rem] p-5 mt-5 grid grid-cols-1 md:grid-cols-2 gap-4 border border-[#E2E8F0]">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-xl border border-[#E2E8F0]">🏆</div>
                                    <div>
                                        <p class="text-[10px] text-[#64748B] font-black uppercase tracking-widest">Lomba</p>
                                        <p class="text-sm font-bold text-[#1E293B]">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                        <p class="text-[10px] text-[#64748B] font-bold uppercase">{{ $lamaran->slot->tim->lomba->kategori }} • {{ $lamaran->slot->tim->lomba->tingkat }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-xl border border-[#E2E8F0]">📅</div>
                                    <div>
                                        <p class="text-[10px] text-[#64748B] font-black uppercase tracking-widest">Deadline Lomba</p>
                                        <p class="text-sm font-black {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7 ? 'text-red-500' : 'text-[#1E293B]' }}">
                                            {{ $lamaran->slot->tim->lomba->deadline->format('d M Y') }}
                                            @if($lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7)
                                                <span class="ml-2 text-[8px] font-black bg-red-50 px-2 py-1 rounded-full text-red-500">⚡ {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) }} HARI LAGI</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-center mt-8 pt-8 border-t border-[#E2E8F0] gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#4F7EF7] to-[#3B6EF0] flex items-center justify-center text-white text-xs font-black shadow-lg">
                                        {{ strtoupper(substr($lamaran->slot->tim->ketua->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-[#94A3B8] font-black uppercase tracking-widest">Ketua Tim</p>
                                        <p class="text-xs font-black text-[#1E293B]">{{ $lamaran->slot->tim->ketua->name }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                    <div x-data="{ konfirmasi: false }">
                                        <button @click="konfirmasi = true" class="w-full sm:w-auto border border-red-300 text-red-500 text-[10px] font-black uppercase tracking-widest rounded-xl px-8 py-3 hover:bg-red-50 transition">
                                            Batalkan Lamaran
                                        </button>
                                        
                                        <div x-show="konfirmasi" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4" x-cloak>
                                            <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full shadow-2xl scale-up text-center" @click.away="konfirmasi = false">
                                                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">⚠️</div>
                                                <h4 class="text-2xl font-black text-[#1E293B] mb-2">Batal Melamar?</h4>
                                                <p class="text-sm text-[#64748B] mb-8">Apakah kamu yakin ingin menarik kembali lamaran untuk tim <span class="font-bold text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</span>?</p>
                                                <div class="flex gap-3">
                                                    <button @click="konfirmasi = false" class="flex-1 py-4 bg-[#F1F5F9] text-[#64748B] font-black uppercase tracking-widest text-[10px] rounded-2xl">Kembali</button>
                                                    <form action="{{ route('mahasiswa.my-teams.cancel', $lamaran->id) }}" method="POST" class="flex-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full py-4 bg-red-500 text-white font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-lg shadow-red-200">Ya, Batalkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-[#E2E8F0]">
                            <div class="w-24 h-24 bg-[#FFFBEB] rounded-full flex items-center justify-center text-5xl mx-auto mb-6">⏳</div>
                            <h3 class="text-2xl font-black text-[#1E293B]">Belum ada lamaran pending</h3>
                            <p class="text-sm text-[#64748B] mt-2 mb-8">Lamaran yang kamu kirim melalui Tim Finder akan muncul di sini.</p>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-4 bg-[#4F7EF7] text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                                Jelajahi Tim Finder →
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: AKTIF (TIM YANG DIIKUTI) -->
                <div x-show="tab === 'aktif'" class="space-y-6">
                    @forelse($timSebagaiAnggota as $anggota)
                        <div class="bg-white border border-[#E2E8F0] rounded-[2.5rem] overflow-hidden hover:shadow-xl transition-all group">
                            <!-- Header -->
                            <div class="bg-[#F8FAFC] px-8 py-6 border-b border-[#E2E8F0] group-hover:bg-[#EFF6FF] transition">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="px-3 py-1 bg-white border border-[#E2E8F0] text-[#64748B] text-[9px] font-black rounded uppercase tracking-widest">
                                                {{ $anggota->tim->lomba->kategori }}
                                            </span>
                                            <span class="px-3 py-1 rounded text-[9px] font-black uppercase tracking-widest bg-[#D1FAE5] text-[#065F46]">
                                                ● AKTIF
                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-black text-[#1E293B]">{{ $anggota->tim->nama_tim }}</h3>
                                        <p class="text-sm font-bold text-[#4F7EF7] uppercase tracking-widest">{{ $anggota->tim->lomba->nama }}</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <span class="px-4 py-2 bg-white border border-[#E2E8F0] text-[#64748B] rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                                            👤 ANGGOTA TIM
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-8">
                                <div class="grid grid-cols-3 gap-6 bg-[#F8FAFC] rounded-2xl p-6 mb-8 border border-[#E2E8F0]">
                                    <div class="text-center">
                                        <p class="text-xl font-black text-[#1E293B]">{{ $anggota->tim->lomba->tingkat }}</p>
                                        <p class="text-[9px] text-[#64748B] font-black uppercase tracking-widest mt-1">Tingkat</p>
                                    </div>
                                    <div class="text-center border-x border-[#E2E8F0]">
                                        <p class="text-xl font-black text-[#1E293B]">{{ $anggota->tim->lomba->deadline->format('d M') }}</p>
                                        <p class="text-[9px] text-[#64748B] font-black uppercase tracking-widest mt-1">Deadline</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-xl font-black text-[#10B981]">{{ $anggota->tim->anggota->count() }}/{{ $anggota->tim->maks_anggota }}</p>
                                        <p class="text-[9px] text-[#64748B] font-black uppercase tracking-widest mt-1">Kapasitas</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="text-[10px] font-black text-[#1E293B] mb-4 uppercase tracking-widest flex items-center gap-2">Rekan Tim</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($anggota->tim->anggota as $member)
                                            <div class="flex items-center gap-3 p-3 rounded-2xl bg-white border border-[#E2E8F0] hover:border-[#4F7EF7]/30 transition group/member">
                                                <div class="w-8 h-8 rounded-full bg-[#F1F5F9] text-[#64748B] flex items-center justify-center font-black text-[10px] group-hover/member:bg-[#4F7EF7] group-hover/member:text-white transition">
                                                    {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5 class="text-xs font-bold text-[#1E293B] truncate">{{ $member->user->name }}</h5>
                                                    <p class="text-[8px] text-[#94A3B8] font-bold uppercase">{{ $member->peran }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="bg-white px-8 py-6 border-t border-[#E2E8F0] flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full border-2 border-[#EFF6FF] flex items-center justify-center text-xs font-black bg-[#4F7EF7] text-white">
                                        {{ strtoupper(substr($anggota->tim->ketua->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-[#94A3B8] font-black uppercase">Ketua Tim</p>
                                        <p class="text-xs font-black text-[#1E293B]">{{ $anggota->tim->ketua->name }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                    <a href="{{ route('mahasiswa.chat.show', $anggota->tim->id) }}" class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-8 py-3 bg-[#10B981] text-white text-[10px] font-black uppercase tracking-widest rounded-xl shadow-lg shadow-green-100 hover:bg-[#059669] transition">
                                        💬 Chat Tim
                                    </a>
                                    <a href="{{ route('mahasiswa.my-teams.show', $anggota->tim->id) }}" class="flex-1 sm:flex-none flex items-center justify-center px-8 py-3 bg-[#F8FAFC] border border-[#E2E8F0] text-[#1E293B] text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-50 transition">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-[#E2E8F0]">
                            <div class="w-24 h-24 bg-[#EFF6FF] rounded-full flex items-center justify-center text-5xl mx-auto mb-6">👥</div>
                            <h3 class="text-2xl font-black text-[#1E293B]">Belum bergabung di tim manapun</h3>
                            <p class="text-sm text-[#64748B] mt-2 mb-8">Mulai jelajahi tim-tim yang mencari anggota atau buat timmu sendiri.</p>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-4 bg-[#4F7EF7] text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                                Cari Tim Sekarang →
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: DITOLAK (LAMARANKU) -->
                <div x-show="tab === 'ditolak'" class="space-y-4">
                    @forelse($lamaranDitolak as $lamaran)
                        <div class="bg-white border border-red-100 rounded-[2rem] p-8 shadow-sm hover:shadow-md transition">
                            <div class="flex flex-col md:flex-row items-start gap-6">
                                <div class="w-16 h-16 rounded-2xl bg-red-50 text-red-500 flex items-center justify-center text-3xl flex-shrink-0 shadow-inner">
                                    ❌
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-col md:flex-row justify-between items-start mb-4 gap-2">
                                        <span class="bg-red-50 text-red-500 border border-red-200 text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-wider">
                                            Lamaran Ditolak
                                        </span>
                                        <span class="text-[10px] text-[#94A3B8] font-bold uppercase tracking-widest">Diproses: {{ $lamaran->processed_at ? $lamaran->processed_at->format('d M Y') : $lamaran->updated_at->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="text-2xl font-black text-[#1E293B] mb-1">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                    <p class="text-sm font-bold text-[#64748B] uppercase tracking-widest mb-4">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                    <p class="text-xs text-[#64748B] font-bold uppercase">Posisi: <span class="text-red-500">{{ $lamaran->slot->posisi }}</span></p>

                                    @if($lamaran->alasan_penolakan)
                                        <div class="mt-6 bg-red-50 rounded-2xl p-6 border border-red-100 relative">
                                            <span class="absolute -top-3 left-6 px-3 bg-red-500 text-white text-[8px] font-black uppercase tracking-widest rounded-full py-1">Pesan dari Ketua</span>
                                            <p class="text-sm text-red-700 italic leading-relaxed">"{{ $lamaran->alasan_penolakan }}"</p>
                                        </div>
                                    @else
                                        <p class="text-xs text-[#94A3B8] italic mt-6 border-l-4 border-[#E2E8F0] pl-4">Ketua tim tidak menyertakan alasan penolakan.</p>
                                    @endif

                                    <div class="mt-8 pt-6 border-t border-[#E2E8F0]">
                                        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="text-[10px] font-black text-[#4F7EF7] uppercase tracking-widest hover:underline flex items-center gap-1">
                                            Cari Tim Lain yang Sesuai →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-[#E2E8F0]">
                            <p class="text-[#64748B] font-bold uppercase tracking-widest text-[10px]">Tidak ada lamaran yang ditolak.</p>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: RIWAYAT -->
                <div x-show="tab === 'riwayat'" class="space-y-4">
                    @php
                        $riwayat = $lamaranPending->filter(fn($l) => $l->slot->batas_waktu < now());
                    @endphp
                    @forelse($riwayat as $lamaran)
                        <div class="bg-white border border-[#E2E8F0] rounded-[2rem] p-6 opacity-60 grayscale hover:grayscale-0 transition">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-[#F1F5F9] text-[#64748B] text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-wider">
                                    🕐 Kadaluarsa
                                </span>
                                <span class="text-[10px] text-[#94A3B8] font-bold">Terkirim: {{ $lamaran->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-xl font-black text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                            <p class="text-sm font-bold text-[#64748B] uppercase tracking-widest">{{ $lamaran->slot->tim->lomba->nama }}</p>
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl border border-dashed border-[#E2E8F0]">
                                <p class="text-[10px] text-[#94A3B8] font-bold uppercase tracking-widest text-center italic">Slot ini sudah ditutup sebelum lamaranmu diproses.</p>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-[#E2E8F0]">
                            <p class="text-[#64748B] font-bold uppercase tracking-widest text-[10px]">Belum ada riwayat lamaran kadaluarsa.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .scale-up {
            animation: scale-up 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        @keyframes scale-up {
            from { transform: scale(0.95); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s infinite;
        }

        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
    </style>
</x-app-layout>
