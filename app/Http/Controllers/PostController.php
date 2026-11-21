<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'body' => 'required|string',
        ]);

        $slug = str()->slug($validated['title']);

        $user = User::where('email', 'admin@example.com')->firstOrFail();

        $user->posts()->create([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'published' => $request->boolean('published'),
        ]);

        return redirect()->route('home');
    }
}
