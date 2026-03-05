@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto p-8 space-y-8">

        {{-- Header --}}
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
                <p class="text-gray-500">Manage your colocations and expenses</p>
            </div>

            <div class="flex gap-3">

                {{-- Admin Button --}}
                @if(auth()->user()->is_admin == 1)
                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                        Admin Panel
                    </a>
                @endif

                <a href="{{ route('colocation.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    + Create Colocation
                </a>

                <a href="{{ route('colocation.join') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                    Join Colocation
                </a>
            </div>
        </div>

        {{-- Colocations List --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($colocations as $coloc)
                <div class="bg-white shadow-lg rounded-xl p-6 space-y-4 border">

                    <div>
                        <h2 class="text-xl font-semibold">
                            {{ $coloc->name }}
                        </h2>

                        <p class="text-sm text-gray-500">
                            Status: {{ $coloc->status }}
                        </p>

                        <p class="text-sm text-gray-500">
                            Categories:
                            {{ $coloc->categories->pluck('name')->join(', ') ?: 'No categories yet' }}
                        </p>
                    </div>

                    <div class="flex justify-between items-center">

                        <a href="{{ route('colocation.workspace', $coloc->id) }}"
                            class="bg-gray-800 hover:bg-black text-white px-4 py-2 rounded-lg text-sm">
                            Open Workspace
                        </a>

                        @if($coloc->user_id == auth()->id())
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                Owner
                            </span>
                        @else
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                                Member
                            </span>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    You are not part of any colocation yet.
                </div>
            @endforelse

        </div>
    </div>
@endsection