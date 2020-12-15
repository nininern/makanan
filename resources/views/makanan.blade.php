@extends('layout.master')

@section('content')
<section id="makanan" class="py-1 text-center bg-light">
    <div class="container">
      <h2>Daftar Makanan</h2>
      <hr>
      <div class="row">
        @foreach ($makanan as $makanan)
        <div class="col-md-4">
            <a href="#">
            <img src="{{ $makanan->foto != null ? asset('/'.$makanan->foto) : asset('makanan_enak.jpg') }}" style="width:120px; height:150px">
            <p>
                <h5>{{ $makanan->nama }}</h5></a>
                (Jenis : {{ $makanan->jenis_makanan }})
            </p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection