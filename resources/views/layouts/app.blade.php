<!DOCTYPE html>
<head>
    <title>{{ $title ?? 'My Tasks' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes sidebarSlideIn {
            from { transform: translateX(-12px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes pulse-soft {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .nav-item-active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, #0284c7, #0ea5e9);
            border-radius: 0 8px 8px 0;
        }
    </style>
</head>
<body>
@php($user = auth()->user())
@php($current = request()->route()?->getName())
@php(
    $navCounts = [
        'tasks' => $user?->relationLoaded('tasks') ? $user->tasks->count() : ($user?->tasks()->count() ?? 0),
        'notes' => $user?->relationLoaded('notes') ? $user->notes->count() : ($user?->notes()->count() ?? 0),
        'wishlist' => $user?->relationLoaded('wishlistItems') ? $user->wishlistItems->count() : ($user?->wishlistItems()->count() ?? 0),
    ]
)

<div class="min-h-screen bg-gradient-to-br bg-gray-900 text-slate-800">
    <div class="flex min-h-screen">
        <aside class="hidden lg:flex w-72 flex-col bg-gray-200 shadow-2xl border-r border-slate-200 fixed left-0 top-0 h-screen overflow-hidden" style="animation: sidebarSlideIn 0.45s ease-out;">
            <div class="py-8 space-y-6 h-full flex flex-col overflow-y-auto">
                <!-- User Profile Card -->
                <div class="px-6">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white border border-sky-200 shadow-sm">
                        <div class="h-12 w-12 flex items-center justify-center rounded-full bg-gray-900 text-white font-bold shadow-md">
                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <h2 class="text-sm font-bold text-slate-900 truncate">{{ $user->name ?? 'User' }}</h2>
                            <p class="text-xs text-slate-600 truncate">{{ $user->email ?? 'email@example.com' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" class="relative flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 {{ $current === 'dashboard' ? 'nav-item-active bg-white text-sky-700 shadow-md border border-sky-100' : 'text-slate-700 hover:text-sky-700 hover:bg-white hover:shadow-sm' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4"></path></svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('tasks') }}" class="relative flex items-center justify-between px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 {{ $current === 'tasks' ? 'nav-item-active bg-white text-sky-700 shadow-md border border-sky-100' : 'text-slate-700 hover:text-sky-700 hover:bg-white hover:shadow-sm' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            <span>My Tasks</span>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-sky-100 text-sky-700">{{ $navCounts['tasks'] }}</span>
                    </a>
                    
                    <a href="{{ route('notes') }}" class="relative flex items-center justify-between px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 {{ $current === 'notes' ? 'nav-item-active bg-white text-sky-700 shadow-md border border-sky-100' : 'text-slate-700 hover:text-sky-700 hover:bg-white hover:shadow-sm' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            <span>My Notes</span>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-amber-100 text-amber-700">{{ $navCounts['notes'] }}</span>
                    </a>
                    
                    <a href="{{ route('wishlist') }}" class="relative flex items-center justify-between px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 {{ $current === 'wishlist' ? 'nav-item-active bg-white text-sky-700 shadow-md border border-sky-100' : 'text-slate-700 hover:text-sky-700 hover:bg-white hover:shadow-sm' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            <span>My Wishlist</span>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700">{{ $navCounts['wishlist'] }}</span>
                    </a>
                </nav>

                <!-- Logout Button -->
                <div class="px-4 pb-6 border-t border-slate-200 pt-4 mt-auto">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-sm text-slate-700 hover:text-red-600 hover:bg-red-50 transition-all duration-200 border border-transparent hover:border-red-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="flex-1 bg-white/90 text-slate-900 lg:ml-72">
            <div class="max-w-6xl mx-auto px-6 py-10">
                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
