@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Postingan</h1>

        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="mb-4 p-4 border rounded shadow-sm">
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p class="text-gray-700">
                        {{ Str::limit($post->content, 150, '...') }}
                    </p>
                    <small class="text-gray-500">Kategori: {{ $post->category->name ?? '-' }}</small>
                    <br>
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                        Baca Selengkapnya
                    </a>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-500">Belum ada postingan.</p>
        @endif
    </div>
@endsection
