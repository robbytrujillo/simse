<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Category;
use App\Models\ClassRoom;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Exception;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with(['category', 'vendor', 'classroom'])->get();
        $categories = Category::all();
        $vendors = Vendor::all();
        $classes = ClassRoom::all();
        return view('dashboard.inventories.index', compact('inventories', 'categories', 'vendors', 'classes'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'item_code' => 'required|string|max:255|unique:inventories,item_code',
                'item_name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'vendor_id' => 'required|exists:vendors,id',
                'description' => 'nullable|string',
                'class_id' => 'required|exists:class_rooms,id',
                'quantity' => 'required|integer|min:1',
                'condition' => 'nullable|string',
                'procurement_date' => 'nullable|date',
                'remarks' => 'nullable|string',
            ]);

            Inventory::create($request->all());

            return redirect()->route('inventories.index')->with('success', 'Inventory berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('inventories.index')->with('error', 'Terjadi kesalahan saat menambahkan inventory!')->with('type', 'toastr');
        }
    }

    public function show($id)
    {
        try {
            $inventory = Inventory::with(['category', 'vendor'])->findOrFail($id);
            return response()->json(['data' => $inventory]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Inventory tidak ditemukan!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'item_code' => 'required|string|max:255|unique:inventories,item_code,' . $id,
                'item_name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'vendor_id' => 'required|exists:vendors,id',
                'description' => 'nullable|string',
                'class_id' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'condition' => 'nullable|string',
                'procurement_date' => 'nullable|date',
                'remarks' => 'nullable|string',
            ]);

            $inventory = Inventory::findOrFail($id);
            $inventory->update($request->all());

            return redirect()->route('inventories.index')->with('success', 'Inventory berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('inventories.index')->with('error', 'Terjadi kesalahan saat memperbarui inventory!')->with('type', 'toastr');
        }
    }

    public function destroy($id)
    {
        try {
            Inventory::findOrFail($id)->delete();
            return redirect()->route('inventories.index')->with('success', 'Inventory berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('inventories.index')->with('error', 'Terjadi kesalahan saat menghapus inventory!')->with('type', 'toastr');
        }
    }
}

