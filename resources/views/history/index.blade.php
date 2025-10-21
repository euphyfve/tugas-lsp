@extends('layouts.table')


@section('judul')
    History
@endsection

@section('table-bos')
    <table class="table table-bordered table-dark table-hover" id="tablesigma">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Maskapai</th>
                <th scope="col" class="text-center">Keberangkatan</th>
                <th scope="col" class="text-center">Nama Pemesan</th>
                <th scope="col" class="text-center">Seat</th>
                <th scope="col" class="text-center">Class</th>
                <th scope="col" class="text-center">Destination</th>
                <th scope="col" class="text-center">total</th>
                <th class="text-center">Confirmation</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $page = $trx->firstItem(); ?>

            @if ($trx->isEmpty())
                <td colspan="10" class="text-center">Data History Kosong</td>
            @endif

            @foreach ($trx as $i)
                <tr>
                    <td class="text-center">{{ $page }}</td>
                    <td class="text-center"> {{ $i->invoice }} </td>
                    <td class="text-center">{{ $i->keberangkatan }}</td>
                    <td class="text-center">{{ $i->nama_user }}</td>
                    <td class="text-center">{{ $i->seat }}</td>
                    <td class="text-center">{{ $i->class }}</td>
                    <td class="text-center">{{ $i->listBandara->lokasi }} - {{ $i->tujuan_akhir }}</td>
                    <td class="text-center">{{ $i->total }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <button class="btn btn-success" disabled >{{ $i->conf }}</button>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('history.detail', $i->id) }}" class="btn btn-outline-warning">Detail</i></a>
                        </div>
                    </td>
                </tr>
                <?php $page++; ?>
            @endforeach
        </tbody>
    </table>

    {{ $trx->links() }}

@endsection
