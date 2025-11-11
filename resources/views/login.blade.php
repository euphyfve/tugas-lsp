@extends('layouts.welcome')

@section('judul')
    Login
@endsection

@section('main-content')

<div class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4 py-12">
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-10 text-center">
                <h2 class="text-3xl font-bold text-white mb-2">Welcome Back</h2>
                <p class="text-blue-100">
                    <span class="font-semibold">Agra<span class="text-red-300">Flight</span></span> - Make your dream comes true
                </p>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                @if (session('gagal'))
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                        <p class="text-sm text-red-700">{{ session('gagal') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                    @csrf
                    @method("POST")
                    
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                            Email Address
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            value="{{ old('email') }}" 
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror"
                            placeholder="your@email.com"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                            Password
                        </label>
                        <input 
                            type="password" 
                            name="pw" 
                            id="password"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('pw') border-red-500 @enderror"
                            placeholder="••••••••"
                        >
                        @error('pw')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Sign In
                    </button>

                    <!-- Register Link -->
                    <p class="text-center text-sm text-slate-600">
                        Don't have an account? 
                        <a href="{{ route('regis.index') }}" class="font-semibold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                            Create Account
                        </a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Footer Text -->
        <p class="text-center text-sm text-slate-500 mt-6">
            Secure login powered by AgraFlight
        </p>
    </div>
</div>

@endsection
