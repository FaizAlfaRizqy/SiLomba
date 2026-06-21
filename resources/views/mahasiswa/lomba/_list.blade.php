<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
    @forelse($lombas as $lomba)
        @php
            $isArsip = isset($tab) && $tab === 'arsip';
            $daysRemaining = \Carbon\Carbon::now()->diffInDays($lomba->deadline, false);
        @endphp

        <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}" class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8EB69B]/50 border border-[#8EB69B]/20 transition-all duration-300 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                @if($lomba->poster)
                    <img alt="{{ $lomba->nama }}" class="w-full h-full object-cover {{ $isArsip ? 'grayscale' : 'group-hover:scale-110' }} transition-transform duration-500" src="{{ asset('storage/' . $lomba->poster) }}"/>
                @else
                    <div class="w-full h-full bg-[#E8F3E9] flex items-center justify-center text-[#235347]">
                        <span class="material-symbols-outlined text-[48px] opacity-20">image</span>
                    </div>
                @endif
                <div class="absolute top-3 left-3 bg-[#051F20]/90 backdrop-blur-md px-3 py-1 rounded-full">
                    <span class="font-label-md text-label-md text-white uppercase">{{ $lomba->kategori }}</span>
                </div>
                <div class="absolute top-3 right-3 flex flex-col gap-2 items-end">
                    @if($isArsip)
                        <span class="bg-gray-200 text-gray-700 font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg font-bold">BERAKHIR</span>
                    @elseif($daysRemaining <= 3 && $daysRemaining >= 0)
                        <span class="bg-error text-white font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg animate-pulse font-bold">TERBATAS</span>
                    @else
                        <span class="bg-[#051F20] text-white font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg font-bold">BUKA</span>
                    @endif
                </div>
            </div>
            <div class="p-5 flex-1 flex flex-col">
                <div class="mb-3">
                    <p class="text-[#235347]/70 text-[12px] font-bold uppercase tracking-wider mb-1 truncate">{{ $lomba->penyelenggara }}</p>
                    <h3 class="font-headline-md text-[#051F20] leading-tight {{ $isArsip ? '' : 'group-hover:text-[#235347]' }} transition-colors line-clamp-2 font-serif">{{ $lomba->nama }}</h3>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-2 text-[#235347]/80">
                        <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                        <span class="text-body-md text-[13px]">Deadline: {{ $lomba->deadline->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-[#235347]/80">
                        <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
                        <span class="text-body-md text-[13px] font-semibold text-[#163832] truncate">{{ $lomba->hadiah }}</span>
                    </div>
                </div>
                <div class="mt-auto flex flex-wrap gap-2 pt-4 border-t border-[#8EB69B]/20">
                    <span class="bg-[#E8F3E9] px-3 py-1 rounded-full text-[10px] font-label-md text-[#163832] font-semibold uppercase">{{ $lomba->tingkat }}</span>
                    <span class="bg-[#E8F3E9] px-3 py-1 rounded-full text-[10px] font-label-md text-[#163832] font-semibold uppercase">{{ $lomba->status }}</span>
                </div>
            </div>
        </a>
    @empty
        <div class="col-span-full py-20 text-center bg-white border border-[#8EB69B]/20 rounded-3xl p-8 shadow-sm">
            <div class="w-20 h-20 bg-[#E8F3E9] rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-[40px] text-[#051F20]">
                    {{ (isset($tab) && $tab === 'arsip') ? 'archive' : 'search_off' }}
                </span>
            </div>
            <h3 class="font-headline-sm text-[18px] text-[#051F20] mt-4 font-serif font-bold">
                {{ (isset($tab) && $tab === 'arsip') ? 'Belum ada arsip lomba' : 'Lomba tidak ditemukan' }}
            </h3>
            <p class="text-[#235347] text-body-md mt-2">
                {{ (isset($tab) && $tab === 'arsip') ? 'Lomba yang sudah berakhir akan muncul di sini.' : 'Coba ubah filter atau kata kunci pencarian Anda.' }}
            </p>
        </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $lombas->links() }}
</div>
