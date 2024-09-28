@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-extrabold text-blue-900">Add Product</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
            <div>
                <label for="name" class="text-lg font-semibold text-blue-900">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="text-lg font-semibold text-blue-900">Description</label>
                <textarea name="description" id="description" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="price" class="text-lg font-semibold text-blue-900">Price</label>
                <input type="number" name="price" id="price" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" value="{{ old('price') }}">
                @error('price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="discounted_price" class="text-lg font-semibold text-blue-900">Discounted Price</label>
                <input type="number" name="discounted_price" id="discounted_price" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" value="{{ old('discounted_price') }}">
                @error('discounted_price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="stock" class="text-lg font-semibold text-blue-900">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300" value="{{ old('stock') }}">
                @error('stock')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="status" class="text-lg font-semibold text-blue-900">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="Show" {{ old('status') == 'Show' ? 'selected' : '' }}>Show</option>
                    <option value="Hide" {{ old('status') == 'Hide' ? 'selected' : '' }}>Hide</option>
                </select>
                @error('status')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category_id" class="text-lg font-semibold text-blue-900">Category</label>
                <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="photo" class="text-lg font-semibold text-blue-900">Photo</label>
                <input type="file" name="photopath" id="photo" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-300">
                @error('photopath')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-center  items-center space-x-2 mt-5">
            <button type="submit" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white inline-flex items-center">
                <i class='bx bx-plus-circle mr-2'></i> Add Product
            </button>
            <a href="{{ route('products.index') }}" class="bg-red-500 text-white px-5 py-3 rounded-lg hover:bg-red-600 inline-flex items-center ml-2">
                <i class='bx bx-x-circle mr-2'></i> Cancel
            </a>
        </div>

    </form>
</div>

@endsection

product
