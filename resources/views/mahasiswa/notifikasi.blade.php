@php
    $notifications = \App\Models\Notification::where('id_penerima', Auth::id())
        ->latest()
        ->paginate(20);
@endphp
<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Notifikasi | SiLomba</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script id="tailwind-config">
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "on-tertiary-fixed": "#07006c", "background": "#f7f9fb", "on-background": "#191c1e",
                "tertiary-container": "#0c0091", "primary-fixed": "#c3ebe0", "outline": "#717976",
                "on-tertiary-container": "#7e81ff", "tertiary": "#040055", "outline-variant": "#c1c8c5",
                "inverse-on-surface": "#eff1f3", "on-tertiary-fixed-variant": "#2f2ebe",
                "surface-variant": "#e0e3e5", "surface-container": "#eceef0", "surface-dim": "#d8dadc",
                "primary-fixed-dim": "#a8cfc4", "inverse-surface": "#2d3133", "surface-tint": "#41655d",
                "secondary-fixed": "#6bfe9c", "inverse-primary": "#a8cfc4", "primary-container": "#062e27",
                "on-primary": "#ffffff", "surface-bright": "#f7f9fb", "surface": "#f7f9fb",
                "on-error-container": "#93000a", "on-secondary-container": "#00743a", "error": "#ba1a1a",
                "surface-container-low": "#f2f4f6", "on-surface-variant": "#414846",
                "tertiary-fixed": "#e1e0ff", "secondary": "#006d37", "on-error": "#ffffff",
                "surface-container-highest": "#e0e3e5", "surface-container-lowest": "#ffffff",
                "on-surface": "#191c1e", "on-primary-fixed-variant": "#294d45", "error-container": "#ffdad6",
                "secondary-container": "#6bfe9c", "on-secondary-fixed": "#00210c", "on-tertiary": "#ffffff",
                "on-primary-fixed": "#00201a", "on-primary-container": "#72978d",
                "on-secondary-fixed-variant": "#005228", "on-secondary": "#ffffff",
                "surface-container-high": "#e6e8ea", "primary": "#001813",
                "tertiary-fixed-dim": "#c0c1ff", "secondary-fixed-dim": "#4ae183"
            },
            borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
            fontFamily: {
                "headline-lg": ["Hanken Grotesk"], "headline-md": ["Hanken Grotesk"],
                "headline-sm": ["Hanken Grotesk"], "body-md": ["Inter"], "body-lg": ["Inter"],
                "label-md": ["JetBrains Mono"]
            },
            fontSize: {
                "headline-lg": ["32px", {"lineHeight":"40px","letterSpacing":"-0.02em","fontWeight":"700"}],
                "headline-md": ["24px", {"lineHeight":"32px","letterSpacing":"-0.01em","fontWeight":"600"}],
                "headline-sm": ["20px", {"lineHeight":"28px","fontWeight":"600"}],
                "body-md": ["14px", {"lineHeight":"20px","fontWeight":"400"}],
                "body-lg": ["16px", {"lineHeight":"24px","fontWeight":"400"}],
                "label-md": ["12px", {"lineHeight":"16px","letterSpacing":"0.05em","fontWeight":"500"}]
            }
        }
    }
}
</script>
<style>
    body { background-color: #f7f9fb; color: #191c1e; font-family: 'Inter', sans-serif; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .notification-card { box-shadow: 0px 4px 20px rgba(0,0,0,0.04); transition: all 0.2s ease-in-out; }
    .notification-card:hover { transform: translateY(-2px); box-shadow: 0px 8px 24px rgba(0,0,0,0.06); }
    [x-cloak] { display: none !important; }
    /* Pagination light overrides */
    nav[aria-label="Pagination"] a, nav[aria-label="Pagination"] span.relative.inline-flex {
        background-color: #f2f4f6 !important; border-color: #c1c8c5 !important; color: #414846 !important;
    }
    nav[aria-label="Pagination"] a:hover { background-color: #e6e8ea !important; color: #001813 !important; }
    nav[aria-label="Pagination"] span[aria-current="page"] span {
        background-color: #006d37 !important; border-color: #006d37 !important; color: #fff !important;
    }
    nav[aria-label="Pagination"] p { color: #414846 !important; }
</style>
</head>
<body class="bg-surface overflow-x-hidden">

<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-primary-container border-r border-outline-variant z-50 flex flex-col py-6 px-4">
    <div class="mb-10 px-2 flex items-center gap-3">
        <img src="{{ asset('images/logo.png') }}" alt="Logo SiLomba" class="w-10 h-10 object-contain drop-shadow-md">
        <div>
            <h1 class="text-headline-sm font-bold text-secondary-fixed font-headline-sm leading-tight">SiLomba</h1>
            <p class="text-label-md text-on-primary-container font-label-md opacity-70">NOTIFIKASI</p>
        </div>
    </div>

    <nav class="flex-grow space-y-2">
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl {{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}"
           href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined" style="{{ request()->routeIs('dashboard') || request()->routeIs('mahasiswa.dashboard') ? "font-variation-settings:'FILL' 1;" : '' }}">dashboard</span>
            <span class="font-body-md text-body-md">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl {{ request()->routeIs('mahasiswa.lomba.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}"
           href="{{ route('mahasiswa.lomba.index') }}">
            <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.lomba.*') ? "font-variation-settings:'FILL' 1;" : '' }}">emoji_events</span>
            <span class="font-body-md text-body-md">Direktori Lomba</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl {{ request()->routeIs('mahasiswa.tim-finder.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}"
           href="{{ route('mahasiswa.tim-finder.index') }}">
            <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.tim-finder.*') ? "font-variation-settings:'FILL' 1;" : '' }}">group_add</span>
            <span class="font-body-md text-body-md">Tim Finder</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl {{ request()->routeIs('mahasiswa.my-teams.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}"
           href="{{ route('mahasiswa.my-teams.index') }}">
            <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.my-teams.*') ? "font-variation-settings:'FILL' 1;" : '' }}">folder_shared</span>
            <span class="font-body-md text-body-md">Tim Saya</span>
        </a>
        <!-- Notifikasi with live badge -->
        <div x-data="{ jumlah: {{ \App\Models\Notification::where('id_penerima', Auth::id())->where('is_read', false)->count() }} }"
             x-init="setInterval(() => { fetch('{{ route('mahasiswa.notifikasi.unread-count') }}').then(r=>r.json()).then(d=>jumlah=d.count) }, 10000)">
            <a class="flex items-center justify-between gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('mahasiswa.notifikasi.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}"
               href="{{ route('mahasiswa.notifikasi.index') }}">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.notifikasi.*') ? "font-variation-settings:'FILL' 1;" : '' }}">notifications</span>
                    <span class="font-body-md text-body-md">Notifikasi</span>
                </div>
                <template x-if="jumlah > 0">
                    <span class="px-2 py-0.5 bg-error text-on-error font-bold text-[10px] rounded-full animate-pulse" x-text="jumlah > 9 ? '9+' : jumlah"></span>
                </template>
            </a>
        </div>
        <a class="flex items-center gap-3 px-4 py-3 transition-colors rounded-xl {{ request()->routeIs('mahasiswa.profile.*') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-primary-container hover:bg-white/10' }}"
           href="{{ route('mahasiswa.profile.edit') }}">
            <span class="material-symbols-outlined" style="{{ request()->routeIs('mahasiswa.profile.*') ? "font-variation-settings:'FILL' 1;" : '' }}">person</span>
            <span class="font-body-md text-body-md">Profil</span>
        </a>
    </nav>

            <!-- Bottom: logout + profile -->
        <div class="mt-auto flex flex-col gap-1 pt-6">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-stack-md text-error hover:bg-error/10 px-4 py-3 transition-all rounded-lg">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="font-label-md text-label-md">Logout</span>
                </button>
            </form>
            <a href="{{ route('mahasiswa.profile.edit') }}" class="mt-2 pt-4 border-t border-outline-variant/10 flex items-center gap-3 px-2 hover:bg-white/5 pb-2 rounded-lg transition-colors cursor-pointer group">
                <img alt="Profile" class="w-10 h-10 rounded-full border-2 border-secondary-fixed/30 group-hover:border-secondary-fixed transition-colors object-cover" src="{{ (Auth::user()->mahasiswa && Auth::user()->mahasiswa->foto_profil) ? asset('storage/' . Auth::user()->mahasiswa->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"/>
                <div class="overflow-hidden flex-1">
                    <p class="font-headline-sm text-[14px] text-white truncate group-hover:text-secondary-fixed transition-colors">{{ Auth::user()->name }}</p>
                    <p class="font-label-md text-[10px] text-on-surface-variant truncate">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
                </div>
            </a>
        </div>
</aside>

<!-- TopNavBar -->
<header class="fixed top-0 right-0 w-[calc(100%-16rem)] z-40 bg-surface-bright/80 backdrop-blur-md border-b border-outline-variant flex justify-between items-center h-16 px-8">
    <div class="flex items-center gap-8">
        <h2 class="text-headline-sm font-bold text-primary font-headline-sm">Notifikasi</h2>
    </div>
    <div class="flex items-center gap-4">
        <div class="text-right">
            <p class="text-label-md font-bold text-primary">{{ Auth::user()->name }}</p>
            <p class="text-[10px] text-outline uppercase tracking-wider">{{ Auth::user()->getRoleNames()->first() ?? 'Mahasiswa' }}</p>
        </div>
        <img class="w-10 h-10 rounded-full border-2 border-secondary-container object-cover"
             src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar"/>
    </div>
</header>

<!-- Main Content Canvas -->
<main class="ml-64 mt-16 p-8 min-h-screen">
    <div class="max-w-5xl mx-auto">

        <!-- Page Header -->
        <div class="flex justify-between items-end mb-8">
            <div>
                <h3 class="text-headline-lg font-headline-lg text-primary mb-1">Notifikasi Terbaru</h3>
                <p class="text-body-lg text-on-surface-variant">Tetap update dengan informasi tim, lamaran, dan pemberitahuan platform.</p>
            </div>
            @if($notifications->total() > 0)
            <button id="mark-all-btn" class="flex items-center gap-2 px-4 py-2 text-secondary hover:bg-secondary-container/20 rounded-lg transition-colors font-semibold group">
                <span class="material-symbols-outlined text-[20px] group-active:rotate-12 transition-transform">done_all</span>
                <span class="text-body-md font-body-md">Tandai semua dibaca</span>
            </button>
            @endif
        </div>

        <!-- Notifications List -->
        <div class="space-y-4" id="notifications-list">
            @forelse($notifications as $notif)
                @php
                    $styles = [
                        'application' => ['icon'=>'assignment',    'bg'=>'bg-secondary-container/30', 'color'=>'text-secondary'],
                        'deadline'    => ['icon'=>'timer',         'bg'=>'bg-error-container',        'color'=>'text-error'],
                        'system'      => ['icon'=>'info',          'bg'=>'bg-surface-container-high', 'color'=>'text-on-surface-variant'],
                        'competition' => ['icon'=>'emoji_events',  'bg'=>'bg-tertiary-fixed',         'color'=>'text-tertiary'],
                    ];
                    $s = $styles[$notif->tipe] ?? ['icon'=>'notifications', 'bg'=>'bg-secondary-container/30', 'color'=>'text-secondary'];
                @endphp
                <div class="notification-card bg-surface-container-lowest p-6 rounded-xl flex gap-5 border border-outline-variant/30 relative overflow-hidden {{ $notif->is_read ? 'opacity-75' : '' }}">
                    @if(!$notif->is_read)
                        <div class="absolute top-0 right-0 p-3">
                            <span class="bg-error text-on-error px-3 py-1 rounded-full text-[10px] font-bold shadow-sm animate-pulse">Baru</span>
                        </div>
                    @endif
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-full {{ $s['bg'] }} flex items-center justify-center {{ $s['color'] }}">
                            <span class="material-symbols-outlined">{{ $s['icon'] }}</span>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-3">
                                <span class="bg-surface-container-high px-2 py-0.5 rounded text-[10px] font-label-md text-on-surface-variant uppercase tracking-tighter">{{ $notif->tipe ?? 'Sistem' }}</span>
                                <h4 class="text-body-lg font-bold text-primary">{{ $notif->judul }}</h4>
                            </div>
                            <span class="text-label-md text-outline {{ !$notif->is_read ? 'mr-16' : '' }} whitespace-nowrap">{{ $notif->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-body-md text-on-surface-variant">{{ $notif->isi }}</p>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-surface-container-high rounded-full flex items-center justify-center text-on-surface-variant mb-6">
                        <span class="material-symbols-outlined text-4xl">notifications_off</span>
                    </div>
                    <h4 class="text-primary font-bold text-lg mb-2">Belum ada notifikasi</h4>
                    <p class="text-on-surface-variant">Saat ini belum ada pembaruan untuk Anda.</p>
                </div>
            @endforelse
        </div>

        @if($notifications->hasPages())
        <div class="mt-10 flex flex-col items-center">
            <div class="w-16 h-[1px] bg-outline-variant mb-6"></div>
            {{ $notifications->links() }}
        </div>
        @endif

    </div>
</main>

<script>
    // Mark all as read (UI feedback)
    const markAllBtn = document.getElementById('mark-all-btn');
    if (markAllBtn) {
        markAllBtn.addEventListener('click', () => {
            document.querySelectorAll('.notification-card').forEach(card => {
                card.classList.add('opacity-60');
                card.style.transform = 'scale(0.99)';
                const badge = card.querySelector('.animate-pulse');
                if (badge) badge.remove();
                setTimeout(() => { card.style.transform = 'scale(1)'; }, 200);
            });
            markAllBtn.innerHTML = '<span class="material-symbols-outlined text-[20px]">check_circle</span> <span class="font-bold">Semua sudah dibaca!</span>';
            markAllBtn.classList.remove('text-secondary');
            markAllBtn.classList.add('text-outline');
            markAllBtn.disabled = true;
        });
    }
</script>
</body>
</html>
