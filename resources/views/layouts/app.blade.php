<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DebtSplit')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f5f5] dark:bg-[#0a0a0a] min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-[#0a0a0a] border-b border-[#19140010] dark:border-[#3E3E3A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="/" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-[#f53003] rounded-lg flex items-center justify-center shadow-lg shadow-red-500/20">
                            <span class="text-white font-black text-xl">$</span>
                        </div>
                        <span class="text-xl font-bold tracking-tighter dark:text-white">
                            Debt<span class="text-[#f53003]">Split</span>
                        </span>
                    </a>
                    <!-- Desktop Links -->
                    <div class="hidden space-x-8 sm:flex sm:ml-10">
                        @if (auth()->user()->colocations->count() > 0)
                        <a href="{{route('colocation.workspace', auth()->user()->colocations->first())}}" class="text-sm font-bold uppercase tracking-widest text-[#706f6c] dark:text-[#A1A09A] hover:text-black dark:hover:text-white border-b-2 border-transparent">workspace</a>
                        <a href="{{ route('dashboard') }}" class="text-sm font-bold uppercase tracking-widest text-black dark:text-white border-b-2 border-transparent">Dashboard</a>
                        @elseif (auth()->user()->colocations->count() === 0)
                        <a href="{{ route('dashboard') }}" class="text-sm font-bold uppercase tracking-widest text-black dark:text-white border-b-2 border-transparent">Dashboard</a>
                        @endif
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6 relative">
                    <button id="userBtn" class="inline-flex items-center px-4 py-2 border border-[#19140015] dark:border-[#3E3E3A] text-sm font-bold rounded-xl text-[#1b1b18] dark:text-[#EDEDEC] bg-white dark:bg-[#161615] hover:bg-gray-50 dark:hover:bg-white/5 transition duration-150 ease-in-out">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="fill-current h-4 w-4 opacity-50 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-[#161615] rounded-lg shadow-lg p-2 space-y-1">
                        <a href="/profile" class="block rounded-lg font-medium px-4 py-2 hover:bg-gray-100 dark:hover:bg-white/5">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left rounded-lg font-medium text-red-500 hover:text-red-600 px-4 py-2">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="py-12">
        @yield('content')
    </main>

    <script>
        // User dropdown toggle
        const userBtn = document.getElementById('userBtn');
        const userMenu = document.getElementById('userMenu');
        userBtn?.addEventListener('click', () => userMenu?.classList.toggle('hidden'));

        // Close dropdown when clicking outside
        window.addEventListener('click', e => {
            if (!userBtn?.contains(e.target) && !userMenu?.contains(e.target)) {
                userMenu?.classList.add('hidden');
            }
        });
    </script>
</body>
</html>