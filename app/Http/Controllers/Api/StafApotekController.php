<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StafApotek;
use Illuminate\Http\Request;

class StafApotekController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'success', 'data' => StafApotek::all()], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'no_hp' => 'required'
        ]);

        $staf = StafApotek::create($validated);
        return response()->json(['message' => 'Staf berhasil ditambah', 'data' => $staf], 201);
    }

    public function show($id)
    {
        $staf = StafApotek::find($id);
        if (!$staf) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json(['status' => 'success', 'data' => $staf], 200);
    }

    public function update(Request $request, $id)
    {
        $staf = StafApotek::find($id);
        if (!$staf) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $staf->update($request->all());
        return response()->json(['message' => 'Staf berhasil diubah', 'data' => $staf], 200);
    }

    public function destroy($id)
    {
        $staf = StafApotek::find($id);
        if (!$staf) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $staf->delete();
        return response()->json(['message' => 'Staf berhasil dihapus'], 200);
    }
}