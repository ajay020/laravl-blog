@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
  <div class="bg-white mx-auto max-w-2xl px-4 py-8">
        <h2 class="text-xl font-bold mb-4">Create a New Post</h2>

        <form class="space-y-4"  action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-4 flex flex-col">
                <label for="title">Title:</label>
                <input 
                    type="text"
                    name="title" 
                    id="title"  
                    value="{{ old('title') }}" 
                    class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                 @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex flex-col">
                <label for="excerpt">Excerpt:</label>
                <textarea name="excerpt" id="excerpt" class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt') }}</textarea>
            </div>

            
            <div class="mb-4 flex items-center gap-2">
                <label for="published">Published:</label>
                <input
                    type="checkbox"
                    class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="published"
                    id="published"
                    value="1"
                    @checked(old('published'))
                >
            </div>

            <div class="mb-4 flex flex-col gap-0.5">
                <label for="body">Body:</label>
                <textarea 
                    name="body" 
                    id="body" 
                    class="border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Create Post
            </button>
        </form>
    </div>
@endsection