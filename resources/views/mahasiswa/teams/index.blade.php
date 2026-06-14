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
</style>
@endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tim Saya') }}
        </h2>
        <a href="{{ route('mahasiswa.team.create') }}" class="px-4 py-2 bg-[#0B2B26] text-white rounded-xl font-bold hover:bg-[#0B2B26]/90 transition">
            + Buka Open Slot
        </a>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            <!-- Teams I Lead -->
            <section class="space-y-6">
                <h3 class="text-2xl font-bold text-gray-900">Tim yang Saya Pimpin</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($ledTeams as $team)
                        <div class="bg-white rounded-3xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition">
                            <div class="mb-4">
                                <span class="text-xs font-bold text-[#0B2B26] uppercase">{{ $team->lomba->nama }}</span>
                                <h4 class="text-xl font-bold text-gray-900 mt-1">{{ $team->nama_tim }}</h4>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-gray-500 mb-6">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <span>{{ $team->anggota()->count() }} / {{ $team->maks_anggota }} Anggota</span>
                            </div>
                            <a href="{{ route('mahasiswa.team.manage', $team->id) }}" class="block w-full py-3 bg-[#0B2B26] text-white text-center rounded-2xl font-bold hover:bg-[#0B2B26]/90 transition">
                                Kelola Tim
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full py-12 bg-gray-50 rounded-3xl text-center text-gray-500">
                            Anda belum memimpin tim apapun.
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- Teams I Joined -->
            <section class="space-y-6">
                <h3 class="text-2xl font-bold text-gray-900">Tim yang Saya Ikuti</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($joinedTeams as $team)
                        <div class="bg-white rounded-3xl border border-gray-100 p-6 shadow-sm">
                            <div class="mb-4">
                                <span class="text-xs font-bold text-[#235347] uppercase">{{ $team->lomba->nama }}</span>
                                <h4 class="text-xl font-bold text-gray-900 mt-1">{{ $team->nama_tim }}</h4>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500">Ketua: {{ $team->ketua->name }}</span>
                                <button class="text-[#0B2B26] font-bold text-sm">Lihat Tim</button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 bg-gray-50 rounded-3xl text-center text-gray-500">
                            Anda belum bergabung dalam tim lain.
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
