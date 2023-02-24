<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartView() {
        $contact = Contact::first();
        $userId = auth()->user()->id;
        $carts = Cart::with('product_price.product.product_brand', 'user')->where('user_id', $userId)->get();
        return view('web.public.pages.cart.layout', [
            'contact' => $contact,
            'carts' => $carts
        ]);
    }
}
