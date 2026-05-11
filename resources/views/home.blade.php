@extends('layouts.app')
@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
  :root { 
    --gold: #C9A84C; 
    --gold-l: #E8C97A; 
    --dark: #0F0E0C; 
    --ink: #1A1916; 
    --cream: #F7F4EF; 
    --stone: #8C8880; 
    /* Neon Colors */
    --neon-turmeric: #FFD700; /* Yellow */
    --neon-chili: #FF3131;    /* Red */
  }
  
  *,*::before,*::after { box-sizing:border-box; margin:0; padding:0; }
  
  body { background:var(--cream); font-family: 'Plus Jakarta Sans', sans-serif; color:var(--ink); overflow-x:hidden; }
  
  /* Grain Overlay */
  body::after { 
    content:''; position:fixed; inset:0; 
    background:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E"); 
    pointer-events:none; z-index:9999; 
  }

  .label { font-size:.62rem; font-weight:800; letter-spacing:.3em; text-transform:uppercase; }
  .label-line::before { content:''; display:inline-block; width:22px; height:1px; background:var(--gold); vertical-align:middle; margin-right:.7rem; }

/*Hero Section*/
.hero { 
  position:relative; 
  min-height: 100vh; 
  background:var(--dark); 
  overflow:hidden; 
  display:flex; 
  align-items: center; /* Memastikan konten berada di tengah vertikal */
  padding-top: 4rem;   /* Memberikan ruang untuk header yang fixed */
}

