@extends('layouts.table')


@section('judul')
    Transaksi
@endsection

@section('table-bos')
    <table class="table table-bordered table-dark table-hover" id="tablesigma">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Nama Penerbangan</th>
                <th scope="col" class="text-center">Bandara</th>
                <th scope="col" class="text-center">Tujuan</th>
                <th scope="col" class="text-center">Seat</th>
                <th scope="col" class="text-center">Keberangkatan</th>
                <th scope="col" class="text-center">foto</th>
                <th scope="col" class="text-center">harga</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $page = $penerbangan->firstItem(); ?>

            @if ($penerbangan->isEmpty())
                <td colspan="9" class="text-center">Data Transaksi Kosong</td>
            @endif

            @foreach ($penerbangan as $i)
                <tr>
                    <td class="text-center">{{ $page }}</td>
                    <td class="text-center">{{ $i->nama }}</td>
                    <td class="text-center">{{ $i->listBandara->nama }}</td>
                    <td class="text-center">{{ $i->tujuan_akhir }}</td>
                    <td class="text-center">{{ $i->seat }}</td>
                    <td class="text-center">{{ $i->berangkat }}</td>
                    <td class="text-center"><img src="{{ asset('storage/'. $i->foto) }}" alt="" style="width:100px;"></td>
                    <td class="text-center">{{ $i->harga }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('transaksi.pesan', $i->id) }}" class="btn btn-outline-warning">Pesan</i></a>
                        </div>
                    </td>
                </tr>
                <?php $page++; ?>
            @endforeach
        </tbody>
    </table>

    {{ $penerbangan->links() }}

@endsection
