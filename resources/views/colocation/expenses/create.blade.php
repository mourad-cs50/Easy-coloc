@extends('layouts.app')

@section('title', 'Add Expense')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-[#161615] rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-6">Add Expense to {{ $colocation->name }}</h1>

    <form method="POST" action="{{ route('expenses.store', $colocation->id) }}" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Expense title..." class="border p-2 rounded w-full" required>
        <input type="number" step="0.01" name="amount" placeholder="Amount..." class="border p-2 rounded w-full" >

        <select name="category_id" class="border p-2 rounded w-full" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <select name="payer_id" class="border p-2 rounded w-full" required>
            <option value="">Select Member</option>
            @foreach($colocation->users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Expense</button>
    </form>

    <a href="{{ route('colocation.workspace', $colocation->id) }}" class="mt-6 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
        Back to Workspace
    </a>
</div>
@endsection