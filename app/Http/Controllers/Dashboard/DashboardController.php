<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TeachingData;
use App\Models\Violation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $todayInEnglish = Carbon::now()->format('l');

        $daysInIndonesian = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        $today = $daysInIndonesian[$todayInEnglish];
        Log::debug('Hari ini:', ['data' => $today]);
        $currentTime = Carbon::now()->format('H:i');

        $teacherId = Auth::id();
        $teachingData = TeachingData::where('teacher_id', $teacherId)
            ->with('mapel')
            ->get();

        $notifications = [];

        foreach ($teachingData as $data) {
            Log::debug('Teaching Data:', ['data' => $data]);

            $days = is_string($data->day) ? json_decode($data->day, true) : $data->day;
            $startTimes = is_string($data->start_time) ? json_decode($data->start_time, true) : $data->start_time;
            $endTimes = is_string($data->end_time) ? json_decode($data->end_time, true) : $data->end_time;

            Log::debug('Days:', ['days' => $days]);
            Log::debug('Start Times:', ['start_times' => $startTimes]);
            Log::debug('End Times:', ['end_times' => $endTimes]);

            if (is_array($days) && is_array($startTimes) && is_array($endTimes)) {
                foreach ($days as $index => $day) {
                    if ($day === $today) {
                        $startTime = $startTimes[$index] ?? '';
                        $endTime = $endTimes[$index] ?? '';

                        $notifications[] = 'Anda Memiliki Jadwal ' . $data->mapel->nama_mapel . ' di kelas ' . $data->classRoom->name . ' pada hari ini (' . $day . ') pukul ' . $startTime . ' - ' . $endTime . ')';
                    }
                }
            }
        }

        $upcoming = $this->upcomingSchedules();
        $announcements = Announcement::latest()->take(5)->get();

        return view('dashboard.home.index', [
            'notifications' => $notifications,
            'schedules' => $upcoming['schedules'],
            'filteredDays' => $upcoming['filteredDays'],
            'announcements' => $announcements,
        ]);
    }

    public function grafikAchievement()
    {
        $achievements = Achievement::with('achievementReward')
            ->get()
            ->groupBy('achievement_reward_id');

        $data = [
            'labels' => $achievements->map(fn($group) => $group->first()->achievementReward->name)->values()->all(),
            'series' => $achievements->map(fn($group) => $group->count())->values()->all(),
        ];

        return response()->json($data);
    }

    public function grafikPelanggaran()
    {
        $violations = Violation::selectRaw('COUNT(*) as total, MONTH(date) as month, YEAR(date) as year')
            ->groupBy('month', 'year')
            ->orderByRaw('YEAR(date), MONTH(date)')
            ->get();

        $data = [
            'labels' => [],
            'series' => [],
        ];

        foreach ($violations as $violation) {
            $monthYear = Carbon::create($violation->year, $violation->month, 1)->format('F Y');
            $data['labels'][] = $monthYear;
            $data['series'][] = $violation->total;
        }

        return response()->json($data);
    }

    public function grafikBarang()
    {
        $vendorData = Inventory::selectRaw('COUNT(*) as total, vendors.name as vendor_name')
            ->join('vendors', 'vendors.id', '=', 'inventories.vendor_id')
            ->groupBy('vendors.name')
            ->get();

        $chartData = [
            'labels' => $vendorData->pluck('vendor_name')->toArray(),
            'series' => [
                $vendorData->pluck('total')->toArray(),
            ],
        ];

        return response()->json([
            'labels' => $chartData['labels'],
            'series' => $chartData['series'],
        ]);
    }

    public function grafikPrestasi()
    {
        $startDate = Carbon::now()->subMonth();
        $endDate = Carbon::now();

        $totalAchievements = Achievement::whereBetween('date', [$startDate, $endDate])->count();

        return response()->json(['total' => $totalAchievements]);
    }

    public function upcomingSchedules()
    {
        $dayMapping = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        $daysAhead = collect(range(0, 2))
            ->map(fn($offset) => $dayMapping[Carbon::now()->addDays($offset)->format('l')])
            ->toArray();

        Log::debug('Days ahead:', ['daysAhead' => $daysAhead]);

        $filteredDays = [];
        foreach ($daysAhead as $day) {
            $schedulesForDay = TeachingData::whereJsonContains('day', $day)->exists();
            if ($schedulesForDay) {
                $filteredDays[] = $day;
            }
        }

        Log::debug('Filtered Days:', ['filteredDays' => $filteredDays]);

        $schedules = TeachingData::where(function ($query) use ($filteredDays) {
            foreach ($filteredDays as $day) {
                $query->orWhereJsonContains('day', $day);
            }
        })
            ->with(['teacher', 'mapel', 'classRoom'])
            ->get();

        Log::debug('Query schedules:', ['schedules' => $schedules]);

        return view('dashboard.home.index', compact('schedules', 'filteredDays'));
    }
}

