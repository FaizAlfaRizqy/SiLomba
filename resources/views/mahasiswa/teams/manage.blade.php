<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('mahasiswa.team.my') }}" class="p-2 bg-gray-100 hover:bg-gray-200 rounded-xl transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Tim: ') }} {{ $tim->nama_tim }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Members & Slots -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Members List -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                            <h3 class="font-bold text-gray-900">Anggota Tim ({{ $tim->anggota->count() }}/{{ $tim->maks_anggota }})</h3>
                        </div>
                        <div class="divide-y divide-gray-50">
                            @foreach($tim->anggota as $anggota)
                                <div class="p-6 flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600">
                                            @if($anggota->user->mahasiswa->foto_profil)
                                                <img src="{{ asset('storage/' . $anggota->user->mahasiswa->foto_profil) }}" class="w-full h-full object-cover rounded-2xl">
                                            @else
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900">{{ $anggota->user->name }}</h4>
                                            <p class="text-xs text-gray-500 uppercase font-bold tracking-widest">{{ $anggota->peran }}</p>
                                        </div>
                                    </div>
                                    @if($anggota->peran !== 'ketua')
                                        <button class="text-rose-600 text-xs font-bold hover:underline">Keluarkan</button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Open Slots -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                            <h3 class="font-bold text-gray-900">Open Slot Aktif</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            @foreach($tim->slots as $slot)
                                <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $slot->posisi }}</h4>
                                        <div class="flex flex-wrap gap-1 mt-1">
                                            @foreach($slot->keahlian_dibutuhkan as $skill)
                                                <span class="text-[10px] bg-white px-2 py-0.5 rounded text-gray-500 border border-gray-100">{{ $skill }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="block text-xs font-bold text-indigo-600">{{ $slot->jumlah_slot }} Slot</span>
                                        <button class="text-[10px] text-rose-600 font-bold hover:underline">Tutup Slot</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Team Chat -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden" 
                         x-data="teamChat({{ $tim->id }})" 
                         x-init="init()">
                        <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-indigo-600 text-white">
                            <h3 class="font-bold">Diskusi Tim</h3>
                            <span class="text-[10px] px-2 py-0.5 bg-indigo-500 rounded-full font-bold uppercase tracking-widest">Real-time</span>
                        </div>
                        <div class="h-96 overflow-y-auto p-6 space-y-4 flex flex-col" id="chat-container">
                            <template x-for="msg in messages" :key="msg.id">
                                <div :class="msg.id_pengirim == {{ Auth::id() }} ? 'self-end text-right' : 'self-start'">
                                    <div class="flex items-center space-x-2" :class="msg.id_pengirim == {{ Auth::id() }} ? 'flex-row-reverse space-x-reverse' : ''">
                                        <div class="text-[10px] font-bold text-gray-400" x-text="msg.sender.name"></div>
                                    </div>
                                    <div :class="msg.id_pengirim == {{ Auth::id() }} ? 'bg-indigo-600 text-white rounded-2xl rounded-tr-none' : 'bg-gray-100 text-gray-800 rounded-2xl rounded-tl-none'" 
                                         class="px-4 py-2 mt-1 text-sm shadow-sm inline-block max-w-xs break-words" 
                                         x-text="msg.message">
                                    </div>
                                    <div class="text-[8px] text-gray-400 mt-1" x-text="formatTime(msg.created_at)"></div>
                                </div>
                            </template>
                        </div>
                        <div class="p-4 bg-gray-50 border-t border-gray-100">
                            <form @submit.prevent="sendMessage()" class="flex space-x-2">
                                <input type="text" x-model="newMessage" placeholder="Ketik pesan..." class="flex-1 rounded-xl border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <button type="submit" class="p-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Applications -->
                <div class="space-y-8">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50">
                            <h3 class="font-bold text-gray-900">Lamaran Masuk</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            @php $hasPending = false; @endphp
                            @foreach($tim->slots as $slot)
                                @foreach($slot->lamarans->where('status', 'pending') as $lamaran)
                                    @php $hasPending = true; @endphp
                                    <div class="space-y-4 pb-6 border-b border-gray-50 last:border-0 last:pb-0">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-xl bg-gray-100 overflow-hidden">
                                                @if($lamaran->pelamar->mahasiswa->foto_profil)
                                                    <img src="{{ asset('storage/' . $lamaran->pelamar->mahasiswa->foto_profil) }}" class="w-full h-full object-cover">
                                                @endif
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-bold text-gray-900">{{ $lamaran->pelamar->name }}</h4>
                                                <p class="text-[10px] text-gray-500">Melamar untuk: {{ $slot->posisi }}</p>
                                            </div>
                                        </div>
                                        <div class="p-3 bg-gray-50 rounded-xl text-xs text-gray-600 italic">
                                            "{{ $lamaran->pesan_motivasi }}"
                                        </div>
                                        <div class="flex space-x-2">
                                            <form action="{{ route('mahasiswa.lamaran.accept', $lamaran->id) }}" method="POST" class="flex-1">
                                                @csrf
                                                <button class="w-full py-2 bg-emerald-600 text-white rounded-xl text-xs font-bold hover:bg-emerald-700 transition">Terima</button>
                                            </form>
                                            <form action="{{ route('mahasiswa.lamaran.reject', $lamaran->id) }}" method="POST" class="flex-1">
                                                @csrf
                                                <button class="w-full py-2 bg-white border border-rose-200 text-rose-600 rounded-xl text-xs font-bold hover:bg-rose-50 transition">Tolak</button>
                                            </form>
                                        </div>
                                        <a href="{{ route('mahasiswa.portfolio', $lamaran->pelamar->mahasiswa->nim) }}" class="block text-center text-[10px] font-bold text-indigo-600 hover:underline">Lihat Profil Lengkap &rarr;</a>
                                    </div>
                                @endforeach
                            @endforeach

                            @if(!$hasPending)
                                <p class="text-center text-sm text-gray-500 py-4">Belum ada lamaran masuk.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

    @push('scripts')
    <script>
        function teamChat(teamId) {
            return {
                messages: [],
                newMessage: '',
                init() {
                    this.fetchMessages();
                    setInterval(() => this.fetchMessages(), 3000);
                },
                fetchMessages() {
                    fetch(`/mahasiswa/team/${teamId}/messages`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.length > this.messages.length) {
                                this.messages = data;
                                this.$nextTick(() => {
                                    const container = document.getElementById('chat-container');
                                    container.scrollTop = container.scrollHeight;
                                });
                            }
                        });
                },
                sendMessage() {
                    if (this.newMessage.trim() === '') return;
                    
                    fetch(`/mahasiswa/team/${teamId}/messages`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message: this.newMessage })
                    })
                    .then(res => res.json())
                    .then(msg => {
                        this.messages.push(msg);
                        this.newMessage = '';
                        this.$nextTick(() => {
                            const container = document.getElementById('chat-container');
                            container.scrollTop = container.scrollHeight;
                        });
                    });
                },
                formatTime(dateString) {
                    const date = new Date(dateString);
                    return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                }
            }
        }
    </script>
    @endpush
</x-app-layout>
