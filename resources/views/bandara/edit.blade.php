@extends('layouts.welcome')

@section('linkcss')
    <link rel="stylesheet" href="../../css/style.css">
@endsection

@section('judul')
    Bandara
@endsection


@section('main-content')

<div class="container" style="margin-top: 9em;">
    <div class="card p-2 col-md-6 mx-auto mt-4" style="background-color: rgb(30, 35, 30);">

        <div class="card-header text-center" style="color: white; font-weight:600;"  >
            <h2>Edit Bandara</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('bandara.update') }}" method="post" enctype="multipart/form-data">
                @method("PUT")
                @csrf

                <input type="text" value="{{ $bandara->id }}" name="id" hidden>

                <div class="mb-3">
                    <input type="text" placeholder="Nama Bandara" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" value="{{ $bandara->nama }}" aria-describedby="emailHelp" autocomplete="off" required autofocus>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <div class="mb-3">
                    <input type="text" placeholder="Lokasi Bandara" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" id="exampleInputEmail1" value="{{ $bandara->lokasi }}" aria-describedby="emailHelp" autocomplete="off" required autofocus>
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <div class="mb-3">
                    <input type="text" placeholder="Contact" name="contact" class="form-control @error('contact') is-invalid @enderror" id="exampleInputEmail1" value="{{ $bandara->contact }}" aria-describedby="emailHelp" autocomplete="off" required autofocus>
                    @error('contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mx-auto d-flex justify-content-center gap-3" >
                    <a href="{{ route('bandara.index') }}" class="btn btn-danger"> Back </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        </div>
    </div>

@endsection
