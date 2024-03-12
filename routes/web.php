<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome'); // Assuming 'home' is the name of your home page view
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    // Group for all expense routes
    Route::resource('expenses', ExpenseController::class);
    
    // Route for approving expenses
    Route::post('expenses/{expense}/approve', [ExpenseController::class, 'approve'])->name('expenses.approve');
    
    // Route for denying expenses
    Route::post('expenses/{expense}/deny', [ExpenseController::class, 'deny'])->name('expenses.deny');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
