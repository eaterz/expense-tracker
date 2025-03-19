<nav class="bg-blue-600 p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-xl font-bold">MyApp</a>
        <ul class="flex space-x-4">
            <li><a href="{{ url('/') }}" class="text-white hover:text-gray-200">Welcome</a></li>
            <li><a href="{{ route('expenses.index') }}" class="text-white hover:text-gray-200">Expenses</a></li>
            <li><a href="{{ route('categories.index') }}" class="text-white hover:text-gray-200">Categories</a></li>
        </ul>
    </div>
</nav>
