<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmexa Global | Premium Indonesian Turmeric</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                'turmexa-gold': '#D4A373',
                'turmexa-amber': '#BC8A5F',
                'turmexa-dark': '#1C1917',
                'turmexa-light': '#FAFAF9',
              },
              fontFamily: {
                sans: ['Plus Jakarta Sans', 'sans-serif'],
              }
            }
          }
        }
    </script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-turmexa-dark antialiased">
    @if(session('success'))
        <div class="bg-green-600 text-white text-center py-3 font-bold text-sm">
            {{ session('success') }}
        </div>
    @endif

    <nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-stone-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter text-turmexa-gold uppercase">
                Turmexa <span class="text-turmexa-dark text-xs tracking-widest font-normal ml-1">Global</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-8 text-sm font-semibold">
                <a href="{{ route('home') }}" class="hover:text-turmexa-gold transition {{ Route::is('home') ? 'text-turmexa-gold' : '' }}">Home</a>
                <a href="{{ route('products') }}" class="hover:text-turmexa-gold transition {{ Route::is('products') ? 'text-turmexa-gold' : '' }}">Our Products</a>
                <a href="{{ route('about') }}" class="hover:text-turmexa-gold transition {{ Route::is('about') ? 'text-turmexa-gold' : '' }}">About Us</a>
                <a href="{{ route('contact') }}" class="bg-turmexa-dark text-white px-6 py-2.5 rounded-full hover:bg-black transition">Contact Us</a>
            </div>

            <button @click="open = !open" class="md:hidden text-turmexa-dark">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div x-show="open" x-transition class="md:hidden bg-white border-b px-6 py-4 space-y-4 shadow-lg">
            <a href="{{ route('home') }}" class="block font-bold">Home</a>
            <a href="{{ route('products') }}" class="block font-bold">Our Products</a>
            <a href="{{ route('about') }}" class="block font-bold">About Us</a>
            <a href="{{ route('contact') }}" class="block text-turmexa-gold font-bold uppercase">Contact Us</a>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="bg-turmexa-dark text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-stone-500 text-xs tracking-widest uppercase">© 2026 Turmexa Global Indonesia. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>