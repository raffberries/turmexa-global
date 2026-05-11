<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menyediakan data lengkap komoditas Turmexa Global.
     * Termasuk revisi spesifikasi untuk produk Chili dan Paprika.
     */
    private function getProductData() {
        return [
            [
                'name' => 'Turmeric Powder', 
                'slug' => 'turmeric-powder', 
                'code' => 'TRM', 
                'hero' => true, 
                'images' => ['trm-1.jpg', 'trm-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Curcumin: Natural', 'Additives: None'], 
                'desc' => 'Premium export-grade turmeric powder meticulously processed to maintain high natural curcumin levels.'
            ],
            [
                'name' => 'Chili Powder A60', 
                'slug' => 'chili-powder-a60', 
                'code' => 'CHL-A60', 
                'hero' => true, 
                'images' => ['chla60-1.jpg', 'chla60-2.jpg'], 
                'specs' => ['Mesh: 60', 'Moisture: < 10%', 'SHU: 25.000-30.000'], 
                'desc' => 'High-grade chili powder with superior mesh consistency and balanced heat.'
            ],
            [
                'name' => 'Chili Powder A30', 
                'slug' => 'chili-powder-a30', 
                'code' => 'CHL-A30', 
                'images' => ['chla30-1.jpg', 'chla30-2.jpg'], 
                'specs' => ['Mesh: 30', 'Moisture: < 10%', 'SHU: 25.000-30.000'], 
                'desc' => 'Consistent coarse chili powder ideal for diverse industrial food applications.'
            ],
            [
                'name' => 'Extra Hot Chili Powder', 
                'slug' => 'extra-hot-chili-powder', 
                'code' => 'CHL-XHT', 
                'images' => ['chlxh-1.jpg', 'chlxh-2.jpg'], 
                'specs' => ['Mesh: 40', 'Moisture: < 10%', 'SHU: 92.000'], 
                'desc' => 'Maximum pungency level for intense heat and vibrant spice profile.'
            ],
            [
                'name' => 'Chili Flakes', 
                'slug' => 'chili-flakes', 
                'code' => 'CHL-FLK', 
                'images' => ['chlf-1.jpg', 'chlf-2.jpg'], 
                'specs' => ['Size: 3mm-6mm', 'Moisture: < 11%', 'SHU: 25.000-30.000'], 
                'desc' => 'Premium crushed red chili flakes with consistent size and natural spicy kick.'
            ],
            [
                'name' => 'Paprika Powder', 
                'slug' => 'paprika-powder', 
                'code' => 'PPR', 
                'images' => ['ppr-1.jpg', 'ppr-2.jpg'], 
                'specs' => ['Mesh: 60', 'Moisture: < 10%', 'Color: Natural'], 
                'desc' => 'Mild and sweet paprika ground to a fine mesh for rich coloring and subtle flavor.'
            ],
            [
                'name' => 'Black Pepper Powder', 
                'slug' => 'black-pepper-powder', 
                'code' => 'BPP', 
                'images' => ['bpp-1.jpg', 'bpp-2.jpg'], 
                'specs' => ['Moisture: < 12%', 'Mesh: 40–80', 'High Piperine', 'Pure & Clean'], 
                'desc' => 'Bold and pungent black pepper ground from select Lampung berries.'
            ],
            [
                'name' => 'White Pepper Powder', 
                'slug' => 'white-pepper-powder', 
                'code' => 'WPP', 
                'images' => ['wpp-1.jpg', 'wpp-2.jpg'], 
                'specs' => ['Moisture: < 12%', 'Mesh: 60–100', 'Strong Aroma', 'Premium Grade'], 
                'desc' => 'Sharp, clean heat with a powerful aromatic profile.'
            ],
            [
                'name' => 'Ginger Powder', 
                'slug' => 'ginger-powder', 
                'code' => 'GNG', 
                'images' => ['gng-1.jpg', 'gng-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Warm & Aromatic', 'Natural Quality'], 
                'desc' => 'Finely ground sun-dried ginger offering consistent spicy notes.'
            ],
            [
                'name' => 'Coriander Powder', 
                'slug' => 'coriander-powder', 
                'code' => 'CRN', 
                'images' => ['crn-1.jpg', 'crn-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Mild Citrus Note', 'Clean Product'], 
                'desc' => 'Aromatic coriander seeds processed for a fresh, citrusy finish.'
            ],
            [
                'name' => 'Clove Powder', 
                'slug' => 'clove-powder', 
                'code' => 'CLV', 
                'images' => ['clv-1.jpg', 'clv-2.jpg'], 
                'specs' => ['Moisture: < 12%', 'Mesh: 60–100', 'High Volatile Oil', 'Strong Aroma'], 
                'desc' => 'Hand-sorted cloves ground to retain maximum volatile oil content.'
            ],
            [
                'name' => 'Candlenut Powder', 
                'slug' => 'candlenut-powder', 
                'code' => 'CND', 
                'images' => ['cnd-1.jpg', 'cnd-2.jpg'], 
                'specs' => ['Moisture: < 5%', 'Fine Mesh', 'High Oil Content', 'Fresh & Natural'], 
                'desc' => 'Rich, high-oil candlenut powder ideal for industrial food processing.'
            ],
            [
                'name' => 'Nutmeg Powder', 
                'slug' => 'nutmeg-powder', 
                'code' => 'NTM', 
                'images' => ['ntm-1.jpg', 'ntm-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Rich Aroma', 'Premium Quality'], 
                'desc' => 'Deeply aromatic nutmeg powder sourced from high-altitude plantations.'
            ],
            [
                'name' => 'Lemongrass Powder', 
                'slug' => 'lemongrass-powder', 
                'code' => 'LMN', 
                'images' => ['lmn-1.jpg', 'lmn-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Fresh Citrus Aroma', 'Natural'], 
                'desc' => 'Fresh citrus notes preserved through careful drying.'
            ],
            [
                'name' => 'Cardamom Powder', 
                'slug' => 'cardamom-powder', 
                'code' => 'CRD', 
                'images' => ['crd-1.jpg', 'crd-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Intense Aroma', 'High Grade'], 
                'desc' => 'Premium Indonesian cardamom with a distinct aromatic profile.'
            ],
            [
                'name' => 'Cumin Powder', 
                'slug' => 'cumin-powder', 
                'code' => 'CMN', 
                'images' => ['cmn-1.jpg', 'cmn-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Strong Flavor', 'Clean & Pure'], 
                'desc' => 'Intense earthy flavor ground from cleaned cumin seeds.'
            ],
            [
                'name' => 'Curcuma Powder', 
                'slug' => 'curcuma-powder', 
                'code' => 'CUR', 
                'images' => ['cur-1.jpg', 'cur-2.jpg'], 
                'specs' => ['Moisture: < 10%', 'Mesh: 60–100', 'Herbal Profile', 'Natural'], 
                'desc' => 'Natural herbal profile ideal for industries.'
            ],
            [
                'name' => 'Cinnamon Powder', 
                'slug' => 'cinnamon-powder', 
                'code' => 'CNN', 
                'images' => ['cnn-1.jpg', 'cnn-2.jpg'], 
                'specs' => ['Moisture: < 12%', 'Mesh: 60–100', 'Sweet Aroma', 'High Quality'], 
                'desc' => 'Authentic Cinnamomum burmannii with a sweet aroma.'
            ],
            [
                'name' => 'Moringa Leaf Powder', 
                'slug' => 'moringa-leaf-powder', 
                'code' => 'MRG', 
                'images' => ['mrg-1.jpg', 'mrg-2.jpg'], 
                'specs' => ['Moisture: < 7%', 'Mesh: 80–100', 'Natural Green', 'Nutrient Rich'], 
                'desc' => 'Vibrant green moringa leaves processed into a fine powder.'
            ],
            [
                'name' => 'Garlic Powder', 
                'slug' => 'garlic-powder', 
                'code' => 'GRL', 
                'images' => ['grl-1.jpg', 'grl-2.jpg'], 
                'specs' => ['Moisture: < 6%', 'Mesh: 80–100', 'Strong Flavor', 'Pure'], 
                'desc' => 'Pure garlic powder with a consistent flavor profile.'
            ],
            [
                'name' => 'Onion Powder', 
                'slug' => 'onion-powder', 
                'code' => 'ONN', 
                'images' => ['onn-1.jpg', 'onn-2.jpg'], 
                'specs' => ['Moisture: < 6%', 'Mesh: 80–100', 'Sweet Savory', 'Clean Product'], 
                'desc' => 'Sweet and savory onion ground into a fine powder.'
            ],
        ];
    }

    public function products() {
        $products = $this->getProductData();
        return view('products.index', compact('products'));
    }

    public function show($slug) {
        $all = $this->getProductData();
        $index = collect($all)->search(fn($p) => $p['slug'] === $slug);
        if ($index === false) abort(404);

        $product = $all[$index];
        $prev = $all[$index - 1] ?? end($all);
        $next = $all[$index + 1] ?? $all[0];

        return view('products.show', compact('product', 'prev', 'next'));
    }

    public function home() {
        $all = $this->getProductData();
        $secondaryProducts = array_slice(array_filter($all, fn($p) => !($p['hero'] ?? false)), 0, 4);
        return view('home', compact('secondaryProducts'));
    }

    /**
     * Method untuk menampilkan halaman About Us.
     */
    public function about() {
        $team = [
            [
                'name' => 'Syauqi',
                'role' => 'Founder',
                'desc' => 'Directing the vision and strategic sourcing for Turmexa Global.'
            ],
            [
                'name' => 'El',
                'role' => 'Co-Founder',
                'desc' => 'Managing global partnerships and international export logistics.'
            ],
            [
                'name' => 'Rafi',
                'role' => 'CEO',
                'desc' => 'Leading the global expansion and ensuring the highest standards of operational excellence.'
            ]
        ];

        return view('about', compact('team'));
    }

    public function contact() {
    return view('contact');
    }
}