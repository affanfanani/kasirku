@extends('layouts.app')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk')

@section('content')

    <div class="max-w-xl bg-white rounded-xl shadow p-6">

        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm">Nama Produk</label>
                <input type="text" name="nama_produk" required class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <div>
                <label class="text-sm">Harga Produk</label>
                <input type="number" name="harga_produk" required class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <div>
                <label class="text-sm">Stok Produk</label>
                <input type="number" name="stok_produk" required class="w-full mt-1 px-3 py-2 border rounded-lg">
            </div>

            <div>
                <label class="text-sm">Kategori Produk</label>

                <select name="kategori_produk" class="w-full mt-1 px-3 py-2 border rounded-lg" required>

                    <option value="">-- Pilih Kategori --</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>

            </div>


            <div class="flex justify-end gap-2">
                <a href="{{ route('products.index') }}" class="px-4 py-2 border rounded-lg">
                    Batal
                </a>

                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>

    </div>

@endsection