<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function product_brand()
    {
        return $this->belongsTo(ProductBrand::class);
    }


    public function product_prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function storeProduct($request)
    {
        $product_id = $this->create($request->validated())->id;
        $stocks = $request->stock;
        $gambar = $request->file('gambar');
        $stockDatas = [];
        $imageDatas = [];
        foreach ($stocks as $stock) {
            if (($stock['jumlah'] > 0 || $stock['harga'] > 0) && isset($stock['warna'])) {
                if ($request->diskon && $request->status == 'promo')
                    $stock['diskon'] = $request->diskon;
                else
                    $stock['diskon'] = 0;
                $stockDatas[] = $stock;
            }
        }
        foreach ($gambar as $item) {
            $imageDatas[] = [
                'gambar' => $item->store('product-images'),
            ];
        }
        $product = $this->find($product_id);
        $product->product_prices()->createMany($stockDatas);
        $product->product_images()->createMany($imageDatas);
    }

    public function updateProduct($request)
    {
        // update product
        $this->nama = $request->nama;
        $this->product_brand_id = $request->product_brand_id;
        $this->status = $request->status;
        $this->kategori = $request->kategori;
        $this->deskripsi = $request->deskripsi;
        $this->save();

        // update stocks
        $stockDatas = [];
        $oldStockDatas = $this->product_prices();
        foreach ($request->stock as $stock) {
            if ($stock['jumlah'] > 0 || $stock['harga'] > 0) {
                $stockDatas[] = $stock;
            }
        }
        $stockDatas = collect($stockDatas);
        $deletingStock = $oldStockDatas->whereNotIn('id', $stockDatas->pluck('id'));
        $deletingStock->delete();
        foreach ($stockDatas as $stock) {
            $this->product_prices()->updateOrCreate(
                [
                    'id' => $stock['id']
                ],
                [
                    'ukuran' => $stock['ukuran'],
                    'jumlah' => $stock['jumlah'],
                    'harga' => $stock['harga'],
                    'jenis' => $stock['jenis'],
                    'warna' => $stock['warna'],
                    'diskon' => $request->diskon
                ]
            );
        }
        
        // update images
        $x = $this->load('product_images');
        $keyOldImages = $x->product_images->keys();
        $keyNewImages = collect($request->file('gambar'))->keys();
        if (sizeof($keyOldImages) <= 1 && sizeof($keyNewImages) == 0)
            return;
        for ($i = 0; $i < 10; $i++) {
            if ($request->remove[$i] == 'deleted' && $keyOldImages->contains($i)) {
                if (!isset($keyNewImages[$i])) {
                    $x->product_images->where('gambar', $x->product_images[$i]->gambar)->first()->delete();
                    Storage::delete($x->product_images[$i]->gambar);
                    echo "hapus[$i]<br>";
                    continue;
                }
                if ($keyOldImages[$i] == $keyNewImages[$i]) {
                    $x->product_images->where('gambar', $x->product_images[$i]->gambar)->first()
                        ->update(['gambar' => $request->file('gambar')[$i]->store('product-images')]);
                    echo "ubah[$i]<br>";
                    continue;
                }
            } else {
                if ($keyNewImages->contains($i)) {
                    $x->product_images()->create([
                        'gambar' => $request->file('gambar')[$i]->store('product-images')
                    ]);
                    echo "tambah[$i]<br>";
                }
            }
        }
    }

    public function deleteProduct() {
        $this->product_images()->delete();
        $this->product_prices()->delete();
        $this->delete();
    }
}
