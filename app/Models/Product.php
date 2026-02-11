<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'stok_produk',
        'kategori_produk',
    ];

    // RELASI
    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'produk_id');
    }
}
