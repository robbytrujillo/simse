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
    Route::get('/students', function () {
        return view('dashboard.students.index');
    })->name('students.index');
    Route::get('/announcements', function () {
        return view('dashboard.announcements.index');
    })->name('announcements.index');
    Route::get('/categories', function () {
        return view('dashboard.categories.index');
    })->name('categories.index');
    Route::get('/vendors', function () {
        return view('dashboard.vendors.index');
    })->name('categories.index');
    Route::get('/inventories', function () {
        return view('dashboard.inventories.index');
    })->name('inventories.index');
    Route::get('/violations', function () {
        return view('dashboard.violations.index');
    })->name('violations.index');
    Route::get('/violation-types', function () {
        return view('dashboard.violation_types.index');
    })->name('violation-types.index');
    Route::get('/sanction-types', function () {
        return view('dashboard.sanction_types.index');
    })->name('sanction-types.index');
    Route::get('/achievements', function () {
        return view('dashboard.achievements.index');
    })->name('achievements.index');
    Route::get('/achievement-types', function () {
        return view('dashboard.achievement_types.index');
    })->name('achievement-types.index');
    Route::get('/achievement-awards', function () {
        return view('dashboard.achievement_awards.index');
    })->name('achievement-awards.index');
    Route::get('/curriculums', function () {
        return view('dashboard.curriculums.index');
    })->name('curriculums.index');
    Route::get('/silabuses', function () {
        return view('dashboard.silabus.index');
    })->name('silabuses.index');
    Route::get('/exams', function () {
        return view('dashboard.exams.index');
    })->name('exams.index');
    Route::get('/questions', function () {
        return view('dashboard.questions.index');
    })->name('questions.index');
    Route::get('/questions/create', function () {
        return view('dashboard.questions.create');
    })->name('questions.create');
    Route::get('/questions/edit', function () {
        return view('dashboard.questions.edit');
    })->name('questions.edit');
    Route::get('/questions/show', function () {
        return view('dashboard.questions.show');
    })->name('questions.show');
    Route::get('/tests', function () {
        return view('dashboard.tests.index');
    })->name('tests.index');
    Route::get('/tests/show', function () {
        return view('dashboard.tests.show');
    })->name('tests.show');
    Route::get('/tests/hasil', function () {
        return view('dashboard.tests.hasil');
    })->name('tests.hasil');
    Route::get('/tests/results', function () {
        return view('dashboard.tests.results');
    })->name('tests.results');
    Route::get('/tests/submit', function () {
        return view('dashboard.tests.submit');
    })->name('tests.submit');
    Route::get('/edit_profile', function () {
        return view('dashboard.users.update_user');
    })->name('users.edit_profile');
    Route::get('/configs', function () {
        return view('dashboard.config.index');
    })->name('settings.configs');
});
    
require __DIR__.'/auth.php';
?>