<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = "aset";

    protected $primaryKey = 'id';
    protected $fillable = ['id_buku' ,'jenis_aset', 'nama', 'tahun_beli', 'harga'];
    //pertemuan 8
    protected $dates = ['tahun_beli'];
    
    public function photos(){
        return $this->hasMany('App\Galeri', 'id_buku', 'id');
    }
}
