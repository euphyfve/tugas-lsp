@extends('layouts.welcome')

@section('judul')
    History Detail
@endsection

@section('main-content')

<div class="max-w-4xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-slate-800 mb-2">Detail Transaksi</h2>
        <p class="text-slate-600">Informasi lengkap pemesanan tiket penerbangan</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        @if (session('gagal'))
            <div class="p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg mb-6">
                <p class="text-sm text-red-700">{{ session('gagal') }}</p>
            </div>
        @endif

        <div class="p-6 space-y-6">


            <!-- Flight Information -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Informasi Penerbangan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Invoice / Maskapai</label>
                        <div class="bg-white rounded-lg px-4 py-3 text-slate-800 font-semibold">
                            {{ $penerbangan->invoice }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Tujuan Akhir</label>
                        <div class="bg-white rounded-lg px-4 py-3 text-slate-800">
                            {{ $penerbangan->tujuan_akhir }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Departure Info -->
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-2">Waktu Keberangkatan</label>
                <div class="bg-slate-50 rounded-lg px-4 py-3 flex items-center">
                    <svg class="w-5 h-5 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-slate-800 font-medium">{{ $penerbangan->keberangkatan }} - {{ $penerbangan->berangkat }}</span>
                </div>
            </div>



            <!-- Airport Information -->
            <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Informasi Bandara
                </h3>
                <div class="bg-white rounded-lg p-4 mb-3">
                    <div class="text-center text-lg font-bold text-slate-800 mb-3">
                        Bandara {{ $penerbangan->listBandara->nama }}
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Contact</label>
                            <div class="bg-slate-50 rounded px-3 py-2 text-slate-800">
                                {{ $penerbangan->listBandara->contact }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Lokasi</label>
                            <div class="bg-slate-50 rounded px-3 py-2 text-slate-800">
                                {{ $penerbangan->listBandara->lokasi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Booking Details -->
            <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Detail Pemesanan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-lg p-4">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Jumlah Seat</label>
                        <div class="text-2xl font-bold text-blue-600">{{ $penerbangan->seat }}</div>
                        <span class="text-xs text-slate-500">seat</span>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Class</label>
                        <div class="text-2xl font-bold text-purple-600">{{ $penerbangan->class }}</div>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Total Harga</label>
                        <div class="text-2xl font-bold text-green-600">Rp {{ number_format($penerbangan->total, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-center pt-6 border-t border-slate-200">
                <a href="{{ route('history.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-slate-600 hover:bg-slate-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke History
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
