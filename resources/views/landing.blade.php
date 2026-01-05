<!DOCTYPE html>

<head>
    <title>Welcome to My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- buat halaman landing sederhana, berbeda dengan login dan register -->
    <div class = "bg-blue-200 flex items-center justify-center min-h-screen">
        <div class="bg-white p-16 rounded shadow-md w-full max-w-6xl">
            <div class="flex items-stretch gap-6">
                <div class="text-left flex-1 flex flex-col justify-center">
                    <h1 class="text-4xl font-bold mb-4">Welcome to My Tasks</h1>
                    <p class="text-gray-700 mb-6">Your personal task management application.</p>
                    <div class="flex gap-4">
                        <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 inline-block">Login</a>
                        <a href="/register" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 inline-block">Register</a>
                    </div>
                </div>

                <aside class="flex-1 flex items-center justify-center ">
                    <img src="/img/task.png" alt="My Tasks Logo" class="w-full h-full object-contain">
                </aside>
            </div>
        </div>
    </div>

</body>