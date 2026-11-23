@extends('layouts.app')

@section('title', 'Home - My Laravel Blog')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h2>{{ $title }}</h2>
    <p>Welcome to my first Laravel blog application.</p>

    @forelse ($posts as $post)
        <a class="text-2xl font-bold " href="{{ route('posts.show', $post->slug) }}">
            <h3>{{ $post->title }}</h3>
        </a>
        <p>{{ $post->user->name }}</p>

        <p>{{ $post->excerpt }}</p>

    @empty
        <p>No posts available.</p>
    @endforelse

    {{ $posts->links() }}

@endsection
