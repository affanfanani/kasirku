@extends('layouts.app')

@section('title','Tambah Customer')
@section('header','Tambah Customer')

@section('content')

<div class="max-w-xl bg-white p-6 rounded-xl shadow">
    <form method="POST" action="{{ route('customers.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="text-sm">Nama</label>
            <input type="text" name="nama_customer"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="text-sm">Telepon</label>
            <input type="text" name="telepon_customer"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="text-sm">Alamat</label>
            <textarea name="alamat_customer"
                      class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('customers.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded">
                Batal
            </a>
            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection
