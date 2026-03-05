@extends('layouts.app')

@section('title', $colocation->name . ' Workspace')

@section('content')
    <div class="max-w-7xl mx-auto p-8 space-y-6">

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Title -->
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <h1 class="text-3xl font-bold">
                {{ $colocation->name }} Workspace
            </h1>
        </div>

        <!-- Members -->
        <div class="bg-white rounded-2xl p-6 shadow">
            <h2 class="text-xl font-bold mb-4">Members</h2>

            @foreach($colocation->users as $user)
                <div class="flex justify-between bg-gray-100 p-3 rounded mb-2">
                    <span>{{ $user->name }}</span>
                    <span class="font-bold">
                        {{ $user->pivot->sold ?? 0 }} DH
                    </span>
                </div>
            @endforeach
        </div>

        <!-- Add Category -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-bold mb-4">Add Category</h2>

            <form method="POST" action="{{ route('colocation.add-category', $colocation->id) }}">
                @csrf
                <div class="flex gap-3">
                    <input type="text" name="name" required placeholder="Category name" class="border p-2 rounded w-full">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Add
                    </button>
                </div>
            </form>
        </div>

        <!-- Categories -->
        <!-- Categories -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-bold mb-4">Categories</h2>

            @forelse($colocation->categories as $category)
                <div class="bg-gray-100 p-3 rounded mb-2">
                    {{ $category->name }}
                </div>
            @empty
                <p class="text-gray-400">No categories yet.</p>
            @endforelse
        </div>

        <!-- Expenses -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-bold mb-4">Expenses</h2>

            @forelse($colocation->expenses as $expense)

                <div class="bg-gray-100 p-4 rounded mb-4">

                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-bold text-lg">
                                {{ $expense->title }}
                            </h3>
                            <p class="text-sm text-gray-600">
                                Total: {{ $expense->amount }} DH
                            </p>
                        </div>
                    </div>

                    <!-- Members payment status -->
                    <div class="mt-3 space-y-2">
                        @foreach($expense->users as $user)

                            <div class="flex justify-between items-center bg-white p-2 rounded">

                                <span>{{ $user->name }}</span>

                                @if($user->pivot->is_paid)
                                    <span class="text-green-600 font-bold">
                                        Paid
                                    </span>
                                @else
                                    @if($user->id == auth()->id())
                                        <form action="{{ route('expense.pay', $expense->id) }}" method="POST">
                                            @csrf
                                            <button class="bg-green-600 text-white px-3 py-1 rounded">
                                                Pay {{ $user->pivot->amount_due }} DH
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-red-600">
                                            Must pay {{ $user->pivot->amount_due }} DH
                                        </span>
                                    @endif
                                @endif

                            </div>

                        @endforeach
                    </div>

                </div>

            @empty
                <p class="text-gray-400">No expenses yet.</p>
            @endforelse
        </div>

        <!-- Add Expense -->
        <div class="flex justify-end">
            <a href="{{ route('expenses.create', $colocation->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                + Add Expense
            </a>
        </div>

    </div>
@endsection