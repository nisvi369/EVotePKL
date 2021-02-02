<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Petugas;
use DB;
use Auth;
use Session;

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
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|max:50',
            'email'         => 'required|email',
          ]);

        $petugas = new Petugas;
        $petugas->NIK           = $request->NIK;
        $petugas->nama          = $request->nama;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->tanggal_lahir = $request->tanggal_lahir;
        $petugas->alamat        = $request->alamat;
        $petugas->email         = $request->email;
        $petugas->password      = bcrypt('rahasia');
        $petugas->level         = "petugas";
        $petugas->id_kecamatan  = $request->id_kecamatan;

        $petugas->save();

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect ('/Admin/dataPetugas')->with('success', 'Data berhasil disimpan');
    }

    public function data(){

        $petugas = DB::table('petugas')
        -> join('kecamatan','kecamatan.id', '=', 'petugas.id_kecamatan')
        -> select('petugas.id','petugas.nik','petugas.nama','petugas.jenis_kelamin','petugas.alamat','petugas.tanggal_lahir','kecamatan.nama_kecamatan','petugas.email')
        -> orderBy('petugas.nik', 'asc')
        -> paginate(5);

        return view('Petugas.dataPetugas',compact('petugas'));
    }

    public function edit($id){

        $kecamatan = Kecamatan::all();
        $petugas = DB::table('petugas')
        -> join('kecamatan','kecamatan.id', '=', 'petugas.id_kecamatan')
        -> select('petugas.id','petugas.nik','petugas.nama','petugas.jenis_kelamin','petugas.alamat','petugas.tanggal_lahir','kecamatan.nama_kecamatan','petugas.email','petugas.password')
        -> where('petugas.id','=',$id)
        -> first();

        return view('Petugas.editPetugas', ['kecamatan'=> $kecamatan], compact('petugas'));
    }

    public function update (Request $request,$id) {

        $petugas = Petugas::findOrFail($id);
    
        $request->validate([
            'nik'           => 'required|min:3|max:17',
            'nama'          => 'required|max:20',
            'jenis_kelamin'  => 'required',
            'tanggal_lahir'  => 'required|date',
            'alamat'        => 'required|max:50',
            'email'         => 'required|email',
        ]);
  
        $petugas->update([
            $petugas->nik           = $request->nik,
            $petugas->nama          = $request->nama,
            $petugas->jenis_kelamin  = $request->jenis_kelamin,
            $petugas->tanggal_lahir  = $request->tanggal_lahir,
            $petugas->alamat        = $request->alamat,
            $petugas->email         = $request->email,
            $petugas->id_kecamatan  = $request->id_kecamatan,
        ]);
        $petugas->save();

        Session::flash('success', 'Data berhasil diupdate !!');
        
        return redirect ('/Admin/dataPetugas')->with('');
        }

    public function hapus($id){
        
        $petugas = \App\Petugas::find($id);
        $petugas->delete();

        Session::flash('info', 'Data berhasil dihapus !!');
        
        return redirect ('/Admin/dataPetugas');
      }
}
