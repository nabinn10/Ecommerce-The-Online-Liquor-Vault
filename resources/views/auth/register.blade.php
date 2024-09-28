<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-32 h-auto mx-auto mb-4"> <!-- Logo -->
            <h2 class="text-2xl font-semibold text-center mb-6">Register</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                        <span class="p-2"><i class="fas fa-user"></i></span>
                        <input id="name" class="block w-full border-0 p-2 focus:outline-none" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                        <span class="p-2"><i class="fas fa-envelope"></i></span>
                        <input id="email" class="block w-full border-0 p-2 focus:outline-none" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                        <span class="p-2"><i class="fas fa-calendar-alt"></i></span>
                        <input id="date_of_birth" class="block w-full border-0 p-2 focus:outline-none" type="date" name="date_of_birth" required>
                    </div>
                    @error('date_of_birth')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                        <span class="p-2"><i class="fas fa-lock"></i></span>
                        <input id="password" class="block w-full border-0 p-2 focus:outline-none" type="password" name="password" required>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="flex items-center border border-gray-300 rounded-lg mt-1">
                        <span class="p-2"><i class="fas fa-lock"></i></span>
                        <input id="password_confirmation" class="block w-full border-0 p-2 focus:outline-none" type="password" name="password_confirmation" required>
                    </div>
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
