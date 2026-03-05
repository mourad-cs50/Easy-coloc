
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>EasyColoc Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://cdn.tailwindcss.com"></script>

   
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#f9f7fc] flex flex-col items-center justify-center px-4">
    <div class="w-full max-w-4xl bg-white p-12 rounded-2xl shadow-lg text-center font-['Plus_Jakarta_Sans']">

       
        <h1 class="text-5xl font-bold text-purple-400 mb-6">Welcome to EasyColoc</h1>
        <p class="text-lg text-gray-600 mb-12">
           Choose what you want to do: create a new coloc or join an existing coloc.
        </p>

       
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            
            
            <a href="{{ route('colocation.create') }}"
               class="inline-flex items-center justify-center gap-2
                      bg-gradient-to-br from-purple-300 to-purple-400
                      text-white text-lg font-semibold
                      px-8 py-4 rounded-full shadow-lg
                      hover:opacity-95 hover:-translate-y-0.5
                      transition">
               Create a coloc
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M3 10h14M10 3l7 7-7 7"
                          stroke="currentColor"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>

           
            <a href="/join-coloc"
               class="inline-flex items-center justify-center gap-2
                      border-2 border-purple-300 text-purple-500 text-lg font-semibold
                      px-8 py-4 rounded-full
                      hover:bg-purple-50 hover:text-purple-600
                      transition">
                Join a coloc
            </a>

        </div>

        
        <div class="mt-12">
            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=800&q=80"
                 alt="Colocation Illustration"
                 class="w-full rounded-xl shadow-md">
        </div>

    </div>

</body>
</html>