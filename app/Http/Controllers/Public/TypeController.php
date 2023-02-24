<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getCategoryProducts(Type $type)
    {
        $brands = Brand::all();
        $typeProducts = $type->products()->with(['stocks','brand','images'])->paginate(20);
        // return $typeProducts;
        return view('web.public.pages.category-products.layout', ['brands' => $brands, 'type' => $type, 'typeProducts' => $typeProducts]);
    }
}
