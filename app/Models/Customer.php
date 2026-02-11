<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = true;

    protected $fillable = [
        'nama_customer',
        'alamat_customer',
        'telepon_customer',
    ];

    // RELASI
    public function transaksi()
    {
        return $this->hasMany(Transaction::class, 'customer_id');
    }
}

