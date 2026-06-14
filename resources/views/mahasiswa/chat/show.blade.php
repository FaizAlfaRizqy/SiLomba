<x-app-layout>
    <div class="flex h-[calc(100vh-80px)] bg-white overflow-hidden" 
         x-data="chatHandler()" 
         x-init="initChat()">
        
        <!-- SIDEBAR: INFO TIM (Hidden on Mobile) -->
        <div class="hidden lg:flex flex-col w-80 bg-[#F8FAFC] border-r border-[#E2E8F0]">
            <div class="p-8 text-center border-b border-[#E2E8F0]">
                <div class="w-24 h-24 rounded-3xl bg-[#4F7EF7] text-white flex items-center justify-center font-black text-3xl mx-auto mb-6 shadow-xl shadow-[#4F7EF7]/20">
                    {{ strtoupper(substr($tim->nama_tim, 0, 2)) }}
                </div>
                <h3 class="text-xl font-bold text-[#051F20] mb-1">{{ $tim->nama_tim }}</h3>
                <p class="text-xs text-[#64748B] font-medium leading-relaxed">{{ $tim->lomba->nama }}</p>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-8">
                <div>
                    <h4 class="text-[10px] font-black text-[#94A3B8] uppercase tracking-[0.2em] mb-4">Anggota Tim ({{ $tim->anggota->count() }})</h4>
                    <div class="space-y-3">
                        @foreach($tim->anggota as $member)
                            <div class="flex items-center gap-3 p-2 rounded-2xl hover:bg-[#EFF6FF] transition group">
                                <div class="w-10 h-10 rounded-xl bg-white border border-[#E2E8F0] text-[#4F7EF7] flex items-center justify-center font-bold text-sm shadow-sm group-hover:bg-[#4F7EF7] group-hover:text-white transition">
                                    {{ strtoupper(substr($member->user->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-[#051F20] truncate">{{ $member->user->name }}</p>
                                    <p class="text-[10px] text-[#64748B] truncate">{{ $member->user->email }}</p>
                                </div>
                                @if($member->peran == 'ketua')
                                    <span class="text-xs">👑</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 border border-[#E2E8F0]">
                    <h4 class="text-[10px] font-black text-[#94A3B8] uppercase tracking-[0.2em] mb-3">Info Lomba</h4>
                    <p class="text-sm font-bold text-[#051F20] mb-1">{{ $tim->lomba->nama }}</p>
                    <p class="text-[10px] text-red-500 font-bold italic">Deadline: {{ $tim->lomba->deadline->format('d M Y') }}</p>
                </div>
            </div>
        </div>

        <!-- MAIN CHAT AREA -->
        <div class="flex-1 flex flex-col relative bg-[#EFF6FF]">
            
            <!-- HEADER -->
            <div class="bg-white/80 backdrop-blur-md px-6 py-4 border-b border-[#E2E8F0] flex items-center justify-between sticky top-0 z-10 shadow-sm">
                <div class="flex items-center gap-4">
                    <a href="{{ route('mahasiswa.chat.index') }}" class="lg:hidden p-2 bg-[#F1F5F9] rounded-xl text-[#64748B]">←</a>
                    <div class="w-12 h-12 rounded-xl bg-[#4F7EF7] text-white flex items-center justify-center font-black text-lg shadow-lg shadow-[#4F7EF7]/20">
                        {{ strtoupper(substr($tim->nama_tim, 0, 2)) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-[#051F20]">{{ $tim->nama_tim }}</h4>
                        <p class="text-[10px] text-[#64748B] font-bold">{{ $tim->anggota->count() }} Anggota • {{ $tim->lomba->nama }}</p>
                    </div>
                </div>
            </div>

            <!-- MESSAGES AREA -->
            <div id="area-pesan" class="flex-1 overflow-y-auto px-6 py-8 space-y-6 scroll-smooth custom-scrollbar">
                
                <!-- Date Separator -->
                <div class="flex justify-center my-8">
                    <span class="bg-white/50 backdrop-blur-sm px-4 py-1 rounded-full text-[10px] font-bold text-[#94A3B8] border border-white/50 uppercase tracking-widest shadow-sm">Awal Percakapan</span>
                </div>

                <template x-for="msg in pesan" :key="msg.id">
                    <div :class="msg.id_pengirim == {{ Auth::id() }} ? 'flex justify-end' : 'flex justify-start'">
                        <div :class="msg.id_pengirim == {{ Auth::id() }} ? 'items-end' : 'items-start'" class="flex flex-col max-w-[80%] lg:max-w-[60%]">
                            
                            <!-- Sender Name -->
                            <template x-if="msg.id_pengirim != {{ Auth::id() }}">
                                <span class="text-[10px] font-black text-[#64748B] mb-1 ml-4 uppercase tracking-tighter" x-text="msg.pengirim.name"></span>
                            </template>

                            <!-- Message Bubble -->
                            <div :class="msg.id_pengirim == {{ Auth::id() }} 
                                ? 'bg-[#4F7EF7] text-white rounded-3xl rounded-tr-sm shadow-xl shadow-[#4F7EF7]/20' 
                                : 'bg-white text-[#051F20] rounded-3xl rounded-tl-sm border border-[#E2E8F0] shadow-sm'" 
                                class="px-5 py-3.5 relative group">
                                
                                <!-- File Attachment -->
                                <template x-if="msg.file_attachment">
                                    <div class="flex items-center gap-3 p-2 bg-black/5 rounded-xl mb-2">
                                        <div class="text-2xl">📎</div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-bold truncate" x-text="msg.pesan"></p>
                                        </div>
                                        <a :href="'/storage/' + msg.file_attachment" target="_blank" class="text-[10px] font-black uppercase tracking-widest bg-white/20 px-2 py-1 rounded hover:bg-white/30 transition">Unduh</a>
                                    </div>
                                </template>

                                <!-- Text Message -->
                                <template x-if="!msg.file_attachment">
                                    <p class="text-sm leading-relaxed whitespace-pre-wrap" x-text="msg.pesan"></p>
                                </template>

                                <!-- Pin Badge -->
                                <template x-if="msg.is_pinned">
                                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-amber-400 rounded-full flex items-center justify-center text-[10px] shadow-lg border-2 border-white">📌</div>
                                </template>

                                <!-- Pin Action (For Leader Only) -->
                                @if(Auth::id() == $tim->id_ketua)
                                    <button @click="pinPesan(msg.id)" class="absolute -left-8 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition p-1 bg-white rounded-full shadow-md text-xs">📌</button>
                                @endif
                            </div>

                            <!-- Timestamp -->
                            <span :class="msg.id_pengirim == {{ Auth::id() }} ? 'mr-2' : 'ml-2'" class="text-[9px] font-bold text-[#94A3B8] mt-1 uppercase" x-text="formatDate(msg.created_at)"></span>
                        </div>
                    </div>
                </template>
            </div>

            <!-- PINNED MESSAGE BANNER -->
            <template x-if="pinnedMessage">
                <div class="absolute top-20 left-0 right-0 px-6 py-2 bg-amber-50/90 backdrop-blur-sm border-b border-amber-200 flex items-center justify-between z-10 animate-fade-down">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <span class="text-lg">📌</span>
                        <div class="truncate">
                            <p class="text-[10px] font-black text-amber-700 uppercase tracking-widest">Pesan Tersemat</p>
                            <p class="text-xs text-amber-900 truncate" x-text="pinnedMessage.pesan"></p>
                        </div>
                    </div>
                    <button @click="scrollAtMsg(pinnedMessage.id)" class="text-[10px] font-black text-amber-700 hover:underline flex-shrink-0 uppercase tracking-widest">Lihat →</button>
                </div>
            </template>

            <!-- INPUT AREA -->
            <div class="bg-white px-6 py-5 border-t border-[#E2E8F0] shadow-2xl relative z-20">
                <div class="max-w-5xl mx-auto flex items-end gap-3">
                    
                    <!-- Attachment -->
                    <div x-data="{ uploading: false }">
                        <input type="file" id="file-input" class="hidden" @change="uploadFile($event)">
                        <button @click="document.getElementById('file-input').click()" 
                                :disabled="uploading"
                                class="w-12 h-12 rounded-2xl bg-[#F8FAFC] border border-[#E2E8F0] flex items-center justify-center text-xl hover:bg-[#EFF6FF] hover:border-[#4F7EF7]/30 transition group">
                            <span :class="uploading ? 'animate-spin' : 'group-hover:scale-110 transition'">📎</span>
                        </button>
                    </div>

                    <!-- Input Field -->
                    <div class="flex-1 relative">
                        <textarea 
                            x-model="inputPesan"
                            @keydown.enter.prevent="kirimPesan()"
                            rows="1" 
                            style="resize:none"
                            placeholder="Ketik pesan..."
                            class="w-full bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl px-5 py-3.5 text-sm focus:border-[#4F7EF7] focus:ring-4 focus:ring-[#4F7EF7]/10 transition-all no-scrollbar"
                            @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                        ></textarea>
                    </div>

                    <!-- Send Button -->
                    <button 
                        @click="kirimPesan()"
                        :disabled="!inputPesan.trim()"
                        :class="inputPesan.trim() ? 'bg-[#4F7EF7] shadow-xl shadow-[#4F7EF7]/20 hover:bg-[#3B6EF0] scale-100' : 'bg-gray-100 text-gray-400 scale-90'"
                        class="w-12 h-12 rounded-2xl flex items-center justify-center text-white transition-all transform active:scale-95">
                        <svg class="w-6 h-6 transform rotate-90" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function chatHandler() {
            return {
                pesan: @json($messages),
                pinnedMessage: @json($pinnedMessage),
                inputPesan: '',
                lastTimestamp: Date.now(),
                timId: {{ $tim->id }},
                csrfToken: '{{ csrf_token() }}',

                initChat() {
                    this.scrollBawah();
                    this.mulaiPolling();
                },

                mulaiPolling() {
                    setInterval(() => {
                        this.ambilPesanBaru();
                    }, 3000);
                },

                async ambilPesanBaru() {
                    try {
                        const res = await fetch(`/mahasiswa/chat/${this.timId}/pesan-baru?sejak=${this.lastTimestamp}`);
                        const data = await res.json();
                        if (data.pesan.length > 0) {
                            this.pesan.push(...data.pesan);
                            this.lastTimestamp = data.timestamp;
                            this.$nextTick(() => this.scrollBawah());
                        }
                    } catch (e) { console.error('Polling error:', e); }
                },

                async kirimPesan() {
                    if (!this.inputPesan.trim()) return;
                    const content = this.inputPesan;
                    this.inputPesan = '';
                    
                    try {
                        const res = await fetch(`/mahasiswa/chat/${this.timId}/kirim`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken
                            },
                            body: JSON.stringify({ pesan: content })
                        });
                        await this.ambilPesanBaru();
                    } catch (e) { console.error('Send error:', e); }
                },

                async uploadFile(e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    const formData = new FormData();
                    formData.append('file', file);

                    try {
                        await fetch(`/mahasiswa/chat/${this.timId}/upload`, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': this.csrfToken },
                            body: formData
                        });
                        await this.ambilPesanBaru();
                    } catch (e) { console.error('Upload error:', e); }
                },

                async pinPesan(msgId) {
                    try {
                        const res = await fetch(`/mahasiswa/chat/pesan/${msgId}/pin`, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': this.csrfToken }
                        });
                        const data = await res.json();
                        if (data.success) {
                            // Refresh page or update local state
                            window.location.reload();
                        }
                    } catch (e) { console.error('Pin error:', e); }
                },

                scrollBawah() {
                    const area = document.getElementById('area-pesan');
                    area.scrollTop = area.scrollHeight;
                },

                scrollAtMsg(id) {
                    // Simple search for element with text match or data-id
                    // For now, just scroll down
                    this.scrollBawah();
                },

                formatDate(dateStr) {
                    const date = new Date(dateStr);
                    return date.getHours().toString().padStart(2, '0') + ':' + 
                           date.getMinutes().toString().padStart(2, '0');
                }
            }
        }
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { bg: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #CBD5E1; }
        
        [x-cloak] { display: none !important; }
        
        @keyframes fade-down {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-down { animation: fade-down 0.3s ease-out; }
    </style>
</x-app-layout>
