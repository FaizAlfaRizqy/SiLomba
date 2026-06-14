<x-app-layout>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    html, body {
        background-color: #16534C !important;
    }
    #page-bg {
        background-color: #16534C !important;
        position: relative;
    }
    .custom-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }
    .custom-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px -5px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

    <div class="py-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Actions Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-end gap-3 pt-4">
                @if($mahasiswa)
                <a href="{{ route('mahasiswa.team.create') }}" class="px-6 py-2.5 bg-white/10 text-white border border-white/20 text-sm font-bold rounded-xl hover:bg-white/20 backdrop-blur-md transition">
                    Buat Tim Baru
                </a>
                @endif
                <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-6 py-2.5 bg-[#48A89A] text-white text-sm font-bold rounded-xl shadow-lg shadow-[#48A89A]/20 hover:bg-[#CBEFEB] hover:text-[#00524D] transition">
                    Cari Tim Baru
                </a>
            </div>
            
            <!-- Sticky Flash Messages -->
            <div class="sticky top-4 z-40 space-y-3" x-data="{ tampil: true }" x-show="tampil" x-init="setTimeout(() => tampil = false, 5000)">
                @if(session('success'))
                    <div class="p-4 bg-[#D1FAE5] border border-[#10B981]/30 rounded-2xl flex items-center justify-between gap-3 text-[#065F46] shadow-lg">
                        <div class="flex items-center gap-3">
                            <p class="text-sm font-bold">{{ session('success') }}</p>
                        </div>
                        <button @click="tampil = false" class="text-[#065F46]/50 hover:text-[#065F46]">✕</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center justify-between gap-3 text-red-600 shadow-lg">
                        <div class="flex items-center gap-3">
                            <p class="text-sm font-bold">{{ session('error') }}</p>
                        </div>
                        <button @click="tampil = false" class="text-red-600/50 hover:text-red-600">✕</button>
                    </div>
                @endif
            </div>

            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                <!-- Card 1: Lamaran Masuk (Khusus Ketua) -->
                @if($timSayaKetuai->count() > 0)
                <div class="custom-card p-6 flex flex-col justify-center">
                    <div>
                        <span class="block text-3xl font-extrabold text-[#00524D]">{{ $totalLamaranMasuk }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block mt-1">Lamaran Masuk</span>
                    </div>
                </div>
                @else
                <div class="custom-card p-6 flex flex-col justify-center opacity-75">
                    <div>
                        <span class="block text-3xl font-extrabold text-[#00524D]">{{ $timSebagaiAnggota->count() }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block mt-1">Tim Diikuti</span>
                    </div>
                </div>
                @endif

                <!-- Card 2: Menunggu Review -->
                <div class="custom-card p-6 flex flex-col justify-center relative">
                    <div>
                        <span class="block text-3xl font-extrabold text-[#48A89A]">{{ $lamaranPending->count() }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block mt-1">Lamaranku</span>
                    </div>
                    @if($lamaranPending->count() > 0)
                        <div class="absolute top-6 right-6 w-2.5 h-2.5 bg-[#48A89A] rounded-full animate-pulse"></div>
                    @endif
                </div>

                <!-- Card 3: Lamaran Diterima -->
                <div class="custom-card p-6 flex flex-col justify-center">
                    <div>
                        <span class="block text-3xl font-extrabold text-emerald-600">{{ $lamaranDiterima->count() }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block mt-1">Diterima</span>
                    </div>
                </div>

                <!-- Card 4: Tim Dikelola -->
                @if($timSayaKetuai->count() > 0)
                <div class="custom-card p-6 flex flex-col justify-center">
                    <div>
                        <span class="block text-3xl font-extrabold text-[#48A89A]">{{ $timSayaKetuai->count() }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block mt-1">Tim Dikelola</span>
                    </div>
                </div>
                @else
                <div class="custom-card p-6 flex flex-col justify-center">
                    <div>
                        <span class="block text-3xl font-extrabold text-rose-500">{{ $lamaranDitolak->count() }}</span>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider block mt-1">Ditolak</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- TABS SECTION -->
            <div x-data="{ tab: '{{ $totalLamaranMasuk > 0 ? 'lamaran-masuk' : ($timSayaKetuai->count() > 0 ? 'tim-kelola' : ($lamaranPending->count() > 0 ? 'pending' : 'aktif')) }}' }">
                <!-- Tab Navigation Modern -->
                <div class="flex bg-white/10 p-1.5 rounded-2xl overflow-x-auto no-scrollbar mb-8 gap-2 backdrop-blur-sm border border-white/20">
                    @if($timSayaKetuai->count() > 0)
                    <button @click="tab = 'lamaran-masuk'" :class="tab === 'lamaran-masuk' ? 'bg-[#48A89A] text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10'" class="px-6 py-3 text-sm font-bold transition-all whitespace-nowrap flex items-center rounded-xl">
                        Lamaran Masuk
                        @if($totalLamaranMasuk > 0)
                            <span class="ml-2 bg-rose-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full animate-pulse">{{ $totalLamaranMasuk }}</span>
                        @endif
                    </button>
                    <button @click="tab = 'tim-kelola'" :class="tab === 'tim-kelola' ? 'bg-[#48A89A] text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10'" class="px-6 py-3 text-sm font-bold transition-all whitespace-nowrap flex items-center rounded-xl">
                        Tim Saya Kelola
                        <span class="ml-2 bg-white/20 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $timSayaKetuai->count() }}</span>
                    </button>
                    @endif

                    <button @click="tab = 'pending'" :class="tab === 'pending' ? 'bg-[#48A89A] text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10'" class="px-6 py-3 text-sm font-bold transition-all whitespace-nowrap flex items-center rounded-xl">
                        Menunggu Review
                        @if($lamaranPending->count() > 0)
                            <span class="ml-2 bg-amber-400 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $lamaranPending->count() }}</span>
                        @endif
                    </button>

                    <button @click="tab = 'aktif'" :class="tab === 'aktif' ? 'bg-[#48A89A] text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10'" class="px-6 py-3 text-sm font-bold transition-all whitespace-nowrap flex items-center rounded-xl">
                        Tim yang Diikuti
                        @if($timSebagaiAnggota->count() > 0)
                            <span class="ml-2 bg-white/20 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $timSebagaiAnggota->count() }}</span>
                        @endif
                    </button>

                    <button @click="tab = 'ditolak'" :class="tab === 'ditolak' ? 'bg-[#48A89A] text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10'" class="px-6 py-3 text-sm font-bold transition-all whitespace-nowrap rounded-xl">
                        Ditolak
                    </button>

                    <button @click="tab = 'riwayat'" :class="tab === 'riwayat' ? 'bg-[#48A89A] text-white shadow-md' : 'text-white/70 hover:text-white hover:bg-white/10'" class="px-6 py-3 text-sm font-bold transition-all whitespace-nowrap rounded-xl">
                        Riwayat
                    </button>
                </div>

                <!-- TAB CONTENT: LAMARAN MASUK (KETUA) -->
                @if($timSayaKetuai->count() > 0)
                <div x-show="tab === 'lamaran-masuk'" class="space-y-8">
                    @if($totalLamaranMasuk > 0)
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-sm text-white/80">Total <span class="font-bold text-white">{{ $totalLamaranMasuk }}</span> lamaran menunggu keputusanmu</p>
                        </div>

                        @foreach($timSayaKetuai as $tim)
                            @php 
                                $lamaranTimIni = $lamaranMasuk->filter(fn($l) => $l->slot->id_tim === $tim->id);
                            @endphp

                            @if($lamaranTimIni->count() > 0)
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="bg-[#00524D] text-[#CBEFEB] rounded-full px-4 py-1.5 text-xs font-black uppercase tracking-wider shadow-sm border border-[#48A89A]/30">
                                        {{ $tim->nama_tim }}
                                    </span>
                                    <span class="text-[10px] text-[#CBEFEB]/80 font-bold uppercase tracking-widest">— {{ $tim->lomba->nama }}</span>
                                    <span class="bg-[#48A89A] text-white text-[10px] font-black rounded-full px-2.5 py-0.5">{{ $lamaranTimIni->count() }} lamaran</span>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    @foreach($lamaranTimIni as $lamaran)
                                        <div class="custom-card p-6">
                                            <div class="flex flex-col md:flex-row justify-between gap-6">
                                                <!-- Kiri: Info Pelamar -->
                                                <div class="flex gap-5 flex-1">
                                                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#48A89A] to-[#00524D] text-white font-black text-2xl flex items-center justify-center shadow-lg transition">
                                                        {{ strtoupper(substr($lamaran->pelamar->name, 0, 2)) }}
                                                    </div>
                                                    <div class="space-y-1">
                                                        <h4 class="font-black text-[#00524D] text-lg">{{ $lamaran->pelamar->name }}</h4>
                                                        <div class="flex flex-wrap gap-x-4 gap-y-1">
                                                            <p class="text-xs text-gray-500 font-medium">
                                                                {{ $lamaran->pelamar->email }}
                                                            </p>
                                                            <p class="text-xs text-gray-500 font-medium">
                                                                NIM: {{ $lamaran->pelamar->mahasiswa->nim }}
                                                            </p>
                                                            <p class="text-xs text-gray-500 font-medium">
                                                                {{ $lamaran->pelamar->mahasiswa->program_studi }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Kanan: Info Posisi -->
                                                <div class="text-right">
                                                    <span class="inline-block bg-[#CBEFEB] text-[#00524D] text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-widest border border-[#48A89A]/20">
                                                        {{ $lamaran->slot->posisi }}
                                                    </span>
                                                    <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase tracking-tighter">Dikirim {{ $lamaran->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>

                                            <!-- Keahlian Pelamar -->
                                            <div class="mt-6">
                                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-3 flex items-center gap-2">
                                                    Keahlian Pelamar <span class="h-px bg-gray-100 flex-1"></span>
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
                                                        <span class="text-[10px] font-bold rounded-lg px-3 py-1 transition-all
                                                            {{ $isMatch ? 'bg-[#CBEFEB] text-[#00524D] border border-[#48A89A]/30' : 'bg-gray-50 text-gray-500 border border-gray-200' }}">
                                                            {{ $skill }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                                @if(count($keahlianSlot) > 0)
                                                <div class="mt-3 flex items-center gap-2">
                                                    <div class="flex-1 h-1 bg-gray-100 rounded-full overflow-hidden">
                                                        <div class="h-full bg-[#48A89A] rounded-full transition-all duration-1000" style="width: {{ ($cocok / count($keahlianSlot)) * 100 }}%"></div>
                                                    </div>
                                                    <p class="text-[10px] text-gray-500 font-black uppercase">Matching: {{ round(($cocok / count($keahlianSlot)) * 100) }}%</p>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- Pesan Motivasi -->
                                            <div class="mt-6" x-data="{ buka: false }">
                                                <button @click="buka = !buka" class="text-[10px] font-black text-[#48A89A] hover:underline flex items-center gap-1 uppercase tracking-widest">
                                                    <span x-text="buka ? 'Sembunyikan Pesan' : 'Lihat Pesan Motivasi'"></span>
                                                </button>
                                                <div x-show="buka" x-transition class="mt-3 bg-[#CBEFEB]/30 border-l-4 border-[#48A89A] rounded-xl p-4 text-sm text-[#00524D] leading-relaxed italic">
                                                    "{{ $lamaran->pesan_motivasi }}"
                                                </div>
                                            </div>

                                            @if($lamaran->pelamar->mahasiswa->link_portofolio)
                                            <div class="mt-4 flex items-center gap-2">
                                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">Portofolio:</p>
                                                <a href="{{ $lamaran->pelamar->mahasiswa->link_portofolio }}" target="_blank" class="text-[10px] font-black text-[#48A89A] hover:underline flex items-center gap-1">
                                                    Lihat Portofolio Pelamar
                                                </a>
                                            </div>
                                            @endif

                                            <div class="mt-6 pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                                                <a href="{{ route('mahasiswa.portfolio', $lamaran->pelamar->mahasiswa->nim) }}" class="text-[10px] font-black text-gray-500 hover:text-[#48A89A] uppercase tracking-widest flex items-center gap-1">
                                                    Lihat Profil Lengkap
                                                </a>

                                                <div class="flex gap-3 w-full sm:w-auto">
                                                    <!-- Modal Tolak -->
                                                    <div x-data="{ modal: false, alasan: '' }">
                                                        <button @click="modal = true" class="w-full sm:w-auto border border-rose-200 text-rose-500 text-[10px] font-black uppercase tracking-widest rounded-xl px-6 py-2.5 hover:bg-rose-50 transition">
                                                            Tolak
                                                        </button>
                                                        <div x-show="modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4" x-cloak>
                                                            <div class="bg-white rounded-3xl p-10 max-w-md w-full shadow-2xl scale-up" @click.away="modal = false">
                                                                <h4 class="text-2xl font-black text-[#00524D] text-center mb-2">Tolak Lamaran?</h4>
                                                                <p class="text-sm text-gray-500 text-center mb-8">Tolak lamaran dari <span class="font-bold text-[#00524D]">{{ $lamaran->pelamar->name }}</span>? Berikan alasan agar pelamar bisa belajar lebih baik.</p>
                                                                
                                                                <textarea x-model="alasan" placeholder="Alasan penolakan (opsional)" class="w-full px-5 py-4 rounded-xl border border-gray-200 focus:border-[#48A89A] focus:ring-2 focus:ring-[#48A89A]/20 text-sm mb-6 resize-none outline-none" rows="3"></textarea>

                                                                <div class="flex gap-3">
                                                                    <button @click="modal = false" class="flex-1 py-4 bg-gray-100 text-gray-500 font-black uppercase tracking-widest text-[10px] rounded-xl">Batal</button>
                                                                    <form action="{{ route('mahasiswa.my-teams.lamaran.tolak', $lamaran->id) }}" method="POST" class="flex-1">
                                                                        @csrf
                                                                        <input type="hidden" name="alasan" :value="alasan">
                                                                        <button type="submit" class="w-full py-4 bg-rose-500 text-white font-black uppercase tracking-widest text-[10px] rounded-xl shadow-lg shadow-rose-200">Ya, Tolak</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Terima -->
                                                    <div x-data="{ modal: false }">
                                                        <button @click="modal = true" class="w-full sm:w-auto bg-[#48A89A] text-white text-[10px] font-black uppercase tracking-widest rounded-xl px-8 py-2.5 shadow-lg shadow-[#48A89A]/30 hover:bg-[#00524D] transition">
                                                            Terima
                                                        </button>
                                                        <div x-show="modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4" x-cloak>
                                                            <div class="bg-white rounded-3xl p-10 max-w-md w-full shadow-2xl scale-up" @click.away="modal = false">
                                                                <h4 class="text-2xl font-black text-[#00524D] text-center mb-2">Terima Anggota Baru?</h4>
                                                                <p class="text-sm text-gray-500 text-center mb-8">Terima <span class="font-bold text-[#00524D]">{{ $lamaran->pelamar->name }}</span> sebagai anggota tim? Mahasiswa ini akan langsung masuk ke grup chat tim.</p>
                                                                
                                                                <div class="flex gap-3">
                                                                    <button @click="modal = false" class="flex-1 py-4 bg-gray-100 text-gray-500 font-black uppercase tracking-widest text-[10px] rounded-xl">Batal</button>
                                                                    <form action="{{ route('mahasiswa.my-teams.lamaran.terima', $lamaran->id) }}" method="POST" class="flex-1">
                                                                        @csrf
                                                                        <button type="submit" class="w-full py-4 bg-[#48A89A] text-white font-black uppercase tracking-widest text-[10px] rounded-xl shadow-lg shadow-[#48A89A]/30 hover:bg-[#00524D]">Ya, Terima</button>
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
                        <div class="custom-card p-20 text-center">
                            <h3 class="text-2xl font-black text-[#00524D]">Belum ada lamaran masuk</h3>
                            <p class="text-sm text-gray-500 mt-2 max-w-sm mx-auto">Tim-mu belum menerima lamaran baru. Pastikan slot tim terbuka agar mahasiswa lain bisa melamar.</p>
                        </div>
                    @endif
                </div>

                <!-- TAB CONTENT: TIM SAYA KELOLA (KETUA) -->
                <div x-show="tab === 'tim-kelola'" class="space-y-6">
                    @forelse($timSayaKetuai as $tim)
                        <div class="custom-card overflow-hidden group/team">
                            <div class="p-8">
                                <div class="flex flex-col md:flex-row justify-between gap-6 mb-8">
                                    <div>
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="px-3 py-1 bg-[#00524D] text-white text-[10px] font-black rounded-full uppercase tracking-widest">KETUA TIM</span>
                                            <span class="px-3 py-1 bg-white border border-[#48A89A]/30 text-[#00524D] text-[10px] font-bold rounded-full uppercase tracking-widest">{{ $tim->lomba->nama }}</span>
                                        </div>
                                        <h3 class="text-3xl font-black text-[#00524D]">{{ $tim->nama_tim }}</h3>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ route('mahasiswa.chat.show', $tim->id) }}" class="px-6 py-3 bg-[#48A89A] text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg shadow-[#48A89A]/20 hover:bg-[#00524D] transition">
                                            Chat Grup
                                        </a>
                                        <a href="{{ route('mahasiswa.my-teams.show', $tim->id) }}" class="px-6 py-3 bg-[#F8FAFC] border border-gray-200 text-[#00524D] text-xs font-black uppercase tracking-widest rounded-xl hover:bg-gray-100 transition">
                                            Detail
                                        </a>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Anggota Terdaftar -->
                                    <div>
                                        <h4 class="text-xs font-black text-[#00524D] mb-4 uppercase tracking-widest">
                                            Anggota Aktif ({{ $tim->anggota->count() }})
                                        </h4>
                                        <div class="space-y-3">
                                            @foreach($tim->anggota as $member)
                                                <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                                                    <div class="w-10 h-10 rounded-full bg-white text-[#48A89A] border border-[#48A89A]/30 flex items-center justify-center font-black text-sm shadow-sm">
                                                        {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                                    </div>
                                                    <div class="flex-1">
                                                        <h5 class="text-sm font-bold text-[#00524D]">{{ $member->user->name }}</h5>
                                                        <p class="text-[10px] text-gray-500 font-medium uppercase">{{ $member->user->email }} • {{ $member->mahasiswa->nim ?? '-' }}</p>
                                                    </div>
                                                    <span class="px-3 py-1 bg-white rounded-lg text-[8px] font-black uppercase border border-gray-200 text-[#00524D]">
                                                        {{ $member->peran }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Slot & Lamaran -->
                                    <div>
                                        <h4 class="text-xs font-black text-[#00524D] mb-4 uppercase tracking-widest">
                                            Status Slot Tim
                                        </h4>
                                        <div class="space-y-3">
                                            @foreach($tim->slots as $slot)
                                                @php $pendingCount = $slot->lamarans->where('status', 'pending')->count(); @endphp
                                                <div class="p-4 rounded-2xl border border-gray-100 {{ $slot->status == 'buka' ? 'bg-white shadow-sm' : 'bg-gray-50 opacity-60' }}">
                                                    <div class="flex justify-between items-start mb-2">
                                                        <h5 class="text-sm font-black text-[#00524D]">{{ $slot->posisi }}</h5>
                                                        <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase {{ $slot->status == 'buka' ? 'bg-[#CBEFEB] text-[#00524D]' : 'bg-gray-200 text-gray-500' }}">
                                                            {{ $slot->status }}
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-between items-center">
                                                        <p class="text-[10px] text-gray-500 font-bold uppercase">{{ $slot->lamarans->where('status', 'diterima')->count() }} / {{ $slot->jumlah_slot }} Terisi</p>
                                                        @if($pendingCount > 0)
                                                            <button @click="tab = 'lamaran-masuk'" class="text-[10px] font-black text-[#48A89A] hover:underline uppercase tracking-widest">
                                                                {{ $pendingCount }} Lamaran Pending
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if($tim->slots->count() == 0)
                                                <div class="p-8 border-2 border-dashed border-gray-200 rounded-3xl text-center">
                                                    <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Tidak ada slot dibuka</p>
                                                    <a href="{{ route('mahasiswa.team.manage', $tim->id) }}" class="text-[10px] text-[#48A89A] font-black uppercase mt-2 inline-block">Kelola Tim →</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="custom-card p-20 text-center">
                            <p class="text-gray-500 font-medium">Anda belum membuat tim untuk lomba manapun.</p>
                        </div>
                    @endforelse
                </div>
                @endif

                <!-- TAB CONTENT: PENDING (LAMARANKU) -->
                <div x-show="tab === 'pending'" class="space-y-4">
                    @forelse($lamaranPending as $lamaran)
                        <div class="custom-card p-6">
                            <div class="flex flex-col md:flex-row justify-between items-start gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="bg-amber-50 text-amber-600 border border-amber-200 text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-wider">
                                            Menunggu Review
                                        </span>
                                    </div>
                                    <h3 class="text-2xl font-black text-[#00524D]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                    <p class="text-sm font-black text-[#48A89A] uppercase tracking-widest mt-1">Posisi: {{ $lamaran->slot->posisi }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Dikirim pada</p>
                                    <p class="text-sm font-black text-[#00524D]">{{ $lamaran->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-[1.5rem] p-5 mt-5 grid grid-cols-1 md:grid-cols-2 gap-4 border border-gray-100">
                                <div class="flex items-start gap-4">
                                    <div>
                                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Lomba</p>
                                        <p class="text-sm font-bold text-[#00524D]">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                        <p class="text-[10px] text-gray-500 font-bold uppercase">{{ $lamaran->slot->tim->lomba->kategori }} • {{ $lamaran->slot->tim->lomba->tingkat }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div>
                                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">Deadline Lomba</p>
                                        <p class="text-sm font-black {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7 ? 'text-rose-500' : 'text-[#00524D]' }}">
                                            {{ $lamaran->slot->tim->lomba->deadline->format('d M Y') }}
                                            @if($lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7)
                                                <span class="ml-2 text-[8px] font-black bg-rose-50 px-2 py-1 rounded-full text-rose-500">{{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) }} HARI LAGI</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-center mt-8 pt-6 border-t border-gray-100 gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#48A89A] to-[#00524D] flex items-center justify-center text-white text-xs font-black shadow-lg">
                                        {{ strtoupper(substr($lamaran->slot->tim->ketua->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Ketua Tim</p>
                                        <p class="text-xs font-black text-[#00524D]">{{ $lamaran->slot->tim->ketua->name }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                    <div x-data="{ konfirmasi: false }">
                                        <button @click="konfirmasi = true" class="w-full sm:w-auto border border-rose-200 text-rose-500 text-[10px] font-black uppercase tracking-widest rounded-xl px-8 py-3 hover:bg-rose-50 transition">
                                            Batalkan Lamaran
                                        </button>
                                        
                                        <div x-show="konfirmasi" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4" x-cloak>
                                            <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full shadow-2xl scale-up text-center" @click.away="konfirmasi = false">
                                                <h4 class="text-2xl font-black text-[#00524D] mb-2">Batal Melamar?</h4>
                                                <p class="text-sm text-gray-500 mb-8">Apakah kamu yakin ingin menarik kembali lamaran untuk tim <span class="font-bold text-[#00524D]">{{ $lamaran->slot->tim->nama_tim }}</span>?</p>
                                                <div class="flex gap-3">
                                                    <button @click="konfirmasi = false" class="flex-1 py-4 bg-gray-100 text-gray-500 font-black uppercase tracking-widest text-[10px] rounded-xl">Kembali</button>
                                                    <form action="{{ route('mahasiswa.my-teams.cancel', $lamaran->id) }}" method="POST" class="flex-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full py-4 bg-rose-500 text-white font-black uppercase tracking-widest text-[10px] rounded-xl shadow-lg shadow-rose-200 hover:bg-rose-600 transition">Ya, Batalkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="custom-card p-20 text-center">
                            <h3 class="text-2xl font-black text-[#00524D]">Belum ada lamaran pending</h3>
                            <p class="text-sm text-gray-500 mt-2 mb-8">Lamaran yang kamu kirim melalui Tim Finder akan muncul di sini.</p>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-4 bg-[#48A89A] text-white font-black uppercase tracking-widest text-xs rounded-xl shadow-lg shadow-[#48A89A]/20 hover:bg-[#00524D] transition">
                                Jelajahi Tim Finder →
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: AKTIF (TIM YANG DIIKUTI) -->
                <div x-show="tab === 'aktif'" class="space-y-6">
                    @forelse($timSebagaiAnggota as $anggota)
                        <div class="custom-card overflow-hidden group">
                            <!-- Header -->
                            <div class="bg-gray-50 px-8 py-6 border-b border-gray-100 group-hover:bg-[#CBEFEB]/30 transition">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="px-3 py-1 bg-white border border-gray-200 text-gray-500 text-[9px] font-black rounded uppercase tracking-widest">
                                                {{ $anggota->tim->lomba->kategori }}
                                            </span>
                                            <span class="px-3 py-1 rounded text-[9px] font-black uppercase tracking-widest bg-[#CBEFEB] text-[#00524D]">
                                                AKTIF
                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-black text-[#00524D]">{{ $anggota->tim->nama_tim }}</h3>
                                        <p class="text-sm font-bold text-[#48A89A] uppercase tracking-widest">{{ $anggota->tim->lomba->nama }}</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <span class="px-4 py-2 bg-white border border-gray-200 text-gray-500 rounded-xl text-[10px] font-black uppercase tracking-widest">
                                            ANGGOTA TIM
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-8">
                                <div class="grid grid-cols-3 gap-6 bg-gray-50 rounded-2xl p-6 mb-8 border border-gray-100">
                                    <div class="text-center">
                                        <p class="text-xl font-black text-[#00524D]">{{ $anggota->tim->lomba->tingkat }}</p>
                                        <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mt-1">Tingkat</p>
                                    </div>
                                    <div class="text-center border-x border-gray-200">
                                        <p class="text-xl font-black text-[#00524D]">{{ $anggota->tim->lomba->deadline->format('d M') }}</p>
                                        <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mt-1">Deadline</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-xl font-black text-[#48A89A]">{{ $anggota->tim->anggota->count() }}/{{ $anggota->tim->maks_anggota }}</p>
                                        <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mt-1">Kapasitas</p>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="text-[10px] font-black text-[#00524D] mb-4 uppercase tracking-widest">Rekan Tim</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($anggota->tim->anggota as $member)
                                            <div class="flex items-center gap-3 p-3 rounded-2xl bg-white border border-gray-200 hover:border-[#48A89A]/30 transition group/member">
                                                <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center font-black text-[10px] group-hover/member:bg-[#48A89A] group-hover/member:text-white transition">
                                                    {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5 class="text-xs font-bold text-[#00524D] truncate">{{ $member->user->name }}</h5>
                                                    <p class="text-[8px] text-gray-400 font-bold uppercase">{{ $member->peran }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="bg-white px-8 py-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full border-2 border-gray-100 flex items-center justify-center text-xs font-black bg-[#48A89A] text-white">
                                        {{ strtoupper(substr($anggota->tim->ketua->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-gray-400 font-black uppercase">Ketua Tim</p>
                                        <p class="text-xs font-black text-[#00524D]">{{ $anggota->tim->ketua->name }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                    <a href="{{ route('mahasiswa.chat.show', $anggota->tim->id) }}" class="flex-1 sm:flex-none flex items-center justify-center px-8 py-3 bg-[#48A89A] text-white text-[10px] font-black uppercase tracking-widest rounded-xl shadow-lg shadow-[#48A89A]/20 hover:bg-[#00524D] transition">
                                        Chat Tim
                                    </a>
                                    <a href="{{ route('mahasiswa.my-teams.show', $anggota->tim->id) }}" class="flex-1 sm:flex-none flex items-center justify-center px-8 py-3 bg-gray-50 border border-gray-200 text-[#00524D] text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-100 transition">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="custom-card p-20 text-center">
                            <h3 class="text-2xl font-black text-[#00524D]">Belum bergabung di tim manapun</h3>
                            <p class="text-sm text-gray-500 mt-2 mb-8">Mulai jelajahi tim-tim yang mencari anggota atau buat timmu sendiri.</p>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-4 bg-[#48A89A] text-white font-black uppercase tracking-widest text-xs rounded-xl shadow-lg shadow-[#48A89A]/20 hover:bg-[#00524D] transition">
                                Cari Tim Sekarang →
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: DITOLAK (LAMARANKU) -->
                <div x-show="tab === 'ditolak'" class="space-y-4">
                    @forelse($lamaranDitolak as $lamaran)
                        <div class="custom-card p-8">
                            <div class="flex flex-col md:flex-row items-start gap-6">
                                <div class="flex-1">
                                    <div class="flex flex-col md:flex-row justify-between items-start mb-4 gap-2">
                                        <span class="bg-rose-50 text-rose-500 border border-rose-200 text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-wider">
                                            Lamaran Ditolak
                                        </span>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Diproses: {{ $lamaran->processed_at ? $lamaran->processed_at->format('d M Y') : $lamaran->updated_at->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="text-2xl font-black text-[#00524D] mb-1">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                    <p class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-4">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                    <p class="text-xs text-gray-500 font-bold uppercase">Posisi: <span class="text-rose-500">{{ $lamaran->slot->posisi }}</span></p>

                                    @if($lamaran->alasan_penolakan)
                                        <div class="mt-6 bg-rose-50 rounded-2xl p-6 border border-rose-100 relative">
                                            <span class="absolute -top-3 left-6 px-3 bg-rose-500 text-white text-[8px] font-black uppercase tracking-widest rounded-full py-1">Pesan dari Ketua</span>
                                            <p class="text-sm text-rose-700 italic leading-relaxed">"{{ $lamaran->alasan_penolakan }}"</p>
                                        </div>
                                    @else
                                        <p class="text-xs text-gray-400 italic mt-6 border-l-4 border-gray-200 pl-4">Ketua tim tidak menyertakan alasan penolakan.</p>
                                    @endif

                                    <div class="mt-8 pt-6 border-t border-gray-100">
                                        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="text-[10px] font-black text-[#48A89A] uppercase tracking-widest hover:underline flex items-center gap-1">
                                            Cari Tim Lain yang Sesuai →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="custom-card p-20 text-center">
                            <p class="text-gray-500 font-bold uppercase tracking-widest text-[10px]">Tidak ada lamaran yang ditolak.</p>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: RIWAYAT -->
                <div x-show="tab === 'riwayat'" class="space-y-4">
                    @php
                        $riwayat = $lamaranPending->filter(fn($l) => $l->slot->batas_waktu < now());
                    @endphp
                    @forelse($riwayat as $lamaran)
                        <div class="custom-card p-6 opacity-60 grayscale hover:grayscale-0 transition">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-gray-100 text-gray-500 text-[10px] font-black rounded-full px-4 py-1.5 uppercase tracking-wider">
                                    Kadaluarsa
                                </span>
                                <span class="text-[10px] text-gray-400 font-bold">Terkirim: {{ $lamaran->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-xl font-black text-[#00524D]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                            <p class="text-sm font-bold text-gray-500 uppercase tracking-widest">{{ $lamaran->slot->tim->lomba->nama }}</p>
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest text-center italic">Slot ini sudah ditutup sebelum lamaranmu diproses.</p>
                            </div>
                        </div>
                    @empty
                        <div class="custom-card p-20 text-center">
                            <p class="text-gray-500 font-bold uppercase tracking-widest text-[10px]">Belum ada riwayat lamaran kadaluarsa.</p>
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
    </style>
</x-app-layout>
