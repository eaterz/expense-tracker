<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar Component -->
<x-navbar />

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Category</h1>

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden p-6">
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="mb-6">
                <label for="hex_color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                <div class="flex items-center">
                    <input type="color" name="hex_color" id="hex_color" class="h-10 w-10 rounded mr-2" value="{{ old('hex_color', $category->hex_color) }}">
                    <input type="text" id="hex_color_text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('hex_color', $category->hex_color) }}" readonly>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</a>
                <div>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Category</button>
                </div>
            </div>
        </form>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete Category</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Update text input when color picker changes
    document.getElementById('hex_color').addEventListener('input', function() {
        document.getElementById('hex_color_text').value = this.value;
    });
</script>

</body>
</html>
