@extends('layouts.app')
@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="min-h-screen overflow-x-hidden" x-data="{ search: '' }">
    
    <!-- SECTION 01: FLAGSHIP SELECTION (Dark Background Highlight) -->
    <section class="bg-turmexa-dark pt-40 pb-32">
        <div class="max-w-[1400px] mx-auto px-6">
            <div class="flex flex-col lg:flex-row justify-between items-end mb-32 gap-12" data-aos="fade-up" data-aos-duration="600">
                <div class="max-w-3xl">
                    <span class="text-xs font-black uppercase tracking-[0.4em] text-turmexa-gold mb-6 block">Section 01</span>
                    <h1 class="text-7xl md:text-9xl font-black italic tracking-tighter leading-[0.75] text-white uppercase">
                        Flagship<br><span class="text-turmexa-gold ml-20">Selection.</span>
                    </h1>
                </div>
            </div>

            <div class="space-y-40" x-show="search === ''">
                @foreach(collect($products)->where('hero', true) as $p)
                <div class="relative group" data-aos="fade-up" data-aos-duration="700" data-aos-mirror="true">
                    <a href="{{ route('products.show', $p['slug']) }}" class="block text-white">
                        <div class="aspect-[21/9] overflow-hidden rounded-[4rem] bg-stone-800 mb-12 shadow-2xl">
                            <img src="/assets/products/{{ $p['images'][0] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 opacity-80 group-hover:opacity-100">
                        </div>
                        <div class="flex flex-col lg:flex-row justify-between items-start gap-12 px-10 text-white">
                            <h2 class="text-5xl md:text-7xl font-black italic leading-none uppercase">{{ $p['name'] }}</h2>
                            <div class="lg:w-1/3 pt-4 border-t border-white/10 lg:border-t-0 lg:border-l lg:pl-12 text-stone-400">
                                <p class="text-lg italic mb-8 leading-relaxed">{{ $p['desc'] }}</p>
                                <div class="bg-turmexa-gold text-turmexa-dark text-center py-5 rounded-[2rem] font-black uppercase text-xs tracking-widest transition-all group-hover:bg-white">
                                    View Details →
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 02: CATEGORIZED COLLECTION (Light Background) -->
    <section class="bg-white py-40">
        <div class="max-w-[1400px] mx-auto px-6">
            
            <div class="flex flex-col lg:flex-row justify-between items-baseline mb-32 gap-12" data-aos="fade-up" data-aos-duration="600">
                <h3 class="text-xs font-black uppercase tracking-[0.5em] text-stone-300">Section 02 — Product Categories</h3>
                <div class="w-full lg:w-96">
                    <input x-model="search" type="text" placeholder="Quick search..." 
                           class="w-full bg-transparent border-b-2 border-stone-100 py-6 focus:border-turmexa-gold outline-none font-bold text-2xl transition-all text-turmexa-dark placeholder:text-stone-200">
                </div>
            </div>

            @php
                $categories = [
                    'The Chili Series' => ['CHL-A30', 'CHL-XHT', 'CHL-FLK'],
                    'The Pepper Collection' => ['BPP', 'WPP'],
                    'The Allium Base' => ['GRL', 'ONN'],
                    'Herbal & Roots' => ['GNG', 'CUR', 'LMN', 'GLG', 'MRG'],
                    'Aromatic Spices' => ['CLV', 'NTM', 'CRD', 'CNN', 'STA'],
                    'Seeds & Others' => ['CRN', 'CND', 'CMN', 'PPR', 'TMR']
                ];
            @endphp

            @foreach($categories as $catName => $codes)
                @php $categoryProducts = collect($products)->whereIn('code', $codes); @endphp

                @if($categoryProducts->count() > 0)
                <div class="mb-48" x-show="search === ''" data-aos="fade-up" data-aos-duration="700">
                    <div class="flex items-center gap-6 mb-16 px-4">
                        <h4 class="text-3xl font-black italic text-turmexa-dark uppercase tracking-tighter">{{ $catName }}</h4>
                        <div class="flex-1 h-[1px] bg-stone-100"></div>
                        <span class="text-[10px] font-bold text-stone-300 uppercase tracking-widest">{{ $categoryProducts->count() }} Items</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-32">
                        @foreach($categoryProducts as $p)
                        <div class="group" data-aos="fade-up" data-aos-duration="600" data-aos-mirror="true">
                            <a href="{{ route('products.show', $p['slug']) }}" class="block">
                                <div class="aspect-[16/10] overflow-hidden rounded-[3.5rem] bg-stone-50 mb-8 shadow-sm transition-all group-hover:shadow-xl">
                                    <img src="/assets/products/{{ $p['images'][0] }}" class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 group-hover:scale-110 transition-all duration-500">
                                </div>
                                <div class="px-6">
                                    <div class="mb-6">
                                        <span class="text-[9px] font-black text-turmexa-gold tracking-[0.2em] uppercase">{{ $p['code'] }}</span>
                                        <h5 class="text-3xl font-black italic text-turmexa-dark mt-1 leading-none uppercase">{{ $p['name'] }}</h5>
                                    </div>
                                    <div class="w-full bg-stone-100 text-turmexa-dark group-hover:bg-turmexa-dark group-hover:text-white text-center py-5 rounded-[2rem] font-black uppercase text-[10px] tracking-widest transition-all">
                                        View Details
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </section>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ 
            duration: 700, 
            mirror: true, 
            once: false,
            easing: 'ease-out-quad' 
        });
    });
</script>
@endsection