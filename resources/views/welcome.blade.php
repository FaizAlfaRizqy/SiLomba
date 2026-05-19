<x-guest-layout>
    <!-- SECTION 2 — HERO -->
    <section id="home" class="bg-[#F5FAFA] pt-32 pb-24 px-6 overflow-hidden flex flex-col items-center text-center">
        <!-- Top Nav / Overrides (Simulating the clean aesthetic) -->
        
        <!-- Main Headline -->
        <h1 class="text-[#000000] text-5xl md:text-7xl tracking-tight mb-6 max-w-4xl font-serif">
            Temukan Lomba,<br>
            <span class="font-bold text-[#00524D]">Raih Prestasi Bersama</span>
        </h1>
        
        <!-- Subheadline -->
        <p class="text-[#48A89A] text-lg md:text-xl max-w-2xl mb-10 leading-relaxed font-medium">
            Platform terpusat untuk mencari informasi lomba, menemukan rekan tim yang tepat, dan meraih juara lebih cepat dan cerdas.
        </p>
        
        <!-- CTA Button -->
        <a href="{{ route('register') }}" class="bg-[#000000] text-white rounded-full px-8 py-3.5 font-semibold hover:bg-[#00524D] transition shadow-lg shadow-[#00524D]/20 flex items-center gap-2 mb-16 md:mb-24">
            Mulai Sekarang <span class="text-xl leading-none">&rarr;</span>
        </a>

        <!-- Cards Arc Carousel Simulation -->
        <div class="relative w-full max-w-5xl mx-auto h-[220px] md:h-[400px] flex justify-center items-start perspective-1000">
            
            <!-- Far Left Card -->
            <div class="absolute z-10 w-[100px] h-[140px] md:w-[180px] md:h-[260px] rounded-2xl md:rounded-3xl bg-[#00524D] overflow-hidden shadow-lg transition duration-700 hover:z-40 hover:scale-110 hover:-rotate-6
                        -translate-x-[130px] translate-y-[60px] -rotate-[15deg]
                        md:-translate-x-[350px] md:translate-y-[100px] md:-rotate-[15deg]">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover mix-blend-luminosity opacity-60 hover:opacity-100 hover:mix-blend-normal transition duration-500" alt="Student">
                <div class="absolute inset-0 bg-[#48A89A]/30 mix-blend-overlay pointer-events-none"></div>
            </div>
            
            <!-- Mid Left Card -->
            <div class="absolute z-20 w-[120px] h-[170px] md:w-[220px] md:h-[310px] rounded-2xl md:rounded-3xl bg-[#00524D] overflow-hidden shadow-xl transition duration-700 hover:z-40 hover:scale-110 hover:-rotate-3
                        -translate-x-[75px] translate-y-[30px] -rotate-[8deg]
                        md:-translate-x-[180px] md:translate-y-[50px] md:-rotate-[8deg]">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover mix-blend-luminosity opacity-70 hover:opacity-100 hover:mix-blend-normal transition duration-500" alt="Student">
                <div class="absolute inset-0 bg-[#48A89A]/20 mix-blend-overlay pointer-events-none"></div>
            </div>
            
            <!-- Center Card (Main) -->
            <div class="absolute z-30 w-[150px] h-[200px] md:w-[280px] md:h-[380px] rounded-2xl md:rounded-[2rem] bg-[#00524D] overflow-hidden shadow-2xl transition duration-700 hover:scale-105 hover:-translate-y-4
                        translate-x-0 translate-y-0 rotate-0 ring-4 ring-[#CBEFEB] ring-offset-4 ring-offset-[#F5FAFA]">
                <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover" alt="Student">
                <div class="absolute inset-0 bg-gradient-to-t from-[#000000]/90 via-[#000000]/20 to-transparent flex flex-col justify-end p-4 md:p-6 text-left">
                    <h3 class="text-white font-bold text-sm md:text-2xl mb-1">Rizky Pratama</h3>
                    <p class="text-[#CBEFEB] text-[10px] md:text-sm font-medium">Informatika &middot; UI/UX</p>
                </div>
            </div>
            
            <!-- Mid Right Card -->
            <div class="absolute z-20 w-[120px] h-[170px] md:w-[220px] md:h-[310px] rounded-2xl md:rounded-3xl bg-[#00524D] overflow-hidden shadow-xl transition duration-700 hover:z-40 hover:scale-110 hover:rotate-3
                        translate-x-[75px] translate-y-[30px] rotate-[8deg]
                        md:translate-x-[180px] md:translate-y-[50px] md:rotate-[8deg]">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover mix-blend-luminosity opacity-70 hover:opacity-100 hover:mix-blend-normal transition duration-500" alt="Student">
                <div class="absolute inset-0 bg-[#48A89A]/20 mix-blend-overlay pointer-events-none"></div>
            </div>
            
            <!-- Far Right Card -->
            <div class="absolute z-10 w-[100px] h-[140px] md:w-[180px] md:h-[260px] rounded-2xl md:rounded-3xl bg-[#00524D] overflow-hidden shadow-lg transition duration-700 hover:z-40 hover:scale-110 hover:rotate-6
                        translate-x-[130px] translate-y-[60px] rotate-[15deg]
                        md:translate-x-[350px] md:translate-y-[100px] md:rotate-[15deg]">
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover mix-blend-luminosity opacity-60 hover:opacity-100 hover:mix-blend-normal transition duration-500" alt="Student">
                <div class="absolute inset-0 bg-[#48A89A]/30 mix-blend-overlay pointer-events-none"></div>
            </div>
        </div>
        
        <!-- Feature Highlights Below -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-16 max-w-4xl mx-auto mt-16 md:mt-24 text-center relative z-20 px-4">
            <div>
                <h4 class="text-[#000000] font-bold text-base md:text-lg mb-2">Direktori Terpusat</h4>
                <p class="text-[#48A89A] text-xs md:text-sm leading-relaxed">
                    Temukan informasi lomba terbaru yang dikurasi khusus untuk minat dan jurusanmu.
                </p>
            </div>
            <div class="md:border-x md:border-[#CBEFEB] md:px-8">
                <h4 class="text-[#000000] font-bold text-base md:text-lg mb-2">Tim Finder Cerdas</h4>
                <p class="text-[#48A89A] text-xs md:text-sm leading-relaxed">
                    Cari rekan satu tim dengan keahlian spesifik menggunakan algoritma pencocokan.
                </p>
            </div>
            <div>
                <h4 class="text-[#000000] font-bold text-base md:text-lg mb-2">Portofolio Prestasi</h4>
                <p class="text-[#48A89A] text-xs md:text-sm leading-relaxed">
                    Catat setiap pencapaian dan bangun portofolio profesionalmu secara otomatis.
                </p>
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
                    <div class="text-4xl md:text-5xl font-black text-[#00524D] tracking-tighter">
                        <span x-text="stat.current"></span><span x-text="stat.id === 4 ? '' : '+'"></span>
                    </div>
                    <p class="text-sm text-textMuted font-medium mt-2" x-text="stat.label"></p>
                </div>
            </template>
        </div>
    </section>

    <!-- SECTION 4 — FITUR UNGGULAN -->
    <section id="fitur" class="bg-[#F5FAFA] py-24 px-6 relative overflow-hidden">
        <!-- Dekoratif Blob -->
        <div class="w-96 h-96 rounded-full bg-[#CBEFEB] opacity-40 blur-3xl absolute -top-20 -right-20 z-0"></div>
        <div class="w-72 h-72 rounded-full bg-[#CBEFEB] opacity-30 blur-3xl absolute -bottom-10 -left-10 z-0"></div>

        <div class="max-w-6xl mx-auto relative z-10">
            <!-- Header Section -->
            <div class="text-center mb-16 space-y-4">
                <span class="bg-[#CBEFEB] text-[#00524D] font-medium border border-[#48A89A]/30 rounded-full px-4 py-1 text-xs inline-block">✦ Fitur Utama</span>
                <h2 class="text-[#053931] text-4xl font-bold">
                    Semua yang Kamu Butuhkan<br>
                    <span class="text-[#00524D] text-4xl font-bold">dalam Satu Platform</span>
                </h2>
                <p class="text-[#6B9E9A] text-base max-w-xl mx-auto leading-relaxed">
                    Kami menyediakan alat terlengkap untuk membantu Anda meraih prestasi dari tingkat universitas hingga internasional.
                </p>
            </div>

            <!-- Layout Grid — Bento Style -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-w-6xl mx-auto">
                <!-- CARD 1 — Tim Finder -->
                <div class="fitur-card opacity-0 translate-y-8 transition duration-700 bg-[#00524D] rounded-3xl p-8 lg:col-span-2 md:col-span-2 col-span-1 min-h-[280px] overflow-hidden relative hover:shadow-xl hover:shadow-[#00524D]/20">
                    <!-- Dekoratif dalam card -->
                    <div class="w-48 h-48 rounded-full bg-white/5 absolute -bottom-10 -right-10"></div>
                    <div class="w-24 h-24 rounded-full bg-white/5 absolute -top-5 -right-5"></div>

                    <div class="flex flex-col md:flex-row gap-8 relative z-10 h-full">
                        <div class="flex-1">
                            <div class="bg-white/20 text-white text-xs rounded-full px-3 py-1 mb-4 inline-block">⭐ Fitur Unggulan</div>
                            <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center mb-4 text-2xl">👥</div>
                            <h3 class="text-white text-2xl font-bold mb-2">Tim Finder</h3>
                            <p class="text-[#CBEFEB] text-sm mb-1">Cari Rekan Tim yang Tepat</p>
                            <p class="text-white/70 text-sm leading-relaxed max-w-sm mb-6">
                                Sistem matching otomatis mempertemukan kamu dengan rekan tim berdasarkan keahlian dan minat lomba.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full bg-[#48A89A] flex items-center justify-center text-white text-xs">✓</span>
                                    <span class="text-white/90 text-sm">Matching otomatis berbasis keahlian</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full bg-[#48A89A] flex items-center justify-center text-white text-xs">✓</span>
                                    <span class="text-white/90 text-sm">Lamar & rekrut tim secara terbuka</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-5 h-5 rounded-full bg-[#48A89A] flex items-center justify-center text-white text-xs">✓</span>
                                    <span class="text-white/90 text-sm">Chat tim terintegrasi</span>
                                </li>
                            </ul>
                            <a href="{{ route('login') }}" class="bg-white text-[#00524D] font-semibold rounded-full px-6 py-2.5 text-sm hover:bg-[#CBEFEB] transition inline-flex items-center gap-2 mt-auto">
                                Coba Tim Finder →
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <!-- Visual mockup mini card -->
                            <div class="bg-white/10 rounded-2xl p-4 w-64 border border-white/20">
                                <div class="flex items-center gap-2 mb-3 text-white/80 text-xs font-medium">
                                    🔍 Tim yang Cocok Untukmu
                                </div>
                                <div class="space-y-2">
                                    <div class="bg-white/10 rounded-xl p-2.5 flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#48A89A] flex items-center justify-center text-white text-xs font-bold">AK</div>
                                        <div class="flex-1">
                                            <p class="text-white text-xs font-medium">Ahmad</p>
                                            <p class="text-white/60 text-[10px]">UI/UX Design</p>
                                        </div>
                                        <div class="bg-[#48A89A]/30 text-[#CBEFEB] text-[10px] rounded-full px-2 py-0.5">95% cocok</div>
                                    </div>
                                    <div class="bg-white/10 rounded-xl p-2.5 flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#48A89A] flex items-center justify-center text-white text-xs font-bold">BM</div>
                                        <div class="flex-1">
                                            <p class="text-white text-xs font-medium">Bima</p>
                                            <p class="text-white/60 text-[10px]">Backend Dev</p>
                                        </div>
                                        <div class="bg-[#48A89A]/30 text-[#CBEFEB] text-[10px] rounded-full px-2 py-0.5">88% cocok</div>
                                    </div>
                                    <div class="bg-white/10 rounded-xl p-2.5 flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-[#48A89A] flex items-center justify-center text-white text-xs font-bold">CN</div>
                                        <div class="flex-1">
                                            <p class="text-white text-xs font-medium">Cinta</p>
                                            <p class="text-white/60 text-[10px]">Data Analyst</p>
                                        </div>
                                        <div class="bg-[#48A89A]/30 text-[#CBEFEB] text-[10px] rounded-full px-2 py-0.5">85% cocok</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 — Direktori Lomba -->
                <div class="fitur-card opacity-0 translate-y-8 transition duration-700 bg-[#F5FAFA] border border-[#CBEFEB] rounded-3xl p-6 lg:col-span-1 md:col-span-1 col-span-1 hover:border-[#48A89A] hover:shadow-lg hover:shadow-[#CBEFEB] flex flex-col">
                    <div class="w-12 h-12 bg-[#CBEFEB] rounded-2xl flex items-center justify-center mb-4 text-xl">🔍</div>
                    <h3 class="text-[#053931] font-bold text-lg mb-2">Direktori Lomba</h3>
                    <p class="text-[#00524D] text-xs font-medium mb-3">500+ lomba terpusat & terfilter</p>
                    <p class="text-[#6B9E9A] text-sm leading-relaxed mb-4">
                        Temukan lomba dari berbagai kategori dalam satu tempat yang selalu up-to-date.
                    </p>
                    <ul class="space-y-1.5 mb-6 flex-1">
                        <li class="flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-[#CBEFEB] text-[#00524D] text-[10px] flex items-center justify-center font-bold">✓</span>
                            <span class="text-sm text-[#053931]">Filter kategori & deadline</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-[#CBEFEB] text-[#00524D] text-[10px] flex items-center justify-center font-bold">✓</span>
                            <span class="text-sm text-[#053931]">Badge "Segera Berakhir" otomatis</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-[#CBEFEB] text-[#00524D] text-[10px] flex items-center justify-center font-bold">✓</span>
                            <span class="text-sm text-[#053931]">Notifikasi H-7, H-3, H-1</span>
                        </li>
                    </ul>
                    <div class="flex justify-between text-center mt-4 pt-4 border-t border-[#CBEFEB]">
                        <div>
                            <p class="text-lg font-bold text-[#00524D]">500+</p>
                            <p class="text-xs text-[#6B9E9A]">Lomba</p>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-[#00524D]">20+</p>
                            <p class="text-xs text-[#6B9E9A]">Kategori</p>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 — Notifikasi -->
                <div class="fitur-card opacity-0 translate-y-8 transition duration-700 bg-[#053931] rounded-3xl p-6 lg:col-span-1 md:col-span-1 col-span-1 hover:shadow-xl hover:shadow-[#053931]/30 flex flex-col">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mb-4 text-xl">🔔</div>
                    <h3 class="text-white font-bold text-lg mb-2">Notifikasi Pintar</h3>
                    <p class="text-white/70 text-sm leading-relaxed mb-4">
                        Tidak akan pernah lagi ketinggalan info lomba penting.
                    </p>
                    <ul class="space-y-2 mb-6 flex-1">
                        <li class="flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-[#48A89A]/30 text-[#48A89A] text-[10px] flex items-center justify-center font-bold">✓</span>
                            <span class="text-sm text-white/80">Reminder H-7, H-3, H-1</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-[#48A89A]/30 text-[#48A89A] text-[10px] flex items-center justify-center font-bold">✓</span>
                            <span class="text-sm text-white/80">Update status lamaran tim</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-4 h-4 rounded-full bg-[#48A89A]/30 text-[#48A89A] text-[10px] flex items-center justify-center font-bold">✓</span>
                            <span class="text-sm text-white/80">Info open slot baru</span>
                        </li>
                    </ul>
                    <div class="space-y-2 mt-4">
                        <div class="bg-white/10 rounded-xl p-2.5 flex items-center gap-2">
                            <span class="text-sm">🔥</span>
                            <span class="text-white/80 text-xs">Hackathon — 3 hari lagi</span>
                            <span class="text-white/40 text-[10px] ml-auto">baru</span>
                        </div>
                        <div class="bg-white/10 rounded-xl p-2.5 flex items-center gap-2">
                            <span class="text-sm">✅</span>
                            <span class="text-white/80 text-xs">Lamaran diterima!</span>
                            <span class="text-white/40 text-[10px] ml-auto">1j lalu</span>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 — Portofolio -->
                <div class="fitur-card opacity-0 translate-y-8 transition duration-700 bg-[#F5FAFA] border border-[#CBEFEB] rounded-3xl p-8 lg:col-span-2 md:col-span-2 col-span-1 hover:border-[#48A89A] hover:shadow-lg hover:shadow-[#CBEFEB] flex flex-col md:flex-row gap-8">
                    <div class="flex-1">
                        <div class="w-14 h-14 bg-[#CBEFEB] rounded-2xl flex items-center justify-center mb-4 text-2xl">🏅</div>
                        <h3 class="text-[#053931] text-xl font-bold mb-2">Portofolio Prestasi</h3>
                        <p class="text-[#00524D] text-sm font-medium mb-3">Terupdate Otomatis</p>
                        <p class="text-[#6B9E9A] text-sm leading-relaxed mb-5">
                            Setiap lomba yang diikuti otomatis tercatat di portofolio publikmu. Tunjukkan pencapaian ke siapa saja dengan satu link.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2">
                                <span class="text-[#00524D] text-sm font-bold">✓</span>
                                <span class="text-[#6B9E9A] text-sm">Update otomatis setiap ikut lomba</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00524D] text-sm font-bold">✓</span>
                                <span class="text-[#6B9E9A] text-sm">Badge keahlian terverifikasi admin</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00524D] text-sm font-bold">✓</span>
                                <span class="text-[#6B9E9A] text-sm">Profil publik dengan link unik</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-[#00524D] text-sm font-bold">✓</span>
                                <span class="text-[#6B9E9A] text-sm">Riwayat prestasi lengkap</span>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden md:block w-64">
                        <!-- Mockup card portofolio mini -->
                        <div class="bg-white rounded-2xl p-4 border border-[#CBEFEB] shadow-sm">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-[#00524D] text-white font-bold flex items-center justify-center text-sm">RP</div>
                                <div>
                                    <p class="text-sm font-bold text-[#053931]">Rizky Pratama</p>
                                    <p class="text-[10px] text-[#6B9E9A]">Informatika</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-1 mb-3">
                                <span class="bg-[#CBEFEB] text-[#00524D] text-[10px] rounded-full px-2.5 py-1">Laravel</span>
                                <span class="bg-[#CBEFEB] text-[#00524D] text-[10px] rounded-full px-2.5 py-1">UI/UX</span>
                                <span class="bg-[#CBEFEB] text-[#00524D] text-[10px] rounded-full px-2.5 py-1">Python</span>
                            </div>
                            <div class="space-y-1.5">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm">🏆</span>
                                    <span class="text-[10px] text-[#053931] font-medium truncate flex-1">Hackathon Nasional</span>
                                    <span class="bg-[#CBEFEB] text-[#00524D] text-[10px] rounded-full px-2 py-0.5 whitespace-nowrap">Juara 2</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm">🥈</span>
                                    <span class="text-[10px] text-[#053931] font-medium truncate flex-1">Business Plan</span>
                                    <span class="bg-[#CBEFEB] text-[#00524D] text-[10px] rounded-full px-2 py-0.5 whitespace-nowrap">Finalis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 5 — Manajemen Tim -->
                <div class="fitur-card opacity-0 translate-y-8 transition duration-700 bg-[#48A89A] rounded-3xl p-6 lg:col-span-1 md:col-span-1 col-span-1 hover:shadow-xl hover:shadow-[#48A89A]/30 flex flex-col">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4 text-xl">⚙️</div>
                    <h3 class="text-white font-bold text-lg mb-2">Manajemen Tim</h3>
                    <p class="text-white/80 text-sm leading-relaxed mb-4">
                        Kelola anggota, atur peran, dan pantau progres persiapan lomba.
                    </p>
                    <ul class="space-y-2 mb-6 flex-1">
                        <li class="flex items-center gap-2">
                            <span class="text-white/90 text-sm font-bold">✓</span>
                            <span class="text-white/90 text-sm">Terima/tolak lamaran anggota</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-white/90 text-sm font-bold">✓</span>
                            <span class="text-white/90 text-sm">Atur peran ketua/anggota</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-white/90 text-sm font-bold">✓</span>
                            <span class="text-white/90 text-sm">Checklist persiapan lomba</span>
                        </li>
                    </ul>
                    <div class="flex justify-between text-center mt-4 pt-4 border-t border-white/20">
                        <div>
                            <p class="text-lg font-bold text-white">300+</p>
                            <p class="text-xs text-white/70">Tim</p>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-white">1.200+</p>
                            <p class="text-xs text-white/70">Anggota</p>
                        </div>
                    </div>
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
                <div class="hidden md:block absolute top-12 left-[15%] right-[15%] h-0.5 border-t-2 border-dashed border-[#CBEFEB] z-0"></div>

                <!-- STEP 1 -->
                <div class="text-center relative z-10 space-y-6">
                    <div class="w-20 h-20 rounded-full bg-[#00524D] text-white font-black text-2xl mx-auto flex items-center justify-center shadow-xl shadow-[#00524D]/30 ring-8 ring-bgPage">
                        01
                    </div>
                    <h3 class="font-bold text-textMain text-xl">Buat Profil Keahlian</h3>
                    <p class="text-sm text-textMuted leading-relaxed max-w-[250px] mx-auto">
                        Isi keahlian, minat lomba, dan link portofoliomu. Profil ini jadi dasar Tim Finder merekomendasikan tim yang cocok.
                    </p>
                </div>

                <!-- STEP 2 -->
                <div class="text-center relative z-10 space-y-6">
                    <div class="w-20 h-20 rounded-full bg-[#00524D] text-white font-black text-2xl mx-auto flex items-center justify-center shadow-xl shadow-[#00524D]/30 ring-8 ring-bgPage">
                        02
                    </div>
                    <h3 class="font-bold text-textMain text-xl">Temukan Lomba</h3>
                    <p class="text-sm text-textMuted leading-relaxed max-w-[250px] mx-auto">
                        Jelajahi direktori lomba terpusat dengan filter kategori dan deadline yang memudahkan pencarianmu.
                    </p>
                </div>

                <!-- STEP 3 -->
                <div class="text-center relative z-10 space-y-6">
                    <div class="w-20 h-20 rounded-full bg-[#00524D] text-white font-black text-2xl mx-auto flex items-center justify-center shadow-xl shadow-[#00524D]/30 ring-8 ring-bgPage">
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        window.dispatchEvent(new CustomEvent('scroll-section', {
                            detail: { sectionId: entry.target.id }
                        }));
                    }
                });
            },
            {
                threshold: 0.4,
                rootMargin: '-80px 0px -20% 0px'
            }
        );

        document.querySelectorAll('section[id]').forEach(section => {
            if (['home','lomba','fitur','tentang'].includes(section.id)) {
                observer.observe(section);
            }
        });

        const cards = document.querySelectorAll('.fitur-card');
        const cardObs = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });
        cards.forEach(c => cardObs.observe(c));
    });
    </script>
</x-guest-layout>
