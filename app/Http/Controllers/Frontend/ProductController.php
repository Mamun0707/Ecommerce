<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Page;


use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index() {
    $categories = Category::where('status', 1)->get();
    $brands = Brand::where('status', 1)->get();
    $products = Product::where('status', 1)->paginate(12);
    $data= Page::where('slug','shop')->first();
    return view('front.products.index', compact('categories','brands','products','data'));
}

public function productDetails($slug) {
    $product = Product::where('slug', $slug)->where('status', 1)->first();
    $relatedProducts = Product::where('category_id',$product->category_id)
                                ->where('id','!=',$product->id)
                                ->where('status', 1)
                                ->latest()->take(4)->get();
    $productImages = DB::table('galleries')->where('product_id', $product->id)->get();
    return view('front.products.details', compact('product','relatedProducts','productImages'));
}

// public function show($id) {
//     $product = Product::findOrFail($id);
//     return view('products.show', compact('product'));
// }

}
