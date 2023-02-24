<?php

namespace App\Http\Livewire\Public\Components\Cart;

use App\Models\Cart;
use App\Models\ProductImage;
use Livewire\Component;

class CartItem extends Component
{
    public $cartItem;
    public $deleteItemId = -1;
    
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        $gambar = ProductImage::where('product_id', $this->cartItem->product_price->product->id)->first();
        return view('livewire.public.components.cart.cart-item', ['cartItem' => $this->cartItem, 'gambar' => $gambar]);
    }

    public function mount() {
        $this->dipesan = $this->cartItem->jumlahpesan;
        $this->subtotal = $this->cartItem->jumlahpesan*$this->cartItem->product_price->harga;
    }

    public function decrement($cartId) {
        $cart = Cart::find($cartId);
        if ($cart->jumlahpesan - 1 > 0) {
            $cart->jumlahpesan = $cart->jumlahpesan - 1;
            $cart->save();
            $this->emit('refreshComponent');
            $this->emit('updateTotal');
        }
    }

    public function increment($cartId) {
        $cart = Cart::find($cartId);
        if ($cart->jumlahpesan + 1 <= $cart->product_price->jumlah) {
            $cart->jumlahpesan = $cart->jumlahpesan + 1;
            $cart->save();
            $this->emit('refreshComponent');
            $this->emit('updateTotal');    
        }
    }
}
