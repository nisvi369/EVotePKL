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

        $request->validate([
            'nama'          => 'required|max:20',
            'nik'           => 'required|min:3|max:17',
            'alamat'        => 'required|max:50',
            'pekerjaan_id'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email',
        ]);

        $masyarakat = Masyarakat::where('id', $request->id)->first();
        $masyarakat->nama           = $request->nama;
        $masyarakat->nik            = $request->nik;
        $masyarakat->alamat         = $request->alamat;
        $masyarakat->pekerjaan_id   = $request->pekerjaan_id;
        $masyarakat->tanggal_lahir  = $request->tanggal_lahir;
        $masyarakat->jenis_kelamin  = $request->jenis_kelamin;
        $masyarakat->email          = $request->email;

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
            'name'          => 'required|max:20',
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

        $request->validate([
            'nama'          => 'required|max:20',
            'alamat'        => 'required|max:50',
            'id_kecamatan'  => 'required',
            'tanggalLahir' => 'required|date',
            'jenisKelamin'  => 'required',
            'email'         => 'required|email',
        ]);

        $petugas = Petugas::where('id', $request->id)->first();
        $petugas->nama          = $request->nama;
        $petugas->alamat            = $request->alamat;
        $petugas->id_kecamatan   = $request->id_kecamatan;
        $petugas->tanggalLahir  = $request->tanggalLahir;
        $petugas->jenisKelamin  = $request->jenisKelamin;
        $petugas->email          = $request->email;

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
