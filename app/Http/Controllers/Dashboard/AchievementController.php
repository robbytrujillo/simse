<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\AchievementExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\AchievementAward;
use App\Models\AchievementType;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Log;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::with(['student', 'reporter', 'achievementType'])->get();
        $students = Student::all();
        $users = User::all();
        $classlists = ClassRoom::all();
        $achievementstype = AchievementType::all();
        $achievementsaward = AchievementAward::all();

        return view('dashboard.achievements.index', compact('achievements', 'students', 'users', 'classlists', 'achievementstype', 'achievementsaward'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'achievement_type_id' => 'required|exists:achievement_types,id',
                'date' => 'required|date',
                'description' => 'nullable|string',
                'achievement_reward_id' => 'required|exists:achievement_awards,id',
                'image' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if (!$image->isValid()) {
                    throw new Exception('File gambar tidak valid.');
                }

                $imagePath = $image->store('achievements', 'public');
            } else {
                $imagePath = null;
            }

            Achievement::create([
                'student_id' => $request->student_id,
                'achievement_type_id' => $request->achievement_type_id,
                'date' => $request->date,
                'description' => $request->description,
                'achievement_reward_id' => $request->achievement_reward_id,
                'user_id' => Auth::id(),
                'image' => $imagePath,
            ]);

            return redirect()->route('achievements.index')->with('success', 'Pencapaian berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            Log::error('Error storing achievement: ' . $e->getMessage());
            return redirect()->route('achievements.index')->with('error', 'Terjadi kesalahan saat menambahkan pencapaian!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $achievement = Achievement::with(['student', 'reporter'])->findOrFail($id);

            return response()->json(['data' => $achievement]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Pencapaian tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'achievement_type_id' => 'required|exists:achievement_types,id',
                'date' => 'required|date',
                'description' => 'nullable|string',
                'achievement_reward_id' => 'required|exists:achievement_awards,id',
                'image' => 'nullable|image|max:2048',
            ]);

            $achievement = Achievement::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($achievement->image) {
                    Storage::disk('public')->delete($achievement->image);
                }

                $imagePath = $request->file('image')->store('achievements', 'public');
                $achievement->image = $imagePath;
            }

            $achievement->update([
                'student_id' => $request->student_id,
                'achievement_type_id' => $request->achievement_type_id,
                'date' => $request->date,
                'description' => $request->description,
                'achievement_reward_id' => $request->achievement_reward_id,
                'user_id' => Auth::id(),
                'image' => $achievement->image,
            ]);

            return redirect()->route('achievements.index')->with('success', 'Pencapaian berhasil diperbarui!')->with('type', 'toastr');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return redirect()->route('achievements.index')->with('error', implode(', ', $errors))->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievements.index')->with('error', 'Terjadi kesalahan saat memperbarui pencapaian: ' . $e->getMessage())->with('type', 'toastr');
        }
    }

    public function export(Request $request)
    {
        $class = $request->input('class');

        if (!$class) {
            return redirect()->route('achievements.index')->with('error', 'Kelas tidak dipilih')->with('type', 'toastr');
        }

        return Excel::download(new AchievementExport($class), 'achievements-' . date('d-m-Y') . '.xlsx');
    }

    public function destroy($id)
    {
        try {
            $achievement = Achievement::findOrFail($id);
            $achievement->delete();

            return redirect()->route('achievements.index')->with('success', 'Pencapaian berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('achievements.index')->with('error', 'Terjadi kesalahan saat menghapus pencapaian!')->with('type', 'toastr');
        }
    }
}

