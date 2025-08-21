<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
   public function index() {
    return view('front.wishlist.index');
}

// public function add($productId) {
//     // Add product to wishlist
// }

// public function remove($productId) {
//     // Remove product from wishlist
// }

}
