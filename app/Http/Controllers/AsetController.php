<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Buku;
use App\Aset;  // untuk memanggil model Aset(dot)php yang ada tabel yg digunakan (tabel buku)
use App\Models\Galeri;
use Image;
use File;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_aset = Aset::all()->sortByDesc('id'); //mengurutkan data aset berdasar kolom id terakhir
        // Aset(titikdua)all untuk menampilkan semua data buku pada tabel buku

        $batas = 4;
        $jumlah = Aset::all()->count();
        $total = Aset::all()->sum('harga');
        $no = 0; 
        

        // pertemuan 8
        $batas = 5;
        $jumlah_aset = Aset::count();
        $data_aset = Aset::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_aset -> currentpage() - 1);
        return view('aset.view', compact('data_aset', 'no', 'jumlah_aset', 'total'));
        //compact untuk mengirimkan variable dari controller ke view
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request -> kata;
        $data_aset = Aset::where('nama', 'like', "%". $cari."%")->orwhere('jenis_aset', 'like', "%".$cari."%")
        ->paginate($batas);
        
        $jumlah_aset = Aset::count();
        $no = $batas * ($data_aset -> currentpage() - 1);
        return view('aset.search', compact('data_aset', 'no', 'jumlah_aset', 'cari'));
        //compact untuk mengirimkan variable dari controller ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aset.create'); //aset create adalah view
        //function create() akan mengarahkan ke tampilan view create blade php yang berada di folder views/buku/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_aset'         =>  'required|string',
            'nama'               =>  'required|string|max:30',
            'tahun_beli'         =>  'required|date',
            'harga'              =>  'required|numeric',
            'foto'               =>  'required|image|mimes:jpeg,jpg,png',
        ]);

        $aset = new Aset;
        $aset->jenis_aset = $request->jenis_aset;
        $aset->nama = $request->nama;
        $aset->tahun_beli = $request->tahun_beli;
        $aset->harga = $request->harga;
        
        $foto = $request->foto;
        $namaFile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namaFile);
        $foto->move('images/', $namaFile);

        $aset->foto = $namaFile;

        $aset->aset_seo = Str::slug($request->nama, '-');
        $aset->save();
    
        return redirect('/aset') -> with('pesanSimpan', 'Data Aset Berhasil di Simpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$buku = Buku::find($id); //select berdasar id
        $data_aset = Aset::where('id', $id)->get();
        // return view('aset.edit',compact('aset'));
        $data_aset->aset_seo = Str::slug($data_aset->nama, '-');
        return view('aset.edit',['data_aset' => $data_aset]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aset = Aset::find($id);
        $aset->jenis_aset = $request->jenis_aset;
        $aset->nama = $request->nama;
        $aset->tahun_beli = $request->tahun_beli;
        $aset->harga = $request->harga;
        $aset->update();
        return redirect('/aset')-> with('pesanEdit', 'Data Aset Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aset = Aset::find($id); //select berdasar id
        $aset->delete();
        return redirect('/aset')-> with('pesanHapus', 'Data Aset Berhasil di Hapus');
    }

    public function list_aset(){
        $batas = 6;
        $data_aset = Aset::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_aset -> currentpage() - 1);
        return view('aset.list_aset', compact('data_aset', 'no'));
    }
    public function galaset($title){
        $aset = Aset::where('aset_seo', $title)->first();
        // dd($aset);
        $galeris = $aset->photos()->orderBy('id', 'desc')->paginate(6);
        return view('galeri.detail_aset', compact('aset', 'galeris'));
    }
    public function likefoto(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('like_foto');
        return back();
    }
}
