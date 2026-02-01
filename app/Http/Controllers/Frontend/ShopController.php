<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $products = Product::with('category')->get();
        return view('front.index', compact('categories','products'));
    }
}
