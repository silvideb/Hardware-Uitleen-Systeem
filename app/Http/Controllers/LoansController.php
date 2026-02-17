<?php

namespace App\Http\Controllers;

use App\Models\Hardware_item;
use App\Models\Loan;
use App\Models\loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $loans_items = Loan::with('hardware_items')->get();
        $items = Hardware_item::all();
        $loans = Loan::all();
        return view('loans.index', compact('loans', 'items'));
     
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index');
    }
}
