<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-[#1E293B] leading-tight">
                    {{ __('Notifikasi') }}
                </h2>
                <p class="text-sm text-[#64748B]">
                    {{ \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count() }} belum dibaca
                </p>
            </div>
            @if(\App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->exists())
                <form action="{{ route('mahasiswa.notifikasi.baca-semua') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-[#4F7EF7] hover:underline">
                        Tandai Semua Dibaca
                    </button>
                </form>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-[#EFF6FF] min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-[#D1FAE5] border border-[#10B981]/30 rounded-2xl flex items-center gap-3 text-[#065F46]">
                    <span>✅</span>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <div class="space-y-3">
                @forelse($notifikasis as $notif)
                    <div class="relative group">
                        <form action="{{ route('mahasiswa.notifikasi.baca', $notif->id) }}" method="POST" id="form-notif-{{ $notif->id }}">
                            @csrf
                            <button type="submit" class="w-full text-left">
                                <div class="p-5 rounded-2xl border transition-all flex items-start gap-4 
                                    {{ $notif->is_read ? 'bg-[#F8FAFC] border-[#E2E8F0] opacity-80' : 'bg-white border-[#DBEAFE] shadow-lg shadow-[#4F7EF7]/5 ring-1 ring-[#4F7EF7]/10' }}">
                                    
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl flex-shrink-0
                                        {{ $notif->tipe == 'lamaran_diterima' ? 'bg-green-50 text-green-500' : '' }}
                                        {{ $notif->tipe == 'lamaran_ditolak' ? 'bg-red-50 text-red-500' : '' }}
                                        {{ $notif->tipe == 'lamaran_masuk' ? 'bg-blue-50 text-blue-500' : '' }}
                                        {{ $notif->tipe == 'anggota_baru' ? 'bg-indigo-50 text-indigo-500' : '' }}
                                        {{ str_starts_with($notif->tipe, 'deadline') ? 'bg-amber-50 text-amber-500' : '' }}
                                        {{ $notif->tipe == 'chat_baru' ? 'bg-emerald-50 text-emerald-500' : '' }}">
                                        
                                        @switch($notif->tipe)
                                            @case('lamaran_diterima') 🎉 @break
                                            @case('lamaran_ditolak') ❌ @break
                                            @case('lamaran_masuk') 📨 @break
                                            @case('anggota_baru') 👋 @break
                                            @case('chat_baru') 💬 @break
                                            @default 📅
                                        @endswitch
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex justify-between items-start">
                                            <h4 class="text-sm font-bold {{ $notif->is_read ? 'text-[#64748B]' : 'text-[#1E293B]' }}">{{ $notif->judul }}</h4>
                                            @if(!$notif->is_read)
                                                <div class="w-2.5 h-2.5 bg-[#4F7EF7] rounded-full"></div>
                                            @endif
                                        </div>
                                        <p class="text-sm {{ $notif->is_read ? 'text-[#94A3B8]' : 'text-[#64748B]' }} mt-1 leading-relaxed">{{ $notif->isi }}</p>
                                        <div class="flex items-center justify-between mt-3">
                                            <span class="text-[10px] font-bold text-[#94A3B8] uppercase tracking-widest">{{ $notif->created_at->diffForHumans() }}</span>
                                            @if($notif->link)
                                                <span class="text-[10px] font-black text-[#4F7EF7] uppercase tracking-widest group-hover:underline">Lihat Detail →</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="py-24 text-center bg-white rounded-[2rem] border border-[#E2E8F0] shadow-sm">
                        <div class="w-20 h-20 bg-[#F1F5F9] rounded-full flex items-center justify-center text-4xl mx-auto mb-6">🔔</div>
                        <h3 class="text-lg font-bold text-[#1E293B]">Belum ada notifikasi</h3>
                        <p class="text-sm text-[#64748B] mt-2">Semua aktivitas penting akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $notifikasis->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
