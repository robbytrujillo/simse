<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Imports\TeacherImport;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('dashboard.teachers.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'birth_place' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'gender' => 'required|string|max:10',
                'address' => 'required|string',
                'phone' => 'required|string|max:15',
                'email' => 'required|email|max:255|unique:users,email',
                'last_education' => 'required|string|max:255',
                'education_institution' => 'required|string|max:255',
                'graduation_year' => 'required|integer',
                'employee_id' => 'required|string|max:50|unique:teachers,employee_id',
                'employment_status' => 'required|string|max:50',
                'position' => 'required|string|max:255',
                'start_date' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = $request->hasFile('image') ? $request->file('image')->store('teachers', 'public') : null;

            $user = User::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'password' => bcrypt('password123'),
            ]);

            $user->assignRole('guru');

            $teacher = Teacher::create([
                'full_name' => $request->full_name,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'last_education' => $request->last_education,
                'education_institution' => $request->education_institution,
                'graduation_year' => $request->graduation_year,
                'employee_id' => $request->employee_id,
                'employment_status' => $request->employment_status,
                'position' => $request->position,
                'start_date' => $request->start_date,
                'image' => $imagePath,
                'user_id' => $user->id, 
            ]);
            

            return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan dan pengguna dibuat!')->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat menambahkan guru: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan guru. Silakan coba lagi.')->with('type', 'toastr');
        }
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:xlsx,csv'
            ]);

            Excel::import(new TeacherImport, $request->file('file'));

            return redirect()->route('teachers.index')->with('success', 'Data guru berhasil diimpor!')->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat mengimpor guru: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor guru. Silakan coba lagi.')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return response()->json(['data' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'birth_place' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'gender' => 'required|string|max:10',
                'address' => 'required|string',
                'phone' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'last_education' => 'required|string|max:255',
                'education_institution' => 'required|string|max:255',
                'graduation_year' => 'required|integer',
                'employee_id' => 'required|string|max:50',
                'employment_status' => 'required|string|max:50',
                'position' => 'required|string|max:255',
                'start_date' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $teacher = Teacher::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($teacher->image) {
                    Storage::disk('public')->delete($teacher->image);
                }

                $imagePath = $request->file('image')->store('teachers', 'public');
                $teacher->image = $imagePath;
            }

            $teacher->update([
                'full_name' => $request->full_name,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'last_education' => $request->last_education,
                'education_institution' => $request->education_institution,
                'graduation_year' => $request->graduation_year,
                'employee_id' => $request->employee_id,
                'employment_status' => $request->employment_status,
                'position' => $request->position,
                'start_date' => $request->start_date,
                'image' => $teacher->image,
            ]);

            return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui!')->with('type', 'toastr');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui guru. Silakan coba lagi.')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->image) {
            Storage::disk('public')->delete($teacher->image);
        }

        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus!')->with('type', 'toastr');
    }
}

