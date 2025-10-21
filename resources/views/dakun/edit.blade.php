@extends('layouts.welcome')

@section('linkcss')
    <link rel="stylesheet" href="../../css/style.css">
@endsection

@section('judul')
    Edit Akun
@endsection


@section('main-content')

<div class="container" id="formtambahpenerbangan">
    <div class="card p-2 col-md-6 mx-auto mt-4" style="background-color: rgb(30, 35, 30);">

        @if (session('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif

        <div class="card-header text-center" style="color: white; font-weight:600;"  >
            <h2>Ganti Password</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('dakun.update') }}" method="post">
                @method("POST")
                @csrf

                <input type="text" name="id" hidden value="{{ $user->id }}">

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Masukkan Email Sebelum ini :</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Username :</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" value="{{ $user->name }}" aria-describedby="emailHelp" required autofocus>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if ($user->id != Auth::user()->id )

                    <label for="exampleInputEmail1" class="form-label text-white ">Role :</label>
                    <select name="role" class="custom-select form-control" required>
                        <option value="user" <?php if($user->role == 'user') echo 'selected' ?> >user</option>
                        <option value="maskapai" <?php if($user->role == 'maskapai') echo 'selected' ?> >maskapai</option>
                    </select>

                @endif

                <div class="d-flex justify-content-center mb-3 mt-3 gap-3">
                    <a href="{{ route('dakun.index') }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>

        </div>
    </div>

@endsection
