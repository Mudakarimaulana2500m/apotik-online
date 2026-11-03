<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'success', 'data' => Obat::all()], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'stock_obat' => 'required|numeric',
            'tanggal_kadaluarsa' => 'required|date'
        ]);

        $obat = Obat::create($validated);
        return response()->json(['message' => 'Obat berhasil ditambah', 'data' => $obat], 201);
    }

    public function show($id)
    {
        $obat = Obat::find($id);
        if (!$obat) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json(['status' => 'success', 'data' => $obat], 200);
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::find($id);
        if (!$obat) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $obat->update($request->all());
        return response()->json(['message' => 'Obat berhasil diubah', 'data' => $obat], 200);
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);
        if (!$obat) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $obat->delete();
        return response()->json(['message' => 'Obat berhasil dihapus'], 200);
    }
}