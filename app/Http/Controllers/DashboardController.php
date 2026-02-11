<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __invoke()
    {
        return view('dashboard.index', [
            // tabel migrasi bernama 'produk' dan 'transaksi', kolom total ada di 'total_harga'
            'totalProduk' => DB::table('products')->count(),
            'transaksiHariIni' => DB::table(    'transaksi')->whereDate('created_at', Carbon::today())->count(),
            'pendapatanHariIni' => DB::table('transaksi')->whereDate('created_at', Carbon::today())->sum('total_harga'),
        ]);
    }


}
