<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    @forelse($lombas as $lomba)
        @php
            $isArsip = isset($tab) && $tab === 'arsip';
            $daysRemaining = \Carbon\Carbon::now()->diffInDays($lomba->deadline, false);
        @endphp

        <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}"
           class="group bg-white rounded-3xl border {{ $isArsip ? 'border-gray-200 opacity-90' : 'border-gray-100 hover:shadow-xl hover:-translate-y-1' }} shadow-sm transition duration-300 overflow-hidden flex flex-col cursor-pointer">
            
            {{-- Poster / Image — portrait ratio (3:4) --}}
            <div class="relative w-full overflow-hidden" style="aspect-ratio: 3/4; max-height: 280px;">
                <div class="absolute inset-0 {{ $isArsip ? 'bg-gradient-to-br from-gray-400 to-gray-600' : 'bg-gradient-to-br from-[#235347] to-[#0B2B26]' }} flex items-center justify-center text-white">
                    @if($lomba->poster)
                        <img src="{{ asset('storage/' . $lomba->poster) }}" 
                             class="w-full h-full object-cover {{ $isArsip ? 'grayscale' : 'group-hover:scale-105' }} transition duration-500"
                             alt="{{ $lomba->nama }}">
                    @else
                        <svg class="w-12 h-12 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @endif
                </div>

                {{-- Kategori Badge --}}
                <div class="absolute top-3 left-3">
                    <span class="px-2.5 py-1 bg-white/90 backdrop-blur-md text-[10px] font-bold rounded-full {{ $isArsip ? 'text-gray-500' : 'text-[#0B2B26]' }} shadow-sm capitalize">
                        {{ $lomba->kategori }}
                    </span>
                </div>

                {{-- Status Badge kanan atas --}}
                @if($isArsip)
                    <div class="absolute top-3 right-3">
                        <span class="px-2.5 py-1 bg-gray-700/80 text-white text-[10px] font-bold rounded-full backdrop-blur-md">
                            Berakhir
                        </span>
                    </div>
                @elseif($daysRemaining <= 3 && $daysRemaining >= 0)
                    <div class="absolute top-3 right-3 animate-pulse">
                        <span class="px-2.5 py-1 bg-rose-600 text-white text-[10px] font-bold rounded-full shadow-lg">
                            Segera Berakhir!
                        </span>
                    </div>
                @endif
            </div>

            {{-- Content --}}
            <div class="p-4 flex-1 flex flex-col">
                <div class="mb-3">
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider block truncate">{{ $lomba->penyelenggara }}</span>
                    <h3 class="text-sm font-bold {{ $isArsip ? 'text-gray-500' : 'text-gray-900 group-hover:text-[#0B2B26]' }} transition line-clamp-2 leading-snug mt-0.5">{{ $lomba->nama }}</h3>
                </div>

                <div class="space-y-2 flex-1">
                    {{-- Deadline --}}
                    <div class="flex items-center text-xs {{ $isArsip ? 'text-gray-400' : 'text-gray-500' }}">
                        <svg class="w-3.5 h-3.5 me-1.5 {{ $isArsip ? 'text-gray-400' : 'text-[#235347]' }} flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $lomba->deadline->format('d M Y') }}</span>
                    </div>
                    {{-- Hadiah --}}
                    <div class="flex items-center text-xs {{ $isArsip ? 'text-gray-400' : 'text-gray-500' }}">
                        <svg class="w-3.5 h-3.5 me-1.5 {{ $isArsip ? 'text-gray-400' : 'text-[#235347]' }} flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="truncate">{{ $lomba->hadiah }}</span>
                    </div>
                    {{-- Tingkat & Status --}}
                    <div class="flex items-center gap-1.5 flex-wrap">
                        <span class="px-2 py-0.5 rounded-md text-[9px] font-bold uppercase {{ $lomba->tingkat == 'nasional' ? 'bg-amber-100 text-amber-700' : ($lomba->tingkat == 'internasional' ? 'bg-purple-100 text-purple-700' : 'bg-[#D4E7D6] text-blue-700') }}">
                            {{ $lomba->tingkat }}
                        </span>
                        @if($isArsip)
                            <span class="px-2 py-0.5 rounded-md text-[9px] font-bold uppercase bg-gray-100 text-gray-500">
                                Tutup
                            </span>
                        @else
                            <span class="px-2 py-0.5 rounded-md text-[9px] font-bold uppercase {{ $lomba->status == 'buka' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ $lomba->status }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="col-span-full py-20 text-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                @if(isset($tab) && $tab === 'arsip')
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                @else
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @endif
            </div>
            @if(isset($tab) && $tab === 'arsip')
                <h3 class="text-lg font-bold text-gray-900">Belum ada arsip lomba</h3>
                <p class="text-gray-500 text-sm mt-1">Lomba yang sudah berakhir akan muncul di sini.</p>
            @else
                <h3 class="text-lg font-bold text-gray-900">Lomba tidak ditemukan</h3>
                <p class="text-gray-500 text-sm mt-1">Coba ubah filter atau kata kunci pencarian Anda.</p>
            @endif
        </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $lombas->links() }}
</div>
