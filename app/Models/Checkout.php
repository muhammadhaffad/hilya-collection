<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kodecheckout',
        'hargatotal',
        'berattotal',
        'ongkir'
    ];

    public function storeCheckout($data = null, $requests = null) {
        if ($requests !== null) {
            $this->create($requests->validated());
            return;
        }
        $this->create($data);
    }

    public function checkout_information() {
        return $this->hasOne(CheckoutInformation::class, 'checkout_kodecheckout', 'kodecheckout');
    }

    public function checkout_products() {
        return $this->hasMany(CheckoutProduct::class, 'checkout_kodecheckout', 'kodecheckout');
    }
}
