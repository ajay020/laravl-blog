@extends('layouts.app')

@section('title', 'Home - My Laravel Blog')

@section('content')
    <div class=" flex flex-col px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold mb-4">{{ $title }}</h2>

        @forelse ($posts as $post)
            <div class="bg-white p-4 mb-4 rounded shadow">
                <a class="text-2xl font-bold " href="{{ route('posts.show', $post->slug) }}">
                    <h3>{{ $post->title }}</h3>
                </a>
                <p>{{ $post->user->name }}</p>

                <p>{{ $post->excerpt }}</p>
            </div>


        @empty
            <p>No posts available.</p>
        @endforelse

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>


@endsection
