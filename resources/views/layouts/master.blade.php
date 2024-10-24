<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Online Liquor Vault</title>
    <link rel="icon" href="{{ asset('images/lictlogo.png') }}" type="image/x-icon">
    <!-- Vite for assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- Alert message -->
    @include('layouts.alert')

    <!-- Header with logo, search bar, and toggle button -->
    <header class="bg-red-900 text-white sticky top-0 z-50 shadow">
        <div class="container mx-auto flex justify-between items-center px-4 py-4 md:px-16">
            <!-- Logo and Site Name -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-10 w-10 md:h-12 md:w-12">
                <h1 class="ml-2 hidden md:block text-lg md:text-sm font-bold">The Online Liquor Vault</h1>
            </div>

            <!-- Search Bar for all devices -->
            <div class="flex items-center flex-1 justify-center">
                <form action="" method="GET" class="flex w-full md:w-2/3 lg:w-full">
                    <input type="text" name="query" placeholder="Search"
                        class="w-full px-2 py-2 ml-2 text-sm md:text-base text-black rounded-l-md focus:outline-none"
                        required>
                    <button type="submit" class="px-4 py-2 bg-red-700 hover:bg-red-600 text-white rounded-r-md">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Menu Toggle for mobile -->
            <button id="menu-toggle" class="block md:hidden text-2xl ml-4">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation Menu -->
            <nav class="hidden md:flex mx-2 items-center space-x-6">
                <a href="{{ route('welcome') }}" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"><i
                        class="fas fa-home"></i> Home</a>
                <a href="{{ route('about') }}" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"><i
                        class="fas fa-info-circle"></i> About</a>
                <a href="{{ route('contact') }}" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"><i
                        class="fas fa-phone"></i> Contact</a>
                <a href="" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"><i
                        class="fas fa-shopping-cart"></i> Cart</a>

                @auth
                    <div class="group relative">
                        {{-- add order section --}}
                        <a href="" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base">
                            <i class="fas fa-box"></i> Orders
                        </a>

                        <a href="" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"><i
                                class="fas fa-user-circle"></i> Profile</a>

                        <a href="{{ route('logout') }}" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>




                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:bg-red-700 px-3 py-2 rounded-md text-sm md:text-base"><i
                            class="fas fa-sign-in-alt mr-2"></i>Login</a>
                @endauth
            </nav>
        </div>

        <!-- Vertical Menu for mobile -->
        <nav id="vertical-menu"
            class="hidden md:hidden bg-gray-800 text-white fixed top-0 right-0 w-3/4 h-full p-4 z-50">
            <a href="{{ route('welcome') }}" class="block px-4 py-2 hover:bg-red-700 text-sm"><i
                    class="fas fa-home mr-2"></i> Home</a>
            <a href="{{ route('about') }}" class="block px-4 py-2 hover:bg-red-700 text-sm"><i
                    class="fas fa-info-circle mr-2"></i> About</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2 hover:bg-red-700 text-sm"><i
                    class="fas fa-phone mr-2"></i> Contact</a>
            <a href="" class="block px-4 py-2 hover:bg-red-700 text-sm"><i class="fas fa-shopping-cart mr-2"></i>
                Cart</a>

            @auth
                <div class="group relative">
                    <a href="" class="block px-4 py-2 hover:bg-red-700 text-sm">
                        <i class="fas fa-box mr-2"></i> My Orders
                    </a>

                    <a href="" class="block px-4 py-2 hover:bg-red-700 text-sm"><i
                            class="fas fa-user-circle mr-2"></i> Profile</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block px-4 py-2 hover:bg-red-700 text-sm w-full text-left">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-red-700 text-sm"><i
                        class="fas fa-sign-in-alt mr-2"></i> Login</a>
            @endauth
        </nav>
    </header>

    <!-- Main Content -->
    <div class="p-4 md:pt-8">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-red-900 text-white text-center py-4">
        <p class="text-sm md:text-base p-2">&copy; {{ date('Y') }} The Online Liquor Vault. All rights reserved.
        </p>
    </footer>

    <!-- Script for menu toggle and closing when clicked outside -->
    <script>
        const verticalMenu = document.getElementById('vertical-menu');
        const toggleButton = document.getElementById('menu-toggle');

        // Toggle the vertical menu when the button is clicked (for mobile)
        toggleButton.addEventListener('click', () => {
            verticalMenu.classList.toggle('hidden');
        });

        // Close the menu when clicking outside
        window.addEventListener('click', (e) => {
            if (!verticalMenu.contains(e.target) && !toggleButton.contains(e.target) && window.innerWidth < 768) {
                verticalMenu.classList.add('hidden');
            }
        });
    </script>

</body>

</html>
