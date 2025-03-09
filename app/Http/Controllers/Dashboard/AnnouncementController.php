<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Exception;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('dashboard.announcements.index', compact('announcements'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:announcements,title',
                'content' => 'required|string',
                'published_at' => 'nullable|date',
            ]);

            Announcement::create([
                'title' => $request->title,
                'content' => $request->content,
                'published_at' => $request->published_at,
            ]);

            return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('announcements.index')->with('error', 'Terjadi kesalahan saat menambahkan pengumuman!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            return response()->json(['data' => $announcement]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Pengumuman tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:announcements,title,' . $id,
                'content' => 'required|string',
                'published_at' => 'nullable|date',
            ]);

            $announcement = Announcement::findOrFail($id);
            $announcement->update([
                'title' => $request->title,
                'content' => $request->content,
                'published_at' => $request->published_at,
            ]);

            return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('announcements.index')->with('error', 'Terjadi kesalahan saat memperbarui pengumuman!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            $announcement->delete();

            return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('announcements.index')->with('error', 'Terjadi kesalahan saat menghapus pengumuman!')->with('type', 'toastr');
        }
    }
}

