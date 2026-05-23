<x-app-layout>

@push('styles')
<style>
    html, body {
        background-color: #0D3B36 !important;
    }
    #page-bg {
        background-color: #0D3B36 !important;
        position: relative;
    }
    #page-bg > * { position: relative; z-index: 1; }
</style>
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tim Finder') }}
        </h2>
    </x-slot>

    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <!-- Recommendations Section -->
            @if($recommendations->isNotEmpty())
                <div class="space-y-6">
                    <div class="flex items-center space-x-2">
                        <div class="p-2 bg-amber-100 rounded-lg text-amber-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Rekomendasi Untukmu</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recommendations as $slot)
                            <div class="bg-white rounded-3xl border-2 border-indigo-100 p-6 shadow-lg shadow-indigo-50 relative overflow-hidden group">
                                <div class="absolute top-0 right-0 px-4 py-1 bg-indigo-600 text-white text-xs font-bold rounded-bl-2xl">
                                    {{ round($slot->matching_score) }}% Match
                                </div>
                                <div class="mb-4">
                                    <h4 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">{{ $slot->tim->nama_tim }}</h4>
                                    <p class="text-sm text-gray-500">{{ $slot->tim->lomba->nama }}</p>
                                </div>
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center text-sm text-gray-700">
                                        <span class="font-bold me-2">Posisi:</span> {{ $slot->posisi }}
                                    </div>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($slot->keahlian_dibutuhkan as $skill)
                                            <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] font-bold rounded-md uppercase">{{ $skill }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <button onclick="window.location='{{ route('mahasiswa.tim-finder.show', $slot->id) }}'" class="w-full py-3 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Lamar Bergabung</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                @if(!$mahasiswa || empty($mahasiswa->keahlian))
                    <div class="bg-indigo-900 rounded-[2rem] p-10 text-white flex flex-col md:flex-row items-center justify-between shadow-2xl">
                        <div class="mb-6 md:mb-0">
                            <h3 class="text-3xl font-extrabold mb-2">Lengkapi Profil Keahlianmu</h3>
                            <p class="text-indigo-200">Dapatkan rekomendasi tim yang akurat berdasarkan skill yang kamu miliki.</p>
                        </div>
                        <a href="{{ route('mahasiswa.profile.edit') }}" class="px-8 py-4 bg-white text-indigo-900 rounded-2xl font-bold shadow-xl hover:bg-indigo-50 transition">Lengkapi Sekarang</a>
                    </div>
                @endif
            @endif

            <!-- Main Directory -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-900">Semua Open Slot</h3>
                    <!-- Simple Filters -->
                    <div class="flex space-x-2">
                        <!-- Add filters here if needed -->
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($slots as $slot)
                        <div class="bg-white rounded-3xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 rounded-2xl bg-gray-100 flex items-center justify-center text-gray-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $slot->tim->nama_tim }}</h4>
                                        <p class="text-xs text-gray-500">{{ $slot->tim->lomba->nama }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold rounded-full">Slot: {{ $slot->jumlah_slot }}</span>
                            </div>
                            <div class="mt-4 space-y-2">
                                <div class="text-sm font-bold text-indigo-600">Posisi: {{ $slot->posisi }}</div>
                                <p class="text-xs text-gray-500 line-clamp-2">{{ $slot->deskripsi }}</p>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-1">
                                @foreach($slot->keahlian_dibutuhkan as $skill)
                                    <span class="px-2 py-0.5 bg-gray-50 text-gray-500 text-[10px] font-medium rounded-md">{{ $skill }}</span>
                                @endforeach
                            </div>
                            <div class="mt-6 flex items-center justify-between">
                                <div class="text-[10px] text-gray-400">Deadline: {{ $slot->batas_waktu->format('d M Y') }}</div>
                                <a href="{{ route('mahasiswa.tim-finder.show', $slot->id) }}" class="px-4 py-2 bg-gray-900 text-white rounded-xl text-xs font-bold hover:bg-indigo-600 transition">Detail Slot</a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-gray-500 bg-gray-50 rounded-3xl">
                            Belum ada open slot tersedia.
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-6">
                    {{ $slots->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
