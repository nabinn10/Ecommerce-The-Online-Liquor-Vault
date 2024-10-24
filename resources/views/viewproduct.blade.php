@extends('layouts.master')
@section('content')
    <!-- Main Product Section -->
    <div class="container mx-auto px-4 md:px-16 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Product Image -->
            <div class="col-span-1 flex justify-center">
                <img src="{{ asset('images/product/' . $product->photopath) }}" alt=""
                    class="h-85 w-80 object-cover rounded-lg shadow-lg">
            </div>

            <!-- Product Details -->
            <div class="col-span-1 md:col-span-2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="font-bold text-3xl text-gray-800">{{ $product->name }}</h2>
                <p class="text-xl text-gray-600 my-2">{{ $product->description }}</p>
                <p class="text-blue-900 font-bold text-2xl">
                    @if ($product->discounted_price != '')
                        Rs. {{ $product->discounted_price }}
                        <span class="line-through font-thin text-sm text-red-600">
                            Rs. {{ $product->price }}
                        </span>
                    @else
                        Rs. {{ $product->price }}
                    @endif
                </p>

                <form action="" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center mt-5">
                        <button type="button" class="bg-gray-200 px-4 py-2 rounded" id="dec" onclick="return dec()">-</button>
                        <input type="text" value="1" class="w-12 text-center border border-gray-300 rounded mx-2" id="qty" name="qty" readonly>
                        <button type="button" class="bg-gray-200 px-4 py-2 rounded" id="inc" onclick="return inc()">+</button>
                    </div>
                    <p class="text-gray-400 my-5">Stock: {{ $product->stock }}</p>

                    <div class="flex space-x-3 mt-4">
                        <button class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 transition flex items-center">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500 transition flex items-center">
                            <i class="fas fa-shopping-bag mr-2"></i> Buy Now
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delivery Information -->
        <div class="text-gray-500 px-4 md:px-16 space-y-2 mt-6">
            <p class="flex items-center"><i class="fas fa-truck mr-2"></i> Delivery within 5 Days</p>
            <p class="flex items-center"><i class="fas fa-undo-alt mr-2"></i> 7 Days Return Policy</p>
            <p class="flex items-center"><i class="fas fa-money-bill-wave mr-2"></i> Cash On Delivery Available</p>
            <p class="flex items-center"><i class="fas fa-certificate mr-2"></i> Warranty Available</p>
        </div>

        <!-- Related Products Section -->
        <div class="mt-10">
            <div class="border-l-4 border-blue-900 pl-2">
                <h1 class="text-2xl font-bold">Related Products</h1>
                <p>Check out our related products</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-5">
                @foreach ($relatedproducts as $relatedProduct)
                    <a href="{{ route('viewproduct', $relatedProduct->id) }}">
                        <div class="border rounded-lg bg-gray-100 hover:-translate-y-2 duration-300 shadow hover:shadow-lg transition-transform">
                            <img src="{{ asset('images/product/' . $relatedProduct->photopath) }}" alt=""
                                class="h-48 w-full object-cover rounded-t-lg">
                            <div class="p-4">
                                <h1 class="text-lg font-bold">{{ $relatedProduct->name }}</h1>
                                <p class="text-gray-700 text-sm mb-2 line-clamp-3">
                                    {{ Str::limit($relatedProduct->description, 50) }}
                                </p>
                                @if ($relatedProduct->discounted_price != '')
                                    <p class="text-blue-900 font-bold text-lg">
                                        Rs. {{ $relatedProduct->discounted_price }}
                                        <span class="line-through font-thin text-sm text-red-600">Rs.
                                            {{ $relatedProduct->price }}</span>
                                    </p>
                                @else
                                    <p class="text-blue-900 font-bold text-lg">
                                        Rs. {{ $relatedProduct->price }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
