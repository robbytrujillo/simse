<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Silabus;
use App\Models\Kurikulum;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Exception;

class SilabusController extends Controller
{
    public function index()
    {
        $silabuses = Silabus::with('curriculum', 'classRoom', 'mapel')->get();
        $classlists = ClassRoom::all();
        $curriculums = Kurikulum::all();
        $mapels = Mapel::all();
        return view('dashboard.silabus.index', compact('silabuses', 'curriculums', 'classlists', 'mapels'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'curriculum_id' => 'required|exists:kurikulums,id',
                'class_id' => 'required|exists:class_rooms,id',
                'mapel_id' => 'required|exists:mapels,id',
                'content' => 'nullable|string',
            ]);

            Silabus::create([
                'curriculum_id' => $request->curriculum_id,
                'class_id' => $request->class_id,
                'mapel_id' => $request->mapel_id,
                'content' => $request->content,
            ]);

            return redirect()->route('silabuses.index')->with('success', 'Silabus berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('silabuses.index')->with('error', 'Terjadi kesalahan saat menambahkan silabus! ' . $e->getMessage())->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $silabus = Silabus::findOrFail($id);
            return response()->json(['data' => $silabus]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Silabus tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'curriculum_id' => 'required|exists:kurikulums,id',
                'class_id' => 'required|exists:class_rooms,id',
                'mapel_id' => 'required|exists:mapels,id',
                'content' => 'nullable|string',
            ]);

            $silabus = Silabus::findOrFail($id);
            $silabus->update([
                'curriculum_id' => $request->curriculum_id,
                'class_id' => $request->class_id,
                'mapel_id' => $request->mapel_id,
                'content' => $request->content,
            ]);

            return redirect()->route('silabuses.index')->with('success', 'Silabus berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('silabuses.index')->with('error', 'Terjadi kesalahan saat memperbarui silabus!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $silabus = Silabus::findOrFail($id);
            $silabus->delete();

            return redirect()->route('silabuses.index')->with('success', 'Silabus berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('silabuses.index')->with('error', 'Terjadi kesalahan saat menghapus silabus!')->with('type', 'toastr');
        }
    }
}

