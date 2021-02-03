<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masyarakat;
use \App\Pekerjaan;
use Auth;
use DB;
use Session;

use App\Exports\MasyarakatExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        $kampanye = \App\Kampanye::orderBy('id', 'desc')->take(2)->get();
        return view('Masyarakat.home', compact('kampanye'));
    }
    
    public function index()
    {
        $masyarakat = Masyarakat::all();

        $masyarakat = DB::table('masyarakat')
        -> join('pekerjaan','pekerjaan.id', '=', 'masyarakat.id_pekerjaan')
        -> select('masyarakat.id','masyarakat.nik','masyarakat.nama','masyarakat.jenis_kelamin','masyarakat.alamat','masyarakat.tanggal_lahir','masyarakat.email','pekerjaan.nama_pekerjaan','masyarakat.level')
        -> where('masyarakat.level', '!=', 'petugas')
        -> orderBy('masyarakat.nama', 'asc')
        -> paginate(5);

        // dd($masyarakat);
        return view('Masyarakat.index', compact('masyarakat'));
    }

    public function tambah()
    {
        $masyarakat = Masyarakat::all();
        $pekerjaan = Pekerjaan::all();

        return view('Masyarakat.tambah', compact('masyarakat', 'pekerjaan'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama'          => 'required|max:20',
            'nik'           => 'required|min:3|max:17',
            'alamat'        => 'required|max:50',
            'id_pekerjaan'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email',
        ]);


        $masyarakat = array(
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'id_pekerjaan'  => $request->id_pekerjaan,
            'alamat'        => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email'         => $request->email,
            'level'         => "pemilih",
            'password'      => bcrypt('rahasia'),
        );

        
        Masyarakat::create($masyarakat);

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/Petugas/dataMasyarakat');
    }

    public function edit($id)
    {
        // $masyarakat = Masyarakat::find($id);
     //    $pekerjaan = Pekerjaan::find($id);
        $pekerjaan = Pekerjaan::all();

        $masyarakat = DB::table('masyarakat')
        -> join('pekerjaan','pekerjaan.id', '=', 'masyarakat.id_pekerjaan')
        -> select('masyarakat.id','masyarakat.nik','masyarakat.nama','masyarakat.jenis_kelamin','masyarakat.alamat','masyarakat.tanggal_lahir','masyarakat.email','pekerjaan.nama_pekerjaan')
        -> where('masyarakat.id','=',$id)
        -> first();

        return view('masyarakat/edit', compact('masyarakat', 'pekerjaan'));
    }

    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        $request->validate([
            'nama'          => 'required|max:20',
            'nik'           => 'required|min:3|max:17',
            'alamat'        => 'required|max:50',
            'id_pekerjaan'  => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'email'         => 'required|email',
        ]);

        $masyarakat = Masyarakat::where('id', $request->id)->first();
        $masyarakat->nama           = $request->nama;
        $masyarakat->nik            = $request->nik;
        $masyarakat->alamat         = $request->alamat;
        $masyarakat->id_pekerjaan   = $request->id_pekerjaan;
        $masyarakat->tanggal_lahir  = $request->tanggal_lahir;
        $masyarakat->jenis_kelamin  = $request->jenis_kelamin;
        $masyarakat->email          = $request->email;

        $masyarakat->update();

        Session::flash('success', 'Data berhasil diupdate !!');

        return redirect('/Petugas/dataMasyarakat');
    }

    public function delete($id)
    {
        $masyarakat = Masyarakat::find($id);
        $masyarakat->delete();

        Session::flash('info', 'Data berhasil dihapus !!');

        return redirect('/Petugas/dataMasyarakat');
    }

    public function export(){
		return Excel::download(new MasyarakatExport, 'masyarakat.xlsx');
	}
}
