<?php

namespace App\Http\Livewire\Public\Pages\DetailProduct\Sections;

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
        $products = Product::with('stocks', 'images')->latest();
        $count = $products->count()-$this->limit > $this->limit ? $this->limit : $products->count()-$this->limit;
        
        return view('livewire.public.pages.detail-product.sections.products', ['products'=>$products->paginate($this->limit), 'count'=>$count]);
    }

    public function prodData()
    {
        if ($this->limit <= 50) {
            $this->limit += $this->limit;
        }
    }

}
