<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\CategoryController;


// frontend routes
Route::get('/', [WelcomeController::class, 'index']);

//common pages routes
Route::get('/about-us', [PagesController::class, 'about'])->name('about.us');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact.us');
Route::post('/contact-us', [PagesController::class, 'storeContact'])->name('contact.store');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('/categories', [CategoryController::class, 'index'])->name('category.all');
Route::get('/terms-condition', [PagesController::class, 'terms'])->name('terms.conditions');
Route::get('/privacy-policy', [PagesController::class, 'privacy'])->name('privacy.policy');

// Product
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{slug}', [ProductController::class, 'productDetails'])->name('product.details');


// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

// Subscription
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
// Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
// Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// Compare
Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
// Route::post('/compare/add/{id}', [CompareController::class, 'add'])->name('compare.add');
// Route::delete('/compare/remove/{id}', [CompareController::class, 'remove'])->name('compare.remove');


