<x-base-layout>

<h1 class="text-3xl font-bold text-gray-900">{{ $item->name }}</h1>
<p class="mt-4 text-gray-700"><strong>Categorie:</strong> {{ $item->category->name }}</p>
 <p class="mt-2 text-gray-700"><strong>Voorraad:</strong> {{ $item->quantity }}</p>
 <p class="mt-2 text-gray-700"><strong>Status:</strong> 
 <span class="inline-block px-2 py-1 text-white rounded {{ $item->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
 {{ $item->status }} </span> </p> <a href="{{ route('hardware_items.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-md text-sm font-bold hover:bg-blue-700 transition"> Terug naar lijst </a>










</x-base-layout>