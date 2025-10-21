<?php

namespace App\Http\Controllers;

use App\Models\home;
use App\Models\penerbangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('Register');
    }

    public function cekregister(Request $request)
    {
        $request->validate([
            'nama'  => 'required|max:45',
            'email' => 'required|email|unique:users,email',
            'pw'    => 'required|min:5',
            'cpw'   => 'required|same:pw',
        ], [
            'cpw.same'     => 'Password Tidak Sinkron',
            'pw.min'       => 'Password minimal 5 kata',
            'email.unique' => 'email sudah tersedia',
            'nama.max'     => 'nama tidak boleh lebih dari 45 kata',
        ]);

        $data = [
            'name'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->pw),
        ];

        $login = [
            'email'     => $request->email,
            'password'  => $request->pw,
        ];

        if(User::create($data)){
            if(Auth::attempt($login)){
                return redirect()->route('home.index');
            }else{
                return redirect()->route('home.index')->with('gagal', 'Gagal Login');
            }
        }
    }


    public function ceklogin(Request $r)
    {
        $r->validate([
            'email' => 'required|email|exists:users,email',
            'pw'    => 'required|min:5'
        ], [
            'pw.min' => 'Password harus lebih dari 5 kata',
            'email.exist' => 'email tidak di temukan',
        ]);

        $data = [
            'email' => $r->email,
            'password' => $r->pw,
        ];

        if(Auth::attempt($data)){
            return redirect('home');
        }else{
            return redirect()->route('login')->with('gagal', 'Akun dan Password ada yang salah');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dakun.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|max:45',
            'email' => 'required|email|unique:users,email',
            'pw'    => 'required|min:5',
            'cpw'   => 'required|same:pw',
        ], [
            'cpw.same'     => 'Password Tidak Sinkron',
            'pw.min'       => 'Password minimal 5 kata',
            'email.unique' => 'email sudah tersedia',
            'nama.max'     => 'nama tidak boleh lebih dari 45 kata',
        ]);

        $data = [
            'name'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->pw),
            'role'      => $request->role,
        ];

        if(User::create($data)){
            return redirect()->route('dakun.index')->with('sukses', 'Berhasil Tambah Akun');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::orderBy('id')->paginate(4);
        return view('dakun.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dakun.ganti', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $model = User::find($request->id);
        $oldmail = $model->email;


        if($request->email != $oldmail){
            return redirect()->to('dakun/ganti/'.$model->id)->with('gagal', 'Email Tidak Sama');
        }else{
            $request->validate([
                'email' => 'required|email',
                'pw'    => 'required|min:5',
                'cpw'   => 'required|same:pw',
            ], [
                'cpw.same'     => 'Password Tidak Sinkron',
                'pw.min'       => 'Password minimal 5 kata',
            ]);

            $data = [
                'email' => $request->email,
                'password' => Hash::make($request->pw),
            ];

            if($model->update($data)){
                return redirect()->route('dakun.index')->with('sukses', 'Password berhasil di ganti');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $p = User::find($id);
        User::destroy($id);
        return redirect()->route('dakun.index')->with('sukses', 'Berhasil mengapus akun');
    }


    public function editemail($id)
    {
        $user = User::find($id);
        return view('dakun.edit', compact('user'));
    }

    public function gantiemail(Request $request)
    {
        $model = User::find($request->id);

        if($model->email != $request->email){
            return redirect()->route('dakun.edit', $request->id)->with('gagal', 'Email tidak sama');
        }else{
            $request->validate([
                'nama' => 'required',
                'role' => 'required',
            ]);

            $data = [
                'name' => $request->nama,
                'role' => $request->role,
            ];

            if($model->update($data)){
                return redirect()->route('dakun.index')->with('sukses', 'Profile Berhasil di ganti');
            }
        }
    }
}
