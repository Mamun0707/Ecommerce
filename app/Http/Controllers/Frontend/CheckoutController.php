<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
   public function index() {
    return view('front.checkout.index');
}

// public function process(Request $request) {
//     // Validate, create order, clear cart
// }

}
