<x-base-layout>
<h1>Rapportage</h1>

<p>Totaal: {{ $totalLoans }}</p>
<p>Actief: {{ $activeLoans }}</p>
<p>Teruggebracht: {{ $returnedLoans }}</p>
<p>Te laat: {{ $overdueLoans }}</p>
<p>Geweigerd: {{ $rejectedLoans }}</p>

<p>Meest geleend item: {{ $mostLoanedItem->name ?? 'N/A' }}</p>


    Download CSV
    <a href="{{ route('rapport.export') }}" class="btn btn-primary">
    Download rapport (CSV)
</a>
</a>
</x-base-layout>