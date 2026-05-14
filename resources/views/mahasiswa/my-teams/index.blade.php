<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-[#1E293B] leading-tight">
                    {{ __('My Teams') }}
                </h2>
                <p class="text-sm text-[#64748B]">{{ __('Kelola semua lamaran dan tim lombamu') }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-5 py-2.5 bg-[#4F7EF7] text-white text-sm font-bold rounded-xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                    Cari Tim Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-[#EFF6FF] min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Alert Section -->
            @if(session('success'))
                <div class="p-4 bg-[#D1FAE5] border border-[#10B981]/30 rounded-2xl flex items-center gap-3 text-[#065F46]">
                    <span>✅</span>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center gap-3 text-red-600">
                    <span>❌</span>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Card 1: Tim Aktif -->
                <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#EFF6FF] flex items-center justify-center text-2xl">
                        👥
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-[#4F7EF7]">{{ $timAktif->count() }}</span>
                        <span class="text-xs text-[#64748B] font-medium">Tim Aktif</span>
                    </div>
                </div>

                <!-- Card 2: Menunggu Review -->
                <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4 relative">
                    <div class="w-12 h-12 rounded-full bg-[#FFFBEB] flex items-center justify-center text-2xl">
                        ⏳
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-amber-500">{{ $lamaranPending->count() }}</span>
                        <span class="text-xs text-[#64748B] font-medium">Menunggu</span>
                    </div>
                    @if($lamaranPending->count() > 0)
                        <div class="absolute top-4 right-4 w-2 h-2 bg-amber-400 rounded-full animate-pulse"></div>
                    @endif
                </div>

                <!-- Card 3: Lamaran Diterima -->
                <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#F0FDF4] flex items-center justify-center text-2xl">
                        ✅
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-[#10B981]">{{ $lamaranDiterima->count() }}</span>
                        <span class="text-xs text-[#64748B] font-medium">Diterima</span>
                    </div>
                </div>

                <!-- Card 4: Lamaran Ditolak -->
                <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#FEF2F2] flex items-center justify-center text-2xl">
                        ❌
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-red-400">{{ $lamaranDitolak->count() }}</span>
                        <span class="text-xs text-[#64748B] font-medium">Ditolak</span>
                    </div>
                </div>
            </div>

            <!-- TABS SECTION -->
            <div x-data="{ tab: '{{ $lamaranPending->count() > 0 ? 'pending' : 'aktif' }}' }">
                <!-- Tab Navigation -->
                <div class="flex border-b border-[#E2E8F0] overflow-x-auto no-scrollbar mb-8">
                    <button 
                        @click="tab = 'pending'" 
                        :class="tab === 'pending' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-semibold' : 'text-[#64748B] hover:text-[#1E293B]'"
                        class="px-6 py-4 text-sm transition-all whitespace-now8 flex items-center"
                    >
                        ⏳ Menunggu Review
                        @if($lamaranPending->count() > 0)
                            <span class="ml-2 bg-amber-400 text-white text-[10px] px-1.5 py-0.5 rounded-full">{{ $lamaranPending->count() }}</span>
                        @endif
                    </button>
                    <button 
                        @click="tab = 'aktif'" 
                        :class="tab === 'aktif' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-semibold' : 'text-[#64748B] hover:text-[#1E293B]'"
                        class="px-6 py-4 text-sm transition-all whitespace-nowrap flex items-center"
                    >
                        ✅ Tim Aktif
                        @if($timAktif->count() > 0)
                            <span class="ml-2 bg-[#4F7EF7] text-white text-[10px] px-1.5 py-0.5 rounded-full">{{ $timAktif->count() }}</span>
                        @endif
                    </button>
                    <button 
                        @click="tab = 'ditolak'" 
                        :class="tab === 'ditolak' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-semibold' : 'text-[#64748B] hover:text-[#1E293B]'"
                        class="px-6 py-4 text-sm transition-all whitespace-nowrap"
                    >
                        ❌ Ditolak
                    </button>
                    <button 
                        @click="tab = 'riwayat'" 
                        :class="tab === 'riwayat' ? 'border-b-2 border-[#4F7EF7] text-[#4F7EF7] font-semibold' : 'text-[#64748B] hover:text-[#1E293B]'"
                        class="px-6 py-4 text-sm transition-all whitespace-nowrap"
                    >
                        🕐 Riwayat
                    </button>
                </div>

                <!-- TAB CONTENT: PENDING -->
                <div x-show="tab === 'pending'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
                    @forelse($lamaranPending as $lamaran)
                        @if($lamaran->slot->batas_waktu >= now())
                            <div class="bg-[#F8FAFC] border border-amber-200 rounded-2xl p-6 shadow-sm">
                                <div class="flex flex-col md:flex-row justify-between items-start gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-bold rounded-full px-3 py-1 uppercase tracking-wider">
                                                ⏳ Menunggu Review
                                            </span>
                                        </div>
                                        <h3 class="text-xl font-bold text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                        <p class="text-sm font-medium text-[#4F7EF7]">Posisi: {{ $lamaran->slot->posisi }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] text-[#94A3B8] font-bold uppercase tracking-wider">Dikirim pada</p>
                                        <p class="text-sm font-bold text-[#1E293B]">{{ $lamaran->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>

                                <div class="bg-[#EFF6FF] rounded-2xl p-4 mt-4 grid grid-cols-1 md:grid-cols-2 gap-4 border border-[#DBEAFE]">
                                    <div class="flex items-start gap-3">
                                        <div class="p-2 bg-white rounded-lg shadow-sm">🏆</div>
                                        <div>
                                            <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Lomba</p>
                                            <p class="text-sm font-bold text-[#1E293B]">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                            <p class="text-[10px] text-[#64748B]">{{ $lamaran->slot->tim->lomba->kategori }} • {{ ucfirst($lamaran->slot->tim->lomba->tingkat) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="p-2 bg-white rounded-lg shadow-sm">📅</div>
                                        <div>
                                            <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Deadline Lomba</p>
                                            <p class="text-sm font-bold {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7 ? 'text-red-500' : 'text-[#1E293B]' }}">
                                                {{ $lamaran->slot->tim->lomba->deadline->format('d M Y') }}
                                                @if($lamaran->slot->tim->lomba->deadline->diffInDays(now()) <= 7)
                                                    <span class="ml-1 text-[10px] font-bold bg-red-50 px-1.5 py-0.5 rounded">⚡ {{ $lamaran->slot->tim->lomba->deadline->diffInDays(now()) }} hari lagi</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 mt-4">
                                    <div class="w-8 h-8 rounded-full bg-[#4F7EF7] flex items-center justify-center text-white text-[10px] font-bold shadow-sm shadow-[#4F7EF7]/20">
                                        {{ strtoupper(substr($lamaran->slot->tim->ketua->name, 0, 1)) }}
                                    </div>
                                    <span class="text-xs text-[#64748B]">Ketua: <span class="font-bold text-[#1E293B]">{{ $lamaran->slot->tim->ketua->name }}</span></span>
                                </div>

                                <div class="mt-4" x-data="{ buka: false }">
                                    <button @click="buka = !buka" class="text-xs font-bold text-[#4F7EF7] hover:underline flex items-center gap-1">
                                        <span x-text="buka ? '▲ Sembunyikan pesan motivasi' : '▼ Lihat pesan motivasi yang dikirim'"></span>
                                    </button>
                                    <div x-show="buka" x-transition class="mt-3 bg-white border border-[#E2E8F0] rounded-xl p-4 text-sm text-[#64748B] leading-relaxed italic whitespace-pre-line shadow-inner">
                                        "{{ $lamaran->pesan_motivasi }}"
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row justify-between items-center mt-6 pt-6 border-t border-[#E2E8F0] gap-4">
                                    <span class="text-[10px] text-[#94A3B8] font-bold tracking-widest">ID LAMARAN: #{{ $lamaran->id }}</span>
                                    <div class="flex gap-3 w-full sm:w-auto">
                                        <a href="{{ route('mahasiswa.tim-finder.show', $lamaran->id_slot) }}" class="flex-1 sm:flex-none text-center border border-[#4F7EF7] text-[#4F7EF7] text-xs font-bold rounded-xl px-6 py-2.5 hover:bg-[#EFF6FF] transition">
                                            Lihat Slot
                                        </a>
                                        
                                        <div x-data="{ konfirmasi: false }">
                                            <button @click="konfirmasi = true" class="w-full sm:w-auto border border-red-300 text-red-500 text-xs font-bold rounded-xl px-6 py-2.5 hover:bg-red-50 transition">
                                                Batalkan Lamaran
                                            </button>
                                            
                                            <!-- Inline Confirmation Modal -->
                                            <div x-show="konfirmasi" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" x-cloak>
                                                <div class="bg-white rounded-3xl p-8 max-w-sm w-full shadow-2xl text-center" @click.away="konfirmasi = false">
                                                    <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">⚠️</div>
                                                    <h4 class="text-xl font-bold text-[#1E293B] mb-2">Konfirmasi Pembatalan</h4>
                                                    <p class="text-sm text-[#64748B] mb-8">Apakah Anda yakin ingin membatalkan lamaran untuk tim <span class="font-bold text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</span>?</p>
                                                    <div class="flex gap-3">
                                                        <button @click="konfirmasi = false" class="flex-1 py-3 bg-[#F1F5F9] text-[#64748B] font-bold rounded-xl">Batal</button>
                                                        <form action="{{ route('mahasiswa.my-teams.cancel', $lamaran->id) }}" method="POST" class="flex-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="w-full py-3 bg-red-500 text-white font-bold rounded-xl shadow-lg shadow-red-200">Ya, Batalkan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="bg-white rounded-[2rem] p-16 text-center shadow-sm border border-[#E2E8F0]">
                            <div class="w-24 h-24 bg-[#FFFBEB] rounded-full flex items-center justify-center text-5xl mx-auto mb-6">⏳</div>
                            <h3 class="text-xl font-bold text-[#1E293B]">Belum ada lamaran pending</h3>
                            <p class="text-sm text-[#64748B] mt-2 mb-8">Cari tim yang sesuai keahlianmu di Tim Finder dan mulai ajukan lamaran.</p>
                            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-3 bg-[#4F7EF7] text-white font-bold rounded-2xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                                Cari Tim Sekarang →
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: AKTIF -->
                <div x-show="tab === 'aktif'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                    @forelse($timAktif as $anggota)
                        <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-[2rem] overflow-hidden hover:shadow-md transition-shadow">
                            <!-- Header -->
                            <div class="bg-[#EFF6FF] px-8 py-6 border-b border-[#DBEAFE]">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="px-2 py-0.5 bg-[#DBEAFE] text-[#1E3A6E] text-[9px] font-black rounded uppercase tracking-widest">
                                                {{ $anggota->tim->lomba->kategori }}
                                            </span>
                                            <span class="px-2 py-0.5 rounded text-[9px] font-black uppercase tracking-widest
                                                {{ $anggota->tim->lomba->status == 'buka' ? 'bg-[#D1FAE5] text-[#065F46]' : 'bg-red-50 text-red-500' }}">
                                                ● {{ strtoupper($anggota->tim->lomba->status) }}
                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-[#1E293B]">{{ $anggota->tim->nama_tim }}</h3>
                                        <p class="text-sm font-medium text-[#64748B]">{{ $anggota->tim->lomba->nama }}</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <span class="px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2
                                            {{ $anggota->peran == 'ketua' ? 'bg-[#4F7EF7] text-white' : 'bg-white border border-[#DBEAFE] text-[#4F7EF7]' }}">
                                            {{ $anggota->peran == 'ketua' ? '👑 Ketua Tim' : ($anggota->peran == 'anggota' ? '👤 Anggota' : '👁 Observer') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="p-8">
                                <!-- Info Grid -->
                                <div class="grid grid-cols-3 gap-4 bg-white rounded-2xl p-5 mb-8 border border-[#E2E8F0]">
                                    <div class="text-center">
                                        <p class="text-lg font-bold text-[#1E293B]">{{ ucfirst($anggota->tim->lomba->tingkat) }}</p>
                                        <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Tingkat</p>
                                    </div>
                                    <div class="text-center border-x border-[#E2E8F0]">
                                        <p class="text-lg font-bold {{ $anggota->tim->lomba->deadline->diffInDays(now()) <= 7 ? 'text-red-500' : 'text-[#1E293B]' }}">
                                            {{ $anggota->tim->lomba->deadline->format('d M') }}
                                        </p>
                                        <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Deadline</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-lg font-bold {{ $anggota->tim->anggota->count() >= $anggota->tim->maks_anggota ? 'text-amber-500' : 'text-[#10B981]' }}">
                                            {{ $anggota->tim->anggota->count() }}/{{ $anggota->tim->maks_anggota }}
                                        </p>
                                        <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Anggota</p>
                                    </div>
                                </div>

                                <!-- Member List -->
                                <div>
                                    <h4 class="text-sm font-bold text-[#1E293B] mb-4 flex items-center gap-2">
                                        <span>👥</span> Anggota Tim
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @foreach($anggota->tim->anggota as $member)
                                            <div class="flex items-center gap-4 p-3 rounded-2xl bg-white border border-[#E2E8F0] hover:border-[#4F7EF7]/30 hover:bg-[#EFF6FF] transition group">
                                                <div class="w-10 h-10 rounded-full bg-[#4F7EF7] text-white flex items-center justify-center font-bold text-sm shadow-sm group-hover:scale-110 transition">
                                                    {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5 class="text-sm font-bold text-[#1E293B] truncate">{{ $member->user->name }}</h5>
                                                    <p class="text-[10px] text-[#64748B] flex items-center gap-1 truncate">
                                                        <span>📧</span> {{ $member->user->email }}
                                                    </p>
                                                    @if($member->mahasiswa && $member->mahasiswa->nim)
                                                        <p class="text-[10px] text-[#94A3B8]">NIM: {{ $member->mahasiswa->nim }}</p>
                                                    @endif
                                                </div>
                                                <span class="px-2 py-0.5 rounded-full text-[8px] font-black uppercase
                                                    {{ $member->peran == 'ketua' ? 'bg-[#4F7EF7] text-white' : 'bg-[#DBEAFE] text-[#1E3A6E]' }}">
                                                    {{ $member->peran }}
                                                </span>
                                            </div>
                                        @endforeach

                                        <!-- Placeholder for open slots -->
                                        @php $openSlotsCount = $anggota->tim->maks_anggota - $anggota->tim->anggota->count(); @endphp
                                        @for($i = 0; $i < $openSlotsCount; $i++)
                                            <div class="flex items-center justify-center p-4 rounded-2xl border-2 border-dashed border-[#E2E8F0] bg-gray-50/50">
                                                <p class="text-[10px] text-[#94A3B8] font-bold uppercase tracking-widest italic">Slot Terbuka</p>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="bg-white px-8 py-5 border-t border-[#E2E8F0] flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-[#64748B]">👑 Ketua: <span class="font-bold text-[#1E293B]">{{ $anggota->tim->ketua->name }}</span></span>
                                </div>
                                <div class="flex gap-3 w-full sm:w-auto">
                                    <a href="{{ route('mahasiswa.chat.show', $anggota->tim->id) }}" class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-2.5 bg-[#10B981] text-white text-xs font-bold rounded-xl shadow-lg shadow-[#10B981]/20 hover:bg-[#059669] transition">
                                        <span>💬</span> Chat Tim
                                    </a>
                                    <a href="{{ route('mahasiswa.my-teams.show', $anggota->tim->id) }}" class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-2.5 bg-[#4F7EF7] text-white text-xs font-bold rounded-xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                                        Detail Tim
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[2rem] p-16 text-center shadow-sm border border-[#E2E8F0]">
                            <div class="w-24 h-24 bg-[#EFF6FF] rounded-full flex items-center justify-center text-5xl mx-auto mb-6">👥</div>
                            <h3 class="text-xl font-bold text-[#1E293B]">Belum bergabung di tim manapun</h3>
                            <p class="text-sm text-[#64748B] mt-2 mb-8">Mulai jelajahi tim-tim yang mencari anggota atau buat timmu sendiri.</p>
                            <div class="flex flex-col sm:flex-row justify-center gap-4">
                                <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-8 py-3 bg-[#4F7EF7] text-white font-bold rounded-2xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                                    Cari Tim Sekarang →
                                </a>
                                <button class="px-8 py-3 bg-white border border-[#E2E8F0] text-[#1E293B] font-bold rounded-2xl hover:bg-gray-50 transition">
                                    Buat Tim Baru
                                </button>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: DITOLAK -->
                <div x-show="tab === 'ditolak'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
                    @forelse($lamaranDitolak as $lamaran)
                        <div class="bg-[#F8FAFC] border border-red-100 rounded-2xl p-6 shadow-sm">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center text-2xl flex-shrink-0">
                                    ❌
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="bg-red-50 text-red-500 border border-red-200 text-[10px] font-bold rounded-full px-3 py-1 uppercase tracking-wider">
                                            Lamaran Ditolak
                                        </span>
                                        <span class="text-[10px] text-[#94A3B8] font-bold uppercase">Diproses: {{ $lamaran->processed_at ? $lamaran->processed_at->format('d M Y') : $lamaran->updated_at->format('d M Y') }}</span>
                                    </div>
                                    <h3 class="text-lg font-bold text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                                    <p class="text-sm font-medium text-[#64748B] mb-2">{{ $lamaran->slot->tim->lomba->nama }}</p>
                                    <p class="text-xs text-[#64748B]">Posisi yang dilamar: <span class="font-bold text-[#4F7EF7]">{{ $lamaran->slot->posisi }}</span></p>

                                    @if($lamaran->alasan_penolakan)
                                        <div class="mt-4 bg-red-50 rounded-xl p-4 border border-red-100">
                                            <p class="text-[10px] text-red-500 font-bold uppercase mb-1">Alasan dari ketua tim:</p>
                                            <p class="text-sm text-red-700 italic">"{{ $lamaran->alasan_penolakan }}"</p>
                                        </div>
                                    @else
                                        <p class="text-xs text-[#94A3B8] italic mt-4">Ketua tim tidak menyertakan alasan penolakan.</p>
                                    @endif

                                    <div class="mt-4 pt-4 border-t border-[#E2E8F0]">
                                        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="text-[#4F7EF7] text-xs font-bold hover:underline">
                                            Cari Tim Lain →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[2rem] p-16 text-center shadow-sm border border-[#E2E8F0]">
                            <p class="text-[#64748B] font-medium">Tidak ada lamaran yang ditolak.</p>
                        </div>
                    @endforelse
                </div>

                <!-- TAB CONTENT: RIWAYAT -->
                <div x-show="tab === 'riwayat'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
                    @php
                        $riwayat = $lamaranPending->filter(fn($l) => $l->slot->batas_waktu < now());
                    @endphp
                    @forelse($riwayat as $lamaran)
                        <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-6 opacity-60">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-[#E2E8F0] text-[#64748B] text-[10px] font-bold rounded-full px-3 py-1 uppercase tracking-wider">
                                    🕐 Kadaluarsa
                                </span>
                                <span class="text-[10px] text-[#94A3B8] font-bold">Terkirim: {{ $lamaran->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-[#1E293B]">{{ $lamaran->slot->tim->nama_tim }}</h3>
                            <p class="text-sm text-[#64748B]">{{ $lamaran->slot->tim->lomba->nama }}</p>
                            <p class="text-xs text-[#64748B] mt-1">Posisi: {{ $lamaran->slot->posisi }}</p>
                            <div class="mt-3 p-3 bg-white/50 rounded-xl border border-[#E2E8F0]">
                                <p class="text-[10px] text-[#94A3B8] italic">Slot ini sudah ditutup sebelum lamaranmu diproses oleh ketua tim.</p>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-[2rem] p-16 text-center shadow-sm border border-[#E2E8F0]">
                            <p class="text-[#64748B] font-medium">Belum ada riwayat lamaran kadaluarsa.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</x-app-layout>
