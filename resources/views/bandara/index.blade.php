@extends('layouts.table')

@section('judul')
    Bandara
@endsection

@section('tombol-tombolan')
    <div class="d-flex text-white align-items-center justify-content-between">
        <h4>Daftar Bandara</h4>
        <a href="{{ route('bandara.create') }}" class="btn btn-primary"> + Tambah Bandara </a>
    </div>
@endsection

@section('table-bos')
<table class="table table-bordered table-dark table-hover" id="tablesigma">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nama Bandara</th>
            <th scope="col" class="text-center">Lokasi</th>
            <th scope="col" class="text-center">Contact</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $page = $bandara->firstItem(); ?>

        @if ($bandara->isEmpty())
            <td colspan="9" class="text-center">Data Bandara Kosong</td>
        @endif

        @foreach ($bandara as $i)
            <tr>
                <td class="text-center">{{ $page }}</td>
                <td class="text-center">{{ $i->nama }}</td>
                <td class="text-center">{{ $i->lokasi }}</td>
                <td class="text-center">{{ $i->contact }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('bandara.edit', $i->id) }}" class="btn btn-warning"><i class='bx bx-edit-alt'></i></a>
                        <button onclick="del({{ $i->id }})" class="btn btn-danger" style="color: black"><i class='bx bx-trash' ></i></button>
                    </div>
                </td>
            </tr>
            <?php $page++; ?>
        @endforeach
    </tbody>
</table>
{{ $bandara->links() }}
@endsection


<script>
    function del($id)
    {
        Swal.fire({
        title: "Yakin menghapus bandara ?",
        text: "Bandara tidak akan bisa kembali",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="{{ url('bandara/del') }}/" + $id
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
