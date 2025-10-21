@extends('layouts.welcome')

@section('linkcss')
    <link rel="stylesheet" href="../../css/style.css">
@endsection

@section('judul')
    Transaksi
@endsection

@section('main-content')

<div class="container" id="formtambahpenerbangan">
    <div class="card p-2 col-md-6 mx-auto mt-4" style="background-color: rgb(30, 35, 30);">

        <div class="card-header text-center" style="color: white; font-weight:600;"  >
            <h2>Pesan Maskapai</h2>
        </div>

        <div class="card-body">

            @if (session('gagal'))
                <div class="alert alert-danger">
                    {{ session('gagal') }}
                </div>
            @endif

            <form action="{{ route('transaksi.gas') }}" method="post">
                @method("POST")
                @csrf

                <input type="text" name="id" value="{{ $penerbangan->id }}" hidden>

                {{-- nama maskapai --}}
                <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput">Nama Maskapai &nbsp;&nbsp;</label>
                        <input type="text" placeholder="Nama Penerbangan" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" value="{{ $penerbangan->nama }}" aria-describedby="emailHelp" autocomplete="off" disabled>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput">Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" placeholder="Tujuan Akhir" name="Takhir" class="form-control @error('Takhir') is-invalid @enderror" value="{{ $penerbangan->tujuan_akhir }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" disabled>
                        @error('Takhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput" >Keberangkatan </label>
                    </div>
                    <div class="sigma" style="width: 100%;">
                        <input type="text" placeholder="Keberangkatan" name="berangkat" class="form-control @error('berangkat') is-invalid @enderror" value="{{ $penerbangan->berangkat }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" disabled>
                        @error('berangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>



                {{-- bandara --}}
                <div class="text-center mb-2" id="infodalamtrx">Informasi Bandara</div>

                <div class="input-group mb-3" id="sigmaselections">
                    <input type="text" placeholder="" name="bandara" class="form-control @error('bandara') is-invalid @enderror text-center" value="Bandara {{ $penerbangan->listBandara->nama }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" disabled>
                </div>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group mb-3" id="sigmaselections">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput">Contact</label>
                        <input type="text" placeholder="" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ $penerbangan->listBandara->contact }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" disabled>
                    </div>

                    <div class="input-group mb-3" id="sigmaselections">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput">Lokasi</label>
                        <input type="text" placeholder="" name="lokbandara" class="form-control @error('lokbandara') is-invalid @enderror" value="{{ $penerbangan->listBandara->lokasi }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" disabled>
                    </div>
                </div>



                {{-- info lainnya --}}
                <div class="text-center mb-2" id="infodalamtrx">Mohon Isi Data Berikut</div>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                        <input type="number" name="seat" placeholder="seat" oninput="sum()" class="form-control @error('seat') is-invalid @enderror"  value="{{ old('seat') }}" id="seatsigma" autocomplete="off" required>
                        @error('seat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <select name="class" class="custom-select form-control" oninput="sum()" id="klas" required>
                            <option value="" selected hidden>Pilih Class</option>
                            <option value="1">Economy Class</option>
                            <option value="3">Business Class</option>
                            <option value="5">High Class</option>
                    </select>
                </div>

                <input type="number" oninput="sum()" name="hargawal" value="{{ $penerbangan->harga }}" id="hargawal" hidden>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput">Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="number" placeholder="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" id="inputsigma" aria-describedby="emailHelp" autocomplete="off" disabled>
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mx-auto d-flex justify-content-center gap-3" >
                    <a href="{{ route('transaksi.index') }}" class="btn btn-danger"> Back </a>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>

        </div>
    </div>

@endsection

<script>
    function sum(){
        var klasValue = document.getElementById('klas').value;
        var hargaValue = document.getElementById('hargawal').value;
        var seat = document.getElementById('seatsigma').value;
        var result = parseInt(seat) * parseInt(klasValue) * parseInt(hargaValue);
        if(!isNaN(result)){
            document.getElementById('inputsigma').value = result;
        }
    }
</script>
