<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\category;
use App\Models\Hardware_item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Hardware_item::all();
        $categories = category::all();
        return view('categories.index', compact('categories', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        $items = Hardware_item::where('category_id', $category->id)->get();
        $category = category::find($category->id);
        return view('categories.show', compact('category', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        $items = Hardware_item::where('category_id', $category->id)->get();
        $category = category::find($category->id);
        return view('categories.edit', compact('category', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $category = category::findorfail($category->id);

        $validatedData = $request->validated();
        $category->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
         $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
