<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('children')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|integer',
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,webp,avif|max:2048';
        }
        $validatedData = $request->validate($rules);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('categories', 'public');
            $validatedData['image_url'] = $imagePath;
        }

        Category::create($validatedData);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Категория успешно добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::with('children')->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|integer',
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,webp,avif|max:2048';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')){
            if(!empty($category->image_url)){
                Storage::disk('public')->delete($category->image_url);
            }

            $imagePath = $request->file('image')->store('categories', 'public');
            $validatedData['image_url'] = $imagePath;
        }

        $category->update($validatedData);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Категория успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image_url){
            Storage::disk('public')->delete($category->image_url);
        }
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Категория успешно удалена');
    }
}
