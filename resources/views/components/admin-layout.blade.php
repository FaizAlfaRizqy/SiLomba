<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'SiLomba Admin' }} - Sistem Informasi Lomba</title>

        <!-- Fonts & Icons -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

        <!-- Scripts & Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            brand: {
                                mint: '#CBEFEB',
                                teal: '#48A89A',
                                dark: '#00524D',
                                black: '#000000',
                            }
                        },
                        fontFamily: {
                            outfit: ['Nunito', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            [x-cloak] { display: none !important; }
            
            /* Smooth theme transition */
            .theme-transition, .theme-transition * {
                transition: background-color 0.25s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.25s cubic-bezier(0.4, 0, 0.2, 1), color 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
            ::-webkit-scrollbar-track {
                background: transparent;
            }
            .dark ::-webkit-scrollbar-thumb {
                background: #00524D;
            }
            ::-webkit-scrollbar-thumb {
                background: #48A89A;
                border-radius: 10px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #00524D;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(12px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
                animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            }
            @keyframes gradientX {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .animate-gradient-x {
                background-size: 200% 200%;
                animation: gradientX 5s ease infinite;
            }
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.4);
            }
            .dark .glass-card {
                background: rgba(24, 24, 27, 0.7);
                border: 1px solid rgba(255, 255, 255, 0.05);
            }
        </style>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('notifSystem', {
                    activeFilter: 'Semua',
                    filters: ['Semua', 'Sistem', 'Lomba', 'Tim', 'Penting'],
                    notifications: [
                        { id: 1, group: 'Hari Ini', type: 'error', category: 'Lomba', title: 'Batas Waktu Lomba Mendekati', time: '10 menit yang lalu', message: 'Pendaftaran untuk \'Hackathon Nasional v3.0\' akan ditutup dalam 2 jam lagi. Mohon segera lakukan validasi akhir.', icon: 'timer', isRead: false },
                        { id: 2, group: 'Hari Ini', type: 'info', category: 'Tim', title: 'Lamaran Tim Baru', time: '1 jam yang lalu', message: 'Tim \'Pixel Wizards\' telah mengirimkan berkas pendaftaran.', icon: 'group_add', isRead: false },
                        { id: 3, group: 'Hari Ini', type: 'success', category: 'Lomba', title: 'Lomba Baru Ditambahkan', time: '3 jam yang lalu', message: 'Admin Regional Bandung telah menambahkan draf lomba baru.', icon: 'add_circle', isRead: true },
                        { id: 4, group: 'Kemarin', type: 'warning', category: 'Sistem', title: 'Laporan Bulanan Siap', time: '1 hari yang lalu', message: 'Laporan analitik untuk periode Mei 2026 telah digenerate.', icon: 'description', isRead: true },
                        { id: 5, group: 'Kemarin', type: 'info', category: 'Sistem', title: 'Pembaruan Sistem Berhasil', time: '1 hari yang lalu', message: 'SiLomba Admin Console telah berhasil diperbarui.', icon: 'system_update', isRead: true }
                    ],
                    get unreadCount() {
                        return this.notifications.filter(n => !n.isRead).length;
                    },
                    get filteredNotifications() {
                        if (this.activeFilter === 'Semua') return this.notifications;
                        if (this.activeFilter === 'Penting') return this.notifications.filter(n => n.type === 'error' || n.type === 'warning');
                        return this.notifications.filter(n => n.category === this.activeFilter);
                    },
                    get groupedNotifications() {
                        return this.filteredNotifications.reduce((groups, notif) => {
                            if (!groups[notif.group]) groups[notif.group] = [];
                            groups[notif.group].push(notif);
                            return groups;
                        }, {});
                    },
                    markAllAsRead() {
                        this.notifications.forEach(n => n.isRead = true);
                    },
                    markAsRead(id) {
                        const notif = this.notifications.find(n => n.id === id);
                        if(notif) notif.isRead = true;
                    },
                    deleteNotif(id) {
                        this.notifications = this.notifications.filter(n => n.id !== id);
                    }
                });
            });
        </script>
    </head>
    <body class="h-full antialiased text-brand-black dark:text-white bg-gray-50/50 dark:bg-zinc-950 theme-transition" 
          x-data="{ 
              sidebarOpen: false, 
              sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true',
              toggleSidebar() {
                  this.sidebarCollapsed = !this.sidebarCollapsed;
                  localStorage.setItem('sidebarCollapsed', this.sidebarCollapsed);
              },
              toggleTheme() {
                  this.darkMode = !this.darkMode;
                  localStorage.setItem('darkMode', this.darkMode);
              },
              // Global Confirm Modal State
              confirmModal: {
                  show: false,
                  title: '',
                  message: '',
                  onConfirm: null,
                  trigger(title, message, confirmCallback) {
                      this.title = title;
                      this.message = message;
                      this.onConfirm = confirmCallback;
                      this.show = true;
                  },
                  proceed() {
                      if (this.onConfirm) this.onConfirm();
                      this.show = false;
                  }
              },
              // Global Toast System
              toasts: [],
              addToast(message, type = 'success') {
                  const id = Date.now();
                  this.toasts.push({ id, message, type });
                  setTimeout(() => {
                      this.toasts = this.toasts.filter(t => t.id !== id);
                  }, 4000);
              }
          }"
          x-init="
              @if(session('success')) addToast('{{ session('success') }}', 'success'); @endif
              @if(session('error')) addToast('{{ session('error') }}', 'error'); @endif
          ">
        
        <!-- Toast Container -->
        <div class="fixed bottom-5 right-5 z-50 flex flex-col gap-2.5 max-w-sm w-full pointer-events-none">
            <template x-for="toast in toasts" :key="toast.id">
                <div x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="translate-y-2 opacity-0 scale-95"
                     x-transition:enter-end="translate-y-0 opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="p-4 rounded-2xl shadow-lg border flex items-center justify-between pointer-events-auto backdrop-blur-md"
                     :class="{
                         'bg-emerald-50/90 dark:bg-emerald-950/90 border-emerald-100 dark:border-emerald-900 text-emerald-800 dark:text-emerald-200': toast.type === 'success',
                         'bg-rose-50/90 dark:bg-rose-950/90 border-rose-100 dark:border-rose-900 text-rose-800 dark:text-rose-200': toast.type === 'error',
                         'bg-amber-50/90 dark:bg-amber-950/90 border-amber-100 dark:border-amber-900 text-amber-800 dark:text-amber-200': toast.type === 'warning'
                     }">
                    <div class="flex items-center gap-3">
                        <template x-if="toast.type === 'success'">
                            <span class="p-1 bg-emerald-500 text-white rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </span>
                        </template>
                        <template x-if="toast.type === 'error'">
                            <span class="p-1 bg-rose-500 text-white rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                        </template>
                        <span class="text-xs font-bold" x-text="toast.message"></span>
                    </div>
                    <button @click="toasts = toasts.filter(t => t.id !== toast.id)" class="text-current opacity-60 hover:opacity-100 ml-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            </template>
        </div>

        <!-- Global Confirmation Modal -->
        <div x-show="confirmModal.show" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" x-cloak>
            <div x-show="confirmModal.show" 
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="bg-white dark:bg-zinc-900 border border-gray-100 dark:border-zinc-800 rounded-[2rem] max-w-md w-full p-8 shadow-2xl relative"
                 @click.outside="confirmModal.show = false">
                
                <div class="flex items-center gap-4 mb-4 text-rose-600">
                    <span class="p-3 bg-rose-50 dark:bg-rose-950/50 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    </span>
                    <h3 class="text-lg font-bold text-brand-dark dark:text-white" x-text="confirmModal.title"></h3>
                </div>

                <p class="text-sm text-brand-black/70 dark:text-zinc-400 mb-6" x-text="confirmModal.message"></p>

                <div class="flex items-center justify-end gap-3">
                    <button @click="confirmModal.show = false" class="px-5 py-2.5 bg-gray-100 dark:bg-zinc-800 text-brand-dark dark:text-zinc-300 hover:bg-gray-200 font-bold rounded-xl text-xs transition duration-300">
                        Batal
                    </button>
                    <button @click="confirmModal.proceed()" class="px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-xs transition duration-300 shadow-md shadow-rose-600/10">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>

        <div class="min-h-screen flex bg-gray-50/50 dark:bg-zinc-950 theme-transition">
            <!-- Sidebar for Desktop with modern gradient and premium layout -->
            <aside class="hidden lg:flex lg:flex-col lg:inset-y-0 bg-gradient-to-br from-[#00524D] via-[#00403B] to-[#002D29] animate-gradient-x text-white z-40 transition-all duration-300 border-r border-[#00524D] dark:border-zinc-800 shadow-xl"
                   :class="sidebarCollapsed ? 'w-20 fixed' : 'w-72 fixed'">
                
                <!-- Sidebar Header -->
                <div class="flex items-center justify-between px-5 py-6 border-b border-white/10 overflow-hidden">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group min-w-[200px]">
                        <div class="w-10 h-10 bg-brand-mint text-brand-dark rounded-2xl flex items-center justify-center font-extrabold text-xl shadow-lg transition-transform group-hover:scale-110 duration-300">
                            SL
                        </div>
                        <div class="transition-all duration-300" :class="sidebarCollapsed ? 'opacity-0 scale-95 pointer-events-none' : 'opacity-100 scale-100'">
                            <span class="block text-xl font-bold tracking-tight text-white group-hover:text-brand-mint transition-colors">SiLomba</span>
                            <span class="block text-[10px] uppercase font-semibold text-brand-teal tracking-widest leading-none">Admin Panel</span>
                        </div>
                    </a>
                </div>

                <!-- Sidebar Navigation with dynamic active indicators -->
                <nav class="flex-1 px-3 py-6 space-y-2 overflow-y-auto overflow-x-hidden">
                    @php
                        $route = request()->route()->getName();
                    @endphp
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-extrabold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.dashboard') ? 'bg-brand-mint text-[#00524D] shadow-lg shadow-black/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ str_starts_with($route, 'admin.dashboard') ? 'text-[#00524D]' : 'text-white/80 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                        </svg>
                        <span class="ml-3 transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">Dashboard</span>
                    </a>

                    <a href="{{ route('admin.lomba.index') }}" 
                       class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-extrabold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.lomba') ? 'bg-brand-mint text-[#00524D] shadow-lg shadow-black/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ str_starts_with($route, 'admin.lomba') ? 'text-[#00524D]' : 'text-white/80 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="ml-3 transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">Manajemen Lomba</span>
                    </a>

                    <a href="{{ route('admin.tim.index') }}" 
                       class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-extrabold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.tim') ? 'bg-brand-mint text-[#00524D] shadow-lg shadow-black/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ str_starts_with($route, 'admin.tim') ? 'text-[#00524D]' : 'text-white/80 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-3 transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">Manajemen Tim</span>
                    </a>

                    <a href="{{ route('admin.users.index') }}" 
                       class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-extrabold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.users') ? 'bg-brand-mint text-[#00524D] shadow-lg shadow-black/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ str_starts_with($route, 'admin.users') ? 'text-[#00524D]' : 'text-white/80 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ml-3 transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">Kelola Pengguna</span>
                    </a>

                    <a href="{{ route('admin.notifikasi.index') ?? '#' }}" 
                       class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-extrabold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.notifikasi') ? 'bg-brand-mint text-[#00524D] shadow-lg shadow-black/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <span class="material-symbols-outlined w-5 h-5 flex-shrink-0 transition-colors {{ str_starts_with($route, 'admin.notifikasi') ? 'text-[#00524D]' : 'text-white/80 group-hover:text-white' }}">notifications</span>
                        <span class="ml-3 transition-opacity duration-300 flex-1 flex justify-between items-center" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">
                            Notifikasi
                            <span x-data x-show="$store.notifSystem.unreadCount > 0" x-text="$store.notifSystem.unreadCount" class="w-5 h-5 rounded-full bg-rose-500 shadow-md shadow-rose-500/50 flex items-center justify-center text-[10px] font-black text-white" x-cloak></span>
                        </span>
                    </a>
                </nav>

                <!-- Sidebar Footer User Profile -->
                <div class="p-3 border-t border-white/10 bg-black/10 overflow-hidden">
                    <div class="flex items-center space-x-3 mb-4 min-w-[200px]">
                        <div class="w-10 h-10 rounded-xl bg-brand-teal/20 text-brand-teal flex items-center justify-center font-bold text-sm flex-shrink-0">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0 transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">
                            <p class="text-sm font-extrabold text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-brand-mint/70 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 bg-rose-600/10 hover:bg-rose-600 text-rose-400 hover:text-white border border-rose-500/20 hover:border-transparent rounded-xl text-xs font-bold uppercase tracking-wider transition-all duration-300">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="ml-2 transition-opacity duration-300" :class="sidebarCollapsed ? 'opacity-0 w-0 hidden' : 'opacity-100'">Log Out</span>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Navbar Mobile Overlay -->
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false" x-cloak></div>

            <!-- Navbar Mobile Dropdown Content -->
            <div x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" class="fixed top-0 left-0 right-0 bg-brand-dark z-50 flex flex-col text-white lg:hidden shadow-2xl rounded-b-3xl max-h-[90vh]" x-cloak>
                <div class="flex items-center justify-between px-6 py-6 border-b border-white/10 shrink-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-brand-mint text-brand-dark rounded-2xl flex items-center justify-center font-extrabold text-xl">
                            SL
                        </div>
                        <div>
                            <span class="block text-xl font-bold tracking-tight text-white">SiLomba</span>
                            <span class="block text-[10px] uppercase font-semibold text-brand-teal tracking-widest leading-none">Admin Panel</span>
                        </div>
                    </div>
                    <button @click="sidebarOpen = false" class="text-white hover:text-brand-mint bg-white/10 p-2 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <nav class="flex-1 px-4 py-4 space-y-1.5 overflow-y-auto">
                    @php
                        $route = request()->route()->getName();
                    @endphp
                    
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-semibold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.dashboard') ? 'bg-brand-mint text-brand-dark shadow-lg shadow-brand-dark/10' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 {{ str_starts_with($route, 'admin.dashboard') ? 'text-brand-teal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.lomba.index') }}" class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-semibold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.lomba') ? 'bg-brand-mint text-brand-dark shadow-lg shadow-brand-dark/10' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 {{ str_starts_with($route, 'admin.lomba') ? 'text-brand-teal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Manajemen Lomba
                    </a>

                    <a href="{{ route('admin.tim.index') }}" class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-semibold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.tim') ? 'bg-brand-mint text-brand-dark shadow-lg shadow-brand-dark/10' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 {{ str_starts_with($route, 'admin.tim') ? 'text-brand-teal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Manajemen Tim
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-semibold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.users') ? 'bg-brand-mint text-brand-dark shadow-lg shadow-brand-dark/10' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 {{ str_starts_with($route, 'admin.users') ? 'text-brand-teal' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Kelola Pengguna
                    </a>

                    <a href="{{ route('admin.notifikasi.index') ?? '#' }}" class="flex items-center px-4 py-3.5 rounded-2xl text-sm font-semibold tracking-wide transition-all duration-300 group {{ str_starts_with($route, 'admin.notifikasi') ? 'bg-brand-mint text-brand-dark shadow-lg shadow-brand-dark/10' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <span class="material-symbols-outlined w-5 h-5 mr-3 {{ str_starts_with($route, 'admin.notifikasi') ? 'text-brand-teal' : 'text-gray-400' }}">notifications</span>
                        <div class="flex-1 flex justify-between items-center">
                            Notifikasi
                            <span x-data x-show="$store.notifSystem.unreadCount > 0" x-text="$store.notifSystem.unreadCount" class="w-5 h-5 rounded-full bg-rose-500 shadow-md flex items-center justify-center text-[10px] font-black text-white" x-cloak></span>
                        </div>
                    </a>
                </nav>

                <div class="p-4 border-t border-white/10 bg-black/10 shrink-0 mb-4 mx-4 rounded-2xl">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-teal/20 text-brand-teal flex items-center justify-center font-bold text-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 bg-rose-600/10 hover:bg-rose-600 text-rose-400 hover:text-white border border-rose-500/20 hover:border-transparent rounded-xl text-xs font-bold uppercase tracking-wider transition-all duration-300">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Page Wrapper -->
            <div class="flex-1 flex flex-col min-w-0 transition-all duration-300"
                 :class="sidebarCollapsed ? 'lg:pl-20' : 'lg:pl-72'">
                
                <!-- Topbar -->
                <header class="bg-white/85 dark:bg-zinc-900/85 backdrop-blur-md sticky top-0 z-30 border-b border-gray-255/10 dark:border-zinc-800/50 flex items-center justify-between px-6 py-4 theme-transition shadow-sm">
                    <div class="flex items-center space-x-4">
                        <!-- Desktop Sidebar Toggle -->
                        <button @click="toggleSidebar()" class="hidden lg:block text-brand-dark dark:text-brand-teal p-2.5 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl transition duration-300">
                            <svg class="w-6 h-6 transform transition-transform duration-300" :class="sidebarCollapsed ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                            </svg>
                        </button>
                        
                        <!-- Mobile Sidebar Toggle -->
                        <button @click="sidebarOpen = true" class="text-brand-dark dark:text-brand-teal p-2.5 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl lg:hidden transition duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 dark:text-zinc-500 font-semibold mb-0.5">
                                <span>SiLomba Portal</span>
                                <span>&bull;</span>
                                <span class="text-brand-teal dark:text-brand-mint font-bold uppercase tracking-wider">Admin</span>
                            </div>
                            <h1 class="text-xl font-black text-brand-black dark:text-white theme-transition leading-none">{{ $pageTitle ?? 'SiLomba Admin' }}</h1>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 md:space-x-4">
                        <!-- Search Bar -->
                        <div class="relative hidden md:block group">
                            <input class="bg-gray-50 dark:bg-zinc-800 border-none rounded-full pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-brand-teal w-64 transition-all duration-300 text-brand-dark dark:text-white placeholder-gray-400" placeholder="Pencarian cepat..." type="text"/>
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg">search</span>
                        </div>
                        <!-- Dark Mode Toggle Button -->
                        <button @click="toggleTheme()" class="p-2.5 text-brand-dark dark:text-brand-teal bg-gray-100 dark:bg-zinc-800 hover:bg-brand-mint/50 dark:hover:bg-zinc-700 rounded-xl transition-all duration-300">
                            <!-- Sun icon -->
                            <svg x-show="darkMode" class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                            <!-- Moon icon -->
                            <svg x-show="!darkMode" class="w-5 h-5 text-zinc-750" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>

                        <!-- Notification Bell -->
                        <a href="{{ route('admin.notifikasi.index') ?? '#' }}" class="relative p-2.5 text-gray-400 hover:text-brand-teal bg-gray-100 dark:bg-zinc-800 hover:bg-brand-mint/50 dark:hover:bg-zinc-700 rounded-xl transition-all duration-300">
                            <span class="material-symbols-outlined">notifications</span>
                            <span x-data x-show="$store.notifSystem.unreadCount > 0" x-text="$store.notifSystem.unreadCount" class="absolute -top-1 -right-1 w-4 h-4 bg-rose-500 rounded-full border-2 border-white dark:border-zinc-900 flex items-center justify-center text-[8px] font-black text-white shadow-sm" x-cloak></span>
                        </a>

                        <!-- Top Notifications & Profile -->
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 bg-brand-mint dark:bg-brand-dark text-brand-dark dark:text-brand-mint rounded-xl flex items-center justify-center font-bold text-xs">
                                AD
                            </div>
                            <span class="text-sm font-semibold text-brand-black dark:text-zinc-200 hidden sm:block">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 p-6 md:p-8 max-w-7xl w-full mx-auto space-y-8 animate-fade-in">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
