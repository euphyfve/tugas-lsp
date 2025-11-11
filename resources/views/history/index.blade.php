@extends('layouts.table')

@section('judul')
    History
@endsection

@section('tombol-tombolan')
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-bold text-slate-800">Riwayat Transaksi</h4>
    </div>
@endsection

@section('table-bos')
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">#</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Invoice</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Keberangkatan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Pemesan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Seat</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Class</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Destination</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Total</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                <?php $page = $trx->firstItem(); ?>

                @if ($trx->isEmpty())
                    <tr>
                        <td colspan="10" class="px-4 py-8 text-center text-slate-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Data History Kosong
                            </div>
                        </td>
                    </tr>
                @endif

                @foreach ($trx as $i)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $page }}</td>
                        <td class="px-4 py-4 text-center text-sm font-medium text-slate-900">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-slate-100 text-slate-800">
                                {{ $i->invoice }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $i->keberangkatan }}
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $i->nama_user }}</td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $i->seat }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ $i->class }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $i->listBandara->lokasi }} → {{ $i->tujuan_akhir }}
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center text-sm font-semibold text-slate-900">
                            Rp {{ number_format($i->total, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-center">
                            @if($i->conf == 'Confirmed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $i->conf }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $i->conf }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-center">
                            <a href="{{ route('history.detail', $i->id) }}" 
                               class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Detail
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
        {{ $trx->links() }}
    </div>

@endsection
