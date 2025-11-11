@extends('layouts.table')

@section('judul')
    Penerbangan
@endsection

@section('tombol-tombolan')
    <div class="flex items-center justify-between">
        <h4 class="text-xl font-bold text-slate-800">Daftar Penerbangan</h4>
        <a href="{{ route('penerbangan.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Penerbangan
        </a>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                Data Penerbangan Kosong
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
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $i->seat }}</td>
                        <td class="px-4 py-4 text-center text-sm text-slate-700">{{ $i->berangkat }}</td>
                        <td class="px-4 py-4 text-center">
                            <img src="{{ asset('storage/'. $i->foto) }}" alt="Flight" class="w-20 h-20 object-cover rounded-lg mx-auto shadow-sm">
                        </td>
                        <td class="px-4 py-4 text-center text-sm font-semibold text-slate-900">Rp {{ number_format($i->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('penerbangan.edit', $i->id) }}" 
                                   class="inline-flex items-center px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200">
                                    <i class='bx bx-edit-alt'></i>
                                </a>
                                <button onclick="del({{ $i->id }})" 
                                        class="inline-flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </div>
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

<script>
    function del($id) {
        Swal.fire({
            title: "Yakin Ingin Hapus Data?",
            text: "Data yang dihapus tidak bisa dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3b82f6",
            cancelButtonColor: "#ef4444",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="{{ url('penerbangan/del') }}/" + $id
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
