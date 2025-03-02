<?php 

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

require __DIR__.'/auth.php';
?>