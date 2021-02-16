<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pekerjaan;
use \App\Masyarakat;
use \App\User;
use \App\Petugas;
use \App\Kecamatan;
use Auth;
use Hash;
use Session;
use Carbon;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pekerjaan = pekerjaan::all();

        return view('profil.index', compact('pekerjaan'));
    }

    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        $now        = Carbon\Carbon::now();

        $request->validate([
            'nama'          => 'required|min:3|max:20',
            'nik'           => 'required|min:12|max:17|unique:masyarakat,nik,'.$masyarakat->id,
            'alamat'        => 'required|min:3|max:50',
            'id_pekerjaan'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email|unique:masyarakat,email,'.$masyarakat->id,
        ]);

        $masyarakat = Masyarakat::where('id', $request->id)->first();
        $masyarakat->nama           = $request->nama;
        $masyarakat->nik            = $request->nik;
        $masyarakat->alamat         = $request->alamat;
        $masyarakat->id_pekerjaan   = $request->id_pekerjaan;
        $masyarakat->tanggal_lahir  = $request->tanggal_lahir;
        $masyarakat->jenis_kelamin  = $request->jenis_kelamin;
        $masyarakat->email          = $request->email;

        if ($request->tanggal_lahir > $now) {
            Session::flash('warning', 'Tanggal Lahir tidak boleh melebihi tanggal sekarang !!');
            return redirect()->back();
        }

        if(!empty($request->password))
        {
            $masyarakat->password = Hash::make($request->password);
        }

        $masyarakat->update();

        Session::flash('success', 'Profil berhasil diupdate !!');

        return redirect('profil');
        // ->with('success', 'Profil berhasil diupdate');
    }

    public function index_admin()
    {
        return view('admin.profil_admin');
    }

    public function update_admin(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'          => 'required|min:3|max:20',
            'email'         => 'required|email',
        ]);

        $user = User::where('id', $request->id)->first();
        $user->name         = $request->name;
        $user->email        = $request->email;

        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        Session::flash('success', 'Profil berhasil diupdate !!');

        return redirect('profil-admin');
        // ->with('success', 'Profil berhasil diupdate');
    }

    public function index_petugas()
    {
        $kecamatan = Kecamatan::all();

        return view('profil.profilPetugas', compact('kecamatan'));
    }

    public function update_petugas(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $now     = Carbon\Carbon::now();

        $request->validate([
            'nama'          => 'required|min:3|max:20',
            'alamat'        => 'required|min:3|max:50',
            'id_kecamatan'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email|unique:petugas,email,'.$petugas->id,
        ]);

        $petugas = Petugas::where('id', $request->id)->first();
        $petugas->nama           = $request->nama;
        $petugas->alamat         = $request->alamat;
        $petugas->id_kecamatan   = $request->id_kecamatan;
        $petugas->tanggal_lahir  = $request->tanggal_lahir;
        $petugas->jenis_kelamin  = $request->jenis_kelamin;
        $petugas->email          = $request->email;

        if ($request->tanggal_lahir > $now) {
            Session::flash('warning', 'Tanggal Lahir tidak boleh melebihi tanggal sekarang !!');
            return redirect()->back();
        }

        if(!empty($request->password))
        {
            $petugas->password = Hash::make($request->password);
        }

        $petugas->update();

        Session::flash('success', 'Profil berhasil diupdate !!');

        return redirect('profil-petugas');
        // ->with('success', 'Profil berhasil diupdate');
    }
}
