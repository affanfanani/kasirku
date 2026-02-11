<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function create()
{
    $categories = Product::select('kategori_produk')
        ->distinct()
        ->whereNotNull('kategori_produk')
        ->pluck('kategori_produk');

    return view('products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required',
        'harga_produk' => 'required|numeric',
        'stok_produk' => 'required|numeric',
        'kategori_produk' => 'required',
    ]);

    Product::create([
        'nama_produk' => $request->nama_produk,
        'harga_produk' => $request->harga_produk,
        'stok_produk' => $request->stok_produk,
        'kategori_produk' => $request->kategori_produk,
    ]);

    return redirect()->route('products.index');
}

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|numeric',
            'kategori_produk' => 'required',
        ]);

        $product->update([
            'nama_produk' => $data['nama_produk'],
            'harga_produk' => $data['harga_produk'],
            'stok_produk' => $data['stok_produk'],
            'kategori_produk' => $data['kategori_produk'],
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
