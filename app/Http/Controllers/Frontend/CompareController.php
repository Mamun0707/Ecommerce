<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CompareController extends Controller
{
  public function index() {
    return view('front.compare.index');
}

// public function add($productId) {
//     // Add product to compare list
// }

// public function remove($productId) {
//     // Remove product from compare list
// }

}
