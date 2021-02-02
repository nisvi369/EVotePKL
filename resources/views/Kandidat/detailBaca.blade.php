@extends('template.master')

@section('title', 'Kampanye')

@section('content')

<div class="jumbotronedit">
    <div class="containeradmin">
        <h1 class="text-center mt-4 mb-4">Data Petugas</h1>
    </div>
        <div class="container content">
            <div class="table-responsive">
                <table class="table table-hover col-md-12">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Waktu</th>
                            <th>Konten</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr-shadow">
                            <td>{{$kampanye->judul}}</td>
                            <td>{{$kampanye->gambar}}</td>
                            <td>{{$kampanye->waktu}}</td>
                            <td>{{$kampanye->konten}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

@endsection