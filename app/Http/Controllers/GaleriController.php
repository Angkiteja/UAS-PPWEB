<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Galeri;
use App\Buku;
use Image;
use File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin'); // harus admin dulu klo mau akses
        $this->middleware('auth');  // harus login dulu klo mau akses
    }
    
    public function index()
    {
        $galeri = Buku::all()->sortByDesc('id');
        $batas = 4;
        $galeri = Galeri::orderBy('id','desc')->paginate($batas);

        $no = $batas * ($galeri -> currentpage() - 1);
        return view('galeri.view', compact('galeri', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
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
            'nama_galeri' =>  'required',
            'keterangan'  =>  'required',
            'foto'        =>  'required|image|mimes:jpeg,jpg,png',
        ]);

        $galeri = new Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;
        // $galeri->isi_galeri = $request->isi_galeri;
        $galeri->galeri_seo = Str::slug($request->judul);

        $foto = $request->foto;
        $namaFile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namaFile);
        $foto->move('images/', $namaFile);

        $galeri->foto = $namaFile;
        $galeri->save();
        return redirect('/galeri') -> with('pesanSimpan', 'Data Galeri Berhasil di Simpan');

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
        $galeri = Galeri::where('id', $id)->get();
        return view('galeri.edit',['galeri' => $galeri]);
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
        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->galeri_seo = Str::slug($request->judul);

        $foto = $request->foto;
        $namaFile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namaFile);
        $foto->move('images/', $namaFile);

        $galeri->foto = $namaFile;

        $galeri->update();
        return redirect('/galeri')-> with('pesanEdit', 'Data Galeri Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id); //select berdasar id
        $galeri->delete();
        return redirect('/galeri')-> with('pesanHapus', 'Data Galeri Berhasil di Hapus');
    }
}
