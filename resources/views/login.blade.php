<!DOCTYPE html>
<head>
    <title>Welcome to My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-16 rounded shadow-md w-full max-w-6xl">
        <div class="flex items-stretch gap-6">
            <aside class="flex-1 flex items-center justify-center ">
                <img src="/img/task.png" alt="My Tasks Logo" class="w-full h-full object-contain">
            </aside>

            <div class="w-1 bg-gray-200 self-stretch"></div>

            <div class="text-left flex-1 flex flex-col justify-center">
                <h1 class="text-4xl font-bold mb-4">Login</h1>
                <p class="text-gray-700 mb-6">Enter your credentials to access your tasks.</p>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="email">Email</label>
                        <input class="w-full px-3 py-2 border rounded" type="email" id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="password">Password</label>
                        <input class="w-full px-3 py-2 border rounded" type="password" id="password" name="password" required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2" for="password_confirmation">Confirm Password</label>
                        <input class="w-full px-3 py-2 border rounded" type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>