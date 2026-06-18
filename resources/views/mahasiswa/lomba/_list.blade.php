<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
    @forelse($lombas as $lomba)
        @php
            $isArsip = isset($tab) && $tab === 'arsip';
            $daysRemaining = \Carbon\Carbon::now()->diffInDays($lomba->deadline, false);
        @endphp

        <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}" class="group relative bg-white/10 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:bg-white/15 transition-all duration-300 flex flex-col border border-white/15">
            <div class="relative h-64 overflow-hidden">
                @if($lomba->poster)
                    <img alt="{{ $lomba->nama }}" class="w-full h-full object-cover {{ $isArsip ? 'grayscale' : 'group-hover:scale-110' }} transition-transform duration-500" src="{{ asset('storage/' . $lomba->poster) }}"/>
                @else
                    <div class="w-full h-full bg-primary flex items-center justify-center text-on-primary-container">
                        <span class="material-symbols-outlined text-[48px] opacity-20">image</span>
                    </div>
                @endif
                <div class="absolute top-3 left-3 bg-primary/80 backdrop-blur-md px-3 py-1 rounded-full">
                    <span class="font-label-md text-label-md text-secondary-fixed uppercase">{{ $lomba->kategori }}</span>
                </div>
                <div class="absolute top-3 right-3 flex flex-col gap-2 items-end">
                    @if($isArsip)
                        <span class="bg-surface-variant text-on-surface-variant font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg">BERAKHIR</span>
                    @elseif($daysRemaining <= 3 && $daysRemaining >= 0)
                        <span class="bg-error text-on-error font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg animate-pulse">TERBATAS</span>
                    @else
                        <span class="bg-secondary-fixed text-on-secondary-fixed font-label-md text-[10px] px-2 py-1 rounded-lg shadow-lg">BUKA</span>
                    @endif
                </div>
            </div>
            <div class="p-5 flex-1 flex flex-col">
                <div class="mb-3">
                    <p class="text-white/60 text-[12px] font-medium uppercase tracking-wider mb-1 truncate">{{ $lomba->penyelenggara }}</p>
                    <h3 class="font-headline-md text-white leading-tight {{ $isArsip ? '' : 'group-hover:text-secondary-fixed' }} transition-colors line-clamp-2">{{ $lomba->nama }}</h3>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-2 text-white/70">
                        <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                        <span class="text-body-md text-[13px]">Deadline: {{ $lomba->deadline->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/70">
                        <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
                        <span class="text-body-md text-[13px] font-semibold text-secondary-fixed truncate">{{ $lomba->hadiah }}</span>
                    </div>
                </div>
                <div class="mt-auto flex flex-wrap gap-2 pt-4 border-t border-outline-variant/10">
                    <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-label-md text-white/80 uppercase">{{ $lomba->tingkat }}</span>
                    <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-label-md text-white/80 uppercase">{{ $lomba->status }}</span>
                </div>
            </div>
        </a>
    @empty
        <div class="col-span-full py-20 text-center">
            <div class="w-20 h-20 bg-primary-container rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-[40px] text-on-primary-container">
                    {{ (isset($tab) && $tab === 'arsip') ? 'archive' : 'search_off' }}
                </span>
            </div>
            <h3 class="font-headline-sm text-[18px] text-on-primary-fixed mt-4">
                {{ (isset($tab) && $tab === 'arsip') ? 'Belum ada arsip lomba' : 'Lomba tidak ditemukan' }}
            </h3>
            <p class="text-on-primary-container text-body-md mt-2">
                {{ (isset($tab) && $tab === 'arsip') ? 'Lomba yang sudah berakhir akan muncul di sini.' : 'Coba ubah filter atau kata kunci pencarian Anda.' }}
            </p>
        </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $lombas->links() }}
</div>
