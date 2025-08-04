<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Po XYZ Pariwisata | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('/penyewatemplate') }}/assets/img/baru2/icon-xyz.svg" rel="icon">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6', 
                        accent: '#f59e0b',
                        dark: '#0f0f23',
                        light: '#fafbfc'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif']
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s infinite',
                        'bounce-slow': 'bounce 3s infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @stack('before-style')
    @stack('after-style')
    @yield('styles')

    <style>
        [x-cloak] { display: none !important; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .mesh-gradient {
            background: linear-gradient(-45deg, #6366f1, #8b5cf6, #ec4899, #f59e0b);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .glass {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
        }
        
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: blob 20s infinite;
        }
        
        @keyframes blob {
            0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
            100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        }
    </style>
</head>

<body class="font-sans bg-gray-50 text-gray-800 overflow-x-hidden">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Background Decorations -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-primary opacity-10 rounded-full blob"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-secondary opacity-10 rounded-full blob" style="animation-delay: -5s;"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-accent opacity-10 rounded-full blob" style="animation-delay: -10s;"></div>
    </div>

    <!-- Header -->
    @include('penyewa.layouts.navbar')

    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('penyewa.layouts.footer')
    
    <!-- Floating Action Button -->
    <div class="fixed bottom-8 right-8 z-50" x-data="{ showFab: false }" x-init="window.addEventListener('scroll', () => { showFab = window.scrollY > 300 })">
        <button x-show="showFab" x-transition @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-14 h-14 bg-gradient-to-r from-primary to-secondary text-white rounded-full shadow-2xl hover:shadow-primary/25 transition-all duration-300 hover:scale-110 flex items-center justify-center">
            <i class="fas fa-rocket text-lg"></i>
        </button>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out-cubic',
                once: true,
                offset: 50
            });
        });
    </script>
    
    @stack('before-scripts')
    @stack('after-scripts')
</body>
</html>