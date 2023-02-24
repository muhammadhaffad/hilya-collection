<?php

namespace App\Http\Livewire\Public\Components\Cart;

use App\Models\Cart;
use Livewire\Component;

class PriceTotal extends Component
{
    public $total;
    public $berat;

    protected $listeners = ['updateTotal'];

    public function render()
    {
        $this->total = Cart::where('user_id', auth()->user()->id)
            ->with('product_price')
            ->get()
            ->sum(function($q) {
                return $q->product_price->harga * $q->jumlahpesan;
            });
        $this->berat = Cart::where('user_id', auth()->user()->id)
            ->with('product_price.product')
            ->get()
            ->sum(function($q) {
                return $q->product_price->product->berat * $q->jumlahpesan;
            });
        return view('livewire.public.components.cart.price-total');
    }

    public function updateTotal() {
        
    }
}
