<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// hanya uji coba
// use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Collection;

// Route::get('/test-excel', function () {
//     $data = collect([
//         ['Nama' => 'John Doe', 'Email' => 'johndoe@example.com'],
//         ['Nama' => 'Jane Doe', 'Email' => 'janedoe@example.com'],
//     ]);

//     return Excel::download(new class($data) implements \Maatwebsite\Excel\Concerns\FromCollection {
//         protected $data;

//         public function __construct(Collection $data)
//         {
//             $this->data = $data;
//         }

//         public function collection()
//         {
//             return $this->data;
//         }
//     }, 'test.xlsx');
// });


require __DIR__.'/auth.php';
