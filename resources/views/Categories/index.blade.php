<x-base-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between mb-4">
            <div>
                <h1 class="text-2xl font-bold">Categories</h1>
            </div>

            <div>
                <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Nieuwe Categorie
                </a>
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-200">
                <thead>
                        <th class="py-2 px-4 border-b">Naam</th> 
                        <th class="py-2 px-4 border-b">Aantal items</th>
                        <th class="py-2 px-4 border-b">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="hover:bg-gray-100"> 
                            <td class="py-2 px-4 border-b">{{$category->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $category->hardwareItems()->count() }}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('categories.show', $category) }}" class="bg-blue-300 text-white px-2 py-1 rounded">Bekijk</a>
                                    <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-300 text-white px-2 py-1 rounded">Bewerk</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
</x-base-layout>