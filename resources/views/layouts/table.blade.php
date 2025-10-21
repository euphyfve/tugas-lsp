@extends('layouts.welcome')

@section('judul')
    @yield('judul')
@endsection

@section('main-content')

<div class="container" style="width:100%; margin-top:7em;">
    <div class="card p-3" style="background: rgb(35, 30, 30)">
        <div class="card-header">

            @if (session('sukses'))
                <div class="alert alert-success">
                    {{ session('sukses') }}
                </div>
            @endif
            @if (session('gagal'))
                <div class="alert alert-danger">
                    {{ session('gagal') }}
                </div>
            @endif

            @yield('tombol-tombolan')

        </div>
        <div class="card-body">

                @yield('table-bos')

        </div>
    </div>
</div>

@endsection
