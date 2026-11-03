<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'success', 'data' => Pelanggan::all()], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pelanggan = Pelanggan::create($validated);
        return response()->json(['message' => 'Pelanggan berhasil ditambah', 'data' => $pelanggan], 201);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json(['status' => 'success', 'data' => $pelanggan], 200);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $pelanggan->update($request->all());
        return response()->json(['message' => 'Pelanggan berhasil diubah', 'data' => $pelanggan], 200);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $pelanggan->delete();
        return response()->json(['message' => 'Pelanggan berhasil dihapus'], 200);
    }
}