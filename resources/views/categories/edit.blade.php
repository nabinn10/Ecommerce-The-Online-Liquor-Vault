@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Edit Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-5">
    @csrf
    @method('POST')

    <div class="mb-4">
        <label for="priority" class="block text-gray-700">Priority:</label>
        <input type="number" name="priority" id="priority" class="w-full p-2 border rounded-md" value="{{ $category->priority }}" required>
    </div>

    <div class="mb-4">
        <label for="name" class="block text-gray-700">Category Name:</label>
        <input type="text" name="name" id="name" class="w-full p-2 border rounded-md" value="{{ $category->name }}" required>
    </div>

    <button type="submit" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white">Update Category</button>
</form>

@endsection
