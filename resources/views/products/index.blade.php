@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-extrabold text-blue-900">Products</h1>
        <hr class="h-1 bg-red-500 md-2">

        <!-- Success or Error Messages -->
        @if (session('success'))
            <div id="successMessage" class="bg-green-500 mx-auto text-white p-3 justify-center rounded mb-4 mt-2">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="errorMessage" class="bg-red-500 mx-auto text-white p-3 justify-center rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-right my-5">
            <a href="{{ route('products.create') }}"
                class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white inline-flex items-center">
                <i class='bx bx-plus-circle mr-2'></i> Add Product
            </a>
        </div>

        <!-- Scrollable table container for smaller devices -->
        <div class="overflow-x-auto">
            <table class="min-w-full mt-5 text-center text-sm sm:text-base lg:text-lg border-collapse bg-white shadow-md rounded-lgx overflow-x-auto">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-xs lg:text-base uppercase tracking-wide">
                        <th class="border px-4 py-3">S.N.</th>
                        <th class="border px-4 py-3">Picture</th>
                        <th class="border px-4 py-3">Name</th>
                        <th class="border px-4 py-3">Description</th>
                        <th class="border px-4 py-3">Price</th>
                        <th class="border px-4 py-3">Discount Price</th>
                        <th class="border px-4 py-3">Stock</th>
                        <th class="border px-4 py-3">Status</th>
                        <th class="border px-4 py-3">Category</th>
                        <th class="border px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100 transition-colors duration-300">
                            <td class="border px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-3">
                                <img src="{{ asset('images/product/' . $product->photopath) }}" alt="{{ $product->name }}"
                                    class="w-12 h-12 lg:w-16 lg:h-16 mx-auto object-cover rounded-full shadow-sm">
                            </td>
                            <td class="border px-4 py-3">{{ $product->name }}</td>
                            <td class="border px-4 py-3">{{ Str::limit($product->description, 100) }}</td>
                            <td class="border px-4 py-3 text-green-600 font-semibold">Rs.
                                {{ number_format($product->price, 2) }}</td>
                            <td class="border px-4 py-3 text-red-600 font-semibold">
                                @if ($product->discounted_price)
                                    Rs. {{ number_format($product->discounted_price, 2) }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="border px-4 py-3">{{ $product->stock }}</td>
                            <td class="border px-4 py-3">
                                <span class="inline-block px-3 py-1 text-sm font-semibold {{ $product->status == 'Show' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }} rounded-full">
                                    {{ $product->status }}
                                </span>
                            </td>
                            <td class="border px-4 py-3">{{ $product->category->name }}</td>
                            <td class="border px-4 py-3 flex justify-center space-x-2">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-300">
                                    Edit
                                </a>
                                <a href="{{ route('product.destroy', $product->id) }}"
                                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors duration-300"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            // Wait until the DOM is fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                // Set a timeout for success message
                const successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    setTimeout(() => {
                        successMessage.style.transition = 'opacity 0.5s ease';
                        successMessage.style.opacity = '0';
                        setTimeout(() => successMessage.remove(), 500); // Remove element after fading out
                    }, 4000); // 4 seconds delay
                }

                // Set a timeout for error message
                const errorMessage = document.getElementById('errorMessage');
                if (errorMessage) {
                    setTimeout(() => {
                        errorMessage.style.transition = 'opacity 0.5s ease';
                        errorMessage.style.opacity = '0';
                        setTimeout(() => errorMessage.remove(), 500); // Remove element after fading out
                    }, 4000); // 4 seconds delay
                }
            });
        </script>
    </div>
@endsection
