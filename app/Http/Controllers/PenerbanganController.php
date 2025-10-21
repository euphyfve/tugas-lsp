<?php

namespace App\Http\Controllers;

use App\Models\bandara;
use App\Models\penerbangan;
use Illuminate\Http\Request;

class PenerbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerbangan = penerbangan::orderBy('id')->paginate(3);
        return view('penerbangan.index', [
            'penerbangan' => $penerbangan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bandara = bandara::all();
        return view('penerbangan.tambah', compact('bandara'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:40',
            'bandara' => 'required',
            'Takhir' => 'required',
            'berangkat' => 'required|after:2024-03-04',
            'harga' => 'required|numeric|min:0',
            'seat' => 'required|numeric|min:0',
            'foto' => 'required|image|max:5000|mimes:png,jpeg,jpg',
        ], [
            'nama.max' => 'Nama tak boleh lebih dari 40 kata',
            'berangkat.after' => 'Tolong masukkan hari yang benar',
            'foto.image' => 'foto harus berupa image',
            'foto.mimes' => 'Ekstensinya harus png, jpg, jpeg',
            'harga.numeric' => 'Harga harus berupa angka',
            'seat.numeric' => 'Seat harus berupa angka',
            'seat.min' => 'Seat tidak boleh negatif',
            'harga.min' => 'Harga tidak boleh negatif',
        ]);

        $imgpath = $request->file('foto')->store('images/penerbangan');

        $data = [
            'nama' => $request->nama,
            'id_bandara' => $request->bandara,
            'tujuan_akhir' => $request->Takhir,
            'seat' => $request->seat,
            'berangkat' => $request->berangkat,
            'foto' => $imgpath,
            'harga' => $request->harga,
        ];

        if(penerbangan::create($data)){
            return redirect()->route('penerbangan.index')->with('sukses', 'Berhasil Menambah data');
        }else{
            return redirect()->route('penerbangan.index')->with('gagal', 'Gagal Menambah data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(penerbangan $penerbangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penerbangan = penerbangan::find($id);
        $bandara     = bandara::all();

        return view('penerbangan.edit', [
            'bandara' => $bandara,
            'penerbangan' => $penerbangan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penerbangan $penerbangan)
    {
        $model = penerbangan::find($request->id);
        $request->validate([
            'nama' => 'required|max:40',
            'bandara' => 'required',
            'Takhir' => 'required',
            'berangkat' => 'required|after:2024-03-04',
            'harga' => 'required|numeric|min:0',
            'seat' => 'required|numeric|min:0',
        ], [
            'nama.max' => 'Nama tak boleh lebih dari 40 kata',
            'berangkat.after' => 'Tolong masukkan hari yang benar',
            'harga.numeric' => 'Harga harus berupa angka',
            'seat.numeric' => 'Seat harus berupa angka',
            'seat.min' => 'Seat tidak boleh negatif',
            'harga.min' => 'Harga tidak boleh negatif',
        ]);

        if(!$request->file('foto')){
            $request->validate([
                'foto' => 'image|max:5000|mimes:png,jpeg,jpg',
            ], [
                'foto.image' => 'foto harus berupa image',
                'foto.mimes' => 'Ekstensinya harus png, jpg, jpeg',
            ]);
        }

        if($request->file('foto')){
            $path = $request->file('foto')->store('images/penerbangan');
            unlink('storage/'. $model->foto);
        }else{
            $path = $model->foto;
        }

        $data = [
            'nama' => $request->nama,
            'id_bandara' => $request->bandara,
            'tujuan_akhir' => $request->Takhir,
            'seat' => $request->seat,
            'berangkat' => $request->berangkat,
            'foto' => $path,
            'harga' => $request->harga,
        ];

        $update = $model->update($data);

        if($update){
            return redirect()->route('penerbangan.index')->with('sukses', 'Berhasil mengubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $p = penerbangan::find($id);

        if($p->foto){
            unlink('storage/'. $p->foto);
        }

        if(penerbangan::destroy($id)){
            return redirect()->route('penerbangan.index');
        }
    }
}
