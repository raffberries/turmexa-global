@extends('layouts.app')
@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="bg-white min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col lg:flex-row max-w-[1440px] mx-auto w-full px-6 pt-24 lg:pt-0 pb-10 gap-10 lg:gap-16 items-center justify-center">
        
        <div class="w-full lg:w-7/12" x-data="{ active: 0 }">
            <div class="relative aspect-video overflow-hidden rounded-[3rem] shadow-2xl bg-stone-100 group border border-stone-200" data-aos="fade-right">
                @foreach($product['images'] as $index => $img)
                <img x-show="active === {{ $index }}" 
                     src="/assets/products/{{ $img }}" 
                     class="absolute inset-0 w-full h-full object-cover" 
                     x-transition.opacity.duration.400ms>
                @endforeach

                <div class="absolute inset-0 flex justify-between items-center px-8 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button @click="active = active === 0 ? {{ count($product['images']) - 1 }} : active - 1" class="w-12 h-12 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-xl hover:bg-turmexa-gold transition-colors text-xl">←</button>
                    <button @click="active = active === {{ count($product['images']) - 1 }} ? 0 : active + 1" class="w-12 h-12 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-xl hover:bg-turmexa-gold transition-colors text-xl">→</button>
                </div>
            </div>

            <div class="flex gap-3 mt-6 justify-center">
                @foreach($product['images'] as $index => $img)
                <button @click="active = {{ $index }}" 
                        :class="active === {{ $index }} ? 'w-10 bg-turmexa-gold' : 'w-2 bg-stone-200'" 
                        class="h-1.5 rounded-full transition-all duration-500"></button>
                @endforeach
            </div>
        </div>

        <div class="w-full lg:w-5/12 flex flex-col">
            <div data-aos="fade-up">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-turmexa-gold font-black uppercase tracking-[0.4em] text-[10px]">{{ $product['code'] }}</span>
                </div>
                <h1 class="text-5xl lg:text-6xl font-black italic text-turmexa-dark uppercase leading-[0.9] tracking-tighter mb-6">{{ $product['name'] }}</h1>
                <p class="text-stone-500 italic leading-relaxed mb-8 text-sm lg:text-base border-l-4 border-stone-100 pl-5">{{ $product['desc'] }}</p>
            </div>

            <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-[10px] font-black uppercase tracking-widest text-stone-400">Technical Specifications</h3>
                <div class="grid grid-cols-1 border-t border-stone-100">
                    @foreach($product['specs'] as $spec)
                    <div class="flex justify-between items-center py-3 border-b border-stone-100 group px-1">
                        <span class="text-[9px] font-black uppercase tracking-widest text-stone-400">Parameter</span>
                        <span class="text-sm font-bold text-turmexa-dark uppercase tracking-tight">{{ $spec }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-10" data-aos="fade-up" data-aos-delay="200">
                <a href="https://wa.me/62 8138763966?text=Inquiry for {{ $product['name'] }}" 
                   class="flex items-center justify-center gap-4 w-full bg-turmexa-dark text-white py-6 rounded-[1.5rem] font-black uppercase tracking-[0.2em] text-[11px] hover:bg-turmexa-gold transition-all shadow-lg group">
                    <span>Send Inquiry</span>
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>
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