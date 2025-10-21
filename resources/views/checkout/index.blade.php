@extends('layouts.table')


@section('judul')
    Checkout
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
                <td colspan="10" class="text-center">Data Checkout Kosong</td>
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
                            <button class="btn btn-warning" disabled >{{ $i->conf }}</button>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a onclick="del({{ $i->id }})" class="btn btn-outline-danger">Hapus</i></a>
                        </div>
                    </td>
                </tr>
                <?php $page++; ?>
            @endforeach
        </tbody>
    </table>

    {{ $trx->links() }}

@endsection

<script>
    function del($id)
    {
        Swal.fire({
        title: "Yakin Ingin Hapus ??",
        text: "Uang Tidak akan di kembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Saya bersedia!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="{{ url('checkout/refund') }}/" + $id
            Swal.fire({
            title: "Berhasil!",
            text: "Penghapusan Berhasil",
            icon: "success"
            });
        }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
