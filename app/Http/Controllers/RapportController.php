<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Hardware_item;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RapportController extends Controller
{
    

public function index()
{
    $totalLoans = Loan::count();

    $activeLoans = Loan::where('status', 'active')->count();
    $returnedLoans = Loan::where('status', 'returned')->count();
    $overdueLoans = Loan::where('status', 'overdue')->count();
    $rejectedLoans = Loan::where('status', 'rejected')->count();

    $mostLoanedItem = Hardware_item::withCount('loans')
        ->orderBy('loans_count', 'desc')
        ->first();

    return view('rapport.index', compact(
        'totalLoans',
        'activeLoans',
        'returnedLoans',
        'overdueLoans',
        'rejectedLoans',
        'mostLoanedItem'
    ));
}
public function export(): StreamedResponse
{
    $fileName = 'uitleenhistorie.csv';

    $loans = Loan::with(['user', 'hardwareItem'])->get();

    $headers = [
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
    ];

    $callback = function () use ($loans) {
        $file = fopen('php://output', 'w');

        // CSV headers
        fputcsv($file, [
            'Gebruiker',
            'Item',
            'Status',
            'Datum'
        ]);

        foreach ($loans as $loan) {
            fputcsv($file, [
                $loan->user->name ?? 'N/A',
                $loan->item->name ?? 'N/A',
                $loan->status,
                $loan->created_at
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}
