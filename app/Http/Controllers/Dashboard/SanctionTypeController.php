<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SanctionType;
use Illuminate\Http\Request;
use Exception;

class SanctionTypeController extends Controller
{
    public function index()
    {
        $sanctionTypes = SanctionType::all();
        return view('dashboard.sanction_types.index', compact('sanctionTypes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:sanction_types,name',
                'description' => 'nullable|string',
            ]);

            SanctionType::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('sanction-types.index')->with('success', 'Tipe sanksi berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('sanction-types.index')->with('error', 'Terjadi kesalahan saat menambahkan tipe sanksi!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $sanctionType = SanctionType::findOrFail($id);
            return response()->json(['data' => $sanctionType]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Tipe sanksi tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:sanction_types,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $sanctionType = SanctionType::findOrFail($id);
            $sanctionType->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('sanction-types.index')->with('success', 'Tipe sanksi berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('sanction-types.index')->with('error', 'Terjadi kesalahan saat memperbarui tipe sanksi!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $sanctionType = SanctionType::findOrFail($id);
            $sanctionType->delete();

            return redirect()->route('sanction-types.index')->with('success', 'Tipe sanksi berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('sanction-types.index')->with('error', 'Terjadi kesalahan saat menghapus tipe sanksi!')->with('type', 'toastr');
        }
    }
}

