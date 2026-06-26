<x-admin-layout>
    <x-slot name="pageTitle">Kelola Pengguna</x-slot>

    <div x-data="{
        search: '',
        roleFilter: 'semua',
        statusFilter: 'semua',
        // Quick view state
        quickView: {
            show: false,
            name: '',
            email: '',
            role: '',
            status: '',
            registered: '',
            initials: '',
            id: null,
            isActive: true
        },
        openQuickView(user) {
            this.quickView.name = user.name;
            this.quickView.email = user.email;
            this.quickView.role = user.role;
            this.quickView.status = user.isActive ? 'Aktif' : 'Nonaktif';
            this.quickView.registered = user.registered;
            this.quickView.initials = user.name.charAt(0).toUpperCase();
            this.quickView.id = user.id;
            this.quickView.isActive = user.isActive;
            this.quickView.show = true;
        },
        confirmToggle(formId, is_active) {
            const actionText = is_active ? 'menonaktifkan' : 'mengaktifkan';
            this.confirmModal.trigger(
                'Ubah Status Pengguna?',
                `Apakah Anda yakin ingin ${actionText} akses masuk untuk pengguna ini?`,
                () => { document.getElementById(formId).submit(); }
            );
        },
        confirmDelete(formId) {
            this.confirmModal.trigger(
                'Hapus Pengguna?',
                'Tindakan ini bersifat permanen. Seluruh data profil dan relasi pendaftaran lomba pengguna akan terhapus.',
                () => { document.getElementById(formId).submit(); }
            );
        }
    }" class="space-y-8 animate-fade-in">

        <!-- Top Statistics Summary Cards with Count Animation -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div x-data="{ count: 0, target: {{ $users->total() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-gradient-to-br from-brand-dark to-brand-teal p-6 rounded-[2rem] border border-brand-teal/20 shadow-lg shadow-brand-teal/10 flex items-center justify-between overflow-hidden hover:scale-[1.02] transition-transform duration-300">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-black text-brand-mint/80 uppercase tracking-widest leading-none">Total User Terdaftar</span>
                    <span class="block text-4xl font-black text-white mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-white/10 text-brand-mint rounded-2xl backdrop-blur-sm border border-white/10 group-hover:rotate-6 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
            </div>

            <div x-data="{ count: 0, target: {{ $users->where('is_active', true)->count() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-emerald-500/10 hover:-translate-y-1 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-emerald-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">User Aktif</span>
                    <span class="block text-4xl font-black text-emerald-600 dark:text-emerald-400 mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl group-hover:scale-110 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>

            <div x-data="{ count: 0, target: {{ $users->where('is_active', false)->count() }} }"
                 x-init="setTimeout(() => {
                     let current = 0;
                     const step = Math.ceil(target / 40) || 1;
                     const timer = setInterval(() => {
                         current += step;
                         if (current >= target) { count = target; clearInterval(timer); }
                         else { count = current; }
                     }, 16);
                 }, 50)"
                 class="relative group bg-white dark:bg-zinc-900 p-6 rounded-[2rem] border border-gray-150/50 dark:border-zinc-700 shadow-sm flex items-center justify-between hover:shadow-lg hover:shadow-rose-500/10 hover:-translate-y-1 transition duration-500 overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-rose-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <span class="text-[10px] font-extrabold text-gray-500 dark:text-zinc-400 uppercase tracking-widest leading-none">User Dinonaktifkan</span>
                    <span class="block text-4xl font-black text-rose-600 dark:text-rose-400 mt-2 tracking-tight" x-text="count">0</span>
                </div>
                <div class="relative z-10 p-4 bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-2xl group-hover:scale-110 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                </div>
            </div>
        </div>

        <!-- Top Action Bar with Real-Time Controls -->
        <div class="bg-white dark:bg-zinc-900 p-6 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-4 theme-transition">
            <div>
                <h2 class="text-xl font-bold text-brand-dark dark:text-zinc-100">Daftar Pengguna Sistem</h2>
                <p class="text-xs text-brand-black/60 dark:text-zinc-400 mt-1">Atur hak akses peranan, status aktif, dan pengelolaan akun.</p>
            </div>
            
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search Box -->
                <div class="relative w-full sm:w-64">
                    <input type="text" x-model="search" placeholder="Cari nama atau email..." 
                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- Role Filter -->
                <select x-model="roleFilter" 
                        class="px-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <option value="semua">Semua Role</option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>

                <!-- Status Filter -->
                <select x-model="statusFilter" 
                        class="px-4 py-2.5 bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/30 rounded-xl text-xs transition-all duration-300 dark:text-white">
                    <option value="semua">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white dark:bg-zinc-900 rounded-[2.5rem] border border-gray-150/10 dark:border-zinc-800 shadow-sm overflow-hidden theme-transition">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-brand-mint/30 dark:bg-zinc-800/40 border-b border-brand-teal/10 dark:border-zinc-800 text-[10px] font-bold text-brand-dark dark:text-brand-mint uppercase tracking-widest">
                            <th class="px-8 py-5">Nama & Email</th>
                            <th class="px-6 py-5">Peranan (Role)</th>
                            <th class="px-6 py-5">Status Aktivasi</th>
                            <th class="px-6 py-5">Tanggal Registrasi</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($users as $user)
                            @php
                                $role = $user->getRoleNames()->first() ?? 'mahasiswa';
                                $userData = [
                                    'id' => $user->id,
                                    'name' => $user->name,
                                    'email' => $user->email,
                                    'role' => $role,
                                    'isActive' => (bool)$user->is_active,
                                    'registered' => $user->created_at->format('d M Y, H:i') . ' WIB'
                                ];
                            @endphp
                            <tr x-show="(search === '' || '{{ strtolower($user->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(search.toLowerCase())) && (roleFilter === 'semua' || '{{ strtolower($role) }}' === roleFilter) && (statusFilter === 'semua' || ('{{ $user->is_active }}' === '1' ? 'aktif' : 'nonaktif') === statusFilter)"
                                class="hover:bg-brand-mint/10 dark:hover:bg-zinc-800/30 transition-all duration-200 group cursor-pointer">
                                
                                <!-- Nama & Email -->
                                <td class="px-8 py-5" @click="openQuickView({{ json_encode($userData) }})">
                                    <div class="flex items-center space-x-4">
                                        <div class="relative">
                                            @php
                                                $avatarColor = $role === 'admin' 
                                                    ? 'bg-gradient-to-br from-purple-500 to-purple-700 text-white border-purple-500/20' 
                                                    : 'bg-gradient-to-br from-brand-dark to-brand-teal text-white border-brand-teal/20';
                                            @endphp
                                            <div class="w-12 h-12 {{ $avatarColor }} rounded-2xl flex items-center justify-center font-black text-lg uppercase border shadow-sm flex-shrink-0">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <span class="absolute -bottom-1 -right-1 block h-3.5 w-3.5 rounded-full border-2 border-white dark:border-zinc-900 {{ $user->is_active ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-extrabold text-brand-dark dark:text-zinc-100 leading-snug group-hover:text-brand-teal transition-colors">{{ $user->name }}</span>
                                            <span class="text-[10px] font-bold text-gray-500 dark:text-zinc-400 mt-1 block uppercase tracking-wider">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Role -->
                                <td class="px-6 py-5" @click="openQuickView({{ json_encode($userData) }})">
                                    <span class="inline-flex px-3 py-1 text-[9px] font-black rounded-lg uppercase tracking-wider border {{ $user->hasRole('admin') ? 'bg-purple-100 text-purple-700 border-purple-200 dark:bg-purple-900/30 dark:text-purple-400 dark:border-purple-800' : 'bg-gray-100 text-gray-700 border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700' }}">
                                        {{ $role }}
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-5" @click="openQuickView({{ json_encode($userData) }})">
                                    @if($user->is_active)
                                        <span class="inline-flex items-center px-3 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-black uppercase tracking-wider rounded-full border border-emerald-200 dark:border-emerald-800/50 shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 bg-rose-50 dark:bg-rose-900/20 text-rose-600 dark:text-rose-400 text-[10px] font-black uppercase tracking-wider rounded-full border border-rose-200 dark:border-rose-800/50 shadow-[0_0_10px_rgba(244,63,94,0.1)]">
                                            <span class="w-1.5 h-1.5 bg-rose-500 rounded-full mr-2"></span>
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <!-- Terdaftar -->
                                <td class="px-6 py-5" @click="openQuickView({{ json_encode($userData) }})">
                                    <span class="block text-xs font-black text-brand-dark dark:text-zinc-200">{{ $user->created_at->format('d M Y') }}</span>
                                    <span class="block text-[10px] font-bold text-gray-500 dark:text-zinc-400 mt-1 uppercase tracking-wider">{{ $user->created_at->format('H:i') }} WIB</span>
                                </td>

                                <!-- Aksi -->
                                <td class="px-8 py-5 text-right relative z-20">
                                    <div class="flex items-center justify-end space-x-2">
                                        <!-- Toggle status -->
                                        <form id="toggle-form-{{ $user->id }}" action="{{ route('admin.users.toggle', $user) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="button" @click="confirmToggle('toggle-form-{{ $user->id }}', {{ $user->is_active }})" 
                                                     class="p-2 {{ $user->is_active ? 'bg-amber-50 dark:bg-amber-950/20 hover:bg-amber-600 text-amber-600 hover:text-white' : 'bg-emerald-50 dark:bg-emerald-950/20 hover:bg-emerald-600 text-emerald-600 hover:text-white' }} rounded-xl transition duration-300" title="{{ $user->is_active ? 'Nonaktifkan Pengguna' : 'Aktifkan Pengguna' }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                                            </button>
                                        </form>

                                        <!-- Hapus Pengguna -->
                                        <form id="delete-user-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" @click="confirmDelete('delete-user-{{ $user->id }}')" class="p-2 bg-rose-50 dark:bg-rose-950/20 hover:bg-rose-600 text-rose-600 dark:text-rose-400 hover:text-white rounded-xl transition duration-300" title="Hapus Pengguna">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4 max-w-md mx-auto">
                                        <svg class="w-40 h-40 text-brand-teal/40 dark:text-brand-teal/20" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="100" cy="100" r="80" fill="currentColor" fill-opacity="0.1"/>
                                            <path d="M120 140V130C120 119.454 111.454 110 100 110C88.5457 110 80 119.454 80 130V140" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                            <circle cx="100" cy="80" r="20" stroke="currentColor" stroke-width="3"/>
                                        </svg>
                                        <h4 class="text-lg font-bold text-brand-dark dark:text-zinc-200">Belum Ada Pengguna</h4>
                                        <p class="text-sm text-brand-black/60 dark:text-zinc-400">Daftar pengguna terdaftar di website SiLomba akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Area -->
            @if($users->hasPages())
                <div class="px-8 py-5 border-t border-gray-100 dark:border-zinc-800 bg-gray-50/50 dark:bg-zinc-900/50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

        <!-- Quick View User Modal -->
        <div x-show="quickView.show" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/65 backdrop-blur-sm" x-cloak>
            <div x-show="quickView.show" 
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative max-w-sm w-full bg-white dark:bg-zinc-900 border border-gray-150/10 dark:border-zinc-800 rounded-[2.5rem] shadow-2xl"
                 @click.outside="quickView.show = false">
                
                <!-- Card Header with Gradient -->
                <div class="h-32 bg-gradient-to-br from-brand-teal to-brand-dark relative rounded-t-[2.5rem]">
                    <button @click="quickView.show = false" class="absolute top-4 right-4 p-2 bg-white/10 text-white rounded-full hover:bg-white/20 transition backdrop-blur-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <!-- Avatar Circle (half-overlapping the header) -->
                <div class="flex justify-center" style="margin-top: -48px; position: relative; z-index: 10;">
                    <div class="w-24 h-24 bg-white dark:bg-zinc-900 rounded-full p-1.5 shadow-xl">
                        <div class="w-full h-full bg-gradient-to-br from-brand-dark to-brand-teal text-white rounded-full flex items-center justify-center font-black text-3xl border border-brand-teal/20 shadow-md"
                             :class="quickView.role === 'admin' ? 'from-purple-500 to-purple-700' : 'from-brand-dark to-brand-teal'">
                            <span x-text="quickView.initials"></span>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8 pt-4 text-center">
                <div class="mt-2">
                    <h3 class="text-xl font-extrabold text-brand-dark dark:text-white" x-text="quickView.name"></h3>
                    <p class="text-xs font-semibold text-brand-teal mt-1" x-text="quickView.email"></p>
                </div>

                <div class="mt-6 py-4 border-y border-gray-100 dark:border-zinc-800 flex justify-around text-left">
                    <div>
                        <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider">Peranan</span>
                        <span class="block text-xs font-black text-brand-dark dark:text-brand-mint uppercase mt-1" x-text="quickView.role"></span>
                    </div>
                    <div>
                        <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider">Status Akun</span>
                        <span class="inline-flex items-center text-xs font-bold mt-1" 
                              :class="quickView.isActive ? 'text-emerald-600' : 'text-rose-600'">
                            <span class="w-1.5 h-1.5 rounded-full mr-1.5" :class="quickView.isActive ? 'bg-emerald-500 animate-pulse' : 'bg-rose-500'"></span>
                            <span x-text="quickView.status"></span>
                        </span>
                    </div>
                </div>

                <div class="mt-4 text-left">
                    <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider">Tanggal Registrasi</span>
                    <p class="text-xs text-brand-black/80 dark:text-zinc-300 mt-1 font-semibold" x-text="quickView.registered"></p>
                </div>

                <div class="mt-6 flex gap-3">
                    <button @click="quickView.show = false; confirmToggle('toggle-form-' + quickView.id, quickView.isActive)"
                            class="flex-1 py-3 font-bold rounded-xl text-xs transition duration-200 shadow-md"
                            :class="quickView.isActive ? 'bg-amber-500 hover:bg-amber-600 text-white' : 'bg-emerald-500 hover:bg-emerald-600 text-white'">
                        <span x-text="quickView.isActive ? 'Nonaktifkan Akun' : 'Aktifkan Akun'"></span>
                    </button>
                </div>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
