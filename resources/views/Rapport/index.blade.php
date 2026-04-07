<x-base-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        
        <h1 class="text-3xl font-bold text-gray-800 mb-8">📊 Rapportage</h1>

        <div class="bg-white shadow-md rounded-2xl p-6 space-y-4">
            
            <div class="grid grid-cols-2 gap-4 text-gray-700">
                <p><span class="font-semibold">Totaal:</span> {{ $totalLoans }}</p>
                <p><span class="font-semibold">Actief:</span> {{ $activeLoans }}</p>
                <p><span class="font-semibold">Teruggebracht:</span> {{ $returnedLoans }}</p>
                <p><span class="font-semibold">Te laat:</span> {{ $overdueLoans }}</p>
                <p><span class="font-semibold">Geweigerd:</span> {{ $rejectedLoans }}</p>
            </div>

            <div class="border-t pt-4">
                <p class="text-gray-800">
                    <span class="font-semibold">Meest geleend item:</span> 
                    {{ $mostLoanedItem->name ?? 'N/A' }}
                </p>
            </div>

            <div class="pt-6">
                <a href="{{ route('rapport.export') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-xl shadow transition">
                    Download rapport (CSV)
                </a>
            </div>

        </div>

    </div>
</x-base-layout>