@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto p-8 space-y-8">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-red-600">Admin Dashboard</h1>
                <p class="text-gray-500">Manage users and system access</p>
            </div>

            <a href="{{ route('dashboard') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg">
                Back to Dashboard
            </a>
        </div>

        {{-- Users Table --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">

            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Role</th>
                        <th class="p-4">Colocations</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="p-4 font-medium">
                                {{ $user->name }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $user->email }}
                            </td>

                            <td class="p-4">
                                @if($user->is_admin)
                                    <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs">
                                        Admin
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">
                                        User
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-sm text-gray-500">
                                {{ $user->colocations->count() }}
                            </td>

                            <td class="p-4 flex gap-2">

                                {{-- Ban Button --}}
                                @if(!$user->is_admin)
                                    <form method="POST" action="#">
                                        @csrf
                                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Ban
                                        </button>
                                    </form>
                                @endif

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                No users found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection