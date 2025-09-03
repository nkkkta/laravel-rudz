<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        $root_categories = Category::whereNull('parent_id')->get();

        return view('home', compact('products', 'root_categories'));

    }
}
