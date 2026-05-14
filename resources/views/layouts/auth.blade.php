<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SiLomba' }} — Sistem Informasi Lomba</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F7EF7',
                        primaryHover: '#3B6EF0',
                        primaryLight: '#DBEAFE',
                        primaryDark: '#1E3A6E',
                        bgPage: '#EFF6FF',
                        surface: '#F8FAFC',
                        textMain: '#1E293B',
                        textMuted: '#64748B',
                        aksen: '#10B981',
                        aksenLight: '#D1FAE5',
                        aksenDark: '#065F46',
                        borderMain: '#E2E8F0',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#EFF6FF] min-h-screen antialiased">
    @yield('content')
</body>
</html>
