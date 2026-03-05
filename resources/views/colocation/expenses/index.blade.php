@extends('layouts.app')

@section('title', $colocation->name . ' Expenses')

@section('content')
<div class="max-w-5xl mx-auto p-8 space-y-6">

    <!-- Page Title -->
    <div class="bg-white dark:bg-[#161615] shadow-xl rounded-2xl p-6">
        <h1 class="text-3xl font-bold text-black dark:text-white">
            Expenses - {{ $colocation->name }}
        </h1>
        <p class="text-gray-500 mt-1">All expenses in this colocation</p>
    </div>

    <!-- Add Expense Button -->
    <div class="flex justify-end">
        <a href="{{ route('expenses.create', $colocation->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold">
            + Add Expense
        </a>
    </div>

    <!-- Expenses List -->
    <div class="bg-white dark:bg-[#161615] p-6 rounded-2xl shadow space-y-4">

        @forelse($colocation->expenses as $expense)

            <div class="bg-gray-100 dark:bg-[#0a0a0a] p-4 rounded flex justify-between items-center">

                <!-- Left Side -->
                <div>
                    <p class="font-bold text-lg">
                        {{ $expense->title }}
                    </p>

                    <p class="text-gray-500 text-sm">
                        Category: {{ $expense->category->name ?? 'No Category' }}
                    </p>

                    <p class="text-gray-500 text-sm">
                        Paid by {{ $expense->payer->name ?? 'Unknown' }}
                    </p>
                </div>

                <!-- Right Side -->
                <div class="text-right">

                    <!-- Amount -->
                    <span class="block font-bold text-lg">
                        @if($expense->amount)
                            ${{ $expense->amount }}
                        @else
                            Not Paid
                        @endif
                    </span>

                    <!-- Status -->
                    <span class="text-sm">
                        @if($expense->is_paid)
                            <span class="text-green-600 font-bold">Paid</span>
                        @else
                            <span class="text-red-600 font-bold">Not Paid</span>
                        @endif
                    </span>

                </div>

            </div>

        @empty

            <p class="text-gray-400 text-center">
                No expenses yet.
            </p>

        @endforelse

    </div>

    <!-- Back Button -->
    <div>
        <a href="{{ route('colocation.workspace', $colocation->id) }}"
           class="mt-6 inline-block bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded">
            Back to Workspace
        </a>
    </div>

</div>
@endsection