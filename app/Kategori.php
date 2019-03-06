<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategoris';
    protected $fillable=array('nama_kategori', 'jumlah_produk');


    // array('1', '2', '3') -> < 5.4
    // ['1', '2', '3' ] -> >= 5.4

    public function product() {
        return $this->hasMany(ProductModel::class, 'kategori_id', 'id');
    }
}
