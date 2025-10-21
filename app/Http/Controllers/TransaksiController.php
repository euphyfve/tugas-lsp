<?php

namespace App\Http\Controllers;

use App\Models\bandara;
use App\Models\history;
use App\Models\penerbangan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerbangan = penerbangan::orderBy('id')->paginate(4);

        return view('transaksi.index', [
            'penerbangan' => $penerbangan,
        ]);
    }


    public function store(Request $request)
    {
        $model = penerbangan::find($request->id);

        if( $model->seat < $request->seat ){
            return redirect()->route('transaksi.pesan', $request->id)->with('gagal', 'seat tidak boleh lebih dari yang tersedia');
        }

            $request->validate([
                'seat' => 'required|min:0',
                'class' => 'required',
            ], [
                'seat.min' => 'Seat tidak boleh negatif',
            ]);

            $harganew = $model->harga * $request->seat * $request->class ;

            switch ($request->class) {
                case '1':
                    $class = 'Economy Class';
                    break;
                case '3':
                    $class = 'Business Class';
                    break;
                case '5':
                    $class = 'High Class';
                    break;
            }

            // kursi
            $sisa = $model->seat - $request->seat;
            if($sisa > 0){
                $sigma = [
                    'seat' => $sisa,
                ];

                $model->update($sigma);
            }

            if($sisa == 0){
                $model->delete($request->id);
            }


            // trx
            $trx = [
                'invoice'       => $model->nama,
                'id_bandara'    => $model->id_bandara,
                'nama_user'     => Auth::user()->name,
                'seat'          => $request->seat,
                'class'         => $class ,
                'keberangkatan' => $model->berangkat,
                'tujuan_akhir'  => $model->tujuan_akhir,
                'total'         => $harganew,
            ];

            if(transaksi::create($trx)){
                return redirect()->route('cekot.index');
            }

    }


    public function edit($id)
    {
        $penerbangan = penerbangan::find($id);
        $bandara = bandara::all();
        return view('transaksi.pesan', compact('penerbangan', 'bandara'));
    }


    public function cekot()
    {
        $trx = transaksi::orderBy('id')->paginate(3);
        return view('checkout.index', compact('trx'));
    }


    public function conf_index()
    {
        $trx = transaksi::orderBy('id')->paginate(3);
        return view('confirmation.index', compact('trx'));
    }


    public function refund($id)
    {
        $model = transaksi::find($id);

        if($model->delete($id)){
            return redirect()->back();
        }
    }


    public function conf_done($id)
    {

        $model = transaksi::find($id);

        $data = [
            'invoice'       => $model->invoice,
            'id_bandara'    => $model->id_bandara,
            'nama_user'     => $model->nama_user,
            'seat'          => $model->seat,
            'class'         => $model->class ,
            'keberangkatan' => $model->keberangkatan,
            'tujuan_akhir'  => $model->tujuan_akhir,
            'total'         => $model->total,
            'conf'         => "Done",
        ];

        if($model_h = history::create($data))
        {
            $model->destroy($id);
            return redirect()->back();
        }

    }


    public function history()
    {
        $trx = history::orderBy('id')->paginate(4);

        return view('history.index', compact('trx'));
    }

    public function detail($id)
    {
        $penerbangan = history::find($id);
        return view('history.detail', compact('penerbangan'));
    }
}
