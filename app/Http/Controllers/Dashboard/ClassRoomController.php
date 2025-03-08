<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classRooms = ClassRoom::with('teacher')->get();
        $teachers = Teacher::all();

        return view('dashboard.classrooms.index', compact('classRooms', 'teachers'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'teacher_id' => 'nullable|exists:teachers,id',
            ]);

            ClassRoom::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'teacher_id' => $request->teacher_id,
            ]);

            return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('classrooms.index')->with('error', 'Terjadi kesalahan saat menambahkan kelas!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $classRoom = ClassRoom::with('teacher')->findOrFail($id);
            $teachers = Teacher::all();

            return response()->json(['data' => $classRoom, 'teachers' => $teachers]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Kelas tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'teacher_id' => 'nullable|exists:teachers,id',
            ]);

            $classRoom = ClassRoom::findOrFail($id);
            $classRoom->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'teacher_id' => $request->teacher_id,
            ]);

            return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('classrooms.index')->with('error', 'Terjadi kesalahan saat memperbarui kelas!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $classRoom = ClassRoom::findOrFail($id);
            $classRoom->delete();

            return redirect()->route('classrooms.index')->with('success', 'Kelas berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('classrooms.index')->with('error', 'Terjadi kesalahan saat menghapus kelas!')->with('type', 'toastr');
        }
    }
}

