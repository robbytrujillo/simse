<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DashboardConfig;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;

class DashboardConfigController extends Controller
{
    public function index()
    {
        $config = DashboardConfig::first();
        return view('dashboard.config.index', compact('config'));
    }

    public function update(Request $request)
    {
        try {
            $config = DashboardConfig::first();

            $data = $request->validate([
                'text_header' => 'nullable|string|max:255',
                'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_favicon' => 'nullable|mimes:ico,png|max:512', 
                'text_footer' => 'nullable|string|max:255',
            ]);

            if ($request->hasFile('gambar_header')) {
                $data['gambar_header'] = $request->file('gambar_header')->store('dashboard', 'public');
            }

            if ($request->hasFile('gambar_favicon')) {
                $favicon = $request->file('gambar_favicon');

                if ($favicon->getClientOriginalExtension() === 'ico' || $favicon->getMimeType() === 'image/x-icon') {
                    $data['gambar_favicon'] = $favicon->store('dashboard', 'public');
                } else {
                    throw ValidationException::withMessages([
                        'gambar_favicon' => 'The favicon must be a valid .ico or .png file.',
                    ]);
                }
            }

            $config ? $config->update($data) : DashboardConfig::create($data);
            return redirect()->route('config.index')
                ->with('success', 'Konfigurasi berhasil diperbarui.')
                ->with('type', 'toastr');
        } catch (\Exception $e) {
            return redirect()->route('config.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui konfigurasi! ' . $e->getMessage())
                ->with('type', 'toastr');
        }
    }
}

