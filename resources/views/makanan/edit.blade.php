@extends('layout.master')
@section('content')
    <div class="container">
        <h4>Edit Makanan</h4>
        @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
        @endif
        <form method="post" action="{{ route('makanan.update', $makanan->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <tabel for="nama_makanan" class="col-sm-3 col-form-label">Nama Makanan</tabel>
            <div class="col-sm-9">
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $makanan->nama }}">
            </div>
        </div>

        <div class="form-group row">
            <tabel for="nama_makanan" class="col-sm-3 col-form-label">Jenis Makanan</tabel>
            <div class="col-sm-9">
                <input type="text" id="jenis_makanan" name="jenis_makanan" class="form-control" value="{{ $makanan->jenis_makanan }}">
            </div>
        </div>

        <div class="form-group row">
            <tabel for="merk_makanan" class="col-sm-3 col-form-label">Foto</tabel>
            <div class="col-sm-9">
                 <img src="{{ asset($makanan->foto) }}" style="width: 100px">
                 <input type="file" class="form-control" name="foto">
           </div>
        </div>

        <div class="form-group row">
            <tabel for="nama_makanan" class="col-sm-3 col-form-label">Harga</tabel>
            <div class="col-sm-9">
                <input type="text" id="harga" name="harga" class="form-control" value="{{ $makanan->harga }}">
            </div>
        </div>

        <div class="form-group row">
            <tabel for="nama_makanan" class="col-sm-3 col-form-label">Tgl Kadaluarsa</tabel>
            <div class="col-sm-9">
                <input type="text" id="tgl_kadaluarsa" name="tgl_kadaluarsa" class="form-control" value="{{ $makanan->tgl_kadaluarsa }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-9">
                <td><button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-warningt" href="/makanan">Batal</a>
            </div>
        </div>

    </div>
@endsection