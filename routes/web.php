<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Route::get('/locale/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'ru', 'sp'])) {
//         session(['locale' => $locale]);
//     }
//     return redirect()->back();
// });

Route::controller(ProductController::class)
->group(function() {
    Route::get('/', 'index')->name('products.index');
    Route::get('/locale/{locale}', 'language')->name('language')->where('locale', '[a-z]+');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/', 'store')->name('products.store');
    Route::get('/{product}', 'show')->name('products.show');
});