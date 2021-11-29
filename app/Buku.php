<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "buku";

    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'penulis', 'harga', 'tgl_terbit'];
    //pertemuan 8
    protected $dates = ['tgl_terbit'];
    
    public function photos(){
        return $this->hasMany('App\Galeri', 'id_buku', 'id');
    }
}
