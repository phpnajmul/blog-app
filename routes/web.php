<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenancyRegisterController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('domains')->group(function (){
    Route::get('create',[TenancyRegisterController::class, 'create'])->name('domain.create');
    Route::post('store',[TenancyRegisterController::class, 'store'])->name('domain.store');
});


Route::get('test',[TenancyRegisterController::class, 'test']);



require __DIR__.'/auth.php';
