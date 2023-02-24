<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'slug',
        'nama',
        'image'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public static function search($search) {
        return empty($search) ? static::query() : 
            static::query()->where('nama', 'like', '%'.$search.'%');
    }

    public function storeBrand($request) {
        $this->nama = $request->nama;
        $this->image = $request->file('image')->store('brand-images');
        $this->save();
    }

    public function updateBrand($request) {
        $this->nama = $request->nama;
        if ($request->file('image')) {
            $this->image = $request->file('image')->store('brand-images');
        }
        $this->save();
    }
}
