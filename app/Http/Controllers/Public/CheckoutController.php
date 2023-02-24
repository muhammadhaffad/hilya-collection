<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use App\Models\Contact;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutView() {
        $contact = Contact::first();
        return view('web.public.pages.checkout.layout', ['contact' => $contact]);
    }

    public function storeCheckout() {
        $checkout = new Checkout;
        $checkoutProducts = new CheckoutProduct;
        $carts = Cart::where('user_id', auth()->user()->id);
        $kode = date('Y-m-d') . '/' . strtoupper(substr(sha1(now()), 0, 6));
        $checkout_products = $carts->get(['product_price_id', 'jumlahpesan']);
        $checkout_products = $checkout_products->map(function($data) use ($kode) {
            $data->checkout_kodecheckout = $kode;
            return $data;
        });
        $hargatotal = $carts->with('product_price.product')->get()->sum(function ($q) {
            return $q->product_price->harga * $q->jumlahpesan;
        });
        $berattotal = $carts->with('product_price.product')->get()->sum(function ($q) {
            return $q->product_price->product->berat * $q->jumlahpesan;
        });
        $ongkir = -1;
        $checkoutData = [
            'user_id' => auth()->user()->id,
            'kodecheckout' => $kode,
            'hargatotal' => $hargatotal,
            'berattotal' => $berattotal,
            'ongkir' => $ongkir
        ];
        $checkout->storeCheckout($checkoutData);
        $checkoutProducts->storeCheckoutProducts($checkout_products->toArray());
        return response([$checkout_products->toArray()]);
    }
}
