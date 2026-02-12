<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHardwareRequest;
use App\Http\Requests\UpdateHardwareRequest;
use App\Models\Category;
use App\Models\Hardware_item;
use App\Models\hardware_items;
use Illuminate\Http\Request;

class HardwareItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $items = Hardware_item::all();

        $query = Hardware_item::query();

    if ($request->filled('category')) {
        $query->whereHas('category', function($q) use ($request) {
            $q->where('categories.id', $request->category);
        });
    }

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    $items = $query->get();

    return view('hardware_items.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('hardware_items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHardwareRequest $request)
    {
        $validatedData = $request->validated();
        Hardware_item::create($validatedData);
        return redirect()->route('hardware_items.index')->with('success', 'Hardware item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hardware_item $hardwareItem)
    {
        $categories = Category::all();
        $item = Hardware_item::findOrFail($hardwareItem->id);
        return view('hardware_items.show', compact('item', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hardware_item $hardware_item)
    {
        $items = Hardware_item::findorfail($hardware_item->id);
        return view('hardware_items.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHardwareRequest $request, Hardware_item $hardware_item)
    {
        $hardware_items = Hardware_item::findorfail($hardware_item->id);

        $validatedData = $request->validated();
        $hardware_items->update($validatedData);
        return redirect()->route('hardware_items.index')->with('success', 'Hardware item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hardware_item $hardware_item)
    {
        $hardware_item->delete();
        return redirect()->route('hardware_items.index')->with('success', 'Hardware item deleted successfully.');
    }
}
