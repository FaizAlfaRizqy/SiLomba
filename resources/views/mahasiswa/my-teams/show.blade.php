<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('mahasiswa.my-teams.index') }}" class="p-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Tim Saya') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#EFF6FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-sm border border-[#E2E8F0] overflow-hidden p-8 md:p-12">
                <div class="flex flex-col md:flex-row justify-between items-start gap-8 mb-12">
                    <div>
                        <span class="px-3 py-1 bg-[#DBEAFE] text-[#1E3A6E] text-[10px] font-bold rounded-full uppercase tracking-widest mb-4 inline-block">
                            {{ $tim->lomba->kategori }}
                        </span>
                        <h1 class="text-4xl font-black text-[#1E293B] mb-2">{{ $tim->nama_tim }}</h1>
                        <p class="text-lg text-[#64748B]">{{ $tim->lomba->nama }}</p>
                    </div>
                    <div class="flex flex-col items-end gap-3">
                        <span class="px-4 py-2 bg-[#D1FAE5] text-[#065F46] rounded-xl text-xs font-bold uppercase tracking-wider">
                            ● Status Lomba: {{ strtoupper($tim->lomba->status) }}
                        </span>
                        <p class="text-sm font-bold text-red-500">Deadline: {{ $tim->lomba->deadline->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-2 space-y-12">
                        <!-- Members Section -->
                        <div>
                            <h3 class="text-xl font-bold text-[#1E293B] mb-6 flex items-center gap-2">
                                <span>👥</span> Anggota Tim
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($tim->anggota as $member)
                                    <div class="flex items-center gap-4 p-4 rounded-3xl bg-[#F8FAFC] border border-[#E2E8F0]">
                                        <div class="w-12 h-12 rounded-2xl bg-[#4F7EF7] text-white flex items-center justify-center font-bold text-lg shadow-lg shadow-[#4F7EF7]/10">
                                            {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-bold text-[#1E293B] truncate">{{ $member->user->name }}</h4>
                                            <p class="text-xs text-[#64748B] truncate">{{ $member->user->email }}</p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                            {{ $member->peran == 'ketua' ? 'bg-[#4F7EF7] text-white' : 'bg-[#DBEAFE] text-[#1E3A6E]' }}">
                                            {{ $member->peran }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Slots Section -->
                        <div>
                            <h3 class="text-xl font-bold text-[#1E293B] mb-6 flex items-center gap-2">
                                <span>🎯</span> Lowongan Slot
                            </h3>
                            <div class="space-y-4">
                                @foreach($tim->slots as $slot)
                                    <div class="p-6 rounded-3xl border border-[#E2E8F0] bg-white shadow-sm flex justify-between items-center">
                                        <div>
                                            <h4 class="font-bold text-[#1E293B]">{{ $slot->posisi }}</h4>
                                            <p class="text-sm text-[#64748B]">{{ $slot->jumlah_slot }} Total Slot • {{ $slot->lamarans->where('status', 'diterima')->count() }} Terisi</p>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                            {{ $slot->status == 'buka' ? 'bg-[#D1FAE5] text-[#065F46]' : 'bg-red-50 text-red-500' }}">
                                            {{ $slot->status }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <!-- Leader Card -->
                        <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-3xl p-8 text-center">
                            <h4 class="text-xs font-bold text-[#64748B] uppercase tracking-widest mb-6">Ketua Tim</h4>
                            <div class="w-24 h-24 rounded-3xl bg-[#4F7EF7] text-white flex items-center justify-center font-black text-4xl mx-auto mb-6 shadow-xl shadow-[#4F7EF7]/20">
                                {{ strtoupper(substr($tim->ketua->name, 0, 1)) }}
                            </div>
                            <h3 class="text-xl font-bold text-[#1E293B] mb-1">{{ $tim->ketua->name }}</h3>
                            <p class="text-sm text-[#64748B] mb-6">{{ $tim->ketua->mahasiswa->program_studi ?? 'Mahasiswa' }}</p>
                            <a href="{{ route('mahasiswa.portfolio', $tim->ketua->mahasiswa->nim) }}" class="inline-block px-6 py-2 bg-white border border-[#E2E8F0] text-[#4F7EF7] text-xs font-bold rounded-xl hover:bg-[#EFF6FF] transition">
                                Lihat Portofolio
                            </a>
                        </div>

                        <!-- Chat Button -->
                        <a href="{{ route('mahasiswa.chat.show', $tim->id) }}" class="block w-full py-5 bg-[#10B981] text-white text-center font-bold rounded-3xl shadow-xl shadow-[#10B981]/20 hover:bg-[#059669] transition text-lg">
                            💬 Chat Tim Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
