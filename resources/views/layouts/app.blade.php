<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rizky Fikry Fadillah - Front End Developer</title>
    <meta name="description"
        content="Personal website of Rizky Fadillah - Front End Developer creating premium digital experiences">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
</head>

<body class="font-inter antialiased bg-dark-primary">
    <div id="app">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 bg-dark-primary/20 backdrop-blur-xl border-b border-gray-800/30">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <!-- Left side - Logo -->
                    <a href="/"
                        class="text-xl font-semibold text-white bg-gradient-to-r from-navy-400 to-blue-400 bg-clip-text text-transparent">
                        Rizky Fikry
                    </a>

                    <!-- Center - Navigation -->
                    <div class="hidden md:flex space-x-8">
                        <a href="{{ Request::is('/') ? '#about' : '/' }}#about"
                            class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-105 relative group">
                            Tentang
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-navy-400 to-blue-400 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="{{ Request::is('/') ? '#projects' : '/' }}#projects"
                            class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-105 relative group">
                            Projek
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-navy-400 to-blue-400 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="{{ Request::is('/') ? '#skills' : '/' }}#skills"
                            class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-105 relative group">
                            Skills
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-navy-400 to-blue-400 group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="{{ Request::is('/') ? '#contact' : '/' }}#contact"
                            class="text-gray-400 hover:text-white transition-all duration-300 hover:scale-105 relative group">
                            Kontak
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-navy-400 to-blue-400 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </div>

                    <!-- Right side - All buttons together -->
                    <div class="flex items-center space-x-3">
                        @if(Auth::check() && Auth::user()->email === 'rizkyfikryfadillah@gmail.com')
                            <!-- Admin Panel Button -->
                            <a href="{{ route('admin.projects.index') }}"
                                class="hidden md:flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-indigo-500/25">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Admin</span>
                            </a>

                            <!-- Logout Button -->
                            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit"
                                    class="flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-lg font-medium hover:from-red-700 hover:to-pink-700 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-red-500/25">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        @else
                            <!-- Contact Button for non-admin users -->
                            <div class="hidden md:block">
                                <a href="{{ Request::is('/') ? '#contact' : '/' }}#contact"
                                    class="px-4 py-2 bg-gradient-to-r from-navy-600 to-blue-600 text-white rounded-lg font-medium hover:from-navy-700 hover:to-blue-700 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-navy-500/25">
                                    Hubungi Saya
                                </a>
                            </div>
                        @endif

                        <!-- Mobile menu button -->
                        <button class="md:hidden p-2 text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="relative">
            <!-- Global Background Elements -->
            <div class="fixed inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-navy-900/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-1/2 h-1/2 bg-blue-900/10 rounded-full blur-3xl"></div>
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-navy-500/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
                <div class="absolute top-1/3 left-1/4 w-60 h-60 bg-navy-600/5 rounded-full blur-3xl"></div>
            </div>

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="border-t border-gray-800/50">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-400 mb-4 md:mb-0">
                        &copy; 2025 Rizky Fikry. All rights reserved.
                    </div>
                    <div class="flex space-x-6">
                        @foreach($userData['social'] as $platform => $url)
                            <a href="{{ $url }}" class="text-gray-500 hover:text-white transition-colors">
                                <span class="sr-only">{{ ucfirst($platform) }}</span>
                                <!-- Social icons would go here -->
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>