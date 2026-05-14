<x-guest-layout>
    <!-- SECTION 2 — HERO -->
    <section id="home" class="bg-bgPage py-24 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Kolom Kiri -->
            <div class="space-y-6">
                <div class="inline-block bg-primaryLight text-primaryDark text-xs font-semibold rounded-full px-4 py-1.5 shadow-sm">
                    ✨ Platform Lomba Mahasiswa Unsoed
                </div>
                <h1 class="text-[#1E293B] text-5xl md:text-6xl font-bold leading-tight tracking-tight">
                    Temukan Lomba,<br>
                    Raih Prestasi
                </h1>
                <p class="text-textMuted text-lg leading-relaxed max-w-md">
                    SiLomba membantu mahasiswa menemukan informasi lomba terkini, mencari rekan tim yang tepat, dan mengelola perjalanan kompetisi dalam satu platform terpusat.
                </p>
                <div class="flex gap-4 flex-wrap pt-4">
                    <a href="{{ route('register') }}" class="bg-primary text-white rounded-full px-8 py-4 font-bold hover:bg-primaryHover transition shadow-xl shadow-primary/30">
                        Mulai Sekarang
                    </a>
                    <a href="#lomba" class="border border-borderMain bg-white text-textMain rounded-full px-8 py-4 font-bold hover:bg-surface transition">
                        Lihat Lomba
                    </a>
                </div>
                <!-- Social Proof -->
                <div class="flex items-center gap-4 pt-6">
                    <div class="flex -space-x-3">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white text-[10px] font-bold border-2 border-bgPage ring-1 ring-primary/10">JD</div>
                        <div class="w-10 h-10 rounded-full bg-primary/80 flex items-center justify-center text-white text-[10px] font-bold border-2 border-bgPage ring-1 ring-primary/10">AK</div>
                        <div class="w-10 h-10 rounded-full bg-primary/60 flex items-center justify-center text-white text-[10px] font-bold border-2 border-bgPage ring-1 ring-primary/10">MS</div>
                        <div class="w-10 h-10 rounded-full bg-primary/40 flex items-center justify-center text-white text-[10px] font-bold border-2 border-bgPage ring-1 ring-primary/10">RY</div>
                    </div>
                    <p class="text-sm text-textMuted">
                        Bergabung bersama <span class="font-bold text-textMain">2.000+</span> mahasiswa aktif
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Mockup Card -->
            <div class="relative">
                <div class="bg-surface rounded-3xl border border-borderMain shadow-2xl p-6 md:p-8 max-w-sm mx-auto relative z-10">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-textMain text-lg">Lomba Aktif</h3>
                        <span class="bg-primaryLight text-primaryDark text-xs font-bold rounded-full px-4 py-1">12 Lomba</span>
                    </div>

                    <div class="space-y-4">
                        <!-- Item 1 -->
                        <div class="border-b border-borderMain pb-4 last:border-0 last:pb-0">
                            <div class="flex justify-between items-start mb-1">
                                <h4 class="text-sm font-bold text-textMain">National Hackathon 2026</h4>
                                <span class="bg-primaryLight text-primaryDark text-[10px] font-bold rounded-md px-2 py-0.5 uppercase tracking-wide">Teknologi</span>
                            </div>
                            <p class="text-xs text-textMuted flex items-center gap-1">
                                <span>📅</span> 20 Jun 2026
                            </p>
                        </div>
                        <!-- Item 2 -->
                        <div class="border-b border-borderMain pb-4 last:border-0 last:pb-0">
                            <div class="flex justify-between items-start mb-1">
                                <h4 class="text-sm font-bold text-textMain">Business Plan Competition</h4>
                                <span class="bg-primaryLight text-primaryDark text-[10px] font-bold rounded-md px-2 py-0.5 uppercase tracking-wide">Bisnis</span>
                            </div>
                            <p class="text-xs text-textMuted flex items-center gap-1">
                                <span>📅</span> 15 Jun 2026
                            </p>
                        </div>
                        <!-- Item 3 -->
                        <div class="border-b border-borderMain pb-4 last:border-0 last:pb-0">
                            <div class="flex justify-between items-start mb-1">
                                <h4 class="text-sm font-bold text-textMain">Scientific Paper Competition</h4>
                                <span class="bg-primaryLight text-primaryDark text-[10px] font-bold rounded-md px-2 py-0.5 uppercase tracking-wide">Sains</span>
                            </div>
                            <p class="text-xs text-textMuted flex items-center gap-1">
                                <span>📅</span> 30 Jul 2026
                            </p>
                        </div>
                    </div>

                    <a href="#lomba" class="block mt-6 text-center text-primary text-sm font-bold hover:underline transition">
                        Lihat Semua Lomba →
                    </a>
                </div>

                <!-- Floating Cards -->

                <div class="absolute -bottom-6 -right-6 bg-white border border-borderMain rounded-2xl shadow-xl p-4 flex items-center gap-3 z-20">
                    <div class="w-10 h-10 bg-aksenLight rounded-full flex items-center justify-center text-aksen text-xl">✅</div>
                    <div>
                        <p class="text-[10px] text-aksen uppercase font-bold tracking-widest">Lamaran Diterima!</p>
                        <p class="text-xs font-bold text-textMain">Rizky — Hackathon 2026</p>
                        <p class="text-[10px] text-textMuted">Baru saja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3 — STATS -->
    <section class="bg-surface border-y border-borderMain py-16 px-6" 
             x-data="{ 
                 stats: [
                     { id: 1, target: 500, current: 0, label: 'Lomba Tersedia' },
                     { id: 2, target: 2000, current: 0, label: 'Mahasiswa Aktif' },
                     { id: 3, target: 300, current: 0, label: 'Tim Terbentuk' },
                     { id: 4, target: 50, current: 0, label: 'Universitas' }
                 ],
                 started: false,
                 init() {
                     const observer = new IntersectionObserver((entries) => {
                         if (entries[0].isIntersecting && !this.started) {
                             this.started = true;
                             this.stats.forEach(stat => {
                                 let start = 0;
                                 let duration = 1500;
                                 let startTime = null;
                                 const step = (timestamp) => {
                                     if (!startTime) startTime = timestamp;
                                     const progress = Math.min((timestamp - startTime) / duration, 1);
                                     stat.current = Math.floor(progress * stat.target);
                                     if (progress < 1) {
                                         window.requestAnimationFrame(step);
                                     }
                                 };
                                 window.requestAnimationFrame(step);
                             });
                         }
                     }, { threshold: 0.5 });
                     observer.observe(this.$el);
                 }
             }">
        <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
            <template x-for="(stat, index) in stats" :key="stat.id">
                <div class="text-center relative" :class="{ 'md:border-r md:border-borderMain': index < 3 }">
                    <div class="text-4xl md:text-5xl font-black text-primary tracking-tighter">
                        <span x-text="stat.current"></span><span x-text="stat.id === 4 ? '' : '+'"></span>
                    </div>
                    <p class="text-sm text-textMuted font-medium mt-2" x-text="stat.label"></p>
                </div>
            </template>
        </div>
    </section>

    <!-- SECTION 4 — FITUR UNGGULAN -->
    <section id="fitur" class="bg-bgPage py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16 space-y-4">
                <span class="bg-primaryLight text-primaryDark text-xs font-bold rounded-full px-6 py-2 uppercase tracking-widest">Fitur Utama</span>
                <h2 class="text-4xl md:text-5xl font-black text-textMain tracking-tight">
                    Semua yang Kamu Butuhkan<br>
                    <span class="text-primary">dalam Satu Platform</span>
                </h2>
                <p class="text-textMuted text-lg max-w-xl mx-auto leading-relaxed">
                    Kami menyediakan alat terlengkap untuk membantu Anda meraih prestasi dari tingkat universitas hingga internasional.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- CARD 1 — Direktori Lomba -->
                <div class="bg-surface rounded-3xl border border-borderMain p-8 hover:border-primary hover:shadow-2xl transition duration-500 group">
                    <div class="w-16 h-16 bg-primaryLight rounded-2xl flex items-center justify-center text-3xl mb-8 group-hover:scale-110 transition duration-500">🔍</div>
                    <h3 class="text-xl font-bold text-textMain mb-4">Direktori Lomba Terpusat</h3>
                    <p class="text-sm text-textMuted leading-relaxed mb-8">
                        Temukan ratusan lomba dari berbagai kategori dalam satu tempat yang terfilter dan selalu up-to-date.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-sm font-medium text-textMain">
                            <span class="w-5 h-5 rounded-full bg-aksenLight text-aksenDark flex items-center justify-center text-[10px] font-bold">✓</span>
                            Filter kategori & deadline
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-textMain">
                            <span class="w-5 h-5 rounded-full bg-aksenLight text-aksenDark flex items-center justify-center text-[10px] font-bold">✓</span>
                            Badge "Segera Berakhir" otomatis
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-textMain">
                            <span class="w-5 h-5 rounded-full bg-aksenLight text-aksenDark flex items-center justify-center text-[10px] font-bold">✓</span>
                            Notifikasi H-7, H-3, H-1
                        </li>
                    </ul>
                </div>


                <!-- CARD 3 — Portofolio -->
                <div class="bg-surface rounded-3xl border border-borderMain p-8 hover:border-primary hover:shadow-2xl transition duration-500 group">
                    <div class="w-16 h-16 bg-primaryLight rounded-2xl flex items-center justify-center text-3xl mb-8 group-hover:scale-110 transition duration-500">🏅</div>
                    <h3 class="text-xl font-bold text-textMain mb-4">Portofolio Prestasi Otomatis</h3>
                    <p class="text-sm text-textMuted leading-relaxed mb-8">
                        Dapatkan halaman profil profesional yang menampilkan riwayat kompetisi dan prestasi Anda secara otomatis.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-sm font-medium text-textMain">
                            <span class="w-5 h-5 rounded-full bg-aksenLight text-aksenDark flex items-center justify-center text-[10px] font-bold">✓</span>
                            Update otomatis setiap ikut lomba
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-textMain">
                            <span class="w-5 h-5 rounded-full bg-aksenLight text-aksenDark flex items-center justify-center text-[10px] font-bold">✓</span>
                            Badge keahlian terverifikasi
                        </li>
                        <li class="flex items-center gap-3 text-sm font-medium text-textMain">
                            <span class="w-5 h-5 rounded-full bg-aksenLight text-aksenDark flex items-center justify-center text-[10px] font-bold">✓</span>
                            Profil publik yang bisa dibagikan
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5 — CARA KERJA -->
    <section id="tentang" class="bg-surface py-24 px-6 relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-black text-textMain mb-4">Cara Kerja SiLomba</h2>
                <p class="text-textMuted text-lg">3 Langkah Mudah Menuju Prestasi</p>
            </div>

            <div class="relative grid grid-cols-1 md:grid-cols-3 gap-12 max-w-5xl mx-auto">
                <!-- Connector Line -->
                <div class="hidden md:block absolute top-12 left-[15%] right-[15%] h-0.5 border-t-2 border-dashed border-borderMain z-0"></div>

                <!-- STEP 1 -->
                <div class="text-center relative z-10 space-y-6">
                    <div class="w-20 h-20 rounded-full bg-primary text-white font-black text-2xl mx-auto flex items-center justify-center shadow-xl shadow-primary/30 ring-8 ring-bgPage">
                        01
                    </div>
                    <h3 class="font-bold text-textMain text-xl">Buat Profil Keahlian</h3>
                    <p class="text-sm text-textMuted leading-relaxed max-w-[250px] mx-auto">
                        Isi keahlian, minat lomba, dan link portofoliomu. Profil ini jadi dasar Tim Finder merekomendasikan tim yang cocok.
                    </p>
                </div>

                <!-- STEP 2 -->
                <div class="text-center relative z-10 space-y-6">
                    <div class="w-20 h-20 rounded-full bg-primary text-white font-black text-2xl mx-auto flex items-center justify-center shadow-xl shadow-primary/30 ring-8 ring-bgPage">
                        02
                    </div>
                    <h3 class="font-bold text-textMain text-xl">Temukan Lomba</h3>
                    <p class="text-sm text-textMuted leading-relaxed max-w-[250px] mx-auto">
                        Jelajahi direktori lomba terpusat dengan filter kategori dan deadline yang memudahkan pencarianmu.
                    </p>
                </div>

                <!-- STEP 3 -->
                <div class="text-center relative z-10 space-y-6">
                    <div class="w-20 h-20 rounded-full bg-primary text-white font-black text-2xl mx-auto flex items-center justify-center shadow-xl shadow-primary/30 ring-8 ring-bgPage">
                        03
                    </div>
                    <h3 class="font-bold text-textMain text-xl">Ikut Lomba & Catat Prestasi</h3>
                    <p class="text-sm text-textMuted leading-relaxed max-w-[250px] mx-auto">
                        Pantau perkembangan pendaftaran, ikuti lomba, dan setiap pencapaian otomatis tersimpan di portofolio publikmu.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6 — PREVIEW LOMBA -->
    <section id="lomba" class="bg-bgPage py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-black text-textMain mb-2">Lomba Terkini</h2>
                    <p class="text-textMuted">Kompetisi terbaru yang bisa kamu ikuti hari ini</p>
                </div>
                <a href="{{ route('login') }}" class="text-primary font-bold hover:underline transition group">
                    Lihat Semua <span class="group-hover:translate-x-1 inline-block transition">→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Lomba 1 -->
                <div class="bg-surface rounded-3xl border border-borderMain overflow-hidden hover:shadow-2xl transition duration-500">
                    <div class="h-40 bg-primaryLight relative flex items-center justify-center overflow-hidden">
                        <span class="text-7xl">💻</span>
                        <div class="absolute top-4 left-4 bg-primary text-white text-[10px] font-black rounded-full px-3 py-1 uppercase tracking-widest">🔥 Populer</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-textMain text-lg mb-1">National Hackathon 2026</h3>
                        <p class="text-xs text-textMuted mb-4">Kemendikbudristek</p>
                        
                        <div class="flex gap-4 mb-4">
                            <span class="text-[10px] font-bold text-textMuted uppercase flex items-center gap-1">📅 20 Jun 2026</span>
                            <span class="text-[10px] font-bold text-textMuted uppercase flex items-center gap-1">🌏 Nasional</span>
                        </div>
                        
                        <p class="text-aksen font-bold text-sm mb-6">💰 Rp 50.000.000</p>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-borderMain">
                            <a href="{{ route('login') }}" class="text-primary text-sm font-bold hover:underline">Detail →</a>
                            <span class="bg-aksenLight text-aksenDark text-[10px] font-black rounded-full px-3 py-1 uppercase">Tim Tersedia</span>
                        </div>
                    </div>
                </div>

                <!-- Lomba 2 -->
                <div class="bg-surface rounded-3xl border border-borderMain overflow-hidden hover:shadow-2xl transition duration-500">
                    <div class="h-40 bg-bgPage relative flex items-center justify-center overflow-hidden border-b border-borderMain">
                        <span class="text-7xl">📊</span>
                        <div class="absolute top-4 left-4 bg-primaryDark text-white text-[10px] font-black rounded-full px-3 py-1 uppercase tracking-widest">⚡ Segera Berakhir</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-textMain text-lg mb-1">Business Plan Competition</h3>
                        <p class="text-xs text-textMuted mb-4">Universitas Indonesia</p>
                        
                        <div class="flex gap-4 mb-4">
                            <span class="text-[10px] font-bold text-textMuted uppercase flex items-center gap-1">📅 15 Jun 2026</span>
                            <span class="text-[10px] font-bold text-textMuted uppercase flex items-center gap-1">🌏 Nasional</span>
                        </div>
                        
                        <p class="text-aksen font-bold text-sm mb-6">💰 Rp 25.000.000</p>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-borderMain">
                            <a href="{{ route('login') }}" class="text-primary text-sm font-bold hover:underline">Detail →</a>
                        </div>
                    </div>
                </div>

                <!-- Lomba 3 -->
                <div class="bg-surface rounded-3xl border border-borderMain overflow-hidden hover:shadow-2xl transition duration-500">
                    <div class="h-40 bg-surface relative flex items-center justify-center overflow-hidden border-b border-borderMain">
                        <span class="text-7xl">🧪</span>
                        <div class="absolute top-4 left-4 bg-primaryLight text-primaryDark text-[10px] font-black rounded-full px-3 py-1 uppercase tracking-widest">🌏 Internasional</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-textMain text-lg mb-1">Scientific Paper Competition</h3>
                        <p class="text-xs text-textMuted mb-4">ITB Research Center</p>
                        
                        <div class="flex gap-4 mb-4">
                            <span class="text-[10px] font-bold text-textMuted uppercase flex items-center gap-1">📅 30 Jul 2026</span>
                            <span class="text-[10px] font-bold text-textMuted uppercase flex items-center gap-1">🌏 Internasional</span>
                        </div>
                        
                        <p class="text-aksen font-bold text-sm mb-6">💰 Rp 15.000.000</p>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-borderMain">
                            <a href="{{ route('login') }}" class="text-primary text-sm font-bold hover:underline">Detail →</a>
                            <span class="bg-aksenLight text-aksenDark text-[10px] font-black rounded-full px-3 py-1 uppercase">Tim Tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7 — TESTIMONI -->
    <section class="bg-surface py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-textMain mb-4">Kata Mereka</h2>
                <p class="text-textMuted text-lg">Mahasiswa dari berbagai universitas sudah merasakan manfaatnya</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testi 1 -->
                <div class="bg-bgPage rounded-3xl p-8 border border-borderMain relative">
                    <span class="absolute top-4 right-8 text-[#DBEAFE] text-8xl font-serif leading-none select-none">"</span>
                    <div class="flex text-[#F59E0B] text-sm mb-6">⭐⭐⭐⭐⭐</div>
                    <p class="text-sm text-textMain leading-relaxed italic mb-8 relative z-10">
                        "Berkat SiLomba, saya tidak pernah lagi ketinggalan info lomba bergengsi. Filternya sangat membantu mencari yang sesuai minat saya."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold">RP</div>
                        <div>
                            <p class="text-sm font-bold text-textMain">Rizky Pratama</p>
                            <p class="text-[10px] text-textMuted font-medium uppercase tracking-wider">Informatika, Unsoed</p>
                        </div>
                    </div>
                </div>

                <!-- Testi 2 -->
                <div class="bg-bgPage rounded-3xl p-8 border border-borderMain relative">
                    <span class="absolute top-4 right-8 text-[#DBEAFE] text-8xl font-serif leading-none select-none">"</span>
                    <div class="flex text-[#F59E0B] text-sm mb-6">⭐⭐⭐⭐⭐</div>
                    <p class="text-sm text-textMain leading-relaxed italic mb-8 relative z-10">
                        "Notifikasi deadline lomba bener-bener ngebantu. Sebelumnya sering ketinggalan info lomba gara-gara tenggelam di grup WA."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold">SN</div>
                        <div>
                            <p class="text-sm font-bold text-textMain">Siti Nur Aisyah</p>
                            <p class="text-[10px] text-textMuted font-medium uppercase tracking-wider">Manajemen, UGM</p>
                        </div>
                    </div>
                </div>

                <!-- Testi 3 -->
                <div class="bg-bgPage rounded-3xl p-8 border border-borderMain relative">
                    <span class="absolute top-4 right-8 text-[#DBEAFE] text-8xl font-serif leading-none select-none">"</span>
                    <div class="flex text-[#F59E0B] text-sm mb-6">⭐⭐⭐⭐⭐</div>
                    <p class="text-sm text-textMain leading-relaxed italic mb-8 relative z-10">
                        "Portofolio prestasi otomatis terupdate tiap ikut lomba. Tinggal share link ke HRD pas melamar kerja!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold">BA</div>
                        <div>
                            <p class="text-sm font-bold text-textMain">Bima Ardiansyah</p>
                            <p class="text-[10px] text-textMuted font-medium uppercase tracking-wider">DKV, ITS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8 — CTA PENUTUP -->
    <section class="bg-primary py-24 px-6 text-center">
        <div class="max-w-4xl mx-auto space-y-8">
            <h2 class="text-white text-4xl md:text-5xl font-black tracking-tight leading-tight">
                Siap Mulai Perjalanan Lomba-mu?
            </h2>
            <p class="text-blue-100 text-lg md:text-xl">
                Bergabung gratis. Temukan lomba dan tim yang tepat hari ini.
            </p>
            <div class="flex justify-center gap-4 flex-wrap pt-4">
                <a href="{{ route('register') }}" class="bg-surface text-primary font-black rounded-full px-10 py-4 hover:bg-white hover:shadow-2xl hover:scale-105 transition duration-300">
                    Daftar Sekarang — Gratis
                </a>
                <a href="#fitur" class="border-2 border-white/40 text-white font-black rounded-full px-10 py-4 hover:bg-white/10 transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
            <p class="text-blue-200 text-xs pt-4">
                Tidak perlu kartu kredit · Gratis untuk mahasiswa aktif
            </p>
        </div>
    </section>
</x-guest-layout>
