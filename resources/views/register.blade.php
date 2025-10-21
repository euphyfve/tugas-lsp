@extends('layouts.welcome')


@section('judul')
    Register
@endsection


@section('main-content')

<div class="container" id="formtambahpenerbangan">
    <div class="card p-2 col-md-6 mx-auto mt-4" style="background-color: rgb(30, 35, 30);">

        <div class="card-header text-center" style="color: white; font-weight:600;"  >
            <h2>Register</h2>
            <h5>Join Us For More Fiture And Menus</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('regis.store') }}" method="post">
                @method("POST")
                @csrf

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('nama') }}" aria-describedby="emailHelp" required autofocus>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pw" class="form-control @error('pw') is-invalid @enderror" id="exampleInputPassword1" required>
                    @error('pw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3" style="color: white;">
                    <label for="exampleInputEmail1" class="form-label">Confirm Pasword</label>
                    <input type="password" name="cpw" class="form-control @error('cpw') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    @error('cpw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                <p style="color: white">Already have an account ? <a href="{{ route('login') }}"> Click Here </a> </p>
            </form>
        </div>

        </div>
    </div>

@endsection
