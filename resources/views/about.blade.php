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

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <span class="text-turmexa-gold font-black uppercase tracking-[0.4em] text-[10px] mb-4 block">Information</span>
        <h2 class="text-4xl font-black italic uppercase tracking-tighter mb-8">Want to know more about us?</h2>
        
        <a href="{{ asset('assets/pdf/turmexa-company-profile.pdf') }}" download 
           class="inline-flex items-center bg-turmexa-dark text-white px-10 py-4 rounded-full text-xs font-black uppercase tracking-[0.2em] hover:bg-turmexa-gold transition-all shadow-xl group">
            <span class="mr-3">Download Company Profile</span>
            <svg class="w-4 h-4 transition-transform group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
        </a>
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