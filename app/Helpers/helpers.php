<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

if (!function_exists('get_settings')) {
    function get_settings()
    {
        return Cache::remember('site_settings', 60 * 60, function () {
            return DB::table('settings')->first();
        });
    }


    if (!function_exists('get_categoriesList')) {
    function get_categoriesList()
    {
        return Cache::remember('categories_list', 60 * 60, function () {
            return Category::where('status', 1)->orderBy('en_category_name', 'ASC')->limit(6)->get();
        });
    }
}
}
