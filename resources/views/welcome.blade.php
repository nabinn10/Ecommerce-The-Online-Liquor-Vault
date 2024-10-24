@extends('layouts.master')

@section('content')
<div class="px-4 md:px-16 py-8">
    <!-- Section Header -->
    <div class="border-l-4 border-blue-900 pl-2">
        <h1 class="text-3xl font-bold text-blue-900">Latest Products</h1>
        <p class="text-gray-500 text-lg">Explore our latest collection</p>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
        @foreach($products as $product)
            <!-- Individual Product -->
            <a href="{{ route('viewproduct', $product->id) }}" class="group block">
                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white hover:shadow-lg transition-shadow duration-300 ease-in-out">
                    <!-- Product Image -->
                    <img src="{{ asset('images/product/' . $product->photopath) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover rounded-t-lg transition-transform duration-300 transform group-hover:scale-105">

                    <!-- Product Details -->
                    <div class="p-4">
                        <!-- Product Name -->
                        <h1 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-blue-900">{{ $product->name }}</h1>

                        <!-- Product Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($product->description, 60) }}
                        </p>

                        <!-- Product Price -->
                        @if($product->discounted_price != '')
                            <p class="text-lg font-bold text-blue-900">
                                Rs. {{ $product->discounted_price }}
                                <span class="line-through text-sm text-gray-500 ml-2">Rs. {{ $product->price }}</span>
                            </p>
                        @else
                            <p class="text-lg font-bold text-blue-900">
                                Rs. {{ $product->price }}
                            </p>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
