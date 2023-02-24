<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_kodecheckout',
        'product_price_id',
        'jumlahpesan'
    ];

    public function storeCheckoutProducts($data = null, $requests = null) {
        if ($requests !== null) {
            $this->insert($requests->validated());
            return;
        }
        $this->insert($data);
    }

    public function checkout() {
        return $this->belongsTo(Checkout::class, 'checkout_kodecheckout', 'kodecheckout');
    }
}
