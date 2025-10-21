<?php

namespace App\Http\Controllers;

use App\Models\bandara;
use Illuminate\Http\Request;

class BandaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bandara = bandara::orderBy('id')->paginate(5);
        return view('bandara.index', [
            'bandara' => $bandara,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bandara.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'lokasi' => 'required',
            'contact' => 'required',
        ], [
            'nama.max' => 'Nama tidak boleh lebih dari 100 kata'
        ]);

        $data = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'contact' => $request->contact,
        ];

        if(bandara::create($data)){
            return redirect()->route('bandara.index')->with('sukses', 'Berhasil Menambahkan Bandara');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bandara $bandara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bandara = bandara::find($id);
        return view('bandara.edit', compact('bandara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bandara $bandara)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'lokasi' => 'required',
            'contact' => 'required',
        ], [
            'nama.max' => 'Nama tidak boleh lebih dari 100 kata'
        ]);

        $model = bandara::find($request->id);

        $data = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'contact' => $request->contact,
        ];

        if($model->update($data)){
            return redirect()->route('bandara.index')->with('sukses', 'Berhasil mengubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bndr = bandara::find($id);
        $bndr->destroy($id);
        return redirect()->route('bandara.index');
    }
}
