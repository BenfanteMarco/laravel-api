<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// COOLEGHIAMO LA ROTTA DELLA DASHBOARD AL FILE CONTROLLERS PER RICONOSCERE LA ROTTA DASHBOARD
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\PostController as PostController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// AUTH E VERIFIED SERVONO A CAPIRE SE L'USER È AUTENTICATO E VERIFICATO, SE SI ALLORA PASSA SOTTO
Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function(){
    // PRENDIAMO LA ROTTA DELLA DASHBOARD DOPO CHE L'UTENTE EFFETTUA IL LOGIN
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('/posts', PostController::class)->parameters([
        'posts' => 'post:slug'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
