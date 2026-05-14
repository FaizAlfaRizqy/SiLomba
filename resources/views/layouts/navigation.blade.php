<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="text-2xl font-black text-gray-900 tracking-tighter">Si<span class="text-indigo-600">Lomba</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-bold">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @role('mahasiswa|ketua_tim')
                        <x-nav-link :href="route('mahasiswa.lomba.index')" :active="request()->routeIs('mahasiswa.lomba.*')" class="text-sm font-bold">
                            {{ __('Direktori Lomba') }}
                        </x-nav-link>
                        <x-nav-link :href="route('mahasiswa.tim-finder.index')" :active="request()->routeIs('mahasiswa.tim-finder.*')" class="text-sm font-bold">
                            {{ __('Tim Finder') }}
                        </x-nav-link>
                        <x-nav-link :href="route('mahasiswa.my-teams.index')" :active="request()->routeIs('mahasiswa.my-teams.*')" class="text-sm font-bold">
                            {{ __('Tim Saya') }}
                        </x-nav-link>
                    @endrole

                    @role('admin')
                        <x-nav-link :href="route('admin.lomba.index')" :active="request()->routeIs('admin.lomba.*')" class="text-sm font-bold">
                            {{ __('Kelola Lomba') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.tim.index')" :active="request()->routeIs('admin.tim.*')" class="text-sm font-bold">
                            {{ __('Kelola Tim') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" class="text-sm font-bold">
                            {{ __('Pengguna') }}
                        </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                @role('mahasiswa|ketua_tim')
                <div class="relative" x-data="{ jumlah: {{ \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count() }} }" 
                     x-init="
                       setInterval(() => {
                         fetch('{{ route('mahasiswa.notifikasi.unread-count') }}')
                           .then(r => r.json())
                           .then(d => jumlah = d.count)
                       }, 10000)
                     ">
                    <a href="{{ route('mahasiswa.notifikasi.index') }}" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <template x-if="jumlah > 0">
                            <span class="absolute top-2 right-2 w-5 h-5 bg-rose-500 text-white text-[10px] font-bold rounded-full border-2 border-white flex items-center justify-center animate-pulse" x-text="jumlah > 9 ? '9+' : jumlah"></span>
                        </template>
                    </a>
                </div>
                @endrole

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-100 text-sm leading-4 font-bold rounded-2xl text-gray-700 bg-gray-50 hover:bg-gray-100 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1 text-gray-400">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @role('mahasiswa|ketua_tim')
                            <x-dropdown-link :href="route('mahasiswa.profile.edit')">
                                {{ __('Profil Mahasiswa') }}
                            </x-dropdown-link>
                        @endrole
                        
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Pengaturan Akun') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-rose-600 font-bold">
                                {{ __('Keluar Aplikasi') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <!-- Add more responsive links as needed -->
        </div>
    </div>
</nav>
