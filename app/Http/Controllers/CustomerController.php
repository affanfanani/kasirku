<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customer')
            ->orderBy('nama_customer')
            ->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:100',
            'telepon_customer' => 'nullable|string|max:20',
            'alamat_customer' => 'nullable|string',
        ]);

        DB::table('customer')->insert([
            'nama_customer' => $request->nama_customer,
            'telepon_customer' => $request->telepon_customer,
            'alamat_customer' => $request->alamat_customer,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer berhasil ditambahkan');
    }

    public function edit($id)
    {
        $customer = DB::table('customer')->where('id', $id)->first();

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:100',
            'telepon_customer' => 'nullable|string|max:20',
            'alamat_customer' => 'nullable|string',
        ]);

        DB::table('customer')
            ->where('id', $id)
            ->update([
                'nama_customer' => $request->nama_customer,
                'telepon_customer' => $request->telepon_customer,
                'alamat_customer' => $request->alamat_customer,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('customer')->where('id', $id)->delete();

        return back()->with('success', 'Customer dihapus');
    }
}
