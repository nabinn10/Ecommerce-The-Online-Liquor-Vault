@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-extrabold text-blue-900">Banners</h1>
        <hr class="h-1 bg-red-500">

        <div class="text-right my-5">
            <a href="{{ route('banners.create') }}"
                class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white inline-flex items-center">
                <i class='bx bx-plus-circle mr-2'></i> Add Banner
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border-spacing-0">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border p-4">Priority</th>
                        <th class="border p-4">Image</th>
                        <th class="border p-4">Status</th>
                        <th class="border p-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr class="text-center bg-white hover:bg-gray-100 transition duration-200 ease-in-out">
                            <td class="border p-4">{{ $banner->priority }}</td>
                            <td class="border p-4">
                                <img src="{{ asset('images/banners/' . $banner->photo_path) }}" alt="Banner Image"
                                    class="w-16 h-16 mx-auto object-cover rounded-lg shadow-md">
                            </td>
                            <td class="border p-4">
                                <span
                                    class="inline-block px-3 py-1 text-sm font-semibold {{ $banner->status == 'Show' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                                    {{ $banner->status == '1' ? 'Show' : 'Hide' }}
                                </span>
                            </td>

                            <td class="border p-4 flex justify-center space-x-2">
                                <a href="{{ route('banners.edit', $banner->id) }}"
                                    class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700 inline-flex items-center">
                                    <i class='bx bx-edit-alt mr-2'></i> Edit
                                </a>
                                <a href="{{ route('banners.destroy', $banner->id) }}"
                                    class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 inline-flex items-center"
                                    onclick="return confirm('Are you sure you want to delete this banner?')">
                                    <i class='bx bx-trash-alt mr-2'></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
