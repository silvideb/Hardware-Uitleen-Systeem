<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHardwareRequest;
use App\Http\Requests\UpdateHardwareRequest;
use App\Models\hardware_items;
use Illuminate\Http\Request;

class HardwareItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $hardware_items = hardware_items::all();
        return view('hardware_items.index', compact('hardware_items'));
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
    public function show(hardware_items $hardware_items)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hardware_items $hardware_items)
    {
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHardwareRequest $request, hardware_items $hardware_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hardware_items $hardware_items)
    {
        //
    }
}
