<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar Component -->
<x-navbar />

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Create New Category</h1>

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

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}" required>
            </div>

            <div class="mb-6">
                <label for="hex_color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                <div class="flex items-center">
                    <input type="color" name="hex_color" id="hex_color" class="h-10 w-10 rounded mr-2" value="{{ old('hex_color', '#3B82F6') }}">
                    <input type="text" id="hex_color_text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('hex_color', '#3B82F6') }}" readonly>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Create Category</button>
            </div>
        </form>
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
