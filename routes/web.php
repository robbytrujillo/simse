<?php 

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::prefix('dashboard')->group(function () {
    Route::get('/index', function () {
        return view('dashboard.home.index');
    })->name('dashboard.index');
    Route::get('/classrooms', function () {
        return view('dashboard.classrooms.index');
    })->name('classrooms.index');
    Route::get('/teachers', function () {
        return view('dashboard.teachers.index');
    })->name('teachers.index');
    Route::get('/mapels', function () {
        return view('dashboard.mapels.index');
    })->name('mapels.index');
    Route::get('/teachings', function () {
        return view('dashboard.teaching_data.index');
    })->name('teachings.index');
    Route::get('/teachings/edit', function () {
        return view('dashboard.teaching_data.edit');
    })->name('teachings.edit');
});
    
require __DIR__.'/auth.php';
?>