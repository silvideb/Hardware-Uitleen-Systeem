<x-base-layout>
<div class="container mx-auto p-4">
    <div class="flex justify-between mb-4">
        <div>
            <h1 class="text-2xl font-bold">Hardware Items</h1>
        </div>
        
        <div>
            <a href="{{ route('hardware_items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Nieuw Item
            </a>
        </div>
    </div>

    @if($items->count())
        <div class="overflow-x-auto">
            <form action="{{ route('hardware_items.index') }}" method="GET" class="flex items-center gap-4 mb-4">
                <div class="flex max-w-lg w-full items-end gap-4">
                    <label for="category" class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                        Filter op categorie (categorie)
                    </label>
                    <select name="category" id="category" class="w-full border-gray-300 rounded-md text-sm focus:ring-blue-500">
                        <option value="">-- Alle opties --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex max-w-lg w-full items-end gap-4">
                    <label for="name" class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                        Filter op naam (name)
                    </label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md text-sm focus:ring-blue-500" value="{{ request('name') }}" placeholder="Zoek op naam">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md text-sm font-bold hover:bg-blue-700 transition">
                    Filteren
                </button>
            </form>

            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                        <th class="py-2 px-4 border-b">Naam</th>
                        <th class="py-2 px-4 border-b">Categorie</th>
                        <th class="py-2 px-4 border-b">Voorraad</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="hover:bg-gray-100"> 
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->category->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="inline-block px-2 py-1 text-white rounded {{ $item->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('hardware_items.show', $item) }}" class="bg-blue-300 text-white px-2 py-1 rounded">Bekijk</a>
                                <a href="{{ route('hardware_items.edit', $item) }}" class="bg-yellow-300 text-white px-2 py-1 rounded">Bewerk</a>
                                <form action="{{ route('hardware_items.destroy', $item) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-blue-100 text-blue-700 p-4 rounded">
            Geen hardware items beschikbaar.
        </div>
    @endif
</div>
</x-base-layout>
