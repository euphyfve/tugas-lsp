@extends('layouts.welcome')

@section('judul')
    @yield('judul')
@endsection

@section('main-content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Header Section -->
        <div class="px-6 py-5 border-b border-slate-200">
            <!-- Alert Messages -->
            @if (session('sukses'))
                <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm font-medium text-green-800">{{ session('sukses') }}</p>
                    </div>
                </div>
            @endif
            
            @if (session('gagal'))
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm font-medium text-red-800">{{ session('gagal') }}</p>
                    </div>
                </div>
            @endif

            @yield('tombol-tombolan')
        </div>

        <!-- Table Body -->
        <div class="px-6 py-6">
            @yield('table-bos')
        </div>
    </div>
</div>

@endsection
