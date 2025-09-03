<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'is_available' => 'nullable|boolean',
            'price' => 'required|numeric|min:0',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,webp,avif|max:2048';
        }
        $validatedData = $request->validate($rules);
        $validatedData['is_available'] = $request->boolean('is_available');

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image_url'] = $imagePath;
        }

        $product = Product::create($validatedData);

        if($request->has('categories')){
            $product->categories()->attach($request->input('categories'));
        }


        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        //Оптимизация запросов?
        $productCategories = $product->categories->pluck('id')->toArray();
        return view('admin.products.edit', compact('product', 'categories', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'is_available' => 'nullable|boolean',
            'price' => 'required|numeric|min:0',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,webp,avif|max:2048';
        }
        $validatedData = $request->validate($rules);

        $product = Product::findOrFail($product->id);
        $validatedData['is_available'] = $request->boolean('is_available');
        if($request->hasFile('image')){
            // delete old if exists
            if(!empty($product->image_url)){
                Storage::disk('public')->delete($product->image_url);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image_url'] = $imagePath;
        }

        $product->update($validatedData);

            // Синхронизируем категории
        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        if(!empty($product->image_url)){
            Storage::disk('public')->delete($product->image_url);
        }
        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно удален');
    }
}
