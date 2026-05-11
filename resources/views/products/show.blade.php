@extends('layouts.app')
@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="bg-white lg:h-screen lg:overflow-hidden flex flex-col">
    <div class="flex-1 flex flex-col lg:flex-row max-w-[1440px] mx-auto w-full px-6 pt-32 lg:pt-20 pb-10 gap-10 lg:gap-20 items-center">
        
        <!-- GALLERY SECTION (Prev/Next) -->
        <div class="w-full lg:w-1/2 h-full flex flex-col justify-center" x-data="{ active: 0 }">
            <div class="relative aspect-video lg:aspect-square overflow-hidden rounded-[4rem] shadow-2xl bg-stone-100 group" data-aos="fade-right" data-aos-duration="600">
                @foreach($product['images'] as $index => $img)
                <img x-show="active === {{ $index }}" src="/assets/products/{{ $img }}" 
                     class="absolute inset-0 w-full h-full object-cover" x-transition.opacity.duration.300ms>
                @endforeach

                <div class="absolute inset-0 flex justify-between items-center px-6 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button @click="active = active === 0 ? 1 : 0" class="w-14 h-14 bg-white/90 rounded-full shadow-lg flex items-center justify-center hover:bg-turmexa-gold hover:text-white transition">←</button>
                    <button @click="active = active === 0 ? 1 : 0" class="w-14 h-14 bg-white/90 rounded-full shadow-lg flex items-center justify-center hover:bg-turmexa-gold hover:text-white transition">→</button>
                </div>
            </div>
        </div>

        <!-- INFO SECTION -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center space-y-10 lg:pr-10">
            <div data-aos="fade-left" data-aos-duration="600">
                <span class="text-xs font-black uppercase tracking-[0.5em] text-turmexa-gold mb-6 block">{{ $product['code'] }}</span>
                <h1 class="text-7xl md:text-8xl font-black italic tracking-tighter text-turmexa-dark leading-[0.85] uppercase mb-8">{{ $product['name'] }}</h1>
                <p class="text-lg italic text-stone-400 leading-relaxed line-clamp-3">{{ $product['desc'] }}</p>
            </div>

            <div class="grid grid-cols-2 gap-x-12 gap-y-6 pt-10 border-t border-stone-100" data-aos="fade-up" data-aos-duration="600">
                @foreach($product['specs'] as $spec)
                <div class="flex flex-col border-b border-stone-50 pb-5">
                    <span class="text-[10px] font-bold uppercase text-stone-300 mb-1">{{ explode(':', $spec)[0] }}</span>
                    <span class="text-2xl font-black italic text-turmexa-dark uppercase tracking-tighter">{{ explode(':', $spec)[1] ?? '' }}</span>
                </div>
                @endforeach
            </div>

            <div class="pt-6" data-aos="zoom-in" data-aos-duration="500">
                <a href="https://wa.me/6281905064244?text=Inquiry for {{ $product['name'] }}" 
                   class="inline-block w-full bg-turmexa-dark text-white py-8 rounded-[2rem] font-black uppercase tracking-[0.3em] text-sm hover:bg-turmexa-gold transition-all text-center shadow-2xl">
                    Request Inquiry
                </a>
            </div>
        </div>
    </div>

    <!-- PREV / NEXT NAV -->
    <div class="border-t border-stone-100 bg-white">
        <div class="grid grid-cols-2 h-32">
            <a href="{{ route('products.show', $prev['slug']) }}" class="group border-r border-stone-100 px-10 flex items-center gap-6 hover:bg-stone-50 transition-all">
                <span class="text-3xl font-black italic text-stone-200 group-hover:text-turmexa-dark transition-colors uppercase">← {{ $prev['code'] }}</span>
            </a>
            <a href="{{ route('products.show', $next['slug']) }}" class="group px-10 flex items-center justify-end gap-6 hover:bg-stone-50 transition-all text-right">
                <span class="text-3xl font-black italic text-stone-200 group-hover:text-turmexa-dark transition-colors uppercase">{{ $next['code'] }} →</span>
            </a>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ duration: 700, once: false });
    });
</script>
@endsection