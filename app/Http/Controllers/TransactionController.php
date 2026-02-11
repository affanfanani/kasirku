<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{

 public function downloadRekap()
    {
        $transactions = Transaction::with(['customer','product'])
            ->latest()
            ->get();

        $pdf = Pdf::loadView('transaction.pdf', compact('transactions'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('riwayat-transaksi.pdf');
    }

    // 🔽 DOWNLOAD STRUK PER TRANSAKSI
    public function download($id)
    {
        $transaction = Transaction::with(['customer','product'])
            ->findOrFail($id);

        $pdf = Pdf::loadView('transaction.pdf-single', compact('transaction'))
            ->setPaper([0,0,226.77,600]); // ukuran struk

        return $pdf->download('struk-transaksi-'.$transaction->id.'.pdf');
    }

    public function index()
{
    $transactions = Transaction::with(['customer','product'])
        ->latest()
        ->get();

    return view('transaction.index', compact('transactions'));
}


    public function create()
    {
        return view('transaction.create', [
            'products'  => Product::all(),
            'customers' => Customer::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customer,id',
            'produk_id'   => 'required|exists:products,id',
            'jumlah'      => 'required|integer|min:1',
            'bayar'       => 'required|integer|min:0',
        ]);

        $produk = Product::findOrFail($request->produk_id);
        $total  = $produk->harga_produk * $request->jumlah;

        if ($request->bayar < $total) {
            return back()->withErrors(['bayar' => 'Uang tidak cukup']);
        }

        DB::transaction(function () use ($request, $produk, $total) {
            Transaction::create([
                'customer_id' => $request->customer_id,
                'produk_id'   => $produk->id,
                'jumlah'      => $request->jumlah,
                'total_harga' => $total,
            ]);

            $produk->decrement('stok_produk', $request->jumlah);
        });

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil');
    }

    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();

        return back()->with('success', 'Transaksi dihapus');
    }
}
