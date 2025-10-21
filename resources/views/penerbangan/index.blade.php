@extends('layouts.table')


@section('judul')
    Penerbangan
@endsection


@section('tombol-tombolan')
    <div class="d-flex text-white align-items-center justify-content-between">
        <h4>Daftar Penerbangan</h4>
        <a href="{{ route('penerbangan.create') }}" class="btn btn-primary"> + Tambah Penerbangan </a>
    </div>
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
                <td colspan="9" class="text-center">Data Penerbangan Kosong</td>
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
                            <a href="{{ route('penerbangan.edit', $i->id) }}" class="btn btn-warning"><i class='bx bx-edit-alt'></i></a>
                            <button onclick="del({{ $i->id }})" class="btn btn-danger" style="color: black"><i class='bx bx-trash' ></i></button>
                        </div>
                    </td>
                </tr>
                <?php $page++; ?>
            @endforeach
        </tbody>
    </table>
    {{ $penerbangan->links() }}
@endsection

<script>
    function del($id)
    {
        Swal.fire({
        title: "Yakin Ingin Hapus Data?",
        text: "Data yang di hapus tak bisa kembali",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus saja!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="{{ url('penerbangan/del') }}/" + $id
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
        }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
