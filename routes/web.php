<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PPPoEController;
use App\Http\Controllers\PackageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pppoe-users', [PPPoEController::class, 'index'])->name('admin.pppoe-users.index');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/packages', [PackageController::class, 'index'])->name('admin.packages.index');
});
Route::get('/admin/packages/create', [PackageController::class, 'create'])->name('admin.packages.create');
Route::post('/admin/packages', [PackageController::class, 'store'])->name('admin.packages.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/packages', [PackageController::class, 'index'])->name('admin.packages.index');
    Route::get('/admin/packages/create', [PackageController::class, 'create'])->name('admin.packages.create');
    Route::post('/admin/packages', [PackageController::class, 'store'])->name('admin.packages.store');
    Route::get('/admin/packages/{package}/edit', [PackageController::class, 'edit'])->name('admin.packages.edit');
    Route::put('/admin/packages/{package}', [PackageController::class, 'update'])->name('admin.packages.update');
    Route::delete('/admin/packages/{package}', [PackageController::class, 'destroy'])->name('admin.packages.destroy');
});


require __DIR__.'/auth.php';
