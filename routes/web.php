<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TownshipController;


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PatientController::class, 'login']);   

Route::get('/login', [PatientController::class, 'login']);   


Route::get('/patients', [PatientController::class, 'index'])->middleware('auth'); 
Route::get('/patients/votpatient', [PatientController::class, 'votpatient'])->middleware('auth'); 

Route::get('/patients/filter', [PatientController::class, 'filter'])->name('filter-patients')->middleware('auth');
Route::get('/townships', [TownshipController::class, 'index'])->middleware('auth');

Route::get('/patients/add', [PatientController::class, 'add'])->middleware('auth');
Route::post('/patients/add', [PatientController::class, 'create'])->middleware('auth');


require __DIR__.'/auth.php';
