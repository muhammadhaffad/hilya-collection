<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backoffice\BrandController as BackofficeBrandController;
use App\Http\Controllers\Backoffice\DashboardController as BackofficeDashboardController;
use App\Http\Controllers\Backoffice\ProductController as BackofficeProductController;
use App\Http\Controllers\Backoffice\SettingController as BackofficeSettingController;
use App\Http\Controllers\Public\BrandController;
use App\Http\Controllers\Public\CartController;
use App\Http\Controllers\Public\CheckoutController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\OrderController;
use App\Http\Controllers\Public\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/* use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
 */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function() {
    return view('web.auth.pages.login.layout');
});


Route::prefix('auth')->group(function() {
    Route::get('login', [LoginController::class, 'loginView'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::prefix('')->group(function() {
    Route::get('/', [HomeController::class, 'home'])->name('home.index');
    Route::post('/{product:slug}/order', [ProductController::class, 'orderProductViaWhatsapp'])->name('home.order-product');
    /* Route::get('/cart', [CartController::class, 'cartView'])->name('home.cart');
    Route::get('/checkout', [CheckoutController::class, 'checkoutView'])->name('home.checkout');
    Route::post('/storeCheckout', [CheckoutController::class, 'storeCheckout'])->name('home.store-checkout');
    Route::get('/order', [OrderController::class, 'orderView'])->name('home.order'); */
    Route::get('/products', [ProductController::class, 'getAllProducts'])->name('home.all-products');
    Route::get('/detail/{product:slug}', [ProductController::class, 'getProduct'])->name('home.detail');
    Route::get('/brand/{brand:slug}/products', [BrandController::class, 'getBrandProducts'])->name('home.brand-products');
    Route::get('/{status}/products', [ProductController::class, 'getProductsByStatus'])->name('home.type-products');
    Route::get('/search', [ProductController::class, 'searchProducts'])->name('home.search-products');
    Route::get('/storage/product-images/{path}', function($path) {
        return Storage::response('product-images/'.$path);
    });
    Route::get('/storage/brand-logos/{path}', function($path) {
        return Storage::response('brand-logos/'.$path);
    });
});

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/settings', [BackofficeSettingController::class, 'settingView'])->name('admin.settings');
    Route::post('/change/username', [BackofficeSettingController::class, 'updateUsername'])->name('admin.update.username');
    Route::post('/change/password', [BackofficeSettingController::class, 'updatePassword'])->name('admin.update.password');
    Route::post('/change/contact', [BackofficeSettingController::class, 'updateContact'])->name('admin.update.contact');

    Route::get('/dashboard', [BackofficeDashboardController::class, 'home'])->name('admin.dashboard');
    
    // list product
    Route::get('/list/product', [BackofficeProductController::class, 'index'])->name('admin.list.product');

    // create product
    Route::get('/add/product', [BackofficeProductController::class, 'storeProductView'])->name('admin.add.product');
    Route::post('/add/product', [BackofficeProductController::class, 'storeProduct'])->name('admin.add.product');
    
    // update product
    Route::get('/update/{product:slug}/product', [BackofficeProductController::class, 'updateProductView'])->name('admin.update.product');
    Route::post('/update/{product:slug}/product', [BackofficeProductController::class, 'updateProduct'])->name('admin.update.product');
        
    // delete product
    Route::post('/delete/{product:slug}/product', [BackofficeProductController::class, 'deleteProduct'])->name('admin.delete.product');
    
    // list brand
    Route::get('/list/brand', [BackofficeBrandController::class, 'brandListView'])->name('admin.list.brand');

    // create brand
    Route::post('/add/brand', [BackofficeBrandController::class, 'createBrand'])->name('admin.add.brand');

    // update brand
    Route::get('/update/{brand:slug}/brand', [BackofficeBrandController::class, 'updateBrandView'])->name('admin.update.brand');
    Route::post('/update/{brand:slug}/brand', [BackofficeBrandController::class, 'updateBrand'])->name('admin.update.brand');

    // delete brand
    Route::post('/delete/{brand:slug}/brand', [BackofficeBrandController::class, 'deleteBrand'])->name('admin.delete.brand');

    Route::get('/add/color', [BackofficeProductController::class, 'storeColor']);
    Route::get('/colors', [BackofficeProductController::class, 'getColors']);
});