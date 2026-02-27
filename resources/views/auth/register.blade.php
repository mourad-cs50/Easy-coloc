<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#f9f7fc] flex items-center justify-center px-6">

<div class="w-full max-w-md font-['Plus_Jakarta_Sans',sans-serif] bg-white p-10 rounded-2xl shadow-sm border border-[#f0ecf7]">

    <!-- Heading -->
    <div class="mb-8">
        <p class="text-[0.65rem] font-medium tracking-[0.12em] uppercase text-purple-300 mb-1">
            Welcome aboard
        </p>

        <h1 class="text-2xl font-semibold text-[#2d2640] leading-tight font-['Instrument_Serif',serif]">
            Create your account
        </h1>

        <p class="text-[0.78rem] text-[#b0a8c8] mt-1.5 leading-relaxed">
            Fill in the details below to get started.
        </p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-[0.7rem] font-medium tracking-[0.06em] text-[#9b94b3] mb-1.5">
                Full name
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   placeholder="Jane Smith"
                   class="w-full bg-white border border-[#e8e3f0] rounded-xl px-4 py-2.5 text-sm text-[#2d2640]
                          placeholder-[#c8c2d8]
                          focus:border-purple-300 focus:ring-4 focus:ring-purple-200/40 focus:outline-none
                          transition" />
        </div>

        <!-- Email -->
        <div>
            <label class="block text-[0.7rem] font-medium tracking-[0.06em] text-[#9b94b3] mb-1.5">
                Email address
            </label>

            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   placeholder="jane@example.com"
                   class="w-full bg-white border border-[#e8e3f0] rounded-xl px-4 py-2.5 text-sm text-[#2d2640]
                          placeholder-[#c8c2d8]
                          focus:border-purple-300 focus:ring-4 focus:ring-purple-200/40 focus:outline-none
                          transition" />
        </div>

        <!-- Password Row -->
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block text-[0.7rem] font-medium tracking-[0.06em] text-[#9b94b3] mb-1.5">
                    Password
                </label>

                <input type="password"
                       name="password"
                       required
                       placeholder="••••••••"
                       class="w-full bg-white border border-[#e8e3f0] rounded-xl px-4 py-2.5 text-sm text-[#2d2640]
                              placeholder-[#c8c2d8]
                              focus:border-purple-300 focus:ring-4 focus:ring-purple-200/40 focus:outline-none
                              transition" />
            </div>

            <div>
                <label class="block text-[0.7rem] font-medium tracking-[0.06em] text-[#9b94b3] mb-1.5">
                    Confirm
                </label>

                <input type="password"
                       name="password_confirmation"
                       required
                       placeholder="••••••••"
                       class="w-full bg-white border border-[#e8e3f0] rounded-xl px-4 py-2.5 text-sm text-[#2d2640]
                              placeholder-[#c8c2d8]
                              focus:border-purple-300 focus:ring-4 focus:ring-purple-200/40 focus:outline-none
                              transition" />
            </div>

        </div>

        <!-- Footer -->
        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('login') }}"
               class="text-[0.75rem] text-[#b0a8c8] hover:text-[#7c6fa0] transition">
                Already have an account?
                <span class="text-purple-400 hover:text-purple-600">
                    Sign in
                </span>
            </a>

            <button type="submit"
                    class="inline-flex items-center gap-2
                           bg-gradient-to-br from-purple-300 to-purple-400
                           text-white text-[0.8rem] font-semibold tracking-wide
                           px-7 py-2.5 rounded-full
                           shadow-md shadow-purple-300/40
                           hover:opacity-95 hover:-translate-y-0.5
                           active:translate-y-0
                           transition">
                Create account
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M2 7h10M8 3l4 4-4 4"
                          stroke="currentColor"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

    </form>

</div>

</body>
</html>