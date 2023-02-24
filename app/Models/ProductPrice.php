<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ukuran',
        'jumlah',
        'harga',
        'jenis',
        'color_id',
        'diskon'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function color() {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
}
