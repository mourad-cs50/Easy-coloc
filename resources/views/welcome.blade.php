<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to EasyColoc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#f9f7fc] flex flex-col items-center justify-center px-6">

<div class="w-full max-w-6xl font-['Plus_Jakarta_Sans',sans-serif] bg-white p-16 rounded-2xl shadow-lg text-center">

    <!-- Heading -->
    <div class="mb-12">
        <!-- Main Welcome Title -->
        <p class="text-5xl md:text-6xl font-bold tracking-[0.12em] uppercase text-purple-400 mb-6">
            Welcome to EasyColoc
        </p>

        <!-- Secondary Headline -->
        <h1 class="text-4xl md:text-5xl font-semibold text-[#2d2640] leading-tight font-['Instrument_Serif',serif] mb-4">
            Find and Manage Your Colocation Easily
        </h1>

        <p class="text-[1.1rem] md:text-[1.25rem] text-[#b0a8c8] mt-2 leading-relaxed max-w-4xl mx-auto">
            Join our platform to connect with roommates, manage expenses, and make coliving stress-free.
        </p>
    </div>

    <!-- Buttons -->
    <div class="flex flex-col sm:flex-row justify-center gap-6 mt-10">
        <a href="{{ route('register') }}"
           class="inline-flex items-center justify-center gap-3
                  bg-gradient-to-br from-purple-300 to-purple-400
                  text-white text-[1.1rem] md:text-[1.15rem] font-semibold tracking-wide
                  px-10 py-5 rounded-full
                  shadow-xl shadow-purple-300/40
                  hover:opacity-95 hover:-translate-y-0.5
                  active:translate-y-0
                  transition">
            Get Started
            <svg width="16" height="16" viewBox="0 0 14 14" fill="none">
                <path d="M2 7h10M8 3l4 4-4 4"
                      stroke="currentColor"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </a>

        <a href="{{ route('login') }}"
           class="inline-flex items-center justify-center gap-3
                  border-2 border-purple-300 text-purple-500 text-[1.1rem] md:text-[1.15rem] font-semibold tracking-wide
                  px-10 py-5 rounded-full
                  hover:bg-purple-50 hover:text-purple-600
                  transition">
            Sign In
        </a>
    </div>

    <!-- Illustration / Image -->
    <div class="mt-14">
        <img src=""
             alt="Colocation Illustration"
             class="w-full rounded-xl shadow-md">
    </div>

</div>

</body>
</html>