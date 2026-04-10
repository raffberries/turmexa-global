@extends('layouts.app')
@section('content')

<section class="bg-turmexa-light py-16 md:py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-20 items-center">
            
            <div class="text-center md:text-left order-2 md:order-1">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    Premium <span class="text-turmexa-gold italic uppercase tracking-tight">Turmeric Powder</span> Supplier from Indonesia
                </h1>
                <p class="text-lg text-stone-600 mb-10 max-w-lg mx-auto md:mx-0">
                    Export grade quality with certified testing and consistent supply.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ asset('assets/Turmexa_Global_Catalog.pdf') }}" download class="bg-turmexa-gold text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-turmexa-gold/30 hover:bg-turmexa-amber transition-all flex items-center justify-center gap-2 text-sm md:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Request Catalog
                    </a>
                    
                    <a href="#contact" class="bg-white border-2 border-turmexa-gold text-turmexa-gold px-8 py-4 rounded-xl font-bold hover:bg-turmexa-light transition-all flex items-center justify-center text-sm md:text-base">
                        Contact Us
                    </a>
                </div>
            </div>
            
            <div class="order-1 md:order-2">
                <div class="aspect-square bg-stone-200 rounded-[2rem] flex items-center justify-center text-stone-400 border-4 border-white shadow-xl max-w-[400px] md:max-w-full mx-auto">
                    <span class="text-center px-6 text-sm md:text-base italic">[Foto Produk Kunyit - Jangan Pelit Space]</span>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-24 bg-white border-b border-stone-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2 space-y-6">
                <h2 class="text-3xl font-bold uppercase tracking-tight">Product Advantages</h2>
                <ul class="space-y-4 text-stone-600">
                    <li class="flex items-center gap-3"><span class="w-2 h-2 bg-turmexa-gold rounded-full"></span> High Curcumin Content (>4%)</li>
                    <li class="flex items-center gap-3"><span class="w-2 h-2 bg-turmexa-gold rounded-full"></span> Moisture level maintained below 10%</li>
                    <li class="flex items-center gap-3"><span class="w-2 h-2 bg-turmexa-gold rounded-full"></span> Consistent Mesh (40, 60, 80) according to your needs</li>
                </ul>
                <p class="inline-block px-4 py-2 bg-green-50 text-green-700 font-bold text-xs rounded-lg uppercase tracking-widest border border-green-100 italic">
                    Mention: Already Tested by SGS Indonesia (Available Soon)
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-center text-3xl font-bold mb-16 uppercase">Why Choose Us</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center p-6 bg-turmexa-light rounded-2xl">
                <h3 class="font-bold mb-2 uppercase text-sm tracking-wide">Strict QC</h3>
                <p class="text-xs text-stone-500">Every batch undergoes rigorous quality control.</p>
            </div>
            <div class="text-center p-6 bg-turmexa-light rounded-2xl">
                <h3 class="font-bold mb-2 uppercase text-sm tracking-wide">Reliable Supplier</h3>
                <p class="text-xs text-stone-500">Directly collaborating with selected producers.</p>
            </div>
            <div class="text-center p-6 bg-turmexa-light rounded-2xl">
                <h3 class="font-bold mb-2 uppercase text-sm tracking-wide">Export Support</h3>
                <p class="text-xs text-stone-500">Handling logistics and paperwork smoothly.</p>
            </div>
            <div class="text-center p-6 bg-turmexa-light rounded-2xl">
                <h3 class="font-bold mb-2 uppercase text-sm tracking-wide">Custom Pack</h3>
                <p class="text-xs text-stone-500">Flexible packaging based on market needs.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-stone-50/50" x-data="{ selectedProduct: null }">
    <div class="max-w-7xl mx-auto px-6">
        <h3 class="text-center text-stone-400 font-bold uppercase text-xs tracking-widest mb-10">Other Premium Spices</h3>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($secondaryProducts as $product)
            <div @click="selectedProduct = {{ json_encode($product) }}" 
                 class="bg-white border border-stone-100 p-6 rounded-2xl text-center group hover:border-turmexa-gold hover:shadow-xl hover:shadow-turmexa-gold/10 transition-all cursor-pointer">
                <div class="aspect-square bg-stone-100 rounded-lg mb-4 flex items-center justify-center text-[10px] text-stone-300 font-medium overflow-hidden group-hover:bg-turmexa-light transition-colors">
                    <span class="group-hover:scale-110 transition-transform tracking-widest uppercase">Photo Coming Soon</span>
                </div>
                <p class="font-bold text-sm md:text-base group-hover:text-turmexa-gold transition-colors">{{ $product['name'] }}</p>
                <p class="text-[10px] text-stone-400 italic mt-1">{{ $product['latin'] }}</p>
                <div class="mt-4 text-turmexa-gold text-[10px] font-bold uppercase tracking-wider opacity-0 group-hover:opacity-100 transition-opacity underline decoration-2 underline-offset-4">
                    View Details
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <template x-if="selectedProduct">
        <div class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-turmexa-dark/80 backdrop-blur-sm" @click.self="selectedProduct = null">
            <div class="bg-white w-full max-w-xl rounded-[2rem] overflow-hidden shadow-2xl relative animate-in fade-in zoom-in duration-300">
                <button @click="selectedProduct = null" class="absolute top-6 right-6 text-stone-400 hover:text-turmexa-dark">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="p-8 md:p-12">
                    <p class="text-turmexa-gold font-bold text-xs uppercase tracking-widest mb-2" x-text="selectedProduct.latin"></p>
                    <h2 class="text-3xl font-bold mb-4" x-text="selectedProduct.name"></h2>
                    <p class="text-stone-600 leading-relaxed mb-8" x-text="selectedProduct.desc"></p>
                    
                    <div class="bg-turmexa-light p-6 rounded-2xl">
                        <h4 class="font-bold text-sm mb-4 border-b border-turmexa-gold/20 pb-2 uppercase tracking-wide">Key Specifications</h4>
                        <ul class="grid grid-cols-1 gap-3">
                            <template x-for="spec in selectedProduct.specs">
                                <li class="flex items-center gap-3 text-sm text-stone-700">
                                    <span class="w-1.5 h-1.5 bg-turmexa-gold rounded-full"></span>
                                    <span x-text="spec"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <button @click="selectedProduct = null" class="w-full mt-8 bg-turmexa-dark text-white py-4 rounded-xl font-bold hover:bg-black transition-colors uppercase tracking-widest text-xs">
                        Close Details
                    </button>
                </div>
            </div>
        </div>
    </template>
