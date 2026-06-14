<x-admin-layout>
    <x-slot name="pageTitle">Notifikasi Sistem</x-slot>

    <div x-data class="space-y-6 animate-fade-in relative z-0 max-w-5xl mx-auto">
        
        <!-- Ambient Background -->
        <div class="fixed top-20 right-10 w-[500px] h-[500px] bg-brand-mint/20 dark:bg-brand-teal/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

        <!-- Page Header Section -->
        <div class="flex flex-col md:flex-row justify-between md:items-end mb-6 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-brand-dark dark:text-zinc-100">Daftar Notifikasi</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400 mt-1">Pantau aktivitas terbaru dan peringatan sistem secara real-time.</p>
            </div>
            <div class="flex gap-2">
                <button @click="$store.notifSystem.markAllAsRead()" class="bg-brand-teal text-white hover:bg-brand-mint hover:text-brand-dark font-bold text-xs px-4 py-2.5 rounded-xl flex items-center gap-2 transition-all shadow-md hover:shadow-brand-teal/30">
                    <span class="material-symbols-outlined text-[18px]">done_all</span>
                    Tandai Semua Dibaca
                </button>
            </div>
        </div>

        <!-- Filter Chips -->
        <div class="flex flex-wrap gap-2 mb-6">
            <template x-for="filter in $store.notifSystem.filters" :key="filter">
                <button @click="$store.notifSystem.activeFilter = filter"
                        class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300"
                        :class="$store.notifSystem.activeFilter === filter 
                            ? 'bg-brand-dark text-white shadow-lg shadow-brand-dark/20' 
                            : 'bg-white dark:bg-zinc-800 text-gray-500 dark:text-zinc-400 hover:bg-gray-100 dark:hover:bg-zinc-700 border border-gray-200 dark:border-zinc-700'">
                    <span x-text="filter"></span>
                </button>
            </template>
        </div>

        <!-- Notifications Container -->
        <div class="bg-white/80 dark:bg-zinc-900/80 backdrop-blur-xl rounded-[2rem] overflow-hidden shadow-xl border border-gray-150/50 dark:border-zinc-800">
            
            <template x-for="(notifs, groupName) in $store.notifSystem.groupedNotifications" :key="groupName">
                <div>
                    <!-- Group Header -->
                    <div class="p-5 border-b border-gray-100 dark:border-zinc-800 bg-gray-50/50 dark:bg-zinc-900/50">
                        <h3 class="text-[10px] font-black text-brand-teal uppercase tracking-widest" x-text="groupName"></h3>
                    </div>
                    
                    <div class="divide-y divide-gray-100 dark:divide-zinc-800">
                        <template x-for="notif in notifs" :key="notif.id">
                            <!-- Notification Item -->
                            <div @click="$store.notifSystem.markAsRead(notif.id)"
                                 class="p-6 flex gap-4 items-start transition-all duration-300 cursor-pointer group hover:bg-brand-mint/10 dark:hover:bg-zinc-800/50 relative overflow-hidden"
                                 :class="notif.isRead ? 'opacity-70' : 'bg-white dark:bg-zinc-800'">
                                 
                                <!-- Hover Line -->
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-brand-teal transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>



                                <!-- Icon -->
                                <div class="w-12 h-12 rounded-full flex-shrink-0 flex items-center justify-center shadow-inner group-hover:scale-110 transition-transform"
                                     :class="{
                                        'bg-brand-mint text-brand-dark dark:bg-brand-dark/40 dark:text-brand-mint': notif.type === 'info',
                                        'bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400': notif.type === 'warning',
                                        'bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400': notif.type === 'success',
                                        'bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400': notif.type === 'error'
                                     }">
                                    <span class="material-symbols-outlined text-[24px]" x-text="notif.icon"></span>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex justify-between items-start gap-4">
                                        <h4 class="text-sm font-extrabold text-brand-dark dark:text-zinc-100 group-hover:text-brand-teal transition-colors pt-1" x-text="notif.title"></h4>
                                        <div class="flex items-center gap-3 flex-shrink-0">
                                            <span class="text-[10px] font-bold text-gray-400 whitespace-nowrap" x-text="notif.time"></span>
                                            <button @click.stop="$store.notifSystem.deleteNotif(notif.id)" class="w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/30 transition-all duration-300">
                                                <span class="material-symbols-outlined text-[18px]">delete</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-xs text-brand-black/70 dark:text-zinc-400 mt-1.5 leading-relaxed" x-text="notif.message"></p>
                                    
                                    <!-- Optional Actions based on ID for demo -->
                                    <div class="mt-3 flex gap-2" x-show="notif.id === 1 && !notif.isRead">
                                        <button class="bg-brand-dark text-white text-[10px] font-bold px-3 py-1.5 rounded-lg hover:bg-brand-teal transition-colors">Review Lomba</button>
                                        <button class="bg-transparent border border-gray-200 dark:border-zinc-700 text-gray-500 text-[10px] font-bold px-3 py-1.5 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-800 transition-colors">Abaikan</button>
                                    </div>
                                    
                                    <div class="mt-3 flex items-center gap-3" x-show="notif.id === 2">
                                        <div class="flex -space-x-2">
                                            <div class="w-6 h-6 rounded-full bg-brand-teal border-2 border-white dark:border-zinc-800 flex items-center justify-center text-[8px] text-white font-bold">U</div>
                                            <div class="w-6 h-6 rounded-full bg-brand-mint text-brand-dark text-[8px] flex items-center justify-center font-bold border-2 border-white dark:border-zinc-800">+3</div>
                                        </div>
                                        <span class="text-[10px] text-gray-400 italic">4 Anggota Tim</span>
                                    </div>
                                </div>

                                <!-- Unread Indicator -->
                                <div x-show="!notif.isRead" class="w-2.5 h-2.5 rounded-full mt-2"
                                     :class="{
                                        'bg-brand-teal': notif.type === 'info',
                                        'bg-amber-500': notif.type === 'warning',
                                        'bg-emerald-500': notif.type === 'success',
                                        'bg-rose-500': notif.type === 'error'
                                     }"></div>
                            </div>
                        </template>
                    </div>
                </div>
            </template>

            <!-- Empty State -->
            <div x-show="$store.notifSystem.filteredNotifications.length === 0" x-cloak class="flex flex-col items-center justify-center py-20 text-center">
                <div class="w-24 h-24 mb-4 relative">
                    <div class="absolute inset-0 bg-brand-mint/30 dark:bg-brand-dark/30 rounded-full blur-xl animate-pulse"></div>
                    <svg class="w-full h-full text-brand-teal/40 relative z-10" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-brand-dark dark:text-zinc-200">Tidak ada notifikasi</h3>
                <p class="text-xs text-gray-500 mt-1 max-w-sm">Tidak ada notifikasi untuk kategori yang dipilih saat ini.</p>
            </div>


        </div>

    </div>
</x-admin-layout>
