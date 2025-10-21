@extends('layouts.welcome')

@section('judul')
    Login
@endsection

@section('main-content')

<div class="container" id="formtambahpenerbangan">
    <div class="card p-4 col-md-5 mx-auto mt-4" style="background-color: rgb(30, 35, 30);">

        @if (session('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif

        <div class="card-header text-center" style="color: white; font-weight:600;"  >
            <h2>Login</h2>
            <h5>Agra<span style="color: red">Flight</span> &nbsp;make your dream comes true </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                @method("POST")
                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3" style="color: white;">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pw" class="form-control @error('pw') is-invalid @enderror" id="exampleInputPassword1">
                    @error('pw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                <p style="color: white">Don't have any account ? <a href="{{ route('regis.index') }}"> Click Here </a> </p>
            </form>
        </div>

        </div>
    </div>

@endsection
