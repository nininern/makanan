<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\makanan;
use File;

class MakananController extends Controller {
	public function __construct(){
		$this->middleware('admin');
	}

    //
    public function index(){
    	$batas = 3;
        $jumlah_makanan = Makanan::count();
        $data_makanan = Makanan::orderBy('tgl_kadaluarsa','desc')->paginate($batas);
        $no = $batas *($data_makanan->currentPage()-1);

    	return view('makanan.index', compact('data_makanan', 'no', 'jumlah_makanan'));
    }
    public function search(Request $request){
        $batas = 3;
        $cari = $request->kata;
        $data_makanan = Makanan::where('nama','like',"%".$cari."%")->orwhere('jenis_makanan','like',"%".$cari."%")->paginate($batas);
        $jumlah_makanan = $data_makanan->count();
        $no = $batas *($data_makanan->currentPage()-1);

        return view('makanan.search', compact('data_makanan','no','jumlah_makanan','cari'));
    }


    public function create(){
        return view('makanan.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'nama' => 'required|string|max:20',
            'jenis_makanan' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_kadaluarsa' => 'required|date',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
        ]);

        $makanan = new Makanan;
        $makanan->nama = $request->nama;
        $makanan->jenis_makanan = $request->jenis_makanan;
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('images/', $namafile);
        $makanan->foto = $namafile; 
        $makanan->harga = $request->harga;
        $makanan->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $makanan->save();

        return redirect('/makanan')->with('pesan','Data Makanan Berhasil di Simpan');
    }
    public function destroy($id){

    	$makanan = Makanan::find($id);
    	$makanan->delete();
    	$namafile = $makanan->foto;
        File::delete('images/'.$namafile);


    	return redirect('/makanan')->with('pesan','Data Makanan Berhasil di Hapus');

    }

    public function edit($id){
    	$makanan = Makanan::find($id);

    	return view('makanan.edit', compact('makanan'));

    }

     public function update($id, Request $request){
     	$this->validate($request,[
            'nama' => 'required|string|max:20',
            'jenis_makanan' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_kadaluarsa' => 'required|date',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
        ]);

        $makanan = Makanan::find($id);
        $makanan->nama = request('nama');
        $makanan->jenis_makanan = request('jenis_makanan');
        $makanan->harga = request('harga');
        $makanan->tgl_kadaluarsa = request('tgl_kadaluarsa');

        if (request('foto')!= null){
            File::delete('images/'.$makanan->foto);

            $foto = request('foto');
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('images/', $namafile);
            $makanan->foto = $namafile;
        }

        $makanan->save();

        return redirect('/makanan')->with('pesan','Data Makanan Berhasil di Ubah');
    }


}

