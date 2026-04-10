@extends('layouts.app')

@section('content')
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <span class="text-turmexa-gold font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Our Story</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-8 italic">Cultivating Trust, Exporting Quality.</h1>
        <div class="prose prose-lg text-stone-600 leading-relaxed mx-auto space-y-6">
            <p>Turmexa Global is a dedicated Indonesian spice supplier specializing in premium turmeric and tropical spices. Based in the heart of Indonesia's rich agricultural regions, we bridge the gap between local producers and international industries.</p>
            <p>Our commitment is simple: to ensure every gram of spice we ship meets the highest standards of purity, moisture levels, and curcumin content. We believe in transparency, consistency, and long-term partnerships.</p>
        </div>
    </div>
</section>

<section class="py-16 bg-stone-50" x-data="{ active: 0, total: 3 }">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-center text-2xl font-bold mb-10 uppercase tracking-widest text-stone-400">Documentation</h2>
        
        <div class="relative group">
            <div class="aspect-video bg-stone-200 rounded-[2.5rem] overflow-hidden shadow-2xl relative border-8 border-white">
                <template x-for="i in total">
                    <div x-show="active === i-1" x-transition.opacity.duration.500ms class="absolute inset-0 flex items-center justify-center text-stone-400 italic">
                        <span>[ Documentation Photo <span x-text="i"></span> ]</span>
                    </div>
                </template>

                <div class="absolute inset-0 flex justify-between items-center px-6 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button @click="active = active === 0 ? total - 1 : active - 1" class="w-12 h-12 bg-white/90 rounded-full shadow-lg flex items-center justify-center hover:bg-turmexa-gold hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <button @click="active = active === total - 1 ? 0 : active + 1" class="w-12 h-12 bg-white/90 rounded-full shadow-lg flex items-center justify-center hover:bg-turmexa-gold hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-center gap-2 mt-6">
                <template x-for="i in total">
                    <button @click="active = i-1" :class="active === i-1 ? 'bg-turmexa-gold w-8' : 'bg-stone-300 w-2'" class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Meet Our Leadership</h2>
            <div class="w-16 h-1 bg-turmexa-gold mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach($team as $member)
            <div class="text-center group">
                <div class="aspect-[3/4] bg-turmexa-light rounded-[2rem] mb-6 overflow-hidden border-2 border-transparent group-hover:border-turmexa-gold transition-all relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-300 font-bold uppercase tracking-tighter text-xs">
                        Photo: {{ $member['name'] }}
                    </div>
                </div>
                
                <h3 class="text-2xl font-bold text-turmexa-dark">{{ $member['name'] }}</h3>
                <p class="text-turmexa-gold font-bold text-xs uppercase tracking-widest mb-4">{{ $member['role'] }}</p>
                <p class="text-stone-500 text-sm leading-relaxed italic px-4">
                    {{ $member['desc'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection