@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Create Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('categories.store') }}" method="POST" class="mt-5">
    @csrf

    <div class="mb-4">
        <label for="priority" class="block text-gray-700">Priority:</label>
        <input type="number" name="priority" id="priority" class="w-full p-2 border rounded-md" value="{{ old('priority') }}" required>
    </div>

    <div class="mb-4">
        <label for="name" class="block text-gray-700">Category Name:</label>
        <input type="text" name="name" id="name" class="w-full p-2 border rounded-md" value="{{ old('name') }}" required>
    </div>

    <button type="submit" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white inline-flex items-center">
        <i class='bx bx-plus-circle mr-2'></i> Create Category
    </button>

    <a href="{{ route('categories.index') }}" class="bg-red-500 text-white px-5 py-3 rounded-lg hover:bg-red-600 inline-flex items-center ml-2">
        <i class='bx bx-x-circle mr-2'></i> Cancel
    </a>

</form>
@endsection
