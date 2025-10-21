@extends('layouts.table')

@section('judul')
    Daftar Akun
@endsection

@if (Auth::user()->role == 'admin')
    @section('tombol-tombolan')
        <div class="d-flex text-white align-items-center justify-content-between">
            <h4>Daftar Akun</h4>
            <a href="{{ route('dakun.create') }}" class="btn btn-primary"> + Tambah Akun </a>
        </div>
    @endsection
@endif

@section('table-bos')
    <table class="table table-bordered table-dark table-hover" id="tablesigma">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Nama User</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Role</th>
                @if ( Auth::user()->role == 'admin' )
                    <th class="text-center">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <?php $page = $user->firstItem(); ?>

            @if ($user->isEmpty())
                <td colspan="9" class="text-center">Data Akun Kosong</td>
            @endif

            @foreach ($user as $i)
                <tr>
                    <td class="text-center">{{ $page }}</td>
                    <td class="text-center">{{ $i->name }}</td>
                    <td class="text-center">{{ $i->email }}</td>
                    <td class="text-center">{{ $i->role }}</td>

                    @if ( Auth::user()->role != 'maskapai' )
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('dakun.edit', $i->id) }}" class="btn btn-warning" style="color: black"><i class='bx bx-edit-alt'></i></a>

                                @if ($i->id != Auth::user()->id )
                                    <button onclick="del({{ $i->id }})" class="btn btn-danger" style="color: black"><i class='bx bx-trash' ></i></button>
                                    @endif

                                    <a href="{{ route('dakun.ganti', $i->id) }}" class="btn btn-outline-warning">Ganti Pw</i></a>
                                </div>
                            </td>
                        </tr>
                    @endif

                <?php $page++; ?>
            @endforeach
        </tbody>
    </table>

    {{ $user->links() }}

@endsection

<script>
    function del($id)
    {
        Swal.fire({
        title: "Yakin Ingin Hapus Akun ??",
        text: "Akun yang di hapus tak bisa di kembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus Saja!"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="{{ url('dakun/del') }}/" + $id
            Swal.fire({
            title: "Deleted!",
            text: "Your account has been deleted.",
            icon: "success"
            });
        }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
