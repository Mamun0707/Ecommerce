<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller {

        public function index() {
        return view('front.cart.index');
    }
        public function addToCart(Request $request) {
            $product_id = $request->input('product_id');
            $quantity = (int) $request->input('quantity', 1);

            $product = Product::find($product_id);
            if (! $product) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Product not found!'
                ]);
            }

            $cart = session()->get('cart', []);

            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] += $quantity;
            } else {
                $cart[$product_id] = [
                    'id'              => $product->id,
                    'name'            => $product->en_name,
                    'regularPrice'    => (float) $product->price,
                    'discountedPrice' => $product->discounted_price ? (float) $product->discounted_price : null,
                    'image'           => $product->thumb ?? null,
                    'quantity'        => $quantity,
                ];
            }

            session()->put('cart', $cart);

            $cartCount = collect($cart)->sum('quantity');

            $totalPriceRaw = collect($cart)->sum(function ($item) {
                $price = (isset($item['discountedPrice']) && $item['discountedPrice'] > 0)
                    ? $item['discountedPrice']
                    : $item['regularPrice'];
                return $price * $item['quantity'];
            });

            return response()->json([
                'status'         => 'success',
                'cart_count'     => $cartCount,
                'total_price'    => number_format($totalPriceRaw, 2), // formatted for display
                'total_price_raw'=> $totalPriceRaw,                  // raw numeric for JS use
                'cart'           => $cart,                           // optional
            ]);
        }

}
