<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ViolationType;
use Illuminate\Http\Request;
use Exception;

class ViolationTypeController extends Controller
{
    public function index()
    {
        $violationTypes = ViolationType::all();
        return view('dashboard.violation_types.index', compact('violationTypes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:violation_types,name',
                'description' => 'nullable|string',
            ]);

            ViolationType::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('violation-types.index')->with('success', 'Jenis pelanggaran berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('violation-types.index')->with('error', 'Terjadi kesalahan saat menambahkan jenis pelanggaran!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $violationType = ViolationType::findOrFail($id);
            return response()->json(['data' => $violationType]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Jenis pelanggaran tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:violation_types,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $violationType = ViolationType::findOrFail($id);
            $violationType->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('violation-types.index')->with('success', 'Jenis pelanggaran berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('violation-types.index')->with('error', 'Terjadi kesalahan saat memperbarui jenis pelanggaran!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $violationType = ViolationType::findOrFail($id);
            $violationType->delete();

            return redirect()->route('violation-types.index')->with('success', 'Jenis pelanggaran berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('violation-types.index')->with('error', 'Terjadi kesalahan saat menghapus jenis pelanggaran!')->with('type', 'toastr');
        }
    }
}

