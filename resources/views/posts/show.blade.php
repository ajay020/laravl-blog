@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h2 class="text-lg font-bold mb-2">{{ $post->title }}</h2>

    <p>By {{ $post->user->name }}</p>

    <div class="flex gap-2 mb-4">

        @can('update', $post)
            <a class="bg-blue-500 text-white px-4 py-2 rounded" href="{{ route('posts.edit', $post) }}">Edit Post</a>
        @endcan

        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-4 py-2 rounded" type="submit">Delete Post</button>
            </form>
        @endcan

    </div>

    <p>{{ $post->body }}</p>
@endsection
