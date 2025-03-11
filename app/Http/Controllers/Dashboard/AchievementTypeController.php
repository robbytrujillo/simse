<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AchievementType;
use Illuminate\Http\Request;
use Exception;

class AchievementTypeController extends Controller
{
    public function index()
    {
        $achievementTypes = AchievementType::all();
        return view('dashboard.achievement_types.index', compact('achievementTypes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:achievement_types,name',
                'description' => 'nullable|string',
            ]);

            AchievementType::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('achievement-types.index')->with('success', 'Tipe pencapaian berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievement-types.index')->with('error', 'Terjadi kesalahan saat menambahkan tipe pencapaian!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $achievementType = AchievementType::findOrFail($id);
            return response()->json(['data' => $achievementType]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Tipe pencapaian tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:achievement_types,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $achievementType = AchievementType::findOrFail($id);
            $achievementType->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('achievement-types.index')->with('success', 'Tipe pencapaian berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievement-types.index')->with('error', 'Terjadi kesalahan saat memperbarui tipe pencapaian!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $achievementType = AchievementType::findOrFail($id);
            $achievementType->delete();

            return redirect()->route('achievement-types.index')->with('success', 'Tipe pencapaian berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievement-types.index')->with('error', 'Terjadi kesalahan saat menghapus tipe pencapaian!')->with('type', 'toastr');
        }
    }
}

