<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\SanctionType;
use App\Models\Violation;
use App\Models\Student;
use App\Models\User;
use App\Models\ViolationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ViolationsExport;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with(['student', 'reporter', 'violationType'])->get();
        $students = Student::all();
        $reporters = User::all();
        $classlists = ClassRoom::all();
        $violationTypes = ViolationType::all();
        $sanctionTypes = SanctionType::all();

        return view('dashboard.violations.index', compact('violations', 'students', 'reporters', 'classlists', 'violationTypes', 'sanctionTypes'));
    }

    public function getStudentsByClass(Request $request)
    {
        $classId = $request->class_id;
        $students = Student::where('class_id', $classId)->get();

        return response()->json($students);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'violation_type_id' => 'required|exists:violation_types,id',
                'date' => 'required|date',
                'description' => 'nullable|string',
                'sanction_type_id' => 'required|exists:sanction_types,id',
                'image' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if (!$image->isValid()) {
                    throw new Exception('File gambar tidak valid.');
                }

                $imagePath = $image->store('violations', 'public');
            } else {
                $imagePath = null;
            }

            Violation::create([
                'student_id' => $request->student_id,
                'violation_type_id' => $request->violation_type_id,
                'date' => $request->date,
                'description' => $request->description,
                'sanction_type_id' => $request->sanction_type_id,
                'user_id' => Auth::id(),
                'image' => $imagePath,
            ]);

            return redirect()->route('violations.index')->with('success', 'Pelanggaran berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            Log::error('Error storing violation: ' . $e->getMessage());
            return redirect()->route('violations.index')->with('error', 'Terjadi kesalahan saat menambahkan pelanggaran!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $violation = Violation::with(['student', 'reporter', 'violationType', 'sanctionType'])->findOrFail($id);

            return response()->json(['data' => $violation]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Pelanggaran tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'violation_type_id' => 'required|exists:violation_types,id',
                'date' => 'required|date',
                'description' => 'nullable|string',
                'sanction_type_id' => 'required|exists:sanction_types,id',
                'image' => 'nullable|image|max:2048',
            ]);

            $violation = Violation::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($violation->image) {
                    Storage::disk('public')->delete($violation->image);
                }

                $imagePath = $request->file('image')->store('violations', 'public');
                $violation->image = $imagePath;
            }

            $violation->update([
                'student_id' => $request->student_id,
                'violation_type_id' => $request->violation_type_id,
                'date' => $request->date,
                'description' => $request->description,
                'sanction_type_id' => $request->sanction_type_id,
                'user_id' => Auth::id(),
                'image' => $violation->image,
            ]);

            return redirect()->route('violations.index')->with('success', 'Pelanggaran berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('violations.index')->with('error', 'Terjadi kesalahan saat memperbarui pelanggaran!')->with('type', 'toastr');
        }
    }

    public function export(Request $request)
    {
        $class = $request->input('class');

        if (!$class) {
            return redirect()->route('violations.index')->with('error', 'Kelas tidak dipilih')->with('type', 'toastr');
        }

        return Excel::download(new ViolationsExport($class), 'violations-' . date('d-m-Y') . '.xlsx');
    }

    public function destroy($id)
    {
        try {
            $violation = Violation::findOrFail($id);
            $violation->delete();

            return redirect()->route('violations.index')->with('success', 'Pelanggaran berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('violations.index')->with('error', 'Terjadi kesalahan saat menghapus pelanggaran!')->with('type', 'toastr');
        }
    }
}

