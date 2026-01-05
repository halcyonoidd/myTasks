<!DOCTYPE html>
<head>
    <title>Dashboard - My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<div class="min-h-screen bg-gradient-to-br bg-gray-200 text-slate-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden lg:flex w-72 flex-col bg-white backdrop-blur border-r border-sky-100 shadow-md">
            <div class="px-8 py-10">
                <div class="flex items-center gap-4 mb-6">
                    <div>
                        <h2 class="text-lg font-semibold">Your Name</h2>
                        <p class="text-sm text-slate-500">youremail@example.com</p>
                    </div>
                </div>

                <nav class="space-y-2 bg-sky-100 rounded-xl p-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 bg-white shadow-sm border border-sky-50">
                        <span class="h-2 w-2 rounded-full bg-sky-500"></span>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-sky-700 hover:bg-sky-50 transition hover:span:bg-sky-500 ">
                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                        <span>My Tasks</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-sky-700 hover:bg-sky-50 transition">
                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                        <span>My Notes</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-sky-700 hover:bg-sky-50 transition">
                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                        <span>My Wishlist</span>
                    </a>
                </nav>

                <div class="mt-10 pt-10 border-t border-sky-100">
                    <form method="POST" action="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-red-600 hover:bg-red-50 transition">
                        @csrf
                        <button type="submit" class="w-full text-left">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>
    </div>
</div>
        