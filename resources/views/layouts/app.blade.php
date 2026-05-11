<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmexa Global | Premium Indonesian Spices</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        turmexa: {
                            gold: '#C9A84C',
                            dark: '#0F0E0C',
                            ink: '#1A1916',
                            cream: '#F7F4EF',
                            stone: '#8C8880'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #F7F4EF;
            color: #1A1916;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
        }

        .nav-link {
            position: relative;
            font-size: 0.85rem; /* Ukuran teks lebih proporsional */
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #1A1916;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover { color: #C9A84C; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="antialiased">

    <nav class="fixed top-0 left-0 w-full z-[100] px-8 py-6 bg-white shadow-sm border-b border-stone-100">
        <div class="max-w-[1536px] mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black italic tracking-tighter text-turmexa-dark" data-aos="fade-right">
                TURMEXA<span class="text-turmexa-gold">.</span>
            </a>
            
            <div class="hidden md:flex gap-10 items-center">
                <a href="{{ route('home') }}" class="nav-link" data-aos="fade-down" data-aos-delay="100">Home</a>
                <a href="{{ route('about') }}" class="nav-link" data-aos="fade-down" data-aos-delay="200">About</a>
                <a href="{{ route('products') }}" class="nav-link" data-aos="fade-down" data-aos-delay="300">Catalogue</a>
                
                <a href="{{ route('contact') }}" class="bg-turmexa-dark text-white px-8 py-3 rounded-full text-[11px] font-black uppercase tracking-[0.2em] hover:bg-turmexa-gold transition-all shadow-md" data-aos="fade-left" data-aos-delay="400">
                    Contact Us
                </a>
            </div>

            <div class="md:hidden text-turmexa-dark font-black italic text-xs tracking-widest">MENU</div>
        </div>
    </nav>

    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <footer class="bg-turmexa-ink text-white py-16 mt-auto relative z-10">
        <div class="max-w-[1440px] mx-auto px-6 flex flex-col items-center text-center">
            <div class="text-4xl font-black italic mb-6">
                TURMEXA<span class="text-turmexa-gold">.</span>
            </div>
            
            <div class="flex flex-wrap justify-center gap-10 mb-12">
                <a href="{{ route('home') }}" class="text-[10px] font-black uppercase tracking-[0.3em] hover:text-turmexa-gold transition-colors">Home</a>
                <a href="{{ route('about') }}" class="text-[10px] font-black uppercase tracking-[0.3em] hover:text-turmexa-gold transition-colors">About</a>
                <a href="{{ route('products') }}" class="text-[10px] font-black uppercase tracking-[0.3em] hover:text-turmexa-gold transition-colors">Catalogue</a>
            </div>

            <div class="h-[1px] w-20 bg-white/10 mx-auto mb-8"></div>

            <p class="text-[9px] text-turmexa-stone font-bold uppercase tracking-[0.2em]">
                © 2026 Turmexa Global. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 1000,
                once: true,
                offset: 50
            });
        });
    </script>
</body>
</html>