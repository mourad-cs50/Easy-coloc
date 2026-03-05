@extends('layouts.app')

@section('title', 'Join Colocation')

@section('content')
<div class="max-w-md mx-auto mt-12 bg-white dark:bg-[#161615] p-6 rounded-2xl shadow space-y-4">

    <h1 class="text-2xl font-bold text-black dark:text-white">Join a Colocation</h1>
    <p class="text-gray-500 dark:text-gray-400">Enter the token of the colocation you want to join.</p>

    @if(session('info'))
        <div class="bg-yellow-100 text-yellow-800 p-3 rounded">
            {{ session('info') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('colocation.join.submit') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="token" placeholder="Enter token..." class="w-full border p-2 rounded" required>

        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold">
            Join Colocation
        </button>
    </form>

    <a href="{{ route('dashboard') }}" class="block text-center mt-4 text-gray-500 hover:text-black dark:hover:text-white">
        Back to Dashboard
    </a>

</div>
@endsection