@extends('layouts.app')

@section('title', 'Customer')
@section('header', 'Data Customer')

@section('content')

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">Data Customer</h2>
        <a href="{{ route('customers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah
        </a>
    </div>

    <div class="bg-white shadow rounded">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-center">Telepon</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-center w-32"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $c)
                    <tr class="border-t">
                        <td class="px-4 py-2">
                            {{ $c->nama_customer }}
                        </td>
                        <td class="px-4 py-2 text-center">
                            {{ $c->telepon_customer ?: '-' }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $c->alamat_customer ?: '-' }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-3">
                            <a href="{{ route('customers.edit', $c->id) }}" class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('customers.destroy', $c->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus customer ini?')" class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-400">
                            Belum ada data customer
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection