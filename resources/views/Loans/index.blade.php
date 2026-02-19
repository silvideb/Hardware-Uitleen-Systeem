<x-base-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between mb-4">
            <div>
                <h1 class="text-2xl font-bold">Leningen</h1>
            </div>

            <div>
                <a href="{{ route('loans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Nieuwe Lening
                </a>
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-200">
                <thead>
                        <th class="py-2 px-4 border-b">Loan Id</th> 
                        <th class="py-2 px-4 border-b">Gebruiker</th> 
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                        <tr class="hover:bg-gray-100"> 

                            <td class="py-2 px-4 border-b">{{$loan->id}}</td>
                            <td class="py-2 px-4 border-b">{{$loan->user->name }}</td>
                            <td class="py-2 px-4 border-b">{{$loan->status }}</td>
                            
                           
                            <td class="py-2 px-4 border-b">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('loans.show', $loan) }}" class="bg-blue-300 text-white px-2 py-1 rounded">Bekijk</a>
                                    <a href="{{ route('loans.edit', $loan) }}" class="bg-yellow-300 text-white px-2 py-1 rounded">Bewerk</a>
                                    <form action="{{ route('loans.destroy', $loan) }}" method="POST" style="display:inline;">
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