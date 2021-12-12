<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); // harus admin dulu klo mau akses
        $this->middleware('auth');  // harus login dulu klo mau akses
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 4;
        $jumlah_user = User::count();
        $data_user = User::orderBy('name')->paginate($batas);
        $no = $batas * ($data_user->currentPage() - 1);
        return view('user.index', compact('no','data_user','jumlah_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name'        =>  'required|string',
            'email'       =>  'required|string|max:255',
            'password'    =>  'required|numeric|min:8|confirmed',
            'level'       =>  'required|string',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->level = $request->level;
        $user->save();
    
        return redirect('/user') -> with('pesanSimpan', 'Data user Berhasil di Simpan');
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
        $data_user = User::where('id', $id)->get();
        return view('user.edit', compact('data_user'));
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
        // DB::table('users')->where('id',$request->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request['password']),
        //     'level' => $request->level          
        //     ]);
        //     return redirect('/user') -> with('pesan', 'Data user Berhasil di Update');


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->level = $request->level;
        $user->update();
        return redirect('/user')->with('pesanSimpan','Data User Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('pesanHapus','Data User Berhasil di Hapus');

    }
}