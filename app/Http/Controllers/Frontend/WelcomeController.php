<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;


class WelcomeController extends Controller
{
    public function index() {
        $categories = Category::where('status', 1)->limit(6)->orderBy('en_category_name', 'ASC')->get();
        $sliders = DB::table('sliders')->where('status', 1)->get();
        $testimonials = DB::table('testimonials')->where('status', 1)->get();
        $products = Product::where('status', 1)->latest()->take(4)->get();

        $data['featured'] = Product::where('status', 1)->where('is_featured', 1)->latest()->take(4)->get();
        $data['onsale'] = Product::where('status', 1)->where('is_onsale', 1)->latest()->take(4)->get();
        $data['bestselling'] = Product::where('status', 1)->where('is_best_selling', 1)->latest()->take(4)->get();
        $data['newarrival'] = Product::where('status', 1)->where('is_new_arrival', 1)->latest()->take(4)->get();

        return view('welcome', compact('sliders','testimonials', 'categories','products','data'));
    }
}
