<x-base-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Category</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
        <div class="min-h-screen flex items-center justify-center py-12 px-4">
            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
                <h1 class="text-3xl font-bold mb-6 text-gray-900">Edit Category</h1>
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $category->name }}" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex gap-3 mt-6">
                        <button type="submit" class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Category</button>
                        <a href="{{ route('categories.index') }}" class="flex-1 bg-gray-400 text-white py-2 px-4 rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 text-center">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
</x-base-layout>