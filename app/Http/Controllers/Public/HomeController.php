<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ProductBrand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $brands = ProductBrand::all();
        $promoProducts = Product::with('product_prices', 'product_images')->where('status', 'promo')->latest()->get();
        $preOrderProducts = Product::with('product_prices', 'product_images')->where('status', 'preorder')->latest()->get();
        $products = Product::with('product_prices', 'product_images')->latest()->get();
        $contact = Contact::first();
        return view('web.public.pages.home.layout', [
            'brands' => $brands,
            'promo' => $promoProducts,
            'preorder' => $preOrderProducts,
            'products' => $products,
            'contact' => $contact
        ]);
    }

}
