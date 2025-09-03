<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $models = [
            'Категории' => [
                'name' => 'Категории',
                'route' => 'admin.categories.index',
                'model' => Category::class,
            ],
            'Товары' => [
                'name' => 'Товары',
                'route' => 'admin.products.index',
                'model' => Product::class,
            ]
        
        ];
        return view('admin.dashboard', ['models' => $models]);
    }
}
