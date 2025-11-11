@extends('layouts.table')

@section('judul')
    Checkout
@endsection

@section('tombol-tombolan')
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-bold text-slate-800">Keranjang Checkout</h4>
        <div class="text-sm text-slate-600">
            <span class="font-semibold">{{ $trx->total() }}</span> item menunggu pembayaran
        </div>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Keranjang Checkout Kosong
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
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                {{ $i->conf }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <button onclick="del({{ $i->id }})" 
                                    class="inline-flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Hapus
                            </button>
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

<script>
    function del($id) {
        Swal.fire({
            title: "Yakin Ingin Hapus?",
            text: "Uang tidak akan dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3b82f6",
            cancelButtonColor: "#ef4444",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="{{ url('checkout/refund') }}/" + $id
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
