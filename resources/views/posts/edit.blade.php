@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-gray-700">Edit Post</h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')


            <div>
                <label class="block text-gray-600 font-medium mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" required>
            </div>


            <div>
                <label class="block text-gray-600 font-medium mb-1">Content</label>
                <textarea name="content" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" required>{{ old('content', $post->content) }}</textarea>
            </div>


            <div>
                <label class="block text-gray-600 font-medium mb-1">Category</label>
                <select name="category"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" required>
                    <option value="Publish" {{ $post->category == 'Publish' ? 'selected' : '' }}>Publish</option>
                    <option value="Draft" {{ $post->category == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Trash" {{ $post->category == 'Trash' ? 'selected' : '' }}>Trash</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" name="status" value="Publish"
                    class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Publish
                </button>
                <button type="submit" name="status" value="Draft"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Save as Draft
                </button>
            </div>
        </form>
    </div>
@endsection
