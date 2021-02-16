<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kampanye;
use App\Komentar;
use Session;

class KomentarController extends Controller
{
    public function create(Request $request, $id)
    {
        $kampanye = Kampanye::find($id);

        $komentar = new Komentar();
        $komentar->id_masyarakat = Auth()->id();
        $komentar->komen = $request->komen;
        $komentar->id_kampanye = $request->id;
        $komentar->save();

        Session::flash('success', 'Komentar berhasil ditambahkan !!');

        return redirect()->back();
    }
}