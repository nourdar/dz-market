<?php

use GuzzleHttp\Client;
use App\Models\Delivery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlgeriaCities;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DeliveryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ShopController::class, 'index']);
Route::get('/brand/{id}', [ShopController::class, 'show_brand']);
Route::get('/category/{id}', [ShopController::class, 'show_category']);
Route::get('/product/{id}', [ShopController::class, 'show_product'])->name('product.show');
Route::get('/all-categories', [ShopController::class, 'get_all_categories'])->name('categories.show');
Route::get('/all-brands', [ShopController::class, 'get_all_brands'])->name('brands.show');
Route::get('/all-products', [ShopController::class, 'get_all_products'])->name('products.show');
Route::get('/wilayas', [AlgeriaCities::class, 'get_all_wilayas']);
Route::get('/communs/{wilayaCode}', [AlgeriaCities::class, 'get_all_communs']);
Route::get('/yalidine-delivery-fees/{wilaya}', [DeliveryController::class, 'get_yalididne_delivery_fees']);

Route::post('/place-order', [ShopController::class, 'place_order']);

Route::post('search', [ShopController::class, 'search'])->name('search');


Route::get('/optimize', function(){

    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');

    dd(Artisan::output());
});


Route::get('/link-storage', function(){
    Artisan::call('storage:link');
});
