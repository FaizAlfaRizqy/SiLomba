<x-guest-layout>
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .bg-cream { background-color: #E8F3E9; }
        .text-dark { color: #051F20; }
        .text-muted { color: #235347; }
        .bg-card-brown { background-color: #163832; }
        .bg-card-green { background-color: #0B2B26; }
        .bg-card-light { background-color: #8EB69B; }
    </style>

    <div class="bg-cream min-h-screen font-sans">
        <!-- SECTION 2 — HERO -->
        <section id="home" class="pt-32 pb-24 px-6 overflow-hidden flex flex-col items-center text-center">
            
            <!-- Main Headline -->
            <h1 class="text-dark text-5xl md:text-[5.5rem] tracking-tight mb-6 max-w-5xl font-serif leading-[1.1]">
                Temukan Lomba,<br>
                Raih Prestasi Bersama
            </h1>
            
            <!-- Subheadline -->
            <p class="text-muted text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                Platform terpusat untuk mencari informasi lomba, menemukan rekan tim yang tepat, dan meraih juara lebih cepat dan cerdas.
            </p>
            
            <!-- CTA Button -->
            <a href="{{ route('register') }}" class="bg-[#051F20] text-white rounded-full px-8 py-3.5 font-medium hover:bg-gray-800 transition shadow-lg flex items-center gap-2 mb-16 md:mb-24">
                Mulai Sekarang <span class="text-lg leading-none">&rarr;</span>
            </a>

            <!-- Cards Arc Carousel -->
            <div class="relative w-full max-w-6xl mx-auto h-[220px] md:h-[400px] flex justify-center items-start perspective-1000">
                <!-- Far Left Card -->
                <div class="absolute z-10 w-[100px] h-[140px] md:w-[180px] md:h-[260px] rounded-2xl md:rounded-3xl overflow-hidden shadow-lg transition duration-700 hover:z-40 hover:scale-110 hover:-rotate-6
                            -translate-x-[130px] translate-y-[60px] -rotate-[15deg]
                            md:-translate-x-[380px] md:translate-y-[100px] md:-rotate-[15deg]">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition duration-500" alt="Student">
                </div>
                
                <!-- Mid Left Card -->
                <div class="absolute z-20 w-[120px] h-[170px] md:w-[220px] md:h-[310px] rounded-2xl md:rounded-3xl overflow-hidden shadow-xl transition duration-700 hover:z-40 hover:scale-110 hover:-rotate-3
                            -translate-x-[75px] translate-y-[30px] -rotate-[8deg]
                            md:-translate-x-[200px] md:translate-y-[50px] md:-rotate-[8deg]">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition duration-500" alt="Student">
                </div>
                
                <!-- Center Card (Main) -->
                <div class="absolute z-30 w-[150px] h-[200px] md:w-[280px] md:h-[380px] rounded-2xl md:rounded-[2rem] overflow-hidden shadow-2xl transition duration-700 hover:scale-105 hover:-translate-y-4
                            translate-x-0 translate-y-0 rotate-0 ring-4 ring-white ring-offset-2 ring-offset-cream">
                    <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover" alt="Student">
                </div>
                
                <!-- Mid Right Card -->
                <div class="absolute z-20 w-[120px] h-[170px] md:w-[220px] md:h-[310px] rounded-2xl md:rounded-3xl overflow-hidden shadow-xl transition duration-700 hover:z-40 hover:scale-110 hover:rotate-3
                            translate-x-[75px] translate-y-[30px] rotate-[8deg]
                            md:translate-x-[200px] md:translate-y-[50px] md:rotate-[8deg]">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition duration-500" alt="Student">
                </div>
                
                <!-- Far Right Card -->
                <div class="absolute z-10 w-[100px] h-[140px] md:w-[180px] md:h-[260px] rounded-2xl md:rounded-3xl overflow-hidden shadow-lg transition duration-700 hover:z-40 hover:scale-110 hover:rotate-6
                            translate-x-[130px] translate-y-[60px] rotate-[15deg]
                            md:translate-x-[380px] md:translate-y-[100px] md:rotate-[15deg]">
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition duration-500" alt="Student">
                </div>
            </div>
            
            <!-- Feature Highlights Below -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-16 max-w-5xl mx-auto mt-16 md:mt-24 text-center relative z-20 px-4">
                <div>
                    <h4 class="text-dark font-bold text-base md:text-lg mb-2">Direktori Terpusat</h4>
                    <p class="text-muted text-xs md:text-sm leading-relaxed">
                        Temukan informasi lomba terbaru yang dikurasi khusus untuk minat dan jurusanmu.
                    </p>
                </div>
                <div class="md:border-x md:border-[#8EB69B]/50 md:px-8">
                    <h4 class="text-dark font-bold text-base md:text-lg mb-2">Tim Finder Cerdas</h4>
                    <p class="text-muted text-xs md:text-sm leading-relaxed">
                        Cari rekan satu tim dengan keahlian spesifik menggunakan algoritma pencocokan.
                    </p>
                </div>
                <div>
                    <h4 class="text-dark font-bold text-base md:text-lg mb-2">Portofolio Prestasi</h4>
                    <p class="text-muted text-xs md:text-sm leading-relaxed">
                        Catat setiap pencapaian dan bangun portofolio profesionalmu secara otomatis.
                    </p>
                </div>
            </div>
        </section>

        <!-- SECTION 4 — BENTO GRID FITUR UNGGULAN -->
        <section id="fitur" class="py-24 px-6 max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-[3rem] font-serif text-dark mb-4 tracking-tight leading-tight">
                    Semua yang Kamu Butuhkan<br>dalam Satu Platform
                </h2>
                <p class="text-muted text-base max-w-xl mx-auto">
                    Dari mencari lomba hingga membentuk tim juara, fitur kami dirancang untuk membantumu melangkah maju bersama.
                </p>
            </div>

            <!-- Flowblox Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Top Left: Tim Finder -->
                <div class="md:col-span-2 bg-card-light rounded-[2rem] overflow-hidden relative min-h-[350px] group flex flex-col md:flex-row">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover opacity-90 transition duration-700 group-hover:scale-105" alt="Tim Finder">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="relative z-10 p-10 flex flex-col justify-end w-full h-full">
                        <h3 class="text-white text-3xl font-bold mb-2 font-serif">Tim Finder</h3>
                        <p class="text-white/80 text-sm max-w-md">Sistem matching otomatis mempertemukan kamu dengan rekan tim berdasarkan keahlian dan minat lomba.</p>
                        <a href="{{ route('login') }}" class="text-white mt-4 font-bold hover:underline inline-flex items-center gap-2">Coba Sekarang &rarr;</a>
                    </div>
                </div>

                <!-- Top Right: Portofolio -->
                <div class="bg-[#051F20] rounded-[2rem] p-10 flex flex-col justify-center min-h-[350px] hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=800&q=80')] bg-cover bg-center opacity-10 mix-blend-luminosity group-hover:opacity-30 transition-opacity duration-700"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#051F20] via-[#051F20]/80 to-transparent"></div>
                    
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center shadow-[0_0_30px_rgba(250,204,21,0.2)] mb-6 transform group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                            </div>
                            <h3 class="text-white text-2xl font-bold mb-3 font-serif">Portofolio Prestasi</h3>
                            <p class="text-[#8EB69B] text-sm leading-relaxed font-medium">
                                Setiap lomba yang diikuti otomatis tercatat di portofolio publikmu. Tunjukkan pencapaian ke rekruter dengan sekali klik.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Left: Notifikasi -->
                <div class="bg-card-brown rounded-[2rem] p-10 flex flex-col justify-end min-h-[350px] hover:shadow-xl transition">
                    <h3 class="text-white text-2xl font-bold mb-3 font-serif">Notifikasi Pintar</h3>
                    <p class="text-white/80 text-sm leading-relaxed">
                        Pengingat deadline lomba H-7, H-3, H-1, update status lamaran tim, dan info open slot baru langsung ke dashboardmu.
                    </p>
                </div>

                <!-- Bottom Right: Direktori Lomba -->
                <div class="md:col-span-2 bg-card-green rounded-[2rem] overflow-hidden relative min-h-[350px] group flex">
                    <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay transition duration-700 group-hover:scale-105" alt="Progress">
                    <div class="relative z-10 p-10 flex flex-col justify-end w-full h-full">
                        <h3 class="text-white text-3xl font-bold mb-2 font-serif">Direktori Lomba</h3>
                        <p class="text-white/90 text-sm max-w-md">500+ lomba terpusat & terfilter. Temukan lomba dari berbagai kategori dalam satu tempat yang selalu up-to-date.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION STATS (Proven Results) -->
        <section class="py-24 px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif text-dark mb-4 tracking-tight">Terbukti Efektif</h2>
                <p class="text-muted text-base max-w-xl mx-auto">
                    Lihat bagaimana mahasiswa di seluruh Indonesia berkolaborasi dan meraih prestasi bersama kami.
                </p>
            </div>
            <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-[#8EB69B]/50"
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
                                         if (progress < 1) window.requestAnimationFrame(step);
                                     };
                                     window.requestAnimationFrame(step);
                                 });
                             }
                         }, { threshold: 0.5 });
                         observer.observe(this.$el);
                     }
                 }">
                <template x-for="stat in stats" :key="stat.id">
                    <div class="text-center px-4">
                        <div class="text-4xl md:text-5xl font-black text-dark tracking-tighter mb-2">
                            <span x-text="stat.current"></span><span x-text="stat.id === 4 ? '' : '+'"></span>
                        </div>
                        <p class="text-sm text-muted font-medium" x-text="stat.label"></p>
                    </div>
                </template>
            </div>
        </section>

        <!-- SECTION 6 — PREVIEW LOMBA -->
        <section id="lomba" class="py-24 px-6 relative">
            <div class="max-w-6xl mx-auto relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 border-b border-[#8EB69B]/50 pb-6">
                    <div>
                        <h2 class="text-3xl font-serif text-dark mb-2">Lomba Terkini</h2>
                        <p class="text-muted font-medium">Kompetisi terbaru yang bisa kamu ikuti hari ini</p>
                    </div>
                    <a href="{{ route('login') }}" class="text-dark font-bold hover:bg-[#051F20] hover:text-white transition-all duration-300 group mt-4 md:mt-0 bg-white px-8 py-3 rounded-full shadow-sm border border-[#8EB69B]/30 flex items-center gap-2">
                        Lihat Semua <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Lomba 1 -->
                    <div class="group bg-white rounded-[2rem] p-4 shadow-sm border border-[#8EB69B]/20 hover:shadow-2xl hover:border-[#8EB69B]/60 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        <div class="h-48 rounded-[1.5rem] relative flex items-center justify-center overflow-hidden mb-6 bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=600&q=80" alt="Hackathon" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#051F20]/80 via-transparent to-transparent"></div>
                            <div class="absolute top-4 left-4 backdrop-blur-md bg-white/20 text-white text-[10px] font-bold rounded-full px-4 py-1.5 uppercase tracking-wider border border-white/30 flex items-center gap-1.5 shadow-sm">
                                <span class="text-yellow-300">🔥</span> Populer
                            </div>
                        </div>
                        <div class="px-2 flex-grow flex flex-col">
                            <h3 class="font-bold text-dark text-xl mb-1.5 font-serif leading-tight group-hover:text-[#235347] transition-colors">National Hackathon 2026</h3>
                            <p class="text-xs text-muted mb-5 font-medium flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                Kemendikbudristek
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-[#E8F3E9] text-[#163832] text-[11px] font-semibold rounded-lg px-3 py-1 flex items-center gap-1.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    20 Jun 2026
                                </span>
                                <span class="bg-[#E8F3E9] text-[#163832] text-[11px] font-semibold rounded-lg px-3 py-1">Nasional</span>
                            </div>
                            <div class="mt-auto flex justify-between items-center pt-5 border-t border-[#8EB69B]/20">
                                <div>
                                    <p class="text-[10px] text-muted uppercase font-bold tracking-wider mb-0.5">Total Hadiah</p>
                                    <p class="text-[#051F20] font-black text-sm">Rp 50.000.000</p>
                                </div>
                                <a href="{{ route('login') }}" class="text-dark text-xs font-bold bg-[#E8F3E9] hover:bg-[#051F20] hover:text-white px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm">Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Lomba 2 -->
                    <div class="group bg-white rounded-[2rem] p-4 shadow-sm border border-[#8EB69B]/20 hover:shadow-2xl hover:border-[#8EB69B]/60 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        <div class="h-48 rounded-[1.5rem] relative flex items-center justify-center overflow-hidden mb-6 bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=600&q=80" alt="Business Plan" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#051F20]/80 via-transparent to-transparent"></div>
                            <div class="absolute top-4 left-4 backdrop-blur-md bg-white/20 text-white text-[10px] font-bold rounded-full px-4 py-1.5 uppercase tracking-wider border border-white/30 flex items-center gap-1.5 shadow-sm">
                                <span class="text-yellow-300">⚡</span> Segera Berakhir
                            </div>
                        </div>
                        <div class="px-2 flex-grow flex flex-col">
                            <h3 class="font-bold text-dark text-xl mb-1.5 font-serif leading-tight group-hover:text-[#235347] transition-colors">Business Plan Competition</h3>
                            <p class="text-xs text-muted mb-5 font-medium flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                Universitas Indonesia
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-[#E8F3E9] text-[#163832] text-[11px] font-semibold rounded-lg px-3 py-1 flex items-center gap-1.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    15 Jun 2026
                                </span>
                                <span class="bg-[#E8F3E9] text-[#163832] text-[11px] font-semibold rounded-lg px-3 py-1">Nasional</span>
                            </div>
                            <div class="mt-auto flex justify-between items-center pt-5 border-t border-[#8EB69B]/20">
                                <div>
                                    <p class="text-[10px] text-muted uppercase font-bold tracking-wider mb-0.5">Total Hadiah</p>
                                    <p class="text-[#051F20] font-black text-sm">Rp 25.000.000</p>
                                </div>
                                <a href="{{ route('login') }}" class="text-dark text-xs font-bold bg-[#E8F3E9] hover:bg-[#051F20] hover:text-white px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm">Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Lomba 3 -->
                    <div class="group bg-white rounded-[2rem] p-4 shadow-sm border border-[#8EB69B]/20 hover:shadow-2xl hover:border-[#8EB69B]/60 transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        <div class="h-48 rounded-[1.5rem] relative flex items-center justify-center overflow-hidden mb-6 bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=600&q=80" alt="Science" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#051F20]/80 via-transparent to-transparent"></div>
                            <div class="absolute top-4 left-4 backdrop-blur-md bg-white/20 text-white text-[10px] font-bold rounded-full px-4 py-1.5 uppercase tracking-wider border border-white/30 flex items-center gap-1.5 shadow-sm">
                                <span class="text-blue-300">🌏</span> Internasional
                            </div>
                        </div>
                        <div class="px-2 flex-grow flex flex-col">
                            <h3 class="font-bold text-dark text-xl mb-1.5 font-serif leading-tight group-hover:text-[#235347] transition-colors">Scientific Paper Competition</h3>
                            <p class="text-xs text-muted mb-5 font-medium flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                ITB Research Center
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-[#E8F3E9] text-[#163832] text-[11px] font-semibold rounded-lg px-3 py-1 flex items-center gap-1.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    30 Jul 2026
                                </span>
                                <span class="bg-[#E8F3E9] text-[#163832] text-[11px] font-semibold rounded-lg px-3 py-1">Internasional</span>
                            </div>
                            <div class="mt-auto flex justify-between items-center pt-5 border-t border-[#8EB69B]/20">
                                <div>
                                    <p class="text-[10px] text-muted uppercase font-bold tracking-wider mb-0.5">Total Hadiah</p>
                                    <p class="text-[#051F20] font-black text-sm">Rp 15.000.000</p>
                                </div>
                                <a href="{{ route('login') }}" class="text-dark text-xs font-bold bg-[#E8F3E9] hover:bg-[#051F20] hover:text-white px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 7 — TESTIMONI (Cara Kerja) -->
        <section id="tentang" class="py-24 px-6 bg-white rounded-t-[3rem] shadow-[0_-20px_40px_-15px_rgba(0,0,0,0.05)] relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#E8F3E9] rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#E8F3E9] rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
            
            <div class="max-w-6xl mx-auto relative z-10">
                <div class="text-center mb-20">
                    <h2 class="text-4xl md:text-5xl font-serif text-dark mb-4">Kata Mereka</h2>
                    <p class="text-muted text-lg max-w-2xl mx-auto">Mahasiswa dari berbagai universitas sudah membuktikan bahwa kolaborasi dan informasi yang tepat adalah kunci juara.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-6 items-center">
                    <!-- Testimonial 1 -->
                    <div class="bg-card-light rounded-[2.5rem] p-10 relative group hover:-translate-y-3 transition-transform duration-500 shadow-sm hover:shadow-2xl">
                        <div class="absolute -top-6 right-6 text-9xl text-white opacity-20 font-serif leading-none group-hover:scale-110 transition-transform duration-500">"</div>
                        <div class="flex gap-1 mb-8 relative z-10">
                            <template x-for="i in 5"><svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg></template>
                        </div>
                        <p class="text-base text-dark leading-relaxed italic mb-10 font-medium relative z-10 line-clamp-4">
                            "Berkat SiLomba, saya tidak pernah lagi ketinggalan info lomba bergengsi. Filternya sangat spesifik dan akurat sesuai jurusan saya."
                        </p>
                        <div class="flex items-center gap-4 relative z-10 pt-6 border-t border-[#051F20]/10">
                            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=facearea&facepad=2&w=150&h=150&q=80" alt="Rizky Pratama" class="w-12 h-12 rounded-full object-cover shadow-sm ring-2 ring-white">
                            <div>
                                <p class="text-sm font-bold text-dark">Rizky Pratama</p>
                                <p class="text-[10px] text-dark/70 uppercase tracking-wider font-semibold mt-0.5">Informatika, Unsoed</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 (Elevated Center) -->
                    <div class="bg-card-brown rounded-[2.5rem] p-10 md:-translate-y-6 relative group hover:-translate-y-8 transition-transform duration-500 shadow-xl hover:shadow-2xl ring-4 ring-white/5">
                        <div class="absolute -top-6 right-6 text-9xl text-[#8EB69B] opacity-10 font-serif leading-none group-hover:scale-110 transition-transform duration-500">"</div>
                        <div class="flex gap-1 mb-8 relative z-10">
                            <template x-for="i in 5"><svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg></template>
                        </div>
                        <p class="text-base text-white leading-relaxed italic mb-10 font-medium relative z-10 line-clamp-4">
                            "Notifikasi deadline lomba benar-benar membantu saya yang sering lupa. Fitur Tim Finder-nya juga mempertemukan saya dengan partner juara."
                        </p>
                        <div class="flex items-center gap-4 relative z-10 pt-6 border-t border-[#8EB69B]/20">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=facearea&facepad=2&w=150&h=150&q=80" alt="Siti Nur Aisyah" class="w-12 h-12 rounded-full object-cover shadow-sm ring-2 ring-[#8EB69B]">
                            <div>
                                <p class="text-sm font-bold text-white">Siti Nur Aisyah</p>
                                <p class="text-[10px] text-[#8EB69B] uppercase tracking-wider font-semibold mt-0.5">Manajemen, UGM</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-card-light rounded-[2.5rem] p-10 relative group hover:-translate-y-3 transition-transform duration-500 shadow-sm hover:shadow-2xl">
                        <div class="absolute -top-6 right-6 text-9xl text-white opacity-20 font-serif leading-none group-hover:scale-110 transition-transform duration-500">"</div>
                        <div class="flex gap-1 mb-8 relative z-10">
                            <template x-for="i in 5"><svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg></template>
                        </div>
                        <p class="text-base text-dark leading-relaxed italic mb-10 font-medium relative z-10 line-clamp-4">
                            "Portofolio otomatis terupdate tiap ikut lomba. Tinggal share link ke HRD pas melamar kerja, langsung terlihat profesional!"
                        </p>
                        <div class="flex items-center gap-4 relative z-10 pt-6 border-t border-[#051F20]/10">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=facearea&facepad=2&w=150&h=150&q=80" alt="Bima Ardiansyah" class="w-12 h-12 rounded-full object-cover shadow-sm ring-2 ring-white">
                            <div>
                                <p class="text-sm font-bold text-dark">Bima Ardiansyah</p>
                                <p class="text-[10px] text-dark/70 uppercase tracking-wider font-semibold mt-0.5">DKV, ITS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- SECTION 8 — CTA PENUTUP -->
            <div class="mt-24 bg-[#051F20] rounded-[3rem] p-16 text-center max-w-5xl mx-auto shadow-2xl relative overflow-hidden border border-[#8EB69B]/30">
                <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-card-light via-transparent to-transparent"></div>
                <div class="relative z-10">
                    <h2 class="text-white text-4xl md:text-5xl font-serif mb-6 leading-tight">
                        Siap Mulai Perjalanan Lomba-mu?
                    </h2>
                    <p class="text-[#D4E7D6] text-lg mb-10">
                        Bergabung gratis. Temukan lomba dan tim yang tepat hari ini.
                    </p>
                    <div class="flex justify-center gap-4 flex-wrap">
                        <a href="{{ route('register') }}" class="bg-white text-dark font-medium rounded-full px-8 py-3.5 hover:bg-[#E8F3E9] transition shadow-xl">
                            Daftar Sekarang — Gratis
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
            { threshold: 0.4, rootMargin: '-80px 0px -20% 0px' }
        );

        document.querySelectorAll('section[id]').forEach(section => {
            if (['home','lomba','fitur','tentang'].includes(section.id)) {
                observer.observe(section);
            }
        });
    });
    </script>
</x-guest-layout>
