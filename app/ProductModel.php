<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='products';
    protected $fillable=array(
        'nama_produk', 'kategori_id', 'foto_produk',
        'status_produk', 'deskripsi', 'harga', 'stok'
    );

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }


}