.hero-content { 
  position: relative; 
  z-index: 11; 
  margin-top: -3rem;   /* Penyesuaian optik agar teks tidak terlihat terlalu "turun" */
}
  
  /* Background Elements */
  .hero-lines { position:absolute; inset:0; background:repeating-linear-gradient(90deg,rgba(201,168,76,.03) 0 1px,transparent 1px 120px); pointer-events:none; z-index: 1; }
  .hero-glow { position:absolute; top:-20%; right:-10%; width:800px; height:800px; background:radial-gradient(circle,rgba(201,168,76,.1),transparent 65%); pointer-events:none; z-index: 1; }
  
  .hero-inner { 
    max-width:1320px; 
    margin:0 auto; 
    padding:0 3rem; 
    width:100%; 
    display:grid; 
    grid-template-columns: 1fr 1fr; /* Text left, Products right */
    gap:2rem; 
    align-items:center; 
    position: relative;
    z-index: 10;
  }

  /* Left Side: Text Content */
  .hero-content { position: relative; z-index: 11; }
  .hero-headline { font-size:clamp(3.5rem, 6vw, 6rem); font-weight:900; font-style:italic; line-height:.95; letter-spacing:-.04em; color:#fff; margin-bottom:2rem; }
  .hero-headline em { color:var(--gold); display:block; text-decoration: underline; text-decoration-color: rgba(255,255,255,0.2); text-underline-offset: 8px; }
  .hero-body { font-size:1rem; line-height:1.8; color:rgba(255,255,255,.7); max-width:460px; margin-bottom:3rem; font-weight:400; }
  
  .hero-actions { display:flex; gap:1.5rem; align-items:center; }
  .btn-primary { background:var(--gold); color:var(--dark); padding:1.1rem 2.8rem; border-radius:100px; font-size:.75rem; font-weight:800; letter-spacing:.1em; text-transform:uppercase; text-decoration:none; transition: all 0.3s ease; display:inline-block; }
  .btn-primary:hover { background:var(--gold-l); transform:translateY(-3px); box-shadow: 0 10px 20px rgba(201,168,76,0.2); }
  .btn-ghost { color:rgba(255,255,255,.6); font-size:.75rem; font-weight:800; letter-spacing:.1em; text-transform:uppercase; text-decoration:none; display:inline-flex; align-items:center; gap:.5rem; transition:color .2s; }
  .btn-ghost::after { content:'↗'; font-size: 1.1em; }
  .btn-ghost:hover { color:#fff; }

  /* Right Side: Visual Products (No Boxes, Large Images) */
  .hero-visual { 
    position: relative; 
    width: 100%; 
    height: 100%;
    min-height: 550px; /* Space for floating items */
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  /* Container untuk gambar yang melayang bebas */
  .products-float-wrap { 
    position: absolute; 
    width: 130%; /* Lighter wider than column to overlap slightly */
    height: 130%;
    top: -15%;
    left: -15%;
  }

  /* Base style for floating product images */
  .product-floating { 
    position: absolute; 
    text-decoration: none; 
    display: block; 
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), filter 0.3s ease; 
    will-change: transform, filter;
  }
  
  /* Gambar di dalamnya */
  .product-floating img { 
    width: 100%; 
    height: auto; 
    object-fit: contain; 
    display: block;
    /* Neon Stroke & Glow effect */
    filter: 
      drop-shadow(0 0 1px var(--stroke-color)) 
      drop-shadow(0 0 2px var(--stroke-color)) 
      drop-shadow(0 0 15px var(--glow-color)); 
  }

  /* Hover effect: Scale up and intensify glow */
  .product-floating:hover { 
    transform: scale(1.05) translateY(-10px) !important; /* Override individual animations slightly */
    z-index: 100 !important; 
  }
  .product-floating:hover img {
     filter: 
      drop-shadow(0 0 1.5px var(--stroke-color)) 
      drop-shadow(0 0 3px var(--stroke-color)) 
      drop-shadow(0 0 25px var(--glow-color)); 
  }

  /* --- 1. Turmeric (Kunyit) - Large, Top Right --- */
  .prod-turmeric { 
    width: 75%; /* LUMAYAN BESAR */
    top: 5%; 
    right: 0%; 
    z-index: 5;
    --stroke-color: var(--neon-turmeric);
    --glow-color: rgba(255, 215, 0, 0.4);
    animation: floatTurmeric 10s ease-in-out infinite;
  }

  /* --- 2. Chili (Cabai) - Small, Bottom Left --- */
  .prod-chili { 
    width: 45%; 
    bottom: 5%; 
    left: 5%; 
    z-index: 6; /* Slightly in front */
    --stroke-color: var(--neon-chili);
    --glow-color: rgba(255, 49, 49, 0.5);
    animation: floatChili 8s ease-in-out infinite alternate;
  }

  /* Animations for floating */
  @keyframes floatTurmeric {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-15px, -25px) rotate(-2deg); }
  }
  @keyframes floatChili {
    0% { transform: translate(0, 0) rotate(0deg); }
    100% { transform: translate(15px, 20px) rotate(3deg); }
  }

  /* Badge Overlay (Sekarang menempel pada gambar melayang) */
  .float-badge { 
    position: absolute; 
    bottom: 15%; 
    left: 50%; 
    transform: translateX(-50%);
    background: rgba(10,8,6,0.85); 
    backdrop-filter: blur(8px); 
    border: 1px solid rgba(255,255,255,0.1); 
    border-radius: 100px; 
    padding: 0.6rem 1.4rem; 
    opacity: 0; 
    transition: opacity 0.3s ease, transform 0.3s ease;
    white-space: nowrap;
    z-index: 10;
  }
  .float-badge span { color: #fff; font-size: 0.65rem; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase; }
  .product-floating:hover .float-badge { opacity: 1; transform: translateX(-50%) translateY(-10px); }


  /* MARQUEE */
 .marquee { background:var(--dark); padding:1.8rem 0; overflow:hidden; white-space:nowrap; border-top:1px solid rgba(201,168,76,0.2); border-bottom:1px solid rgba(201,168,76,0.2); }
  .marquee-track { display:inline-flex; animation:mq 22s linear infinite; }
  @keyframes mq { to { transform:translateX(-50%); } }
  .marquee-item { font-size:.8rem; font-weight:900; letter-spacing:.3em; text-transform:uppercase; color:rgba(255,255,255,0.9); padding:0 2.5rem; display:inline-flex; align-items:center; gap:2.5rem; }
  .marquee-item::after { content:''; width:6px; height:6px; border-radius:50%; background:var(--gold); }

  /* WHY US */
  .section-why { max-width:1320px; margin:0 auto; padding:10rem 3rem; }
  .section-title { font-size:clamp(2.8rem,4.5vw,4.2rem); font-weight:900; font-style:italic; line-height:.9; letter-spacing:-.04em; color:var(--dark); margin-top:1.5rem; }
  .section-title--light { color:#fff; }
  
  .why-grid { display:grid; grid-template-columns: 1.1fr 1fr; gap:6rem; align-items:start; }
  .why-left p { font-size:1rem; line-height:1.9; color:var(--stone); font-weight:400; max-width:440px; margin-top:2.5rem; }

  .features { display:grid; grid-template-columns:1fr 1fr; gap:1px; background:rgba(201,168,76,.12); border:1px solid rgba(201,168,76,.12); border-radius:2.5rem; overflow:hidden; }
  .feat { background:var(--cream); padding:3rem; transition:background 0.4s ease; }
  .feat:hover { background:var(--dark); }
  .feat-n { color:var(--gold); font-size:.65rem; font-weight:800; letter-spacing:.2em; display:block; margin-bottom:1.2rem; }
  .feat-t { font-size:.8rem; font-weight:900; letter-spacing:.18em; text-transform:uppercase; color:var(--dark); margin-bottom:.8rem; transition:color .3s; }
  .feat-d { font-size:.9rem; line-height:1.8; color:var(--stone); font-weight:400; transition:color .3s; }
  .feat:hover .feat-t { color:#fff; }
  .feat:hover .feat-d { color:rgba(255,255,255,.6); }

  /* PRODUCTS GRID */
  .section-products { background:var(--dark); padding:10rem 3rem; position:relative; }
  .section-products::before { content:''; position:absolute; top:0; left:0; right:0; height:1px; background:linear-gradient(90deg,transparent,var(--gold),transparent); }
  .products-inner { max-width:1320px; margin:0 auto; }
  
  .category-grid { display:grid; grid-template-columns: repeat(3, 1fr); gap:2rem; margin-top:4rem; }
  .cat-card { background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:2.5rem; padding:2.5rem; transition:all 0.4s; text-decoration:none; overflow:hidden; display:flex; flex-direction:column; gap:2rem; position: relative; }
  .cat-card:hover { border-color:var(--gold); transform:translateY(-10px); background:rgba(255,255,255,0.05); }
  
  .cat-img { aspect-ratio: 16/10; border-radius:1.5rem; overflow:hidden; background:rgba(255,255,255,0.02); }
  .cat-img img { width:100%; height:100%; object-fit:cover; transition: transform 0.5s; opacity: 0.8; }
  .cat-card:hover .cat-img img { transform:scale(1.1); opacity:1; }
  
  .cat-info h3 { color:#fff; font-size:1.8rem; font-weight:900; font-style:italic; line-height:1.1; margin-bottom:0.5rem; }
  .cat-info p { color:var(--gold); font-size:0.65rem; font-weight:800; letter-spacing:0.2em; text-transform:uppercase; }
  .cat-btn { margin-top:auto; padding:1.2rem; border-radius:100px; border:1px solid rgba(255,255,255,0.1); color:#fff; text-align:center; font-size:0.65rem; font-weight:800; text-transform:uppercase; letter-spacing:0.2em; transition:all 0.3s; }
  .cat-card:hover .cat-btn { background:var(--gold); color:var(--dark); border-color:var(--gold); }

  /* CONTACT STRIP (PUTIH) */
  .contact-strip { background:#ffffff; padding:10rem 3rem; position:relative; overflow:hidden; border-top: 1px solid #f0f0f0; }
  .contact-inner { max-width:1320px; margin:0 auto; display:grid; grid-template-columns:1fr 1.2fr; gap:6rem; align-items:center; }
  .contact-headline { font-size:clamp(2.8rem, 5vw, 5rem); font-weight:900; font-style:italic; line-height:.95; letter-spacing:-.04em; color:var(--dark); margin-top:1.5rem; }
  .contact-headline em { color:var(--gold); }

  .contact-form { display:grid; gap:1.8rem; }
  .form-row { display:grid; grid-template-columns:1fr 1fr; gap:1.8rem; }
  .field { background:#f9f9f9; border:1px solid #e8e8e8; border-radius:1.2rem; padding:1.4rem 1.6rem; color:var(--dark); font-family:inherit; font-size:.9rem; transition:all .3s; }
  .field:focus { outline:none; border-color:var(--gold); background:#fff; box-shadow: 0 5px 15px rgba(0,0,0,0.03); }
  .field::placeholder { color: #aaa; }
  textarea.field { min-height: 160px; resize: none; }
  
  .form-submit { background:var(--dark); color:#fff; border:none; padding:1.3rem; border-radius:100px; font-size:.75rem; font-weight:800; letter-spacing:.15em; text-transform:uppercase; cursor:pointer; transition:all 0.3s ease; }
  .form-submit:hover { background:var(--gold); color:var(--dark); transform:translateY(-3px); box-shadow:0 15px 30px rgba(0,0,0,0.1); }

  /* FOOTER */
  footer { background:var(--dark); padding:6rem 3rem; border-top:1px solid rgba(255,255,255,0.03); }
  .footer-inner { max-width:1320px; margin:0 auto; display: flex; justify-content: space-between; align-items: center; padding-bottom: 4rem; border-bottom: 1px solid rgba(255,255,255,0.03); }
  .footer-logo { font-size:2rem; font-weight:900; font-style:italic; color:#fff; letter-spacing: -0.05em; }
  .footer-logo span { color:var(--gold); }
  .footer-nav { list-style: none; display: flex; gap: 3rem; }
  .footer-nav a { color: rgba(255,255,255,0.5); text-decoration: none; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; transition: color 0.3s; }
  .footer-nav a:hover { color: #fff; }
  .footer-copy { color: rgba(255,255,255,0.3); font-size: 0.7rem; margin-top: 3rem; text-align: center; text-transform: uppercase; letter-spacing: 0.1em; }
  
  /* RESPONSIVE */
  @media(max-width:1024px) {
    .hero-inner { grid-template-columns: 1fr; text-align: center; gap: 5rem; padding-top: 4rem; }
    .hero-body { margin-left: auto; margin-right: auto; }
    .hero-actions { justify-content: center; }
    .hero-visual { min-height: 450px; }
    .products-float-wrap { width: 100%; height: 100%; top: 0; left: 0; }
    .prod-turmeric { width: 65%; top: 0; right: 5%; }
    .prod-chili { width: 40%; bottom: 5%; left: 10%; }
    
    .why-grid { grid-template-columns: 1fr; gap: 4rem; }
    .why-left { text-align: center; }
    .why-left p { margin-left: auto; margin-right: auto; }
    
    .products-grid { grid-template-columns: repeat(2,1fr); }
    .products-header { flex-direction: column; align-items: center; gap: 2rem; text-align: center; }

    .contact-inner { grid-template-columns: 1fr; gap: 4rem; text-align: center; }
    .form-row { grid-template-columns: 1fr; }
    
    .footer-inner { flex-direction: column; gap: 3rem; text-align: center; }
  }
  @media(max-width:640px) {
     .products-grid { grid-template-columns: 1fr; }
  }
</style>

<div>

{{-- ==============================
   HERO SECTION (HTML UPDATED)
   ============================== --}}
<section class="hero" id="home">
  <div class="hero-lines"></div>
  <div class="hero-glow"></div>
  
  <div class="hero-inner">
    {{-- Left: Text Content --}}
    <div class="hero-content" data-aos="fade-right" data-aos-duration="1200">
      <h1 class="hero-headline">
        Because Everyone<br>Deserves
        <em>Quality.</em>
      </h1>
      <p class="hero-body">Turmexa Global sources premium Indonesian commodities with care and consistency, so every buyer receives products worth trusting.</p>
      <div class="hero-actions">
    <a href="{{ asset('assets/pdf/turmexa-catalogue.pdf') }}" download class="btn-primary">
        Download Catalogue
    </a>
    <a href="#contact" class="btn-ghost">Request a Quote</a>
    </div>
    </div>

    {{-- Right: Visual Floating Products (No Grid/Box) --}}
    <div class="hero-visual" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1200">
      <div class="products-float-wrap">
        
        {{-- Product 1: Turmeric (Large, Kuning Neon) --}}
        <a href="{{ route('products.show', 'turmeric-powder') }}" class="product-floating prod-turmeric">
          <img src="{{ asset('assets/products/trm-hero.png') }}" alt="Premium Turmeric Powder Melayang">
          {{-- Badge melayang saat hover --}}
          <div class="float-badge"><span>Turmeric Powder</span></div>
        </a>

        {{-- Product 2: Chili (Small, Merah Neon) --}}
        <a href="{{ route('products.show', 'chili-powder-a60') }}" class="product-floating prod-chili">
          <img src="{{ asset('assets/products/chl-hero.png') }}" alt="A60 Chili Powder Melayang">
          {{-- Badge melayang saat hover --}}
          <div class="float-badge"><span>A60 Chili Powder</span></div>
        </a>

      </div>
    </div>
  </div>
</section>

{{-- ── MARQUEE (FONT KONTRAS) ── --}}
<div class="marquee">
  <div class="marquee-track">
    @php $items=array_merge(['Turmeric','Black Pepper','Cinnamon','Clove','Ginger','Nutmeg','Moringa','Garlic','Onion','Tamarind'],['Turmeric','Black Pepper','Cinnamon','Clove','Ginger','Nutmeg','Moringa','Garlic','Onion','Tamarind']); @endphp
    @foreach($items as $item)<span class="marquee-item">{{ $item }}</span>@endforeach
  </div>
</div>

{{-- ── WHY US ── --}}
<section id="about" class="section-why">
  <div class="why-grid">
    <div class="why-left" data-aos="fade-right">
      <div class="label label-line" style="color:var(--gold)">Why Partner With Us</div>
      <h2 class="section-title">The Standard<br>You Deserve.</h2>
      <p>We combine deep regional sourcing networks with rigorous export protocols — ensuring every shipment meets international grade standards.</p>
    </div>
    <div class="features" data-aos="fade-up">
      @php $feats=[['01','Strict QC','Batch-by-batch inspection for export grade standards.'],['02','Direct Source','Collaborating directly with selected regional producers.'],['03','Logistics','Handling paperwork and shipment near major ports.'],['04','Custom Pack','Flexible industrial packaging and mesh sizes.']]; @endphp
      @foreach($feats as [$n,$t,$d])
      <div class="feat">
        <span class="feat-n">{{ $n }}</span>
        <div class="feat-t">{{ $t }}</div>
        <p class="feat-d">{{ $d }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ── EXPORT GRADE SELECTIONS (KATEGORI) ── --}}
<section class="section-products" id="products">
  <div class="products-inner">
    <div class="products-header" data-aos="fade-up">
      <div>
        <div class="label label-line" style="color:var(--gold)">Featured Categories</div>
        <h2 class="section-title section-title--light">Export-Grade<br>Selections.</h2>
      </div>
    </div>

    <div class="category-grid">
      {{-- Category 1: The Chili Series --}}
      <a href="{{ route('products') }}?category=chili" class="cat-card" data-aos="fade-up">
        <div class="cat-img">
          <img src="{{ asset('assets/products/chla60-1.jpg') }}" alt="The Chili Series">
        </div>
        <div class="cat-info">
          <h3>The Chili<br>Series.</h3>
          <p>Extra Hot & Color Graded</p>
        </div>
        <div class="cat-btn">Browse Collection</div>
      </a>

      {{-- Category 2: Herbal & Roots --}}
      <a href="{{ route('products') }}?category=herbal" class="cat-card" data-aos="fade-up" data-aos-delay="100">
        <div class="cat-img">
          <img src="{{ asset('assets/products/gng-1.jpg') }}" alt="Herbal & Roots">
        </div>
        <div class="cat-info">
          <h3>Herbal &<br>Roots.</h3>
          <p>Turmeric, Ginger & More</p>
        </div>
        <div class="cat-btn">Browse Collection</div>
      </a>

      {{-- Category 3: Aromatic Spices --}}
      <a href="{{ route('products') }}?category=aromatic" class="cat-card" data-aos="fade-up" data-aos-delay="200">
        <div class="cat-img">
          <img src="{{ asset('assets/products/clv-1.jpg') }}" alt="Aromatic Spices">
        </div>
        <div class="cat-info">
          <h3>Aromatic<br>Spices.</h3>
          <p>Cloves, Nutmeg & Cinnamon</p>
        </div>
        <div class="cat-btn">Browse Collection</div>
      </a>
    </div>
  </div>
</section>

{{-- ── CONTACT (WHITE BG) ── --}}
<section class="contact-strip" id="contact">
  <div class="contact-inner">
    <div data-aos="fade-right">
      <div class="label label-line" style="color:var(--gold)">Get In Touch</div>
      <h2 class="contact-headline">Ready to<br><em>source</em> with us?</h2>
    </div>
    <form id="whatsappForm" class="contact-form" data-aos="fade-left">
        <div class="form-row">
            <input type="text" id="name" placeholder="Full Name" class="field" required>
            <input type="email" id="email" placeholder="Email Address" class="field" required>
        </div>
        <textarea id="message" placeholder="Tell us about your requirements (Product, Mesh, Quantity, etc)..." class="field" required></textarea>
        
        <button type="button" onclick="sendToWhatsApp()" class="form-submit">
            Send Inquiry via WhatsApp →
        </button>
    </form>
  </div>
</section>

</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    AOS.init({ duration: 1000, once: true, offset: 100 });
  });
</script>

@endsection