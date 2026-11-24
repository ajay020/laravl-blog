@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="bg-white  mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-xl font-bold mb-4">Register</h1>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-4 flex flex-col">
                <label for="name">Name</label>
                <input class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 flex flex-col">
                <label for="email">Email</label>
                <input class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 flex flex-col">
                <label for="password">Password</label>
                <input class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="password" name="password" id="password">
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 flex flex-col">
                <label for="password_confirmation">Confirm Password</label>
                <input class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="password" name="password_confirmation" id="password_confirmation">

            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
                type="submit">Register</button>

        </form>
    </div>
@endsection
