@extends('layouts.app')

@section('title', 'Edit Customer')
@section('header', 'Edit Customer')

@section('content')

    <div class="max-w-xl bg-white p-6 rounded-xl shadow">
        <form method="POST" action="{{ route('customers.update', $customer->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="text-sm">Nama</label>
                <input type="text" name="nama_customer" value="{{ $customer->nama_customer }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="text-sm">Telepon</label>
                <input type="text" name="telepon_customer" value="{{ $customer->telepon_customer }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm">Alamat</label>
                <textarea name="alamat_customer"
                    class="w-full border rounded px-3 py-2">{{ $customer->alamat_customer }}</textarea>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">
                    Batal
                </a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Update
                </button>
            </div>
        </form>
    </div>

@endsection