@extends('layouts.app')

@section('content')
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <div x-data="{ active: 0, images: {{ json_encode($turmericImages) }} }" class="space-y-4">
                <div class="relative aspect-square bg-stone-100 rounded-[2.5rem] overflow-hidden border border-stone-100 shadow-inner">
                    <template x-for="(img, index) in images">
                        <div x-show="active === index" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-95" class="absolute inset-0 flex items-center justify-center text-stone-400 italic">
                            <div class="text-center">
                                <p class="mb-2 uppercase tracking-tighter font-bold text-turmexa-gold" x-text="img.title"></p>
                                <p class="text-xs">[ Space for Product / Certificate Photo ]</p>
                            </div>
                        </div>
                    </template>

                    <div class="absolute inset-y-0 w-full flex justify-between items-center px-4 pointer-events-none">
                        <button @click="active = active === 0 ? images.length - 1 : active - 1" class="pointer-events-auto w-10 h-10 bg-white/80 backdrop-blur rounded-full flex items-center justify-center shadow-lg hover:bg-turmexa-gold hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        <button @click="active = active === images.length - 1 ? 0 : active + 1" class="pointer-events-auto w-10 h-10 bg-white/80 backdrop-blur rounded-full flex items-center justify-center shadow-lg hover:bg-turmexa-gold hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                    </div>
                </div>

                <div class="flex gap-4 justify-center">
                    <template x-for="(img, index) in images">
                        <button @click="active = index" :class="active === index ? 'border-turmexa-gold ring-2 ring-turmexa-gold/20' : 'border-transparent'" class="w-20 h-20 bg-stone-100 rounded-xl border-2 transition overflow-hidden flex items-center justify-center text-[8px] text-stone-400">
                            Photo
                        </button>
                    </template>
                </div>
            </div>

            <div class="flex flex-col justify-center space-y-8">
                <div>
                    <span class="text-turmexa-gold font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Primary Commodity</span>
                    <h1 class="text-4xl md:text-5xl font-bold text-turmexa-dark leading-tight italic">Premium Turmeric Powder</h1>
                </div>

                <p class="text-stone-600 leading-relaxed italic border-l-4 border-turmexa-gold pl-6">
                    Our turmeric powder is meticulously processed from high-quality Javanese turmeric fingers, ensuring a vibrant natural orange hue and a high curcumin level (>4%) that satisfies the demanding standards of the global market.
                </p>

                <div class="grid grid-cols-2 gap-y-6 gap-x-12 pt-6 border-t border-stone-100">
                    <div>
                        <p class="text-[10px] uppercase text-stone-400 font-bold mb-1">Curcumin Content</p>
                        <p class="text-xl font-bold text-turmexa-dark">> 4.0%</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase text-stone-400 font-bold mb-1">Moisture</p>
                        <p class="text-xl font-bold text-turmexa-dark">< 10%</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase text-stone-400 font-bold mb-1">Mesh Size</p>
                        <p class="text-xl font-bold text-turmexa-dark italic">40 - 80 Mesh</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase text-stone-400 font-bold mb-1">SGS Indonesia</p>
                        <p class="text-xl font-bold text-green-600 underline decoration-2">Verified COA</p>
                    </div>
                </div>

                <div class="pt-8">
                    <a href="{{ route('contact') }}" class="inline-flex bg-turmexa-dark text-white px-10 py-4 rounded-2xl font-bold hover:bg-black transition-all shadow-xl shadow-stone-200">
                        Inquire for Shipment
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-6 text-center mb-16">
        <h2 class="text-2xl font-bold uppercase tracking-widest text-stone-400">Secondary Spices Collection</h2>
        <div class="w-20 h-1 bg-turmexa-gold mx-auto mt-4 rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($otherSpices as $spice)
        <div class="bg-white p-8 rounded-3xl border border-stone-100 hover:border-turmexa-gold/30 hover:shadow-xl transition-all group">
            <div class="w-12 h-12 bg-turmexa-light rounded-2xl flex items-center justify-center text-turmexa-gold font-bold mb-6 group-hover:bg-turmexa-gold group-hover:text-white transition">
                +
            </div>
            <h3 class="text-xl font-bold mb-3">{{ $spice['name'] }}</h3>
            <p class="text-sm text-stone-500 mb-6 italic">{{ $spice['desc'] }}</p>
            <p class="text-[10px] font-bold text-stone-300 uppercase tracking-widest italic border-t pt-4">Available Upon Request</p>
        </div>
        @endforeach
    </div>
</section>
@endsection