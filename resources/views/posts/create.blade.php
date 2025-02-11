@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Create a New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Title Input -->
            <div>
                <label class="block text-gray-600 font-medium mb-1">Title</label>
                <input type="text" name="title" placeholder="Enter title"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" required>
            </div>

            <!-- Content Input -->
            <div>
                <label class="block text-gray-600 font-medium mb-1">Content</label>
                <textarea name="content" placeholder="Write your content here..." rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" required></textarea>
            </div>

            <!-- Category Dropdown -->
            <div>
                <label class="block text-gray-600 font-medium mb-1">Category</label>
                <select name="category"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="published">Published</option>
                    <option value="draft">Drafts</option>
                    <option value="trashed">Trashed</option>
                </select>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4">
                <button type="submit" name="Publish"
                    class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Publish
                </button>
                <button type="submit" name="Draft"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Save as Draft
                </button>
            </div>
        </form>
    </div>
@endsection
