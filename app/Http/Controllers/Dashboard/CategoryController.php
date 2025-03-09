<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
                'description' => 'nullable|string',
            ]);

            Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Terjadi kesalahan saat menambahkan kategori!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(['data' => $category]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Kategori tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Terjadi kesalahan saat memperbarui kategori!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Terjadi kesalahan saat menghapus kategori!')->with('type', 'toastr');
        }
    }
}

