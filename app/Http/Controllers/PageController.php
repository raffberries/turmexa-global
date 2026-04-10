<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman Home
     * Menampilkan Hero dan ringkasan produk sekunder (Modal)
     */
    public function home()
    {
        $secondaryProducts = [
            [
                'name' => 'Ginger Powder',
                'latin' => 'Zingiber officinale',
                'desc' => 'Our Ginger Powder is made from premium sun-dried ginger rhizomes. It delivers a sharp, spicy aroma and consistent heat.',
                'specs' => ['Moisture: < 12%', 'Mesh Size: 60 - 80', 'Appearance: Fine Pale Yellow', 'Origin: Central Java']
            ],
            [
                'name' => 'Cinnamon Powder',
                'latin' => 'Cinnamomum burmannii',
                'desc' => 'Sourced from the highlands of Sumatra, our Cinnamon provides a sweet, woody aroma with high volatile oil content.',
                'specs' => ['Type: AA High Grade', 'Moisture: < 14%', 'Volatile Oil: > 2.0%', 'Aroma: Sweet & Spicy']
            ],
            [
                'name' => 'Black Pepper',
                'latin' => 'Piper nigrum',
                'desc' => 'Known for its bold pungency. Our black pepper is carefully cleaned and sorted to ensure uniform density.',
                'specs' => ['Density: 500 - 550 G/L', 'Moisture: < 13%', 'Piperine: 4% - 6%', 'Origin: Lampung']
            ],
            [
                'name' => 'Cloves',
                'latin' => 'Syzygium aromaticum',
                'desc' => 'Premium dried cloves with deep reddish-brown color, focusing on low moisture and minimal stems.',
                'specs' => ['Moisture: < 12%', 'Stems: < 1%', 'Baby Cloves: < 2%', 'Origin: North Sulawesi']
            ],
        ];

        return view('home', compact('secondaryProducts'));
    }

    /**
     * Halaman Our Products
     * Menampilkan Slider Kunyit (Primary) dan Koleksi Produk Lainnya
     */
    public function products()
    {
        // Data untuk Slider Gambar Kunyit & Sertifikat
        $turmericImages = [
            ['url' => 'turmeric-raw.jpg', 'title' => 'Selected Raw Turmeric'],
            ['url' => 'turmeric-powder.jpg', 'title' => 'Turmeric Powder 80 Mesh'],
            ['url' => 'turmeric-lab.jpg', 'title' => 'Lab Test Result (SGS)'],
        ];

        // Data Ringkas untuk List Produk Sekunder di bawah
        $otherSpices = [
            ['name' => 'Ginger Powder', 'desc' => 'Premium grade with sharp aroma and high heat.'],
            ['name' => 'Cinnamon', 'desc' => 'Sweet and woody aroma, AA export grade.'],
            ['name' => 'Black Pepper', 'desc' => 'Bold pungency with uniform density.'],
            ['name' => 'Cloves', 'desc' => 'Handpicked, low moisture, reddish-brown color.'],
        ];

        return view('products.index', compact('turmericImages', 'otherSpices'));
    }

    /**
     * Halaman About Us
     * Menampilkan profil perusahaan dan tim leadership
     */
    public function about()
    {
        $team = [
            [
                'name' => 'Eko', 
                'role' => 'CEO', 
                'desc' => 'Eko leads Turmexa Global with a focus on strategic expansion and ensuring all products meet international quality compliance.'
            ],
            [
                'name' => 'Epen', 
                'role' => 'Founder', 
                'desc' => 'With deep roots in Indonesian agriculture, Epen founded Turmexa to empower local farmers by connecting them to the global market.'
            ],
            [
                'name' => 'Samid', 
                'role' => 'Co-Founder', 
                'desc' => 'Samid manages the supply chain and sourcing operations, ensuring consistency and quality from the farm to the final shipment.'
            ],
        ];

        return view('about', compact('team'));
    }

    /**
     * Halaman Contact Us
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Logic Simpan Form Inquiry
     */
    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Pastikan Anda sudah membuat Model Inquiry & Migrasinya
        Inquiry::create($validated);

        return back()->with('success', 'Thank you for your message! We will contact you shortly.');
    }

    /**
     * Dashboard Admin Sederhana
     */
    public function adminIndex()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries', compact('inquiries'));
    }
}