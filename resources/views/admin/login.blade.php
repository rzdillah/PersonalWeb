@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-dark-primary">
    <div class="max-w-md w-full">
        <div class="bg-dark-tertiary rounded-2xl p-8 border border-gray-800/50 shadow-xl">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white">Admin Login</h1>
                <p class="text-gray-400 mt-2">Access your portfolio dashboard</p>
            </div>

            @if(session('error'))
                <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                            placeholder="admin@portfolio.dev"
                        >
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                            placeholder="Enter your password"
                        >
                    </div>

                    <button 
                        type="submit" 
                        class="w-full px-6 py-3 bg-navy-600 text-white rounded-xl font-medium hover:bg-navy-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-navy-500/25 border border-navy-500/30"
                    >
                        Login
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-navy-400 hover:text-navy-300 transition-colors">
                    ← Back to Portfolio
                </a>
            </div>
        </div>

        <!-- Demo credentials note -->
        <div class="mt-6 text-center text-gray-500 text-sm">
            <p>Demo: admin@portfolio.dev / portfolio123</p>
        </div>
    </div>
</section>
@endsection