</section>

<section id="about" class="py-24 bg-turmexa-dark text-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-2xl font-bold mb-8 text-turmexa-gold uppercase tracking-widest text-center">About Turmexa Global</h2>
        <div class="space-y-6 text-stone-400 leading-relaxed text-sm md:text-base">
            <p>We are an Indonesia based spice supplier with a clear focus to deliver products that meet the expectations of serious international buyers.</p>
            <p>Our work begins at the source. Across different regions of Indonesia, we collaborate with selected producers who understand the importance of consistency, proper handling, and quality standards required for export.</p>
            <p>If consistency, clarity, and a well-managed sourcing approach matter to you, we believe there is a strong foundation to work together.</p>
        </div>
    </div>
</section>

<section id="contact" class="py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-turmexa-gold font-bold tracking-[0.3em] uppercase text-xs mb-4 block">The People Behind Turmexa</span>
            <h2 class="text-3xl md:text-4xl font-bold italic tracking-tighter text-turmexa-dark">Our Leadership Team</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-stone-100 hover:border-turmexa-gold transition-all group">
                <div class="aspect-square bg-stone-200 rounded-3xl mb-6 overflow-hidden relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 text-xs font-bold uppercase italic">Photo: Eko</div>
                </div>
                <h3 class="text-xl font-bold text-turmexa-dark">Eko</h3>
                <p class="text-turmexa-gold font-bold text-xs uppercase tracking-widest mb-4">Chief Executive Officer</p>
                <p class="text-stone-500 text-sm leading-relaxed italic mb-6">"Driving Turmexa's global vision and ensuring excellence in every export partnership."</p>
                <a href="{{ route('contact') }}" class="inline-block text-xs font-bold border-b-2 border-turmexa-gold pb-1 hover:text-turmexa-gold transition">Connect with Eko →</a>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-stone-100 hover:border-turmexa-gold transition-all group">
                <div class="aspect-square bg-stone-200 rounded-3xl mb-6 overflow-hidden relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 text-xs font-bold uppercase italic">Photo: Epen</div>
                </div>
                <h3 class="text-xl font-bold text-turmexa-dark">Epen</h3>
                <p class="text-turmexa-gold font-bold text-xs uppercase tracking-widest mb-4">Founder</p>
                <p class="text-stone-500 text-sm leading-relaxed italic mb-6">"Committed to empowering local farmers and bringing Indonesia's finest spices to the world."</p>
                <a href="{{ route('contact') }}" class="inline-block text-xs font-bold border-b-2 border-turmexa-gold pb-1 hover:text-turmexa-gold transition">Connect with Epen →</a>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-stone-100 hover:border-turmexa-gold transition-all group">
                <div class="aspect-square bg-stone-200 rounded-3xl mb-6 overflow-hidden relative">
                    <div class="absolute inset-0 flex items-center justify-center text-stone-400 text-xs font-bold uppercase italic">Photo: Samid</div>
                </div>
                <h3 class="text-xl font-bold text-turmexa-dark">Samid</h3>
                <p class="text-turmexa-gold font-bold text-xs uppercase tracking-widest mb-4">Co-Founder</p>
                <p class="text-stone-500 text-sm leading-relaxed italic mb-6">"Overseeing high-quality sourcing and ensuring consistent supply for our global clients."</p>
                <a href="{{ route('contact') }}" class="inline-block text-xs font-bold border-b-2 border-turmexa-gold pb-1 hover:text-turmexa-gold transition">Connect with Samid →</a>
            </div>
        </div>

        <div class="mt-16 text-center">
            <a href="{{ route('about') }}" class="bg-turmexa-dark text-white px-10 py-4 rounded-full font-bold hover:bg-black transition-all">Learn More About Us</a>
        </div>
    </div>
</section>

@endsection