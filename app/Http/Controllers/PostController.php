<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'published');
        $posts = Post::where('status', $status)->get();
        return view('posts.index', compact('posts', 'status'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->has('publish') ? 'published' : 'draft',
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->has('publish') ? 'published' : 'draft',
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->update(['status' => 'trashed']);
        return redirect()->route('posts.index')->with('success', 'Post moved to trash.');
    }

    public function preview()
    {
        $posts = Post::where('status', 'published')->paginate(5);
        return view('posts.preview', compact('posts'));
    }
}
