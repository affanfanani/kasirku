@extends('layouts.app')

@section('title', 'Transaksi')
@section('header', 'Riwayat Transaksi')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Riwayat Transaksi</h2>
            <p class="text-sm text-gray-500">Daftar semua transaksi</p>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('transactions.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                + Transaksi
            </a>

            <a href="{{ route('transactions.download.rekap') }}"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm">
                Download Rekap
            </a>
        </div>
    </div>



    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">Customer</th>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3 text-center w-20">Jumlah Barang</th>
                    <th class="px-4 py-3 text-right w-32">Total Harga</th>
                    <th class="px-4 py-3 text-center w-36">Tanggal</th>
                    <th class="px-4 py-3 text-center w-24">Hasil</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($transactions as $t)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>

                        <td class="px-4 py-2">
                            {{ $t->customer->nama_customer ?? 'Umum' }}
                        </td>

                        <td class="px-4 py-2">
                            {{ $t->product->nama_produk ?? '-' }}
                        </td>

                        <td class="px-4 py-2 text-center">
                            {{ $t->jumlah }}
                        </td>

                        <td class="px-4 py-2 text-right font-medium">
                            Rp {{ number_format($t->total_harga, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-2 text-center text-xs text-gray-500">
                            {{ $t->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('transactions.download', $t->id) }}"
                                class="bg-green-600 text-white px-2 py-2 rounded-lg hover:bg-green-700 text-sm">
                                download
                            </a>
                        </td>

                        <td class="px-4 py-2 text-center space-x-2">
                            <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus transaksi?')"
                                    class="bg-red-600 text-white px-2 py-2 rounded-lg hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 text-gray-400">
                            Belum ada transaksi
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

@endsection