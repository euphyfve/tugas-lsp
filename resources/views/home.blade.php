@extends('layouts.table')

@section('judul')
    Home
@endsection

@section('table-bos')
    <!-- Welcome Header -->
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-slate-800 mb-2">
            Selamat Datang Di <span class="text-blue-600">Agra</span><span class="text-red-500">Flight</span>
        </h2>
        <p class="text-slate-600">Quick access to all features</p>
    </div>

    <!-- Feature Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if ( Auth::user()->role == 'admin' or Auth::user()->role == 'maskapai'  )
            <!-- Penerbangan Card -->
            <a href="{{ route('penerbangan.index') }}" class="group">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Penerbangan</h3>
                    <p class="text-blue-100 text-sm">Kelola data penerbangan</p>
                </div>
            </a>

            <!-- Bandara Card -->
            <a href="{{ route('bandara.index') }}" class="group">
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Bandara</h3>
                    <p class="text-green-100 text-sm">Kelola data bandara</p>
                </div>
            </a>
        @endif

        @if ( Auth::user()->role == 'user')
            <!-- Transaksi Card -->
            <a href="{{ route('transaksi.index') }}" class="group">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Transaksi</h3>
                    <p class="text-blue-100 text-sm">Pesan tiket penerbangan</p>
                </div>
            </a>

            <!-- Checkout Card -->
            <a href="{{ route('cekot.index') }}" class="group">
                <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Checkout</h3>
                    <p class="text-yellow-100 text-sm">Selesaikan pembayaran</p>
                </div>
            </a>
        @endif

        <!-- History Card -->
        <a href="{{ route('history.index') }}" class="group">
            <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">History</h3>
                <p class="text-red-100 text-sm">Riwayat transaksi Anda</p>
            </div>
        </a>
    </div>

@endsection
