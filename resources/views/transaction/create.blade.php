@extends('layouts.app')

@section('title', 'Transaksi Baru')
@section('header', 'Transaksi Baru')

@section('content')

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6 space-y-6">

        <!-- FORM -->
        <form method="POST" action="{{ route('transactions.store') }}" class="space-y-5">
            @csrf

            <!-- CUSTOMER -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Customer
                </label>
                <select name="customer_id" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
                    required>
                    @foreach($customers as $c)
                        <option value="{{ $c->id }}">{{ $c->nama_customer }}</option>
                    @endforeach
                </select>
            </div>

            <!-- PRODUK -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Produk
                </label>
                <select name="produk_id" id="produk"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
                    @foreach($products as $p)
                        <option value="{{ $p->id }}" data-harga="{{ $p->harga_produk }}">
                            {{ $p->nama_produk }} (Rp {{ number_format($p->harga_produk, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- JUMLAH -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jumlah
                </label>
                <input type="number" name="jumlah" id="jumlah" value="1" min="1"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- BAYAR -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Uang Bayar
                </label>
                <input type="number" name="bayar" id="bayar" placeholder="Masukkan uang customer"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- SUMMARY -->
            <div class="bg-gray-50 rounded-lg p-4 space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Total</span>
                    <span class="font-semibold">
                        Rp <span id="total">0</span>
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Kembali</span>
                    <span class="font-semibold text-green-600">
                        Rp <span id="kembali">0</span>
                    </span>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('transactions.index') }}"
                    class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>

    <!-- SCRIPT -->
    <script>
        const produk = document.getElementById('produk')
        const jumlah = document.getElementById('jumlah')
        const bayar = document.getElementById('bayar')
        const totalEl = document.getElementById('total')
        const kembaliEl = document.getElementById('kembali')

        function hitung() {
            const harga = parseInt(produk.selectedOptions[0].dataset.harga)
            const qty = parseInt(jumlah.value || 0)
            const uang = parseInt(bayar.value || 0)

            const total = harga * qty
            totalEl.innerText = total.toLocaleString('id-ID')

            const kembali = uang - total
            kembaliEl.innerText = kembali > 0 ? kembali.toLocaleString('id-ID') : 0
        }

        produk.onchange = hitung
        jumlah.oninput = hitung
        bayar.oninput = hitung

        hitung()
    </script>

@endsection