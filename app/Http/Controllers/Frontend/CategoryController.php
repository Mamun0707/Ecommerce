<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data= Page::where('slug','categories')->first();
        $categories = Category::all();
        return view('front.pages.categories', compact('categories', 'data'));
    }


}

