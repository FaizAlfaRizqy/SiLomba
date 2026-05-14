<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.tim.index') }}" class="p-2 text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Tim') }}: {{ $tim->nama_tim }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Info Tim -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                        <div class="w-20 h-20 rounded-2xl bg-emerald-100 flex items-center justify-center text-emerald-600 text-3xl font-bold mb-6 mx-auto uppercase">
                            {{ substr($tim->nama_tim, 0, 2) }}
                        </div>
                        <h3 class="text-center text-xl font-bold text-gray-900 mb-1">{{ $tim->nama_tim }}</h3>
                        <p class="text-center text-gray-500 text-sm mb-6">{{ $tim->lomba->nama ?? 'Lomba Dihapus' }}</p>
                        
                        <div class="space-y-4 pt-6 border-t border-gray-50">
                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ketua Tim</label>
                                <p class="text-sm font-medium text-gray-900">{{ $tim->ketua->name }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Kapasitas</label>
                                <p class="text-sm font-medium text-gray-900">{{ $tim->anggota->count() + 1 }} / {{ $tim->maks_anggota }} Anggota</p>
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Dibuat Pada</label>
                                <p class="text-sm font-medium text-gray-900">{{ $tim->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Anggota -->
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50 bg-gray-50/50">
                            <h4 class="font-bold text-gray-900">Daftar Anggota Tim</h4>
                        </div>
                        <div class="p-6">
                            <ul class="divide-y divide-gray-100">
                                <!-- Ketua -->
                                <li class="py-4 flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                            {{ substr($tim->ketua->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-900">{{ $tim->ketua->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $tim->ketua->email }}</p>
                                        </div>
                                    </div>
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-[10px] font-bold rounded-md uppercase">Ketua</span>
                                </li>
                                <!-- Anggota Lain -->
                                @foreach($tim->anggota as $anggota)
                                    <li class="py-4 flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-bold">
                                                {{ substr($anggota->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-900">{{ $anggota->user->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $anggota->user->email }}</p>
                                            </div>
                                        </div>
                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold rounded-md uppercase">Anggota</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
