<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller
{
   public function index() {
    // Get cart items from session or DB
    return view('front.cart.index');
}

// public function add(Request $request, $productId) {
//     // Add to cart logic
// }

// public function remove($productId) {
//     // Remove from cart logic
// }

}
