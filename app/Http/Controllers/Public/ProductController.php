<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(Request $request)
    {
        $brands = ProductBrand::all();
        $products = Product::with('product_prices', 'product_images', 'product_brand')->where('status', '!=', 'preorder')->latest()->paginate(25);
        $contact = Contact::first();
        if ($request->get('harga') == 'tinggi') {
            $products = Product::with('product_prices', 'product_images', 'product_brand')->withMax('product_prices as hargaMaks', 'harga')->where('status', '!=', 'preorder')->orderBy('hargaMaks', 'desc')->paginate(25);
        } elseif ($request->get('harga') == 'rendah') {
            $products = Product::with('product_prices', 'product_images', 'product_brand')->withMin('product_prices as hargaMin', 'harga')->where('status', '!=', 'preorder')->orderBy('hargaMin', 'asc')->paginate(25);
        }

        return view('web.public.pages.all-products.layout', [
            'request' => $request,
            'brands' => $brands,
            'products' => $products,
            'contact' => $contact
        ]);
    }

    public function getProductsByStatus($status, Request $request)
    {
        $brands = ProductBrand::all();
        $contact = Contact::first();
        if ($status == 'pre-order') {
            $status = 'preorder';
        }
        $products = Product::with(['product_prices', 'product_brand', 'product_images'])->where('status', $status)->latest()->paginate(20);
        if ($request->get('harga') == 'tinggi')
            $products = Product::with('product_prices', 'product_images', 'product_brand')->withMax('product_prices as hargaMaks', 'harga')->where('status', $status)->orderBy('hargaMaks', 'desc')->paginate(20);
        if ($request->get('harga') == 'rendah')
            $products = Product::with('product_prices', 'product_images', 'product_brand')->withMin('product_prices as hargaMin', 'harga')->where('status', $status)->orderBy('hargaMin', 'asc')->paginate(20);
        return view('web.public.pages.status-products.layout', [
            'request' => $request,
            'brands' => $brands,
            'status' => $status,
            'products' => $products,
            'contact' => $contact
        ]);
    }

    public function getProduct(Product $product)
    {
        $contact = Contact::first();
        return view('web.public.pages.detail-product.layout', [
            'product' => $product->load('product_prices', 'product_images', 'product_brand'),
            'contact' => $contact        
        ]);
    }

    public function searchProducts(Request $input)
    {
        $brands = ProductBrand::all();
        $contact = Contact::first();
        $products = Product::with('product_images', 'product_prices')
                    ->join('product_brands', [['products.product_brand_id', 'product_brands.id']])
                    ->select('products.*','product_brands.nama as nama_brand', 'product_brands.slug as slug_brand')
                    ->where( function ($q) use($input) {
                        $q->where('product_brands.nama', 'like', "%{$input->get('search')}%")
                        ->orWhere('products.nama', 'like', "%{$input->get('search')}%");
                    });
                    /* select `products`.*, `product_brands`.`nama` as `nama_brand`, `product_brands`.`slug` as `slug_brand` 
                       from `products` inner join `product_brands` on (`products`.`product_brand_id` = `product_brands`.`id`) 
                       where (`product_brands`.`nama` like ? or `products`.`nama` like ?) */
                       
        if ($input->get('category') !== 'all') {
            $products = $products->where('status', '=', $input->get('category'));    
        }

        if ($input->get('harga') == 'tinggi')
            $products = $products->withMax('product_prices as hargaMaks', 'harga')->orderBy('hargaMaks', 'desc')->paginate(25);
        else if ($input->get('harga') == 'rendah')
            $products = $products->withMin('product_prices as hargaMin', 'harga')->orderBy('hargaMin', 'asc')->paginate(25);
        else
            $products = $products->latest()->paginate(25);
        return view('web.public.pages.search-products.layout', [
            'brands' => $brands, 
            'products' => $products, 
            'search' => $input,
            'contact' => $contact
        ]);
    }

    public function orderProductViaWhatsapp(Request $request, Product $product) {
        if ($request->produk === null) {
            return redirect()->back();
        }
        $productPrices = $product->product_prices()->whereIn('id', array_keys($request->produk))->get();
        $sizeSelected = [];
        $genders = [0 => 'PR Dewasa', 1 => 'LK Dewasa', 2 => 'PR Anak', 3 => 'LK Dewasa'];
        foreach ($productPrices as $productPrice) {
            $warna = ucfirst($productPrice->color()->first()->warna);
            $gender = $genders[$productPrice->jenis];
            $jumlah = $request->produk[$productPrice->id]['jumlah'];
            $keterangan = $productPrice->keterangan ? "($productPrice->keterangan)" : "";
            $sizeSelected[] = "$warna ($productPrice->ukuran) untuk $gender berjumlah $jumlah $keterangan";
        }
        $contact = Contact::first();
        $sizeSelected = join("\n", $sizeSelected);
        $jenisProduct = $product->status == 'preorder' ? 'preorder' : 'memesan';
        $body = "Assalamualaikum wr wb,..Permisi, Saya ingin $jenisProduct produk ({$product->product_brand->nama}) $product->nama dengan warna dan ukuran sebagai berikut:\n{$sizeSelected}";
        $link = sprintf("https://wa.me/62%s?text=%s", $contact->telp, urlencode($body));
        // return dd($request);
        return redirect($link);
    }
}
