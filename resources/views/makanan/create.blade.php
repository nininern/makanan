@extends('layout.master')
@section('content')
    <div class="container">
        <h4>Tambah Makanan</h4>
        @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
        @endif

        <form method="post" enctype="multipart/form-data" action="{{ route('makanan.store') }}">
        @csrf
        <table>
            <tr>
                <td>Nama</td><td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jenis Makanan</td><td><input type="text" name="jenis_makanan"></td>
            </tr>
            <tr>
                <td>Foto</td><td><input type="file" class="form-control" name="foto"></td>
            </tr>
            <tr>
                <td>Harga</td><td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Tgl Kadaluarsa</td><td><input type="text" class="date" name="tgl_kadaluarsa"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-success">Simpan</button>
                <a class="btn btn-warning" href="/makanan">Batal</a>
                </td>
            </tr>
        </table>
    </div>
@endsection