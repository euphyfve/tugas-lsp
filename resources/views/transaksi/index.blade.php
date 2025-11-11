@extends('layouts.table')

@section('judul')
    Transaksi
@endsection

@section('tombol-tombolan')
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-bold text-slate-800">Daftar Penerbangan Tersedia</h4>
    </div>
@endsection

@section('table-bos')
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">#</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Bandara</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Tujuan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Seat</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Keberangkatan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Foto</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Harga</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                <?php $page = $penerbangan->firstItem(); ?>

                @if ($penerbangan->isEmpty())
                    <tr>
                        <td colspan="9" class="px-4 py-8 text-center text-slate-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Data Transaksi Kosong
                            </div>
                        </td>
                    </tr>
                @endif

                @foreach ($penerbangan as $i)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $page }}</td>
                        <td class="px-4 py-4 text-center text-sm font-medium text-slate-900">{{ $i->nama }}</td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $i->listBandara->nama }}</td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $i->tujuan_akhir }}</td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $i->seat }} tersedia
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $i->berangkat }}</td>
                        <td class="px-4 py-4 text-center">
                            <img src="{{ asset('storage/'. $i->foto) }}" alt="Flight" class="w-20 h-20 object-cover rounded-lg mx-auto shadow-sm">
                        </td>
                        <td class="px-4 py-4 text-center text-sm font-semibold text-slate-900">Rp {{ number_format($i->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center">
                            <a href="{{ route('transaksi.pesan', $i->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Pesan
                            </a>
                        </td>
                    </tr>
                    <?php $page++; ?>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $penerbangan->links() }}
    </div>

@endsection
