@extends('layout.master')
@section('content')
<div class="container">
    @if(Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <h4>Data Makanan</h4>
    <p align="right">
        <a href="{{ route('makanan.create') }}" class="btn btn-primary">
            Tambah Makanan
        </a>
    </p>
    <form action="{{ route('makanan.search') }}" method="get">@csrf
        <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width:30%; display:inline; margin-top:10px; margin-bottom:10px; float:right;">
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Jenis Makanan</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_makanan as $makanan)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $makanan->nama }}</td>
                    <td>{{ $makanan->jenis_makanan }}</td>
                    <td><img src="{{ $makanan->foto != null ? asset('images/'.$makanan->foto) : asset('makanan_enak.jpg') }}" style="width: 100px"></td> 
                    <td>{{ "Rp ".number_format($makanan->harga,2,',','.') }}</td>
                    <td>{{ $makanan->tgl_kadaluarsa->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('makanan.destroy', $makanan->id) }}" method="post">
                            @csrf
                            <a href="{{ route('makanan.edit', $makanan->id) }}" class="btn btn-info">ubah</a>
                            <button type="submit" class= "btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus?')">
                                hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div class="kiri"><strong>Jumlah Makanan: {{ $jumlah_makanan }}</strong></div>
        <div class="kanan">{{ $data_makanan->links() }}</div>
    </div>
</div>
@endsection