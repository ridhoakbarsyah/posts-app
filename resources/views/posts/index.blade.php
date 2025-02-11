@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('posts.index', ['status' => 'published']) }}"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Published</a>
            <a href="{{ route('posts.index', ['status' => 'draft']) }}"
                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Drafts</a>
            <a href="{{ route('posts.index', ['status' => 'trashed']) }}"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Trashed</a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Category</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $post->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $post->category }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        Trash
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
