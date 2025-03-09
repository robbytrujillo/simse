<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Category::all();
        return view('dashboard.vendors.index', compact('vendors'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:vendors,name',
                'description' => 'nullable|string',
            ]);

            Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('vendors.index')->with('success', 'vendor berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('vendors.index')->with('error', 'Terjadi kesalahan saat menambahkan vendor!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(['data' => $category]);
        } catch (Exception $e) {
            return response()->json(['error' => 'vendor tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:vendors,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('vendors.index')->with('success', 'vendor berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('vendors.index')->with('error', 'Terjadi kesalahan saat memperbarui vendor!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('vendors.index')->with('success', 'vendor berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('vendors.index')->with('error', 'Terjadi kesalahan saat menghapus vendor!')->with('type', 'toastr');
        }
    }
}

