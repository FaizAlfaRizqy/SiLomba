<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('mahasiswa.tim-finder.index') }}" class="p-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Lowongan Tim') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#EFF6FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Alert Section -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-[#D1FAE5] border border-[#10B981]/30 rounded-2xl flex items-center gap-3 text-[#065F46]">
                    <span>✅</span>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center gap-3 text-red-600">
                    <span>❌</span>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center gap-3 text-red-600">
                    <span>❌</span>
                    <p class="text-sm font-medium">{{ $errors->first() }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- LEFT COLUMN (2/3) -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Section 1: Info Utama Slot -->
                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-3xl p-8 shadow-sm">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-[#DBEAFE] text-[#1E3A6E] text-[10px] font-bold rounded-full uppercase tracking-widest">
                                {{ $slot->tim->lomba->kategori }}
                            </span>
                        </div>
                        
                        <h1 class="text-3xl font-bold text-[#1E293B] mb-2">{{ $slot->posisi }}</h1>
                        <p class="text-lg font-medium text-[#4F7EF7] mb-6">{{ $slot->tim->nama_tim }}</p>
                        
                        <div class="bg-[#EFF6FF] border border-[#DBEAFE] rounded-2xl p-6 mb-8">
                            <div class="flex items-start gap-4">
                                <div class="p-3 bg-white rounded-xl shadow-sm">
                                    <span class="text-2xl">🏆</span>
                                </div>
                                <div>
                                    <p class="text-xs text-[#64748B] font-bold uppercase tracking-wider">Lomba yang Diikuti</p>
                                    <h4 class="text-lg font-bold text-[#1E293B]">{{ $slot->tim->lomba->nama }}</h4>
                                    <p class="text-sm text-[#64748B]">{{ $slot->tim->lomba->penyelenggara }} • {{ ucfirst($slot->tim->lomba->tingkat) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xs text-[#64748B] font-bold uppercase tracking-wider mb-3">Deskripsi Peran</h3>
                                <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 text-[#64748B] text-sm leading-relaxed whitespace-pre-line">
                                    {{ $slot->deskripsi }}
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xs text-[#64748B] font-bold uppercase tracking-wider mb-3">Keahlian yang Dibutuhkan</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($slot->keahlian_dibutuhkan as $skill)
                                        <span class="px-4 py-2 bg-[#EFF6FF] border border-[#DBEAFE] text-[#4F7EF7] text-xs font-bold rounded-xl">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-6 border-t border-[#E2E8F0]">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-[#64748B]">Slot Tersedia:</span>
                                    <span class="text-sm font-bold text-[#1E293B]">{{ $slotTersisa }} dari {{ $slot->jumlah_slot }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-[#64748B]">Batas Waktu:</span>
                                    <span class="text-sm font-bold {{ $slot->batas_waktu->diffInDays(now()) <= 3 ? 'text-red-500' : 'text-[#1E293B]' }}">
                                        {{ $slot->batas_waktu->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Persyaratan Lamaran -->
                    <div class="bg-white border border-[#E2E8F0] rounded-3xl p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-[#1E293B] mb-6 flex items-center gap-2">
                            <span>📋</span> Persyaratan Melamar Tim
                        </h2>

                        <div class="space-y-4">
                            <!-- SYARAT 1: Akun Mahasiswa -->
                            <div class="flex items-start gap-4 p-4 rounded-2xl border {{ Auth::check() ? 'bg-green-50/50 border-green-100' : 'bg-red-50/50 border-red-100' }}">
                                <div class="mt-1">
                                    @if(Auth::check())
                                        <span class="text-green-500">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#1E293B]">Akun Mahasiswa Aktif</h4>
                                    <p class="text-xs text-[#64748B]">
                                        @if(Auth::check())
                                            Terdaftar sebagai mahasiswa aktif di SiLomba
                                        @else
                                            Harus login sebagai mahasiswa aktif
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 2: Profil Lengkap -->
                            @php $profilLengkap = $mahasiswa && !empty($mahasiswa->keahlian); @endphp
                            <div class="flex items-start gap-4 p-4 rounded-2xl border {{ $profilLengkap ? 'bg-green-50/50 border-green-100' : 'bg-amber-50/50 border-amber-100' }}">
                                <div class="mt-1">
                                    @if($profilLengkap)
                                        <span class="text-green-500">✅</span>
                                    @else
                                        <span class="text-amber-500">⚠️</span>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold text-[#1E293B]">Profil Keahlian Lengkap</h4>
                                    <p class="text-xs text-[#64748B]">
                                        @if($profilLengkap)
                                            Keahlian sudah diisi di profil
                                        @else
                                            Isi minimal 1 keahlian di halaman profil. 
                                            <a href="{{ route('mahasiswa.profile.edit') }}" class="text-[#4F7EF7] font-bold hover:underline">Lengkapi sekarang →</a>
                                        @endif
                                    </p>
                                    <p class="text-[10px] text-[#94A3B8] mt-1 italic">Ketua tim perlu melihat keahlianmu sebelum memutuskan menerima lamaranmu.</p>
                                </div>
                            </div>

                            <!-- SYARAT 3: Belum di Tim Lain -->
                            <div class="flex items-start gap-4 p-4 rounded-2xl border {{ !$sudahDiTim ? 'bg-green-50/50 border-green-100' : 'bg-red-50/50 border-red-100' }}">
                                <div class="mt-1">
                                    @if(!$sudahDiTim)
                                        <span class="text-green-500">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#1E293B]">Belum Tergabung Tim Lain di Lomba Ini</h4>
                                    <p class="text-xs text-[#64748B]">
                                        @if(!$sudahDiTim)
                                            Kamu belum bergabung di tim manapun untuk lomba ini
                                        @else
                                            Kamu sudah terdaftar di tim lain untuk lomba ini. Satu mahasiswa hanya boleh di 1 tim per lomba.
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 4: Belum Pernah Melamar -->
                            <div class="flex items-start gap-4 p-4 rounded-2xl border {{ !$sudahMelamar ? 'bg-green-50/50 border-green-100' : 'bg-blue-50/50 border-blue-100' }}">
                                <div class="mt-1">
                                    @if(!$sudahMelamar)
                                        <span class="text-green-500">✅</span>
                                    @else
                                        <span class="text-blue-500">ℹ️</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#1E293B]">Belum Pernah Melamar Slot Ini</h4>
                                    <p class="text-xs text-[#64748B]">
                                        @if(!$sudahMelamar)
                                            Kamu belum pernah melamar slot ini
                                        @else
                                            Kamu sudah melamar slot ini. Status saat ini: 
                                            <span class="font-bold px-2 py-0.5 rounded-full text-[10px] uppercase
                                                {{ $sudahMelamar->status == 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                                {{ $sudahMelamar->status == 'diterima' ? 'bg-green-100 text-green-700' : '' }}
                                                {{ $sudahMelamar->status == 'ditolak' ? 'bg-red-100 text-red-700' : '' }}">
                                                {{ $sudahMelamar->status }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 5: Slot Masih Tersedia -->
                            <div class="flex items-start gap-4 p-4 rounded-2xl border {{ $slotTersisa > 0 ? 'bg-green-50/50 border-green-100' : 'bg-gray-50/50 border-gray-100' }}">
                                <div class="mt-1">
                                    @if($slotTersisa > 0)
                                        <span class="text-green-500">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#1E293B]">Slot Masih Tersedia</h4>
                                    <p class="text-xs text-[#64748B]">
                                        @if($slotTersisa > 0)
                                            {{ $slotTersisa }} dari {{ $slot->jumlah_slot }} slot masih terbuka
                                        @else
                                            Slot ini sudah penuh, tidak bisa melamar
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 6: Batas Waktu -->
                            @php $waktuMasihAda = $slot->batas_waktu >= now(); @endphp
                            <div class="flex items-start gap-4 p-4 rounded-2xl border {{ $waktuMasihAda ? 'bg-green-50/50 border-green-100' : 'bg-gray-50/50 border-gray-100' }}">
                                <div class="mt-1">
                                    @if($waktuMasihAda)
                                        <span class="text-green-500">✅</span>
                                    @else
                                        <span class="text-red-500">❌</span>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-[#1E293B]">Batas Waktu Belum Lewat</h4>
                                    <p class="text-xs text-[#64748B]">
                                        @if($waktuMasihAda)
                                            Batas waktu: {{ $slot->batas_waktu->format('d M Y') }}
                                        @else
                                            Batas waktu lamaran sudah berakhir pada {{ $slot->batas_waktu->format('d M Y') }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- SYARAT 7: Batas Lamaran Per Hari -->
                            <div class="flex items-start gap-4 p-4 rounded-2xl border bg-blue-50/50 border-blue-100">
                                <div class="mt-1">
                                    <span class="text-blue-500">ℹ️</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-bold text-[#1E293B]">Batas Lamaran Per Hari</h4>
                                    <p class="text-xs text-[#64748B]">Maksimal 20 lamaran per hari. Pilih tim yang benar-benar sesuai keahlianmu.</p>
                                    <div class="mt-2 w-full bg-blue-100 rounded-full h-1.5">
                                        <div class="bg-[#4F7EF7] h-1.5 rounded-full" style="width: {{ ($lamaranHariIni / 20) * 100 }}%"></div>
                                    </div>
                                    <p class="text-[10px] text-[#4F7EF7] font-bold mt-1">Lamaran hari ini: {{ $lamaranHariIni }}/20</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Form Lamaran -->
                    @php
                        $bisaMelamar = $profilLengkap && !$sudahDiTim && !$sudahMelamar && ($slotTersisa > 0) && $waktuMasihAda && ($lamaranHariIni < 20);
                    @endphp

                    @if($bisaMelamar)
                        <div class="bg-white border-2 border-[#4F7EF7]/20 rounded-3xl p-8 shadow-xl shadow-[#4F7EF7]/5" x-data="{ message: '', loading: false }">
                            <div class="mb-6">
                                <h2 class="text-xl font-bold text-[#1E293B] flex items-center gap-2">
                                    <span>✍️</span> Tulis Pesan Motivasi
                                </h2>
                                <p class="text-sm text-[#64748B] mt-1">Ceritakan mengapa kamu cocok untuk posisi ini. Ketua tim akan membaca ini sebelum memutuskan.</p>
                            </div>

                            <form action="{{ route('mahasiswa.tim-finder.apply', $slot->id) }}" method="POST" @submit="loading = true">
                                @csrf
                                <div class="mb-6">
                                    <textarea 
                                        name="pesan_motivasi" 
                                        rows="6" 
                                        x-model="message"
                                        maxlength="1000"
                                        class="w-full rounded-2xl border-[#E2E8F0] focus:border-[#4F7EF7] focus:ring focus:ring-[#4F7EF7]/10 p-5 text-sm"
                                        placeholder="Contoh: Halo Ketua Tim! Saya sangat tertarik bergabung karena memiliki keahlian di bidang {{ $slot->keahlian_dibutuhkan[0] ?? 'pencarian' }} dan sudah memiliki pengalaman di beberapa proyek sejenis..."
                                        required
                                    ></textarea>
                                    <div class="flex justify-between mt-2">
                                        <p class="text-[10px] text-red-500" x-show="message.length > 0 && message.length < 50">Minimal 50 karakter</p>
                                        <p class="text-[10px] ml-auto font-medium" :class="message.length >= 50 ? 'text-[#10B981]' : 'text-[#64748B]'">
                                            <span x-text="message.length"></span>/1000 karakter
                                        </p>
                                    </div>
                                </div>

                                <div class="bg-[#EFF6FF] rounded-2xl p-4 mb-6 flex items-start gap-3">
                                    <span class="text-lg">💡</span>
                                    <p class="text-xs text-[#1E3A6E] leading-relaxed">
                                        <strong>Tips:</strong> Sebutkan keahlian spesifik yang relevan, pengalaman lomba atau proyek sebelumnya, dan alasan kamu ingin bergabung di tim ini.
                                    </p>
                                </div>

                                <button 
                                    type="submit" 
                                    :disabled="message.length < 50 || loading"
                                    class="w-full py-4 bg-[#4F7EF7] text-white font-bold rounded-2xl shadow-lg shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition-all flex items-center justify-center gap-2 disabled:bg-[#E2E8F0] disabled:text-[#94A3B8] disabled:shadow-none"
                                >
                                    <span x-show="!loading">Kirim Lamaran →</span>
                                    <span x-show="loading" class="flex items-center gap-2">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        Mengirim lamaran...
                                    </span>
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Card Pengganti jika tidak bisa melamar -->
                        @if($sudahMelamar)
                            <div class="bg-[#DBEAFE] border border-[#4F7EF7]/20 rounded-3xl p-8 text-center">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">✉️</div>
                                <h3 class="text-lg font-bold text-[#1E3A6E]">Lamaran Sudah Terkirim</h3>
                                <p class="text-sm text-[#4F7EF7] mt-1">Kamu sudah mengirimkan lamaran untuk slot ini. Tunggu konfirmasi dari ketua tim.</p>
                                <div class="mt-6 inline-block px-6 py-2 bg-white rounded-full text-xs font-bold text-[#4F7EF7]">
                                    Status: {{ strtoupper($sudahMelamar->status) }}
                                </div>
                            </div>
                        @elseif($sudahDiTim)
                            <div class="bg-red-50 border border-red-200 rounded-3xl p-8 text-center text-red-600">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">⚠️</div>
                                <h3 class="text-lg font-bold">Tidak Bisa Melamar</h3>
                                <p class="text-sm mt-1">Kamu sudah tergabung dalam tim lain untuk kompetisi ini.</p>
                            </div>
                        @elseif($slotTersisa <= 0)
                            <div class="bg-gray-100 border border-gray-200 rounded-3xl p-8 text-center text-gray-500">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">🔒</div>
                                <h3 class="text-lg font-bold">Slot Penuh</h3>
                                <p class="text-sm mt-1">Maaf, kuota untuk posisi ini sudah terpenuhi.</p>
                            </div>
                        @elseif(!$waktuMasihAda)
                            <div class="bg-gray-100 border border-gray-200 rounded-3xl p-8 text-center text-gray-500">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">⌛</div>
                                <h3 class="text-lg font-bold">Pendaftaran Ditutup</h3>
                                <p class="text-sm mt-1">Batas waktu untuk melamar slot ini sudah berakhir.</p>
                            </div>
                        @elseif(!$profilLengkap)
                            <div class="bg-amber-50 border border-amber-200 rounded-3xl p-8 text-center">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">👤</div>
                                <h3 class="text-lg font-bold text-amber-700">Profil Belum Lengkap</h3>
                                <p class="text-sm text-amber-600 mt-1 mb-6">Lengkapi data keahlianmu terlebih dahulu agar bisa melamar ke tim.</p>
                                <a href="{{ route('mahasiswa.profile.edit') }}" class="inline-block px-8 py-3 bg-amber-500 text-white font-bold rounded-xl hover:bg-amber-600 transition shadow-lg shadow-amber-500/20">
                                    Lengkapi Profil →
                                </a>
                            </div>
                        @endif
                    @endif
                </div>

                <!-- RIGHT COLUMN (1/3) -->
                <div class="space-y-8">
                    
                    <!-- Card Profil Ketua Tim -->
                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-3xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#1E293B] mb-6 flex items-center gap-2">
                            <span>👤</span> Ketua Tim
                        </h3>
                        
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#4F7EF7] flex items-center justify-center text-white font-black text-xl shadow-lg shadow-[#4F7EF7]/20">
                                {{ strtoupper(substr($slot->tim->ketua->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-[#1E293B] text-sm">{{ $slot->tim->ketua->name }}</h4>
                                <p class="text-[10px] text-[#64748B]">{{ $slot->tim->ketua->mahasiswa->program_studi ?? 'Mahasiswa' }}</p>
                            </div>
                        </div>

                        @if($slot->tim->ketua->mahasiswa && $slot->tim->ketua->mahasiswa->keahlian)
                            <div class="flex flex-wrap gap-1.5 mb-6">
                                @foreach(array_slice($slot->tim->ketua->mahasiswa->keahlian, 0, 3) as $skill)
                                    <span class="px-2 py-0.5 bg-white border border-[#E2E8F0] text-[#64748B] text-[10px] rounded-md">{{ $skill }}</span>
                                @endforeach
                            </div>
                        @endif

                        <a href="{{ route('mahasiswa.portfolio', $slot->tim->ketua->mahasiswa->nim) }}" class="block text-center text-xs font-bold text-[#4F7EF7] hover:underline">
                            Lihat Profil Lengkap →
                        </a>
                    </div>

                    <!-- Card Info Anggota Tim -->
                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-3xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#1E293B] mb-4 flex items-center gap-2">
                            <span>👥</span> Anggota Tim Saat Ini
                        </h3>

                        <div class="divide-y divide-[#E2E8F0]">
                            @forelse($anggotaTim as $anggota)
                                <div class="flex items-center gap-3 py-4">
                                    <div class="w-10 h-10 rounded-full bg-[#4F7EF7] flex items-center justify-center text-white font-bold text-xs">
                                        {{ strtoupper(substr($anggota->user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xs font-bold text-[#1E293B] truncate">{{ $anggota->user->name }}</h4>
                                        <p class="text-[9px] text-[#64748B] flex items-center gap-1">
                                            <span>📧</span>
                                            @php
                                                $email = $anggota->user->email;
                                                $isAuthMember = false;
                                                if(Auth::check()) {
                                                    $isAuthMember = ($anggota->id_mahasiswa == Auth::id()) || 
                                                                   ($slot->tim->id_ketua == Auth::id()) ||
                                                                   (Auth::user()->mahasiswa && \App\Models\AnggotaTim::where('id_tim', $slot->id_tim)->where('id_mahasiswa', Auth::user()->id)->exists());
                                                }
                                                
                                                $showFullEmail = $isAuthMember || ($anggota->mahasiswa && $anggota->mahasiswa->privacy_level == 'publik');
                                                
                                                if (!$showFullEmail) {
                                                    $parts = explode('@', $email);
                                                    $nama = substr($parts[0], 0, 1) . '****';
                                                    $domain = $parts[1];
                                                    $email = $nama . '@' . $domain;
                                                }
                                            @endphp
                                            {{ $email }}
                                            @if(!$showFullEmail)
                                                <span class="text-[8px] text-[#94A3B8] italic">(disembunyikan)</span>
                                            @endif
                                        </p>
                                        <p class="text-[9px] text-[#94A3B8]">{{ $anggota->mahasiswa->program_studi ?? 'Mahasiswa' }}</p>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-full text-[8px] font-bold uppercase
                                        {{ $anggota->peran == 'ketua' ? 'bg-[#4F7EF7] text-white' : '' }}
                                        {{ $anggota->peran == 'anggota' ? 'bg-[#DBEAFE] text-[#1E3A6E]' : '' }}
                                        {{ $anggota->peran == 'observer' ? 'bg-[#E2E8F0] text-[#64748B]' : '' }}">
                                        {{ $anggota->peran }}
                                    </span>
                                </div>
                            @empty
                                <div class="bg-[#EFF6FF] rounded-2xl p-4 text-center mt-2">
                                    <p class="text-xs text-[#64748B] italic">Belum ada anggota lain.</p>
                                    <p class="text-[10px] text-[#4F7EF7] font-medium mt-1">Kamu bisa jadi anggota pertama!</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="flex justify-between items-center mt-6 pt-4 border-t border-[#E2E8F0]">
                            <span class="text-[10px] text-[#64748B]">{{ $totalAnggota }} anggota bergabung</span>
                            <span class="text-[10px] font-bold {{ $timPenuh ? 'text-red-500' : 'text-[#10B981]' }}">
                                {{ $totalAnggota }}/{{ $maksAnggota }} Kapasitas
                            </span>
                        </div>
                    </div>

                    <!-- Card Statistik Slot -->
                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-3xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#1E293B] mb-6 flex items-center gap-2">
                            <span>📊</span> Statistik Slot
                        </h3>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded-2xl border border-[#E2E8F0]">
                                <p class="text-2xl font-bold text-[#4F7EF7]">{{ $totalPelamar }}</p>
                                <p class="text-[9px] font-bold text-[#64748B] uppercase tracking-wider">Total Pelamar</p>
                            </div>
                            <div class="bg-white p-4 rounded-2xl border border-[#E2E8F0]">
                                <p class="text-2xl font-bold text-[#10B981]">{{ $diterimaCount }}</p>
                                <p class="text-[9px] font-bold text-[#64748B] uppercase tracking-wider">Diterima</p>
                            </div>
                            <div class="bg-white p-4 rounded-2xl border border-[#E2E8F0]">
                                <p class="text-2xl font-bold text-amber-500">{{ $menungguCount }}</p>
                                <p class="text-[9px] font-bold text-[#64748B] uppercase tracking-wider">Menunggu</p>
                            </div>
                            <div class="bg-white p-4 rounded-2xl border border-[#E2E8F0]">
                                <p class="text-2xl font-bold {{ $slotTersisa > 0 ? 'text-[#10B981]' : 'text-red-500' }}">{{ $slotTersisa }}</p>
                                <p class="text-[9px] font-bold text-[#64748B] uppercase tracking-wider">Slot Sisa</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Deadline & Status -->
                    <div class="bg-[#EFF6FF] border border-[#DBEAFE] rounded-3xl p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-[#1E3A6E] mb-6 flex items-center gap-2">
                            <span>⏰</span> Informasi Waktu
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider mb-1">Deadline Lomba</p>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-[#1E293B]">{{ $slot->tim->lomba->deadline->format('d M Y') }}</p>
                                    @if($slot->tim->lomba->deadline->diffInDays(now()) <= 7)
                                        <span class="bg-red-50 text-red-500 text-[10px] font-bold px-2 py-0.5 rounded-full">
                                            ⚡ {{ $slot->tim->lomba->deadline->diffInDays(now()) }} hari lagi
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider mb-1">Batas Lamar Tim</p>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-[#1E293B]">{{ $slot->batas_waktu->format('d M Y') }}</p>
                                    @if($slot->batas_waktu->diffInDays(now()) <= 3)
                                        <span class="bg-red-50 text-red-500 text-[10px] font-bold px-2 py-0.5 rounded-full">
                                            🔥 Segera ditutup!
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-4 border-t border-[#DBEAFE]">
                                <div class="flex items-center justify-between">
                                    <p class="text-[10px] text-[#64748B] font-bold uppercase tracking-wider">Status Slot</p>
                                    @if($waktuMasihAda && $slotTersisa > 0)
                                        <span class="text-[#065F46] text-[10px] font-bold flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 bg-[#10B981] rounded-full animate-pulse"></span>
                                            BUKA
                                        </span>
                                    @else
                                        <span class="text-red-500 text-[10px] font-bold flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                            DITUTUP
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
