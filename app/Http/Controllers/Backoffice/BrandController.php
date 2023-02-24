<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\StoreBrandRequest;
use App\Http\Requests\Backoffice\UpdateBrandRequest;
use App\Models\ProductBrand;

class BrandController extends Controller
{
    public function brandListView() {
        $brands = ProductBrand::all();
        return view('web.backoffice.pages.brand.layout', [
            'brands' => $brands
        ]);
    }

    public function updateBrandView(ProductBrand $brand) {
        return view('web.backoffice.pages.update-brand.layout', [
            'brand' => $brand
        ]);
    }

    public function updateBrand(UpdateBrandRequest $request, ProductBrand $brand) {
        $brand->updateBrand($request);
        return redirect()->route('admin.list.brand')->with('success', 'Brand behasil diperbarui!');
    }

    public function createBrand(StoreBrandRequest $request) {
        $brand = new ProductBrand;
        $brand->storeBrand($request);
        return redirect()->route('admin.list.brand')->with('success', 'Brand behasil ditambahkan!');
    }

    public function deleteBrand(ProductBrand $brand) {
        try {
            //code...
            $brand->delete();
            return redirect()->route('admin.list.brand')->with('success', 'Brand behasil dihapus!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.list.brand')->with('fail', 'Brand gagal dihapus! <b>brand masih dipakai oleh produk lain</b> atau terjadi kesalahan pada service');
        }
    }
}
