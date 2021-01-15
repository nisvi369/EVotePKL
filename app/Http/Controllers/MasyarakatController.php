<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masyarakat;

class MasyarakatController extends Controller
{
    public function index()
    {
    	$masyarakat = Masyarakat::all();
    	// dd($masyarakat);
    	return view('/masyarakat/index', compact('masyarakat'));
    }

    public function tambah()
    {
    	$masyarakat = Masyarakat::all();

    	return view('/masyarakat/tambah', compact('masyarakat'));
    }

    public function tambah_data(Request $request)
    {
    	$request->validate([
    		'nama' 			=> 'required|max:15',
    		'nik' 			=> 'required|min:3|max:15',
    		'alamat' 		=> 'required|max:50',
    		'pekerjaan' 	=> 'required|max:20',
    		'tanggal_lahir' => 'required',
    		'jenis_kelamin'	=> 'required',
    	]);


    	$masyarakat = array(
    		'nama' 			=> $request->nama,
    		'nik' 			=> $request->nik,
    		'pekerjaan' 	=> $request->pekerjaan,
    		'alamat' 		=> $request->alamat,
    		'tanggal_lahir' => $request->tanggal_lahir,
    		'jenis_kelamin'	=> $request->jenis_kelamin,
    		'level'			=> "pemilih",
    		'password'		=> bcrypt('rahasia'),
    	);

        
    	Masyarakat::create($masyarakat);

    	return redirect('/');
    }

    public function edit_data($id)
    {
    	$masyarakat = Masyarakat::find($id);
    	return view('masyarakat/edit', compact('masyarakat'));
    }

    public function edit(Request $request, $id)
    {

		$request->validate([
			'nama' 			=> 'required|max:15',
    		'nik' 			=> 'required|min:3|max:15',
    		'alamat' 		=> 'required|max:50',
    		'pekerjaan' 	=> 'required|max:20',
    		'tanggal_lahir' => 'required',
    		'jenis_kelamin'	=> 'required',
		]);

    	$masyarakat = Masyarakat::where('id', $request->id)->first();
        $masyarakat->nama    		= $request->nama;
        $masyarakat->nik   			= $request->nik;
        $masyarakat->alamat    		= $request->alamat;
        $masyarakat->pekerjaan     	= $request->pekerjaan;
        $masyarakat->tanggal_lahir  = $request->tanggal_lahir;
        $masyarakat->jenis_kelamin 	= $request->jenis_kelamin;

        $masyarakat->update();

    	return redirect('/');
    }

    public function delete($id)
    {
    	$masyarakat = Masyarakat::find($id);
    	$masyarakat->delete();

    	return redirect('/');
    }
}
