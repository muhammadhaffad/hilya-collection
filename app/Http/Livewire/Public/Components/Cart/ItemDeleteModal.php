<?php

namespace App\Http\Livewire\Public\Components\Cart;

use App\Models\Cart;
use Livewire\Component;

class ItemDeleteModal extends Component
{
    public $cartId = -1;
    public $show = 0;

    protected $listeners = ['selectDeleteItem' => 'selectDeleteItem'];

    public function render()
    {
        return view('livewire.public.components.cart.item-delete-modal');
    }

    public function selectDeleteItem($cartId) {
        $this->show = 1;
        $this->cartId = $cartId;
    }

    public function deleteItem(Cart $cart) {
        $cart->delete();
        $this->show = 0;
        return redirect(request()->header('Referer'));
    }
}
