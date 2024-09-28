@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Dashboard Header -->
        <h1 class="text-3xl font-extrabold text-blue-900">Dashboard</h1>
        <hr class="h-1 bg-red-500">

        <!-- Dashboard Stats Grid -->
        <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Banners Card -->
            <div class="bg-red-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-image text-4xl text-blue-900 mr-4"></i> <!-- Icon for Banners -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Banners</h2>
                    <p>Total Banners:  </p>
                </div>
            </div>

            <!-- Categories Card -->
            <div class="bg-blue-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-category-alt text-4xl text-blue-900 mr-4"></i> <!-- Icon for Categories -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Categories</h2>
                    <p>Total Categories:</p>
                </div>
            </div>

            <!-- Products Card -->
            <div class="bg-green-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-box text-4xl text-blue-900 mr-4"></i> <!-- Icon for Products -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Products</h2>
                    <p>Total Products: 10</p>
                </div>
            </div>

            <!-- Users Card -->
            <div class="bg-yellow-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-user text-4xl text-blue-900 mr-4"></i> <!-- Icon for Users -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Users</h2>
                    <p>Total Users: 5</p>
                </div>
            </div>

            <!-- Pending Orders Card -->
            <div class="bg-purple-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-time-five text-4xl text-blue-900 mr-4"></i> <!-- Icon for Pending Orders -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Pending Orders</h2>
                    <p>Total Orders: 5</p>
                </div>
            </div>

            <!-- Processing Orders Card -->
            <div class="bg-pink-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-loader text-4xl text-blue-900 mr-4"></i> <!-- Icon for Processing Orders -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Processing Orders</h2>
                    <p>Processing Orders: 5</p>
                </div>
            </div>

            <!-- Completed Orders Card -->
            <div class="bg-[#A8DADC] p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-check-circle text-4xl text-blue-900 mr-4"></i> <!-- Icon for Completed Orders -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Completed Orders</h2>
                    <p>Completed Orders: 5</p>
                </div>
            </div>

            <!-- Completed Payments -->
            <div class="bg-green-100 p-5 shadow-lg rounded-lg flex items-center ">
                <i class="bx bx-money text-4xl text-green-700 mr-4"></i> <!-- Icon for Completed Payments -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Completed Payments</h2>
                    <p>Completed Payment: 5</p>
                </div>
            </div>

            <!-- Total Payment -->
            <div class="bg-yellow-100 p-5 shadow-lg rounded-lg flex items-center">
                <i class="bx bx-wallet text-4xl text-yellow-700 mr-4"></i> <!-- Icon for Total Payment -->
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Payments</h2>
                    <p>Payment received: Rs. 1000</p>
                </div>
            </div>



        </div>
    </div>
@endsection
