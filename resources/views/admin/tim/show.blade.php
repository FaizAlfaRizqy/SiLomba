<x-admin-layout>
    <x-slot name="pageTitle">Detail Tim</x-slot>

    <div x-data="{ activeMember: null, showModal: false }" class="space-y-8 animate-fade-in">
        
        <!-- Hero Card Tim & Banner Lomba -->
        <div class="relative overflow-hidden bg-gradient-to-br from-brand-dark to-brand-teal text-white p-8 md:p-10 rounded-[2.5rem] shadow-xl border border-brand-teal/20">
            <div class="absolute right-0 bottom-0 top-0 w-1/3 bg-gradient-to-l from-white/10 to-transparent pointer-events-none"></div>
            <div class="absolute -right-10 -bottom-10 w-52 h-52 bg-brand-mint/20 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-center space-x-6">
                    <div class="w-20 h-20 bg-brand-mint text-brand-dark rounded-3xl flex items-center justify-center text-3xl font-black uppercase shadow-inner border border-brand-teal/20">
                        {{ substr($tim->nama_tim, 0, 2) }}
                    </div>
                    <div>
                        <span class="text-xs uppercase font-extrabold tracking-widest text-brand-mint bg-white/10 px-3 py-1 rounded-full">Detail Profil Tim</span>
                        <h2 class="text-3xl font-extrabold mt-2 leading-none">{{ $tim->nama_tim }}</h2>
                        <p class="text-sm text-brand-mint/80 mt-1.5">Mendaftar untuk event: <span class="font-extrabold">{{ $tim->lomba->nama ?? 'Lomba' }}</span></p>
                    </div>
                </div>
                
                <a href="{{ route('admin.tim.index') }}" class="px-5 py-3 bg-white/10 hover:bg-white/20 text-white font-extrabold rounded-2xl text-xs uppercase tracking-widest transition border border-white/20">
                    Kembali Ke Daftar
                </a>
            </div>
        </div>

        <!-- Detail Layout: Stats Cards + Members List -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Statistics & Info -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white dark:bg-zinc-900 p-8 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm space-y-6 theme-transition">
                    <h3 class="text-base font-bold text-brand-dark dark:text-zinc-100 border-b border-gray-100 dark:border-zinc-800 pb-4">Statistik Keanggotaan</h3>
                    
                    @php
                        $currentCount = $tim->anggota->count() + 1;
                        $maxCount = $tim->maks_anggota;
                        $percentage = ($currentCount / $maxCount) * 100;
                    @endphp

                    <!-- Progress Ring/Bar -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-sm font-bold text-brand-dark dark:text-brand-mint">
                            <span>Kapasitas Slot</span>
                            <span>{{ $currentCount }} / {{ $maxCount }} Anggota</span>
                        </div>
                        <div class="w-full bg-gray-150 dark:bg-zinc-800 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-brand-teal h-2.5 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>

                    <div class="space-y-4 pt-4">
                        <div>
                            <span class="block text-[10px] font-bold text-brand-teal uppercase tracking-widest leading-none mb-1.5">Tingkat Kompetisi</span>
                            <p class="text-sm font-bold text-brand-dark dark:text-zinc-200 capitalize">Tingkat {{ $tim->lomba->tingkat ?? '-' }}</p>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-brand-teal uppercase tracking-widest leading-none mb-1.5">Batas Pendaftaran Lomba</span>
                            <p class="text-sm font-bold text-rose-600">
                                {{ $tim->lomba->deadline ? $tim->lomba->deadline->format('d M Y') : '-' }}
                                <span class="block text-xs font-semibold text-gray-400 mt-0.5">({{ $tim->lomba->deadline ? $tim->lomba->deadline->diffForHumans() : '-' }})</span>
                            </p>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-brand-teal uppercase tracking-widest leading-none mb-1.5">Tanggal Registrasi Tim</span>
                            <p class="text-sm font-bold text-brand-dark dark:text-zinc-200">{{ $tim->created_at->format('d M Y, H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Members Card Stack -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white dark:bg-zinc-900 rounded-[2.5rem] border border-gray-100 dark:border-zinc-800 shadow-sm overflow-hidden theme-transition">
                    <div class="p-6 bg-brand-mint/20 dark:bg-zinc-800/40 border-b border-brand-teal/10 dark:border-zinc-850 flex items-center justify-between">
                        <h4 class="font-bold text-brand-dark dark:text-zinc-100">Anggota Terdaftar</h4>
                        <span class="px-3 py-1 bg-brand-dark dark:bg-brand-teal text-white dark:text-zinc-900 rounded-full text-xs font-bold">{{ $currentCount }} Peserta</span>
                    </div>
                    
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Ketua Card -->
                            <div @click="activeMember = { name: '{{ addslashes($tim->ketua->name) }}', email: '{{ addslashes($tim->ketua->email) }}', role: 'Ketua / Pendiri' }; showModal = true" 
                                 class="p-6 bg-brand-mint/10 dark:bg-zinc-800/40 border border-brand-teal/20 rounded-3xl flex flex-col justify-between hover:scale-[1.02] cursor-pointer transition duration-300 group">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-tr from-brand-dark to-brand-teal text-white rounded-2xl flex items-center justify-center font-bold text-lg shadow-sm">
                                        {{ substr($tim->ketua->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h5 class="font-extrabold text-brand-dark dark:text-zinc-100 leading-tight group-hover:text-brand-teal transition duration-300">{{ $tim->ketua->name }}</h5>
                                        <span class="text-xs text-brand-black/60 dark:text-zinc-400">{{ $tim->ketua->email }}</span>
                                    </div>
                                </div>
                                <div class="mt-6 pt-4 border-t border-brand-teal/10 flex justify-between items-center">
                                    <span class="text-[10px] font-extrabold text-brand-dark dark:text-brand-mint uppercase tracking-wider">Ketua Tim</span>
                                    <span class="text-[10px] text-brand-teal font-bold group-hover:translate-x-1 transition-transform">Profil &rarr;</span>
                                </div>
                            </div>

                            <!-- Anggota Cards -->
                            @foreach($tim->anggota as $anggota)
                                <div @click="activeMember = { name: '{{ addslashes($anggota->user->name) }}', email: '{{ addslashes($anggota->user->email) }}', role: 'Anggota' }; showModal = true"
                                     class="p-6 bg-gray-50/50 dark:bg-zinc-800/30 border border-gray-100 dark:border-zinc-800 rounded-3xl flex flex-col justify-between hover:scale-[1.02] cursor-pointer transition duration-300 group">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-gray-200 dark:bg-zinc-700 text-gray-700 dark:text-zinc-300 rounded-2xl flex items-center justify-center font-bold text-lg">
                                            {{ substr($anggota->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h5 class="font-extrabold text-brand-dark dark:text-zinc-100 leading-tight group-hover:text-brand-teal transition duration-300">{{ $anggota->user->name }}</h5>
                                            <span class="text-xs text-brand-black/60 dark:text-zinc-400">{{ $anggota->user->email }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 dark:border-zinc-800 flex justify-between items-center">
                                        <span class="text-[10px] font-extrabold text-gray-400 uppercase tracking-wider">Anggota</span>
                                        <span class="text-[10px] text-gray-500 font-bold group-hover:translate-x-1 transition-transform">Profil &rarr;</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Profil Modal popup -->
        <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" x-cloak>
            <div x-show="showModal"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="bg-white dark:bg-zinc-900 border border-gray-100 dark:border-zinc-800 rounded-[2.5rem] max-w-md w-full p-8 shadow-2xl relative"
                 @click.outside="showModal = false">
                
                <button @click="showModal = false" class="absolute top-6 right-6 p-2 bg-gray-50 dark:bg-zinc-800 hover:bg-gray-100 text-gray-500 rounded-full transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>

                <div class="text-center pb-4 border-b border-gray-100 dark:border-zinc-800">
                    <div class="w-20 h-20 bg-brand-mint dark:bg-brand-dark/40 text-brand-dark dark:text-brand-mint text-3xl font-extrabold rounded-[1.8rem] flex items-center justify-center mx-auto uppercase mb-4" 
                         x-text="activeMember ? activeMember.name.substring(0,2) : ''">
                    </div>
                    <h3 class="text-lg font-bold text-brand-dark dark:text-white" x-text="activeMember ? activeMember.name : ''"></h3>
                    <span class="inline-block mt-2 px-3 py-1 bg-brand-teal text-white text-[10px] font-bold uppercase rounded-full" x-text="activeMember ? activeMember.role : ''"></span>
                </div>

                <div class="py-6 space-y-4">
                    <div>
                        <span class="block text-[10px] font-bold text-brand-teal uppercase tracking-widest leading-none mb-1">Alamat Email</span>
                        <p class="text-sm font-semibold text-brand-dark dark:text-zinc-200" x-text="activeMember ? activeMember.email : ''"></p>
                    </div>
                    <div>
                        <span class="block text-[10px] font-bold text-brand-teal uppercase tracking-widest leading-none mb-1">Status Keanggotaan</span>
                        <span class="inline-flex items-center mt-1 px-2.5 py-0.5 bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 text-xs font-bold rounded-full">
                            Terverifikasi Aktif
                        </span>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button @click="showModal = false" class="px-6 py-2.5 bg-brand-dark dark:bg-brand-teal text-white dark:text-zinc-900 font-bold rounded-xl text-xs transition duration-300 shadow-md">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
