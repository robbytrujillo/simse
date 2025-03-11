<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Exception;

class KurikulumController extends Controller
{
    public function index()
    {
        $curriculums = Kurikulum::all();
        return view('dashboard.curriculums.index', compact('curriculums'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:kurikulums,name',
                'academic_year' => 'required|string|max:20',
                'description' => 'nullable|string',
            ]);

            Kurikulum::create([
                'name' => $request->name,
                'academic_year' => $request->academic_year,
                'description' => $request->description,
            ]);

            return redirect()->route('curriculums.index')->with('success', 'Kurikulum berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('curriculums.index')->with('error', 'Terjadi kesalahan saat menambahkan kurikulum!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $curriculum = Kurikulum::findOrFail($id);
            return response()->json(['data' => $curriculum]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Kurikulum tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:kurikulums,name,' . $id,
                'academic_year' => 'required|string|max:20',
                'description' => 'nullable|string',
            ]);

            $curriculum = Kurikulum::findOrFail($id);
            $curriculum->update([
                'name' => $request->name,
                'academic_year' => $request->academic_year,
                'description' => $request->description,
            ]);

            return redirect()->route('curriculums.index')->with('success', 'Kurikulum berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('curriculums.index')->with('error', 'Terjadi kesalahan saat memperbarui kurikulum!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $curriculum = Kurikulum::findOrFail($id);
            $curriculum->delete();

            return redirect()->route('curriculums.index')->with('success', 'Kurikulum berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('curriculums.index')->with('error', 'Terjadi kesalahan saat menghapus kurikulum!')->with('type', 'toastr');
        }
    }
}

