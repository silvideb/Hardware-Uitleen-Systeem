<x-base-layout>
    <div class="container mx-auto px-4 py-20">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-12">
                <div class="flex justify-between items-start mb-8">
                    <h1 class="text-4xl font-bold text-gray-900">{{ $category->name }}</h1>
                  <td></td>
                    </span>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Items in deze categorie:</h2>
                    @if($items->count() > 0)
                        <ul class="list-disc pl-5 space-y-2">
                            @foreach($items as $item)
                                <li class="text-gray-700">{{ $item->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">Geen items in deze categorie.</p>
                    @endif
                </div>

                <a href="{{ route('hardware_items.index') }}" class="mt-10 inline-block bg-blue-600 text-white px-8 py-3 rounded-md text-base font-bold hover:bg-blue-700 transition">
                    Terug naar lijst
                </a>
            </div>
        </div>
    </div>










</x-base-layout>