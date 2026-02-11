@extends('layouts.app')

@section('title', 'Produk')
@section('header', 'Produk')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Daftar Produk</h2>
            <p class="text-sm text-gray-500">Kelola produk yang dijual</p>
        </div>

        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Produk
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-center w-32">Harga</th>
                    <th class="px-4 py-3 text-center w-24">Stok</th>
                    <th class="px-4 py-3 text-center w-32"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-t">
                        <td class="px-4 py-2">
                            {{ $product->kategori_produk }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $product->nama_produk }}
                        </td>
                        <td class="px-4 py-2 text-center">
                            Rp {{ number_format($product->harga_produk, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 text-center">
                            {{ $product->stok_produk }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-3">
                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus produk ini?')" class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                            Belum ada produk
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


@endsection