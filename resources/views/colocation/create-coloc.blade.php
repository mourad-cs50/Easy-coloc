@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Create Colocation</h1>

    <form action="{{ route('colocation.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Colocation Name:</label>
            <input type="text" name="name" class="border p-2 w-full rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Create Colocation
        </button>
    </form>
</div>
@endsection