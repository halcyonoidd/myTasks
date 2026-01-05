<!DOCTYPE html>

<head>
    <title>Welcome to My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="bg-blue-200 flex items-center justify-center min-h-screen">
        <div class="bg-white p-16 rounded shadow-md w-full max-w-6xl">
            <div class="flex items-stretch gap-6">
                <div class="text-left flex-1 flex flex-col justify-center">
                    <h1 class="text-4xl font-bold mb-4">Dashboard</h1>
                    <p class="text-gray-700 mb-6">Welcome back, {{ Auth::user()->name }}!</p>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
                    </form>
                </div>

                <aside class="flex-1 flex items-center justify-center ">
                    <img src="/img/task.png" alt="My Tasks Logo" class="w-full h-full object-contain">
                </aside>
            </div>
        </div>
    </div>
</body>