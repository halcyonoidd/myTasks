<!DOCTYPE html>

<head>
    <title>Welcome to My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slide-in-right {
            animation: slideInRight 1s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
        <div class="p-8 md:p-16 rounded-3xl shadow-2xl w-full max-w-6xl bg-gradient-to-br from-gray-100 via-gray-200 to-gray-100 border border-gray-300 animate-fade-in-up">
            <div class="flex flex-col md:flex-row items-stretch gap-6 md:gap-12">
                <div class="text-left flex-1 flex flex-col justify-center space-y-6">
                    <div class="space-y-3" style="animation: fadeInUp 0.8s ease-out 0.2s both;">
                        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                            Welcome to <span class="text-blue-600">My Tasks</span>
                        </h1>
                        <div class="h-1 w-24 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full"></div>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed" style="animation: fadeInUp 0.8s ease-out 0.3s both;">
                        Your personal task management application designed to help you organize, track, and achieve your goals efficiently.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-4" style="animation: fadeInUp 0.8s ease-out 0.4s both;">
                        <a href="/login" class="group relative inline-flex items-center gap-2 bg-blue-500 text-white px-8 py-3 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3v-1"></path>
                            </svg>
                            <span>Login</span>
                        </a>
                        <a href="/register" class="group relative inline-flex items-center gap-2 border-2 border-blue-500 text-blue-600 px-8 py-3 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span>Register</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-6" style="animation: fadeInUp 0.8s ease-out 0.5s both;">
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white bg-opacity-60 hover:bg-opacity-100 shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Manage Tasks</p>
                                <p class="text-xs text-gray-600">Organize your work</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white bg-opacity-60 hover:bg-opacity-100 shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Take Notes</p>
                                <p class="text-xs text-gray-600">Capture ideas</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white bg-opacity-60 hover:bg-opacity-100 shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Create Wishlist</p>
                                <p class="text-xs text-gray-600">Dream & plan</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white bg-opacity-60 hover:bg-opacity-100 shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer transform hover:scale-105">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Stay Secure</p>
                                <p class="text-xs text-gray-600">Protected data</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex flex-1 items-center justify-center p-6" style="animation: slideInRight 1s ease-out 0.3s both;">
                    <div class="relative w-full max-w-lg animate-float">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-600 rounded-3xl blur-3xl opacity-20"></div>
                        <div class="relative">
                            @if(file_exists(public_path('img/landing.jpg')))
                                <img src="/img/landing.jpg" alt="My Tasks Logo" class="w-full object-contain drop-shadow-2xl rounded-2xl">
                            @else
                                <div class="w-full aspect-square bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-2xl">
                                    <svg class="w-40 h-40 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 3a2 2 0 00-2 2v6h6V5a2 2 0 00-2-2H5z"></path>
                                        <path fill-rule="evenodd" d="M15 3a2 2 0 00-2 2v6h6V5a2 2 0 00-2-2h-2zM5 13a2 2 0 00-2 2v2h6v-2a2 2 0 00-2-2H5z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M15 13a2 2 0 00-2 2v2h6v-2a2 2 0 00-2-2h-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>