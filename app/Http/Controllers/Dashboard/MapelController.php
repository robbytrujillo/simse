<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Exception;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();
        return view('dashboard.mapels.index', compact('mapels'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_mapel' => 'required|string|max:255|unique:mapels,nama_mapel',
            ]);

            Mapel::create([
                'nama_mapel' => $request->nama_mapel,
            ]);

            return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('mapels.index')->with('error', 'Terjadi kesalahan saat menambahkan mata pelajaran!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $mapel = Mapel::findOrFail($id);
            return response()->json(['data' => $mapel]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Mata pelajaran tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_mapel' => 'required|string|max:255|unique:mapels,nama_mapel,' . $id,
            ]);

            $mapel = Mapel::findOrFail($id);
            $mapel->update([
                'nama_mapel' => $request->nama_mapel,
            ]);

            return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('mapels.index')->with('error', 'Terjadi kesalahan saat memperbarui mata pelajaran!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $mapel = Mapel::findOrFail($id);
            $mapel->delete();

            return redirect()->route('mapels.index')->with('success', 'Mata pelajaran berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('mapels.index')->with('error', 'Terjadi kesalahan saat menghapus mata pelajaran!')->with('type', 'toastr');
        }
    }
}

