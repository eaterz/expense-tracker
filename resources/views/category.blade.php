<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories & Expenses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar Component -->
<x-navbar />

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Categories</h1>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($category as $cat)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-4 py-3 flex items-center">
                    <!-- Simple color circle indicator -->
                    <div class="w-6 h-6 rounded-full mr-3" style="background-color: {{ $cat->hex_color }}"></div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $cat->name }}</h2>
                </div>


                <div class="p-4">
                    <!-- Only show expenses list -->
                    @if($cat->expenses->count() > 0)
                        <ul class="space-y-2 max-h-64 overflow-y-auto">
                            @foreach($cat->expenses->sortByDesc('date') as $expense)
                                <li class="bg-gray-50 p-3 rounded flex justify-between items-center">
                                    <div>
                                        <p class="text-gray-800">{{ $expense->notes }}</p>
                                        <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($expense->spent_at)->format('M d, Y H:i:s') }}</p>
                                    </div>
                                    <span class="font-medium text-gray-700">${{ number_format($expense->amount, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic text-center py-4">No expenses in this category</p>
                    @endif
                </div>

                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200">
                    <!-- Edit Category button -->
                    <a href="{{ route('categories.edit', $cat) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-sm">
                        Edit Category
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center py-2">
        <a href="{{ route('categories.create') }}" class="mt-4 inline-block px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
            Create Category
        </a>
    </div>
</div>

</body>
</html>
