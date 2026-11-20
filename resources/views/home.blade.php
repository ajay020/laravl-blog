@extends('layouts.app')

@section('title', 'Home - My Laravel Blog')

@section('content')
    <h2>{{ $title }}</h2>

    <p>Welcome to my first Laravel blog application.</p>

    @forelse ($posts as $post)
        <a href="{{ route('posts.show', $post->slug) }}">
            <h3>{{ $post->title }}</h3>
        </a>
        <p>{{ $post->user->name }}</p>

        <p>{{ $post->excerpt }}</p>

    @empty
        <p>No posts available.</p>
    @endforelse

    {{ $posts->links() }}

@endsection
