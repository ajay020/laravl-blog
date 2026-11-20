<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Latest Blog Posts';
        $posts = Post::with('user')
            ->where('published', true)
            ->latest()
            ->paginate(3);

        // print($posts);

        return view('home', compact('title', 'posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)
        //     ->where('published', true)
        //     ->firstOrFail();

        // print($post);

        return view('posts.show', ['post' => $post]);
    }
}
