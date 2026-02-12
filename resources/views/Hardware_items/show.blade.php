<x-base-layout>
    <div class="container mx-auto px-4 py-20">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-12">
                <div class="flex justify-between items-start mb-8">
                    <h1 class="text-4xl font-bold text-gray-900">{{ $item->name }}</h1>
                    <span class="inline-block px-4 py-2 text-white rounded {{ $item->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ $item->status }}
                    </span>
                </div>

                <div class="space-y-6">
                    <p class="text-lg text-gray-700">
                        <strong>Prijs:</strong> {{ $item->price_in_euro }} €
                    </p>
                    <p class="text-lg text-gray-700">
                        <strong>Categorie:</strong> {{ $item->category->name }}
                    </p>
                    <p class="text-lg text-gray-700">
                        <strong>Voorraad:</strong> {{ $item->quantity }}
                    </p>
                    <p class="text-lg text-gray-700">
                        <strong>Beschrijving:</strong> {{ $item->description ?? 'Geen beschrijving beschikbaar.' }}
                    </p>
                </div>

                <a href="{{ route('hardware_items.index') }}" class="mt-10 inline-block bg-blue-600 text-white px-8 py-3 rounded-md text-base font-bold hover:bg-blue-700 transition">
                    Terug naar lijst
                </a>
            </div>
        </div>
    </div>










</x-base-layout>