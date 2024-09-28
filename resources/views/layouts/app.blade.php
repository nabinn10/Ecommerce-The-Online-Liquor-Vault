<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Online Liquor Vault</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Main Wrapper -->
    <div class="flex min-h-screen lg:space-x-4 max-h-full">
        <!-- Sidebar -->
        <nav class="w-64 max-h-full bg-gray-100 shadow-lg hidden lg:block" id="sidebar">
            <div class="p-5 flex justify-center">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-40 rounded-md bg-gray-300 p-2">
            </div>
            <ul class="mt-5 space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">
                        <i class='bx bx-home-alt text-2xl'></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('banners.index') }}" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">

                        <i class="bx bx-image text-2xl"></i>
                        <span class="ml-3">Banners</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">
                        <i class='bx bx-category text-2xl'></i>
                        <span class="ml-3">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">
                        <i class='bx bx-box text-2xl'></i>
                        <span class="ml-3">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">
                        <i class='bx bx-cart text-2xl'></i>
                        <span class="ml-3">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">
                        <i class='bx bx-user text-2xl'></i>
                        <span class="ml-3">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center text-gray-600 hover:bg-blue-900 hover:text-white py-2 px-4 rounded-md border-b">
                        <i class='bx bx-chart text-2xl'></i>
                        <span class="ml-3">Reports</span>
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-2 text-gray-600 hover:bg-blue-900 hover:text-white rounded-md transition-colors">
                            <i class='bx bx-log-out text-2xl'></i>
                            <span class="ml-3">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white shadow-sm relative" id="main-content">
            <header class="mb-6 flex items-center">
                <button id="menu-toggle" class="lg:hidden bg-blue-900 text-white p-2 rounded-md">
                    <i class='bx bx-menu'></i>
                </button>

                <h1 class="ml-4 text-xl md:text-2xl lg:text-3xl font-bold text-blue-900">The Online Liquor Vault</h1>
            </header>

            @yield('content')
        </div>
    </div>

    <!-- JavaScript for Toggle Functionality -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        // Toggle sidebar
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', (event) => {
            const isClickInside = sidebar.contains(event.target) || menuToggle.contains(event.target);

            if (!isClickInside) {
                sidebar.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
