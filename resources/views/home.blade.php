@extends('layouts.table')

@section('judul')
    Home
@endsection

@section('table-bos')
    <div class="d-fletext-white text-center mb-4">
        <h2 class="text-white text-center"> Selamat Datang Di Agra<span style="color: red;">Flight</span> </h2>
        <p class="text-white"> Kami Menyediakan </p>
    </div>

    <table class="table table-bordered table-dark table-hover" id="tablesigma">
        <thead>
            <tr>
                @if ( Auth::user()->role == 'admin' or Auth::user()->role == 'maskapai'  )
                    <th scope="col" class="text-center">
                        <a href="{{ route('penerbangan.index') }}" class="btn btn-primary">
                            Penerbangan
                        </a>
                    </th>
                    <th scope="col" class="text-center">
                        <a href="{{ route('bandara.index') }}" class="btn btn-success">
                            Bandara
                        </a>
                    </th>
                @endif

                @if ( Auth::user()->role == 'user')
                    <th scope="col" class="text-center">
                        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">
                            Transaksi
                        </a>
                    </th>
                @endif

                @if ( Auth::user()->role == 'user')
                    <th scope="col" class="text-center">
                        <a href="{{ route('cekot.index') }}" class="btn btn-warning">
                            Checkout
                        </a>
                    </th>
                @endif

                <th class="text-center">
                    <a href="{{ route('history.index') }}" class="btn btn-danger">
                        History
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

@endsection
