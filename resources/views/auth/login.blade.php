<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f3f4f6; /* Light background color */
        }
        .container {
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 40px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 150px;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="container max-w-md mx-auto">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="logo">
        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">
                    <i class="fas fa-user-circle"></i> Email
                </label>
                <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                    <span class="p-2"><i class="fas fa-envelope"></i></span>
                    <input id="email" class="w-full border-0 px-4 py-2 focus:outline-none" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700">
                    <i class="fas fa-lock"></i> Password
                </label>
                <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                    <span class="p-2"><i class="fas fa-lock"></i></span>
                    <input id="password" class="w-full border-0 px-4 py-2 focus:outline-none" type="password" name="password" required>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
            </div>

            <!-- Forgot Password -->
            <div class="text-right mb-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-black transition-colors duration-200">Log in</button>
            </div>
        </form>

        <!-- Registration Link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>
            </p>
        </div>
    </div>
</body>
</html>
