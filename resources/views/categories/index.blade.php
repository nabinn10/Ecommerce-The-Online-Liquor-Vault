@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">

        <h1 class="text-3xl font-extrabold text-blue-900">Categories</h1>
        <hr class="h-1 bg-red-500 mb-4">

        <!-- Success or Error Messages -->
        @if (session('success'))
            <div id="successMessage" class="bg-green-500 mx-auto text-white p-3 justify-center rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="errorMessage" class="bg-red-500 mx-auto text-white p-3 justify-center rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-right my-5">
            <a href="{{ route('categories.create') }}"
                class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white inline-flex items-center">
                <i class='bx bx-plus-circle mr-2'></i> Add Category
            </a>
        </div>

        <!-- Categories Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="w-full text-left text-sm text-gray-600 uppercase tracking-wide bg-gray-200 border-b">
                        <th class="p-4">Priority</th>
                        <th class="p-4">Name</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b hover:bg-gray-100 transition duration-150">
                            <td class="p-4 text-center text-gray-700">{{ $category->priority }}</td>
                            <td class="p-4 text-gray-700">{{ $category->name }}</td>
                            <td class="p-4 flex justify-center space-x-4">
                                <!-- Edit Button -->
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition duration-300">
                                    <i class='bx bx-edit'></i> Edit
                                </a>

                                <!-- Delete Button -->
                                <a href="javascript:void(0)"
                                    class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 inline-flex items-center"
                                    onclick="showpopup('{{ $category->id }}')">
                                    <i class='bx bx-trash-alt mr-2'></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript to hide messages after 5 seconds -->
    <script>
        setTimeout(function() {
            let errorMessage = document.getElementById('errorMessage');
            let successMessage = document.getElementById('successMessage');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000);

        function showpopup(id) {
            document.getElementById('popup').classList.remove('hidden');
            document.getElementById('popup').classList.add('flex');
            document.getElementById('deleteForm').action = '/categories/destroy/' + id;
        }

        function hidePopup() {
            document.getElementById('popup').classList.remove('flex');
            document.getElementById('popup').classList.add('hidden');
        }
    </script>

    {{-- Popup Modal for deleting the category --}}
    <div class="fixed top-0 left-0 right-0 bottom-0 bg-gray-600 bg-opacity-50 backdrop-blur-sm hidden items-center justify-center" id="popup">
        <div class="bg-white w-1/3  px-10 py-5 rounded-lg shadow-lg fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-2xl font-bold text-center text-red-500">
                <i class="fas fa-exclamation-triangle"></i>
                Are you sure you want to delete?
            </h1>
            <div class="flex justify-center mt-5">
                <form id="deleteForm" method="POST">
                    @csrf
                    <!-- You can use POST instead of DELETE for simplicity -->
                    <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-lg">Yes! Delete</button>
                    <a type="button" class="bg-blue-500 text-white px-5 py-2 rounded-lg cursor-pointer" onclick="hidePopup()">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
