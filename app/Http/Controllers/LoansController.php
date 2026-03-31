<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Requests\UpdateLoansRequest;
use App\Models\Hardware_item;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $loans_items = Loan::all();
        $items = Hardware_item::all();
        $loans = Loan::all();

        // 1. Controleer of de gebruiker een admin is
    if (auth()->user()->is_admin) {
        // Admin ziet alles
        $loans = Loan::with('user')->get();
    } else {
        // Normale gebruiker ziet alleen eigen leningen
        $loans = auth()->user()->loans()->with('user')->get();
        
        // Alternatieve methode als de relatie niet in je User model staat:
        // $loans = Loan::where('user_id', auth()->id())->with('user')->get();
    }
        return view('loans.index', compact('loans', 'items'));
    }

    /**
     * Display pending loans (admin only).
     */
    public function pendingLoans()
    {
        $loans = Loan::where('status', 'pending')->get();
        $items = Hardware_item::all();
        return view('loans.pending', compact('loans', 'items'));
    }

    /**
     * Accept a loan and change status to active.
     */
    public function accepteert(Loan $loan)
    {
        $loan->update(['status' => 'active']);
        return redirect()->route('loans.index')->with('success', 'Lening geaccepteerd!');
    }

    /**
     * Show form to reject a loan.
     */
    public function rejectForm(Loan $loan)
    {
        return view('loans.reject', compact('loan'));
    }

    /**
     * Reject a loan with reason.
     */
    public function reject(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'reject_reason' => 'required|string|max:1000',
        ]);

        $loan->update([
            'status' => 'rejected',
            'reject_reason' => $validated['reject_reason'],
        ]);

        return redirect()->route('loans.pending')->with('success', 'Lening afgewezen!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Hardware_item::all();
        return view('loans.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $storeLoanRequest)
    {
        $validatedData = $storeLoanRequest->validated();
        Loan::create(
            
            array_merge($validatedData, ['status' => 'pending'])
        
        );



        return redirect()->route('loans.index')->with('success', 'Lening is aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
    
        $items = Hardware_item::all();
        return view('loans.show', compact('loan', 'items')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
         $users = User::all();
         $Loans = Loan::find($loan->id);
         $hardwareItems = Hardware_item::all();
        return view('loans.edit', compact('loan', 'users' , 'hardwareItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoansRequest $updateLoanRequest, Loan $loan)
    {
        $validatedData = $updateLoanRequest->validated();
        $loan->update($validatedData);
        return redirect()->route('loans.index')->with('success', 'Lening geüpdatet!');
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
