<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-[#051F20] leading-tight">
                    {{ __('Chat Tim') }}
                </h2>
                <p class="text-sm text-[#64748B]">Komunikasi dengan rekan timmu</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#EFF6FF] min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="space-y-3">
                @forelse($tims as $tim)
                    @php
                        $lastMessage = $tim->chatMessages->first();
                        $unreadCount = \App\Models\ChatMessage::where('id_tim', $tim->id)
                            ->where('created_at', '>', Auth::user()->last_login_at ?? now()->subDays(7)) // Placeholder logic for unread
                            ->count();
                    @endphp
                    <a href="{{ route('mahasiswa.chat.show', $tim->id) }}" class="block">
                        <div class="bg-white border border-[#E2E8F0] rounded-[2rem] p-6 hover:bg-[#F8FAFC] hover:border-[#4F7EF7]/30 hover:shadow-xl hover:shadow-[#4F7EF7]/5 transition-all group">
                            <div class="flex items-center gap-5">
                                <!-- Team Avatar -->
                                <div class="w-16 h-16 rounded-2xl bg-[#4F7EF7] flex items-center justify-center text-white font-black text-xl shadow-lg shadow-[#4F7EF7]/20 group-hover:scale-105 transition">
                                    {{ strtoupper(substr($tim->nama_tim, 0, 2)) }}
                                </div>

                                <!-- Content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-bold text-[#051F20] text-lg truncate">{{ $tim->nama_tim }}</h4>
                                        @if($lastMessage)
                                            <span class="text-[10px] font-bold text-[#94A3B8] uppercase tracking-widest">{{ $lastMessage->created_at->format('H:i') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="flex justify-between items-center">
                                        <div class="flex-1 truncate pr-4">
                                            @if($lastMessage)
                                                <p class="text-sm text-[#64748B] truncate">
                                                    <span class="font-bold text-[#051F20]">{{ $lastMessage->pengirim->name }}:</span> 
                                                    @if($lastMessage->file_attachment)
                                                        <span class="italic">📎 Mengirim file</span>
                                                    @else
                                                        {{ $lastMessage->pesan }}
                                                    @endif
                                                </p>
                                            @else
                                                <p class="text-sm text-[#94A3B8] italic">Belum ada pesan. Mulai percakapan!</p>
                                            @endif
                                        </div>

                                        @if($unreadCount > 0)
                                            <div class="w-6 h-6 bg-[#4F7EF7] text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-md shadow-[#4F7EF7]/20">
                                                {{ $unreadCount }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="mt-3 flex items-center gap-2">
                                        <span class="px-2 py-0.5 bg-[#EFF6FF] text-[#4F7EF7] text-[9px] font-black rounded uppercase tracking-tighter">
                                            {{ $tim->lomba->nama }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="py-24 text-center bg-white rounded-[3rem] border border-[#E2E8F0] shadow-sm">
                        <div class="w-24 h-24 bg-[#EFF6FF] rounded-full flex items-center justify-center text-5xl mx-auto mb-8 animate-bounce">💬</div>
                        <h3 class="text-2xl font-bold text-[#051F20]">Belum ada chat tim</h3>
                        <p class="text-sm text-[#64748B] mt-2 mb-10 max-w-sm mx-auto">Chat akan tersedia setelah kamu bergabung dan diterima di sebuah tim.</p>
                        <a href="{{ route('mahasiswa.tim-finder.index') }}" class="px-10 py-4 bg-[#4F7EF7] text-white font-bold rounded-2xl shadow-xl shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] transition">
                            Cari Tim Sekarang →
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
