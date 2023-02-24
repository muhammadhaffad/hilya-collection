<?php

namespace App\Http\Livewire\Backoffice\Pages\Product;

use App\Models\ProductBrand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    public $search = '';
    public $brand = '';
    public $status = 'Semua produk';
    public $orderBy = 'created_at';
    public $desc = true;

    public function render()
    {
        /* $products = Product::with('product_prices', 'product_images')->withSum('product_prices as totalStock', 'jumlah')
            ->orWhere('nama', 'like', "%{$this->search}%");
        if (!empty($this->brand)) {
            $products = $products->where('brand_id', '=', $this->brand);
        }
        if (!empty($this->status)) {
            $products = $products->where('status', '=', $this->jenis);
        }
        if (!empty($this->orderBy)) {
            $products = $products->orderBy($this->orderBy, $this->desc ? 'desc' : 'asc');
        } */

        $products = Product::with('product_images', 'product_prices')
                    ->join('product_brands', [['products.product_brand_id', 'product_brands.id']])
                    ->select('products.*','product_brands.nama as nama_brand', 'product_brands.slug as slug_brand')
                    ->where( function ($q) {
                        $q->where('product_brands.nama', 'like', "%{$this->search}%")
                        ->orWhere('products.nama', 'like', "%{$this->search}%");
                    });
        
        if (in_array($this->status, array('Promo', 'Preorder'))) {
            $products = $products->where('status', '=', strtolower($this->status));
        }

        return view('livewire.backoffice.pages.product.product-list', [
            'products' => $products->paginate(20),
            'brands' => ProductBrand::all(),
            'status' => array('Normal', 'Promo', 'Preorder')
        ]);
    }
}
