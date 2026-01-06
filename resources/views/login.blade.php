<!DOCTYPE html>
<head>
    <title>Welcome to My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-200 p-16 rounded shadow-md w-full max-w-6xl text-white">
        <div class="flex items-stretch gap-6">
            <aside class="flex-1 flex items-center justify-center ">
                <img src="/img/task.png" alt="My Tasks Logo" class="w-full h-full object-contain">
            </aside>

            <div class="w-1 bg-gray-900 self-stretch"></div>

            <div class="text-left flex-1 flex flex-col justify-center">
                @if (session('status'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('status') }}</div>
                @endif
                
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <h1 class="text-gray-900 text-4xl font-bold mb-4">Login</h1>
                <p class="text-gray-900 mb-6">Enter your credentials to access your tasks.</p>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-900 mb-2" for="email">Email</label>
                        <input class="text-gray-900 w-full px-3 py-2 border rounded" type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-900 mb-2" for="password">Password</label>
                        <input class="text-gray-900 w-full px-3 py-2 border rounded" type="password" id="password" name="password" required>
                    </div>
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remember" class="rounded">
                            <span class="ml-2 text-gray-900">Remember me</span>
                        </label>
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" type="submit">Login</button>
                    
                    <div class="mt-4">
                        <span class="text-gray-900">Don't have an account?</span>
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>