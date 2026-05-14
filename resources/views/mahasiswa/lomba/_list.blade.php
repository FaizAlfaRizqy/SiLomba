<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($lombas as $lomba)
        <div class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 overflow-hidden flex flex-col">
            <!-- Poster Placeholder / Image -->
            <div class="relative h-48 bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center text-white overflow-hidden">
                @if($lomba->poster)
                    <img src="{{ asset('storage/' . $lomba->poster) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                @else
                    <svg class="w-16 h-16 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                @endif
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex flex-col gap-2">
                    <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-xs font-bold rounded-full text-indigo-600 shadow-sm capitalize">
                        {{ $lomba->kategori }}
                    </span>
                </div>

                @php
                    $daysRemaining = \Carbon\Carbon::now()->diffInDays($lomba->deadline, false);
                @endphp
                @if($daysRemaining <= 3 && $daysRemaining >= 0 && $lomba->status == 'buka')
                    <div class="absolute top-4 right-4 animate-pulse">
                        <span class="px-3 py-1 bg-rose-600 text-white text-xs font-bold rounded-full shadow-lg">
                            Segera Berakhir!
                        </span>
                    </div>
                @endif
            </div>

            <div class="p-6 flex-1 flex flex-col">
                <div class="mb-4">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $lomba->penyelenggara }}</span>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition truncate">{{ $lomba->nama }}</h3>
                </div>

                <div class="space-y-3 mb-6 flex-1">
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 me-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Deadline: {{ $lomba->deadline->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 me-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="truncate">{{ $lomba->hadiah }}</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase {{ $lomba->tingkat == 'nasional' ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $lomba->tingkat }}
                        </span>
                        <span class="ms-2 px-2 py-0.5 rounded-md text-[10px] font-bold uppercase {{ $lomba->status == 'buka' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ $lomba->status }}
                        </span>
                    </div>
                </div>

                <a href="{{ route('mahasiswa.lomba.show', $lomba->id) }}" class="block w-full py-3 bg-gray-50 text-center rounded-2xl text-sm font-bold text-gray-700 hover:bg-indigo-600 hover:text-white transition duration-300">
                    Lihat Detail
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full py-20 text-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900">Lomba tidak ditemukan</h3>
            <p class="text-gray-500">Coba ubah filter atau kata kunci pencarian Anda.</p>
        </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $lombas->links() }}
</div>
