<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Buku;  // untuk memanggil model Buku(dot)php yang ada tabel yg digunakan (tabel buku)
use App\Galeri;



class BukuController extends Controller
{
    //fungsi index
    public function index()
    {
        $data_buku = Buku::all()->sortByDesc('id'); //mengurutkan data buku berdasar kolom id terakhir
        // Buku(titikdua)all untuk menampilkan semua data buku pada tabel buku

        $jumlah = Buku::all()->count();
        $total = Buku::all()->sum('harga');
        $no = 0; 
        

        // pertemuan 8
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku -> currentpage() - 1);
        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku', 'total'));
        //compact untuk mengirimkan variable dari controller ke view
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request -> kata;
        $data_buku = Buku::where('judul', 'like', "%". $cari."%")->orwhere('penulis', 'like', "%".$cari."%")
        ->paginate($batas);
        
        $jumlah_buku = Buku::count();
        $no = $batas * ($data_buku -> currentpage() - 1);
        return view('buku.search', compact('data_buku', 'no', 'jumlah_buku', 'cari'));
        //compact untuk mengirimkan variable dari controller ke view
    }

    public function create(){
        return view('buku.create'); //buku create adalah view
        //function create() akan mengarahkan ke tampilan view create blade php yang berada di folder views/buku/
    }
    public function store(Request $request){

         // pertemuan 8
         $this->validate($request, [
            'judul'         =>  'required|string',
            'penulis'       =>  'required|string|max:30',
            'harga'         =>  'required|numeric',
            'tgl_terbit'    =>  'required|date',
        ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->buku_seo = Str::slug($request->judul, '-');
        $buku->save();
    
        return redirect('/buku') -> with('pesanSimpan', 'Data Buku Berhasil di Simpan');

       
    }
    public function destroy($id) {
        $buku = Buku::find($id); //select berdasar id
        $buku->delete();
        return redirect('/buku')-> with('pesanHapus', 'Data Buku Berhasil di Hapus');
    }

    public function edit($id) {
        //$buku = Buku::find($id); //select berdasar id
        $data_buku = Buku::where('id', $id)->get();
        // return view('buku.edit',compact('buku'));
        $data_buku->buku_seo = Str::slug($data_buku->judul, '-');
        return view('buku.edit',['data_buku' => $data_buku]);
    }
    public function update(Request $request, $id){
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->update();
        return redirect('/buku')-> with('pesanEdit', 'Data Buku Berhasil di Edit');

        
    }

    public function list_buku(){
        $batas = 6;
        $data_buku = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku -> currentpage() - 1);
        return view('galeri.list_buku', compact('data_buku', 'no'));

    }
    public function galbuku($title){
        $bukus = Buku::where('buku_seo', $title)->first();
        // dd($bukus);
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        return view('galeri.detail_buku', compact('bukus', 'galeris'));
    }
    public function likefoto(Request $request, $id){
        $bukus = Buku::find($id);
        $bukus->increment('like_foto');
        return back();
    }
}
