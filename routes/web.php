<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\AchievementAwardController;
use App\Http\Controllers\Dashboard\AchievementController;
use App\Http\Controllers\Dashboard\AchievementTypeController;
use App\Http\Controllers\Dashboard\AnnouncementController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClassRoomController;
use App\Http\Controllers\Dashboard\DashboardConfigController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ExamController;
use App\Http\Controllers\Dashboard\InventoryController;
use App\Http\Controllers\Dashboard\KurikulumController;
use App\Http\Controllers\Dashboard\MapelController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\SanctionTypeController;
use App\Http\Controllers\Dashboard\SilabusController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\TeachingDataController;
use App\Http\Controllers\Dashboard\TestController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VendorController;
use App\Http\Controllers\Dashboard\ViolationController;
use App\Http\Controllers\Dashboard\ViolationTypeController;
use Illuminate\Support\Facades\Route;
Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::middleware(['auth', 'verified'])->prefix('/dashboard')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/classrooms', ClassRoomController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::post('/teachers/import', [TeacherController::class, 'import'])->name('teachers.import');
    Route::resource('/students', StudentController::class);
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
    Route::resource('/mapels', MapelController::class);
    Route::resource('/teachings', TeachingDataController::class);
    Route::resource('/announcements', AnnouncementController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/vendors', VendorController::class);
    Route::resource('/inventories', InventoryController::class);
    Route::resource('/violation-types', ViolationTypeController::class);
    Route::resource('/sanction-types', SanctionTypeController::class);
    Route::resource('/violations', ViolationController::class);
    Route::get('/get-students-by-class', [ViolationController::class, 'getStudentsByClass'])->name('getStudentsByClass');
    Route::get('/data/laporan', [ViolationController::class, 'export'])->name('violations.export');
    Route::resource('/achievement-types', AchievementTypeController::class);
    Route::resource('/achievement-awards', AchievementAwardController::class);
    Route::resource('/achievements', AchievementController::class);
    Route::get('/data/achievement', [AchievementController::class, 'export'])->name('achievements.export');
    Route::resource('/curriculums', KurikulumController::class);
    Route::resource('/silabuses', SilabusController::class);
    Route::resource('/exams', ExamController::class);
    Route::resource('/questions', QuestionController::class);
    Route::get('/questions/create/{exam_id}', [QuestionController::class, 'create'])->name('questions.create');
    Route::get('/questions/show/{exam_id}', [QuestionController::class, 'show'])->name('questions.lihat');
    Route::get('/questions/{exam}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
    Route::get('/hasilujian', [TestController::class, 'indexguru'])->name('hasil.index');
    Route::get('/tests/{id}/results', [TestController::class, 'exports'])->name('results.export');
    Route::get('/exams/{id}/results', [TestController::class, 'results'])->name('exams.results');
    Route::get('/tests/{exam}', [TestController::class, 'show'])->name('exams.mulai');
    Route::post('/tests/{exam}/answers', [TestController::class, 'storeAnswers'])->name('exams.storeAnswers');
    Route::post('/tests/{exam}/complete', [TestController::class, 'complete'])->name('exams.complete');
    Route::get('/edit_profile', [UserController::class, 'editUser'])->name('edit.profile');
    Route::put('/update_profile/{user}', [UserController::class, 'updateUser'])->name('update.profile');
    Route::get('configs', [DashboardConfigController::class, 'index'])->name('config.index');
    Route::put('configs/update', [DashboardConfigController::class, 'update'])->name('config.update');
    Route::get('/grafikAchievement', [DashboardController::class, 'grafikAchievement']);
    Route::get('/grafikPelanggaran', [DashboardController::class, 'grafikPelanggaran']);
    Route::get('/grafikBarang', [DashboardController::class, 'grafikBarang']);
    Route::get('/grafikPrestasi', [DashboardController::class, 'grafikPrestasi']);
});
require __DIR__ . '/auth.php';

