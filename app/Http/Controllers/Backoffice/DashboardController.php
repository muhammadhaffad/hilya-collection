<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductBrand;

class DashboardController extends Controller
{
    public function home() {
        $totalStock = Product::count();
        $totalBrand = ProductBrand::count();
        return view('web.backoffice.pages.dashboard.layout', [
            'totalStock' => $totalStock,
            'totalBrand' => $totalBrand
        ]);
    }
}
