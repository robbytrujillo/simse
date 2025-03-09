<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Mapel;
use App\Models\TeachingData;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeachingDataController extends Controller
{
    public function index()
    {
        $teachingData = TeachingData::with('teacher', 'classRoom', 'mapel')->get();

        foreach ($teachingData as $data) {
            $days = is_string($data->day) ? json_decode($data->day, true) : $data->day;
            $startTimes = is_string($data->start_time) ? json_decode($data->start_time, true) : $data->start_time;
            $endTimes = is_string($data->end_time) ? json_decode($data->end_time, true) : $data->end_time;

            if (is_array($days) && is_array($startTimes) && is_array($endTimes)) {
                $schedule = [];
                foreach ($days as $index => $day) {
                    $startTime = $startTimes[$index] ?? '';
                    $endTime = $endTimes[$index] ?? '';
                    $schedule[] = $day . " (" . $startTime . "-" . $endTime . ")";
                }
                $data->formatted_schedule = implode(', ', $schedule);
            } else {
                $data->formatted_schedule = '-';
            }
        }

        $teachers = Teacher::all();
        $classlists = ClassRoom::all();
        $mapels = Mapel::all();

        return view('dashboard.teaching_data.index', compact('teachingData', 'teachers', 'classlists', 'mapels'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $classRooms = ClassRoom::all();

        return view('dashboard.teaching_data.create', compact('teachers', 'classRooms'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'teacher_id' => 'required|exists:teachers,id',
                'mapel_id' => 'required|exists:mapels,id',
                'class_id' => 'required|exists:class_rooms,id',
                'hours_per_week' => 'required|integer|min:1',
                'day' => 'required|array|min:1',
                'day.*' => 'string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
                'start_time' => 'required|array|min:1',
                'start_time.*' => 'date_format:H:i',
                'end_time' => 'required|array|min:1',
                'end_time.*' => 'date_format:H:i|after:start_time.*',
            ]);

            TeachingData::create([
                'teacher_id' => $request->teacher_id,
                'mapel_id' => $request->mapel_id,
                'class_id' => $request->class_id,
                'hours_per_week' => $request->hours_per_week,
                'day' => $request->day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            return redirect()->route('teachings.index')->with('success', 'Data pengajaran berhasil ditambahkan!')->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat menambahkan data pengajaran: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data pengajaran.')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        $teachingData = TeachingData::with('teacher', 'classRoom', 'mapel')->findOrFail($id);

        return response()->json(['data' => $teachingData]);
    }

    public function edit($id)
    {
        $teaching = TeachingData::findOrFail($id);
        $teachers = Teacher::all();
        $classlists = ClassRoom::all();
        $mapels = Mapel::all();

        if (is_string($teaching->day)) {
            $teaching->day = json_decode($teaching->day, true);
        }
        return view('dashboard.teaching_data.edit', compact('teaching', 'teachers', 'classlists', 'mapels'));
    }

    public function update(Request $request, $id)
    {
        try {
            $teachingData = TeachingData::findOrFail($id);

            $request->validate([
                'teacher_id' => 'required|exists:teachers,id',
                'mapel_id' => 'required|exists:mapels,id',
                'class_id' => 'required|exists:class_rooms,id',
                'hours_per_week' => 'required|integer|min:1',
                'days' => 'required|array',
                'days.*' => 'required|string',
                'start_time' => 'required|array',
                'start_time.*' => 'required|date_format:H:i',
                'end_time' => 'required|array',
                'end_time.*' => 'required|date_format:H:i|after:start_time.*',
            ]);

            $teachingData->update([
                'teacher_id' => $request->teacher_id,
                'mapel_id' => $request->mapel_id,
                'class_id' => $request->class_id,
                'hours_per_week' => $request->hours_per_week,
                'day' => $request->days,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            return redirect()->route('teachings.index')->with('success', 'Data pengajaran berhasil diperbarui!')->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui data pengajaran: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data pengajaran.')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $teachingData = TeachingData::findOrFail($id);
            $teachingData->delete();
            return redirect()->route('teachings.index')
                ->with('success', 'Data pengajaran berhasil dihapus!')
                ->with('type', 'toastr');
        } catch (\Exception $e) {
            Log::error('Error saat menghapus data pengajaran: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data pengajaran.')
                ->with('type', 'toastr');
        }
    }
}

