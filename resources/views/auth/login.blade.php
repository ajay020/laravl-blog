@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="bg-white  mx-auto max-w-2xl px-4 py-8">
        <h1 class="text-xl font-bold mb-4">Login</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-4 flex flex-col">
                <label for="email">Email</label>
                <input class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="email" name="email" required id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 flex flex-col">
                <label for="password">Password</label>
                <input class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Enter your password"  type="password" name="password" required id="password">
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
                type="submit">Login</button>
        </form>
    </div>
@endsection
