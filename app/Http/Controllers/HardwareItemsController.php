<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHardwareRequest;
use App\Http\Requests\UpdateHardwareRequest;
use App\Models\Category;
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
        $items = hardware_items::all();

        $query = hardware_items::query();

        if ($request->filled('category')) {
        $query->whereHas('category', function($q) use ($request) {
            $q->where('categories.id', $request->category);
        });
        
    }

        $items = $query->get();

        return view('hardware_items.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHardwareRequest $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(hardware_items $hardwareItem)
    {
        $categories = Category::all();
        $item = hardware_items::findOrFail($hardwareItem->id);
        return view('hardware_items.show', compact('item', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hardware_items $hardware_items)
    {
             $items = hardware_items::findorfail($hardware_items->id);
        return view('hardware_items.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHardwareRequest $request, hardware_items $hardware_items)
    {
        $hardware_items = hardware_items::findorfail($hardware_items->id);

        $validatedData = $request->validated();
        $hardware_items->update($validatedData);
        return redirect()->route('hardware_items.index')->with('success', 'Hardware item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hardware_items $hardware_items)
    {
        //
    }
}
