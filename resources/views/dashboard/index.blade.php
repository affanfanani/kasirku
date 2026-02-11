@extends('layouts.app')

@section('title', 'Dashboard Kasir')
@section('header', 'Dashboard Kasir')

@section('content')

    <!-- SUB HEADER -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Dashboard Kasir
        </h2>
        <p class="text-gray-500 text-sm">
            Ringkasan aktivitas hari ini
        </p>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <!-- Total Produk -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-sm text-gray-500">Total Produk</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">
                {{ $totalProduk ?? 0 }}
            </h3>
        </div>

        <!-- Transaksi Hari Ini -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-sm text-gray-500">Transaksi Hari Ini</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">
                {{ $transaksiHariIni ?? 0 }}
            </h3>
        </div>

        <!-- Pendapatan Hari Ini -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-sm text-gray-500">Pendapatan Hari Ini</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">
                Rp {{ number_format($pendapatanHariIni ?? 0, 0, ',', '.') }}
            </h3>
        </div>

    </div>

    <!-- QUICK MENU -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- Transaksi -->
        <a href="{{ route('transactions.create') }}" class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
            <h4 class="font-semibold text-lg">Transaksi</h4>
            <p class="text-sm mt-1 opacity-90">Mulai transaksi baru</p>
        </a>

        <!-- Produk -->
        <a href="{{ route('products.index') }}" class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
            <h4 class="font-semibold text-gray-800 text-lg">Produk</h4>
            <p class="text-sm text-gray-500 mt-1">Kelola data produk</p>
        </a>

        <!-- Customer -->
        <a href="{{ route('customers.index') }}" class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
            <h4 class="font-semibold text-gray-800 text-lg">Customer</h4>
            <p class="text-sm text-gray-500 mt-1">Data pelanggan</p>
        </a>

        <!-- Riwayat -->
        <a href="{{ route('transactions.index') }}" class="bg-white rounded-xl p-6 shadow hover:shadow-md transition">
            <h4 class="font-semibold text-gray-800 text-lg">Riwayat</h4>
            <p class="text-sm text-gray-500 mt-1">Riwayat transaksi</p>
        </a>

    </div>

@endsection