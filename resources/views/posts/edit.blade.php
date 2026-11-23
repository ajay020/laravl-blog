@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
  <div class="bg-white mx-auto max-w-2xl px-4 py-8">
        <h2 class="text-xl font-bold mb-4">Edit Post</h2>

        @if ($errors->any())
            <div class="rounded-lg bg-red-100 p-4 text-red-700">
                <p class="font-semibold">Please fix the following errors:</p>

                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      

        <form class="space-y-4"  action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 flex flex-col">
                <label for="title">Title:</label>
                <input 
                    type="text"
                    name="title" 
                    id="title"  
                    value="{{ old('title', $post->title) }}" 
                    class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                @error('slug')
                    <p class="text-red-500 text-sm">Title is already taken.</p>
                @enderror
            </div>

            <div class="mb-4 flex flex-col">
                <label for="excerpt">Excerpt:</label>
                <textarea 
                    name="excerpt"
                    id="excerpt" 
                    class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            
            <div class="mb-4 flex items-center gap-2">
                <label for="published">Published:</label>
                <input type="hidden" name="published" value="0">
                <input
                    type="checkbox"
                    class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="published"
                    id="published"
                    value="1"
                    @checked(old('published', $post->published))
                >
            </div>

            <div class="mb-4 flex flex-col gap-0.5">
                <label for="body">Body:</label>
                <textarea 
                    name="body" 
                    id="body" 
                    class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

           <div class="flex items-center justify-end gap-3 pt-2">
                <a
                    href="{{ route('posts.show', $post) }}"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Update Post
                </button>
            </div>
        </form>
    </div>
@endsection