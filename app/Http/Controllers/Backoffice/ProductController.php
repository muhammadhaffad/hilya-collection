<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\StoreProductRequest;
use App\Http\Requests\Backoffice\UpdateProductRequest;
use App\Models\Color;
use App\Models\ProductBrand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $products = Product::with('product_prices', 'product_images')
        //     ->orWhere('nama', 'like', "%{$request->s}%")->paginate(10);
        return view('web.backoffice.pages.list-product.layout');
    }

    public function storeProductView()
    {
        $brands = ProductBrand::all();
        $status = array('normal', 'promo', 'preorder');
        return view('web.backoffice.pages.add-product.layout', [
            'brands' => $brands,
            'status' => $status
        ]);
    }

    public function storeProduct(StoreProductRequest $request)
    {
        $product = new Product;
        DB::beginTransaction();
        try {
            $product->storeProduct($request);
            DB::commit();
            return redirect()->route('admin.add.product')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->route('admin.add.product')->with('fail', 'Produk gagal ditambahkan!');
        }
    }

    public function updateProductView(Product $product)
    {
        $product = $product->load('product_images', 'product_prices.color');
        $brands = ProductBrand::all();
        $status = array('normal', 'promo', 'preorder');
        return view('web.backoffice.pages.update-product.layout', [
            'product' => $product,
            'brands' => $brands,
            'status' => $status
        ]);
    }

    public function updateProduct(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $product->updateProduct($request);
            DB::commit();
            return redirect()->route('admin.update.product', $product->slug)->with('success', 'Produk berhasil diperbarui!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.update.product', $product->slug)->with('fail', 'Produk gagal diperbarui!');
        }
    }

    public function deleteProduct(Product $product)
    {
        try {
            $product->deleteProduct();
            return redirect()->route('admin.list.product')->with('success', 'Produk berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.update.product', $product->slug)->with('fail', 'Produk gagal dihapus!');
        }
    }

    public function storeColor(Request $request)
    {
        try {
            if ($request->warna == null) {
                return response('warna tidak boleh kosong', 400);
            }
            Color::create(['warna' => $request->warna]);
            return response('warna berhasil disimpan', 200);
        } catch (\Throwable $th) {
            return response('warna gagal disimpan', 500);
        }
    }

    public function getColors()
    {
        try {
            return response()->json(Color::get(['id','warna'])->toArray());
        } catch (\Throwable $th) {
            return response($th, 500);
        }
    }
}
