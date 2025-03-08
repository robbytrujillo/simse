<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $classes = ClassRoom::all();

        return view('dashboard.students.index', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nis' => 'required|string|max:20|unique:students,nis',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'gender' => 'required|string|max:10',
                'dob' => 'required|date',
                'address' => 'required|string',
                'phone' => 'required|string|max:15',
                'class_id' => 'required|integer|exists:class_rooms,id',
                'father_name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = $request->hasFile('image') ? $request->file('image')->store('students', 'public') : null;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password123'),
            ]);

            $user->assignRole('siswa');
            $student = Student::create([
                'nis' => $request->nis,
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'address' => $request->address,
                'phone' => $request->phone,
                'class_id' => $request->class_id,
                'father_name' => $request->father_name,
                'slug' => Str::slug($request->name),
                'image' => $imagePath,
                'user_id' => $user->id,
            ]);

            return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan dan pengguna dibuat!')->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat menambahkan siswa: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan siswa. Silakan coba lagi.')->with('type', 'toastr');
        }
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:xlsx,csv'
            ]);

            Excel::import(new StudentImport, $request->file('file'));

            return redirect()->route('students.index')->with('success', 'Data siswa berhasil diimpor!')->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat mengimpor data siswa: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor siswa. Silakan coba lagi.')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return response()->json(['data' => $student]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nis' => 'required|string|max:20',
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'gender' => 'required|string|max:10',
                'dob' => 'required|date',
                'address' => 'required|string',
                'phone' => 'required|string|max:15',
                'class_id' => 'required|integer|exists:class_rooms,id',
                'father_name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $student = Student::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($student->image) {
                    Storage::disk('public')->delete($student->image);
                }

                $imagePath = $request->file('image')->store('students', 'public');
                $student->image = $imagePath;
            }

            $student->slug = Str::slug($request->name);

            $student->update([
                'nis' => $request->nis,
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'address' => $request->address,
                'phone' => $request->phone,
                'class_id' => $request->class_id,
                'father_name' => $request->father_name,
                'image' => $student->image,
            ]);

            return redirect()->route('students.index')->with('success', 'Siswa berhasil diperbarui!')->with('type', 'toastr');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui siswa: ' . $e->getMessage())->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus!')->with('type', 'toastr');
    }
}

