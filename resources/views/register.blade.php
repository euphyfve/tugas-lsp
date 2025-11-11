@extends('layouts.welcome')

@section('judul')
    Register
@endsection

@section('main-content')

<div class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4 py-12">
    <div class="w-full max-w-lg">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-10 text-center">
                <h2 class="text-3xl font-bold text-white mb-2">Create Account</h2>
                <p class="text-blue-100">Join us for more features and menus</p>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <form action="{{ route('regis.store') }}" method="post" class="space-y-5">
                    @method("POST")
                    @csrf

                    <!-- Username Field -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-slate-700 mb-2">
                            Username
                        </label>
                        <input 
                            type="text" 
                            name="nama" 
                            id="nama"
                            value="{{ old('nama') }}" 
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('nama') border-red-500 @enderror"
                            placeholder="Your username"
                            required 
                            autofocus
                        >
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                            required
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
                            required
                        >
                        @error('pw')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="cpw" class="block text-sm font-medium text-slate-700 mb-2">
                            Confirm Password
                        </label>
                        <input 
                            type="password" 
                            name="cpw" 
                            id="cpw"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('cpw') border-red-500 @enderror"
                            placeholder="••••••••"
                            required
                        >
                        @error('cpw')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-sm text-slate-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                            Sign In
                        </a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Footer Text -->
        <p class="text-center text-sm text-slate-500 mt-6">
            By registering, you agree to our Terms & Conditions
        </p>
    </div>
</div>

@endsection
