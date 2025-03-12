<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Exam;
use App\Models\Mapel;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Exception;

class ExamController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        if (auth()->user()->hasRole('admin')) {
            $exams = Exam::with(['classRoom', 'teacher', 'mapel'])->get();
        } else {
            $teacher = Teacher::where('user_id', $userId)->first();

            if (!$teacher) {
                return redirect()->route('home')->with('error', 'Teacher not found');
            }

            $teacherId = $teacher->id;
            $exams = Exam::with(['classRoom', 'teacher', 'mapel'])
                ->where('teacher_id', $teacherId)
                ->get();
        }

        $classes = ClassRoom::all();
        $teachers = Teacher::all();
        $subjects = Mapel::all();

        return view('dashboard.exams.index', compact('exams', 'classes', 'teachers', 'subjects'));
    }



    public function show($id)
    {
        try {
            $exam = Exam::with(['classRoom', 'teacher', 'mapel'])->findOrFail($id);
            return response()->json(['data' => $exam]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Ujian tidak ditemukan!'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_time' => 'required|date',
                'end_time' => 'required|date|after:start_time',
                'duration' => 'required|integer|min:1',
                'is_active' => 'required|boolean',
                'class_id' => 'required|exists:class_rooms,id',
                'teacher_id' => 'required|exists:teachers,id',
                'mapel_id' => 'required|exists:mapels,id',
            ]);

            Exam::create($request->all());

            return redirect()->route('exams.index')->with('success', 'Ujian berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('exams.index')->with('error', 'Terjadi kesalahan saat menambahkan ujian!')->with('type', 'toastr');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_time' => 'required|date',
                'end_time' => 'required|date|after:start_time',
                'duration' => 'required|integer|min:1',
                'is_active' => 'required|boolean',
                'class_id' => 'required|exists:class_rooms,id',
                'teacher_id' => 'required|exists:teachers,id',
                'mapel_id' => 'required|exists:mapels,id',
            ]);

            $exam = Exam::findOrFail($id);
            $exam->update($request->all());

            return redirect()->route('exams.index')->with('success', 'Ujian berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('exams.index')->with('error', 'Terjadi kesalahan saat memperbarui ujian!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $exam = Exam::findOrFail($id);
            $exam->delete();

            return redirect()->route('exams.index')->with('success', 'Ujian berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('exams.index')->with('error', 'Terjadi kesalahan saat menghapus ujian!')->with('type', 'toastr');
        }
    }
}

