<?php

namespace App\Http\Livewire\Public\Pages\Home\Sections;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $limit = 10;

    protected $listeners = [
        'prod-data' => 'prodData'
    ];
    
    public function render()
    {
        $limit = 10;
        $products = Product::with('product_prices', 'product_images', 'product_brand')->whereHas('product_prices', fn($q) => $q->where('jumlah', '>', 0))->where('status', '!=', 'preorder')->latest();
        $productTotal = $products->count();
        
        return view('livewire.public.pages.home.sections.products', [
            'products' => $products->paginate($this->limit), 
            'limit' => $limit, 
            'total' => $this->limit, 
            'productTotal' => $productTotal]);
    }

    public function prodData()
    {
        $this->limit += 10;
        // if ($this->limit < 2) {
        // }
    }

}
