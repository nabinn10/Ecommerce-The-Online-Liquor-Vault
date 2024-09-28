@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">Edit Banner</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
    @csrf

    <div class="mb-4">
        <label for="priority" class="block text-gray-700">Priority:</label>
        <input type="number" name="priority" id="priority" class="w-full p-2 border rounded-md" value="{{ $banner->priority }}" required>
    </div>

    <div class="mb-4">
        <label for="status" class="block text-gray-700">Status:</label>
        <select name="status" id="status" class="w-full p-2 border rounded-md" required>
            <option value="1" {{ (isset($banner) && $banner->status == 1) ? 'selected' : '' }}>Show</option>
            <option value="0" {{ (isset($banner) && $banner->status == 0) ? 'selected' : '' }}>Hide</option>
        </select>
    </div>



    <div class="mb-4">
        <label for="photopath" class="block text-gray-700">Banner Image:</label>
        <input type="file" name="photopath" id="photopath" class="w-full p-2 border rounded-md">
        <img src="{{ asset('images/banners/' . $banner->photo_path) }}" alt="Current Banner Image" class="w-32 h-32 mt-2">
    </div>

    <div class="flex space-x-2 mt-5">
        <button type="submit" class="flex items-center justify-center bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 ease-in-out">
            <i class='bx bx-save mr-2'></i> Update Banner
        </button>
        <a href="{{ route('banners.index') }}" class="flex items-center justify-center bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-400 transition duration-200 ease-in-out">
            <i class='bx bx-x-circle mr-2'></i> Cancel
        </a>
    </div>


</form>
@endsection
