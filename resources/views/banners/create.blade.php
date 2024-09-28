@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-extrabold text-blue-900">{{ isset($banner) ? 'Edit' : 'Add' }} Banner</h1>
<hr class="h-1 bg-red-500">

<form action="{{ isset($banner) ? route('banners.update', $banner->id) : route('banners.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
    @csrf

    <!-- If editing, we use POST for update -->
    @if(isset($banner))
        @method('POST')
    @endif

    <!-- Priority Field -->
    <div class="mb-4">
        <label for="priority" class="block text-gray-700">Priority:</label>
        <input type="number" name="priority" id="priority" class="w-full p-2 border rounded-md" value="{{ old('priority', isset($banner) ? $banner->priority : '') }}" required>
    </div>

    <div class="mb-4">
        <label for="status" class="block text-gray-700">Status:</label>
        <select name="status" id="status" class="w-full p-2 border rounded-md" required>
            <option value="Show" {{ (isset($banner) && $banner->status == 'Show') ? 'selected' : '' }}>Show</option>
            <option value="Hide" {{ (isset($banner) && $banner->status == 'Hide') ? 'selected' : '' }}>Hide</option>
        </select>
    </div>



    <!-- Image Upload Field -->
    <div class="mb-4">
        <label for="photopath" class="block text-gray-700">Banner Image:</label>
        <input type="file" name="photopath" id="photopath" class="w-full p-2 border rounded-md" {{ isset($banner) ? '' : 'required' }}>
        @if(isset($banner) && $banner->photopath)
            <img src="{{ asset('images/banners/' . $banner->photopath) }}" alt="Banner Image" class="w-32 h-32 mt-3 object-cover">
        @endif
    </div>

    <!-- Submit Button -->
    <button type="submit" class="bg-blue-900 text-white px-5 py-3 rounded-lg hover:bg-black hover:text-white inline-flex items-center">
        <i class='bx bx-plus-circle mr-2'></i> {{ isset($banner) ? 'Update' : 'Add' }} Banner
    </button>

    <a href="{{ route('banners.index') }}" class="bg-red-500 text-white px-5 py-3 rounded-lg hover:bg-red-600 inline-flex items-center ml-2">
        <i class='bx bx-x-circle mr-2'></i> Cancel
</a>

</form>
@endsection



