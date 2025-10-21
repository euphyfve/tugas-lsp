@extends('layouts.welcome')

@section('linkcss')
    <link rel="stylesheet" href="../../css/style.css">
@endsection

@section('judul')
    Ganti Password
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
            <form action="{{ route('dakun.change') }}" method="post">
                @method("POST")
                @csrf

                <input type="text" name="id" hidden value="{{ $user->id }}">

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Masukkan Email Sebelum ini</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('emailnew') }}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputPassword1" class="form-label">Enter New Password</label>
                    <input type="password" name="pw" class="form-control @error('pw') is-invalid @enderror" id="exampleInputPassword1" required>
                    @error('pw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Confirm New Pasword</label>
                    <input type="password" name="cpw" class="form-control @error('cpw') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('cpw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center mb-3 gap-3">
                    <a href="{{ route('dakun.index') }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>

        </div>
    </div>

@endsection
