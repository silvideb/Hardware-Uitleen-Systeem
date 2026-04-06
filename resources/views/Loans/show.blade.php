<x-base-layout>
    <div class="container mx-auto px-4 py-20">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-12">
                <div class="flex justify-between items-start mb-8">

                    <h1 class="text-4xl font-bold text-gray-900">loan id:{{ $loan->id }}</h1>
                <td>
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Details</h2>
                    <p class="text-gray-700 mb-2"><strong>Geleend door:</strong> {{ $loan->user->name }}</p>
                    <p class="text-gray-700 mb-2"><strong>Startdatum:</strong> {{ $loan->start_date->format('d-m-Y') }}</p>
                    <p class="text-gray-700 mb-2"><strong>Vervaldatum:</strong> {{ $loan->due_date->format('d-m-Y') }}</p>
                    <p class="text-gray-700 mb-2"><strong>Status:</strong> 
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $loan->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($loan->status) }}
                        </span>
                    <p class="text-gray-700 mb-2"><strong>Geleende items:</strong> <a href="{{ route('hardware_items.show', $loan->hardwareItem->id) }}" class="text-blue-600 hover:text-blue-800 hover:underline">{{ $loan->hardwareItem->name }}</a></p>
                    </p>
                </div>

                <a href="{{ route('loans.index') }}" class="mt-10 inline-block bg-blue-600 text-white px-8 py-3 rounded-md text-base font-bold hover:bg-blue-700 transition">
                    Terug naar lijst
                </a>
            </div>
        </div>
    </div>
</td>









</x-base-layout>