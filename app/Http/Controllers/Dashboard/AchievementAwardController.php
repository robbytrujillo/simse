<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AchievementAward;
use Illuminate\Http\Request;
use Exception;

class AchievementAwardController extends Controller
{
    public function index()
    {
        $achievementAwards = AchievementAward::all();
        return view('dashboard.achievement_awards.index', compact('achievementAwards'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:achievement_awards,name',
                'description' => 'nullable|string',
            ]);

            AchievementAward::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('achievement-awards.index')->with('success', 'Award pencapaian berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievement-awards.index')->with('error', 'Terjadi kesalahan saat menambahkan award pencapaian!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $achievementAward = AchievementAward::findOrFail($id);
            return response()->json(['data' => $achievementAward]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Award pencapaian tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:achievement_awards,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $achievementAward = AchievementAward::findOrFail($id);
            $achievementAward->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('achievement-awards.index')->with('success', 'Award pencapaian berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievement-awards.index')->with('error', 'Terjadi kesalahan saat memperbarui award pencapaian!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $achievementAward = AchievementAward::findOrFail($id);
            $achievementAward->delete();

            return redirect()->route('achievement-awards.index')->with('success', 'Award pencapaian berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievement-awards.index')->with('error', 'Terjadi kesalahan saat menghapus award pencapaian!')->with('type', 'toastr');
        }
    }
}

