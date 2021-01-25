<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Petugas;
use DB;

class petugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home(){
        return view('Petugas.home');
    }
    public function form(){
        $kecamatan = Kecamatan::all();
        return view('Petugas.formPetugas', compact('kecamatan'));
        // return view('Petugas.formPetugas');
    }

    public function create(Request $request){
        $request->validate([
            'NIK'           => 'required|max:17',
            'nama'          => 'required|max:20',
            'jenisKelamin'  => 'required',
            'tanggalLahir'  => 'required|date',
            'alamat'        => 'required|max:50',
            'email'         => 'required|email|unique',
          ]);

        $petugas = new Petugas;
        $petugas->NIK           = $request->NIK;
        $petugas->nama          = $request->nama;
        $petugas->jenisKelamin  = $request->jenisKelamin;
        $petugas->tanggalLahir  = $request->tanggalLahir;
        $petugas->alamat        = $request->alamat;
        $petugas->email         = $request->email;
        $petugas->password      = bcrypt('rahasia');
        $petugas->id_kecamatan  = $request->id_kecamatan;

        $petugas->save();

        return redirect ('/dataPetugas');
    }

    public function data(){

        $petugas = DB::table('petugas')
        -> join('kecamatan','kecamatan.id', '=', 'petugas.id_kecamatan')
        -> select('petugas.id','petugas.nik','petugas.nama','petugas.jenisKelamin','petugas.alamat','petugas.tanggalLahir','kecamatan.namaKecamatan','petugas.email')
        -> get();

        return view('Petugas.dataPetugas',compact('petugas'));
    }

    public function edit($id){

        $kecamatan = Kecamatan::all();
        $petugas = DB::table('petugas')
        -> join('kecamatan','kecamatan.id', '=', 'petugas.id_kecamatan')
        -> select('petugas.id','petugas.nik','petugas.nama','petugas.jenisKelamin','petugas.alamat','petugas.tanggalLahir','kecamatan.namaKecamatan','petugas.email','petugas.password')
        -> where('petugas.id','=',$id)
        -> first();

        return view('Petugas.editPetugas', ['kecamatan'=> $kecamatan], compact('petugas'));
    }

    public function update (Request $request,$id) {

        $petugas = Petugas::findOrFail($id);
    
        $request->validate([
            'nik'           => 'required|min:3|max:17',
            'nama'          => 'required|max:20',
            'jenisKelamin'  => 'required',
            'tanggalLahir'  => 'required|date',
            'alamat'        => 'required|max:50',
            'email'         => 'required|email|unique',
        ]);
  
        $petugas->update([
            $petugas->nik           = $request->nik,
            $petugas->nama          = $request->nama,
            $petugas->jenisKelamin  = $request->jenisKelamin,
            $petugas->tanggalLahir  = $request->tanggalLahir,
            $petugas->alamat        = $request->alamat,
            $petugas->email         = $request->email,
            $petugas->password      = $request->password,
            $petugas->id_kecamatan  = $request->id_kecamatan,
        ]);
        $petugas->save();
        
        return redirect ('/dataPetugas');
        }

    public function hapus($id){
        
        $petugas = \App\Petugas::find($id);
        $petugas->delete();
        
        return redirect ('/dataPetugas');
      }
}
