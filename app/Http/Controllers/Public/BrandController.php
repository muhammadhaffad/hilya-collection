<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getBrandProducts(ProductBrand $brand, Request $request) {
        $brands = ProductBrand::all();
        $brandProducts = $brand->products()->with(['product_prices','product_brand','product_images'])->latest()->paginate(25);
        $contact = Contact::first();
        if($request->get('harga') == 'tinggi')
            $brandProducts = $brand->products()->with(['product_prices','product_brand','product_images'])->withMax('product_prices as hargaMaks','harga')->orderBy('hargaMaks', 'desc')->paginate(25);
        if($request->get('harga') == 'rendah')
            $brandProducts = $brand->products()->with(['product_prices','product_brand','product_images'])->withMin('product_prices as hargaMin','harga')->orderBy('hargaMin', 'asc')->paginate(25);
        return view('web.public.pages.brand-products.layout', [
            'request' => $request,
            'brands' => $brands, 
            'brandProducts' => $brandProducts, 
            'brand' => $brand,
            'contact' => $contact
        ]);
    }
}
