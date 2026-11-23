@extends('layouts.app')

@section('title', $post->title)

@section('content')
    
    <h2 class="text-lg font-bold mb-2">{{$post->title}}</h2>

    <a class="border p-1 rounded " href="{{ route('posts.edit', $post->slug) }}">
     Edit Post
    </a>
   <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')

        <button class="border p-1 rounded" type="submit">Delete Post</button>
    </form>

    <p>{{$post->body}}</p>
@endsection