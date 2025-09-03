<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show a list of all of the products.
     */
    public function index(): View
    {
        
        $products = Product::with('categories')->get();

        return view("product", ['products' => $products]);
    }
}
