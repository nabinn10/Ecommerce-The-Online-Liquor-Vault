<!-- resources/views/contact.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container mx-auto py-8 px-4 md:px-16">
    <h1 class="text-4xl font-bold text-red-900 mb-6">Contact Us</h1>
    <p class="text-lg text-gray-700 leading-relaxed mb-4">
        We'd love to hear from you! Whether you have a question about products, orders, or anything else, our team is ready to answer all your questions.
    </p>

    <!-- Contact form -->
    <form action="/send-message" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Message</label>
            <textarea name="message" class="w-full p-2 border border-gray-300 rounded" rows="5" required></textarea>
        </div>
        <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded">Send Message</button>
    </form>
</div>
@endsection
