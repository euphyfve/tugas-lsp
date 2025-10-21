@extends('layouts.welcome')

@section('linkcss')
    <link rel="stylesheet" href="../../css/style.css">
@endsection

@section('judul')
    Penerbangan
@endsection

@section('main-content')

<div class="container" id="formtambahpenerbangan">
    <div class="card p-2 col-md-6 mx-auto mt-4" style="background-color: rgb(30, 35, 30);">

        <div class="card-header text-center" style="color: white; font-weight:600;"  >
            <h2>Edit Penerbangan</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('penerbangan.update') }}" method="post" enctype="multipart/form-data">
                @method("PUT")
                @csrf

                <input type="text" name="id" value="{{ $penerbangan->id }}" hidden>

                <div class="mb-3" style="color: white;">
                    <input type="text" placeholder="Nama Penerbangan" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" value="{{ $penerbangan->nama }}" aria-describedby="emailHelp" autocomplete="off" required autofocus>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <div class="input-group mb-3" id="sigmaselections">
                    <select name="bandara" class="custom-select form-control" required>
                        @foreach ($bandara as $i)
                            <option value="{{ $i->id }}" <?php if( $i->id == $penerbangan->id_bandara ) echo 'selected' ?>>{{ $i->nama }}</option>
                        @endforeach
                    </select>

                        <input type="text" placeholder="Tujuan Akhir" name="Takhir" class="form-control @error('Takhir') is-invalid @enderror" value="{{ $penerbangan->tujuan_akhir }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" required>
                        @error('Takhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>

                <br>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                        <input type="number" name="seat" placeholder="seat" class="form-control @error('seat') is-invalid @enderror"  value="{{ $penerbangan->seat }}" id="exampleInputPassword1" autocomplete="off" required>
                        @error('seat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input type="number" placeholder="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $penerbangan->harga }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" required>
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput" >Keberangkatan</label>
                    </div>
                    <div class="sigma" style="width: 100%;">
                        <input type="date" placeholder="Keberangkatan" name="berangkat" class="form-control @error('berangkat') is-invalid @enderror" value="{{ $penerbangan->berangkat }}" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" required>
                        @error('berangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <br>

               {{-- <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput"> Pilih Foto : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="file" id="imageInput" onchange="previewImage(event)" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*" autocomplete="off">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div> --}}

                <div class="mb-3" id="formtambahinput">
                    <div class="input-group">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01" id="sigmasubinput"> Pilih Foto :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="file" id="imageInput" onchange="previewImage(event)" class="form-control @error('foto') is-invalid @enderror" name="foto" accept="image/*" autocomplete="off">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>

                {{-- preview --}}
                    <div class="form-control d-flex justify-content-center mt-2" style="background:rgb(30, 35, 30); border:none;">
                        @if ($penerbangan->foto)
                            <img src="{{ asset('storage/' . $penerbangan->foto ) }}" alt="" class="img-preview" style="width: 120px" id="preview" alt="Image Preview">
                        @else
                            <img src="" alt="" class="img-preview" id="preview" alt="Image Preview">
                        @endif
                    </div>
                {{-- end preview --}}

                <div class="mx-auto d-flex justify-content-center gap-3 mt-2" >
                    <a href="{{ route('penerbangan.index') }}" class="btn btn-danger"> Back </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        </div>
    </div>

@endsection

<script>
    function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
        var img = document.getElementById("preview");
        img.src = reader.result;
        img.style.display = "block";
    };
    reader.readAsDataURL(input.files[0]);
    }

</script>
