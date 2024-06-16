<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
})->middleware(['auth', 'handle.roles:admin'])->name('dashboard');  

Route::get('/userdashboard', [BookController::class, 'userDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('userdashboard');

Route::get('/books', [BookController::class, 'index'])->middleware(['auth', 'role:admin'])->name('index');

Route::get('/books/create', [BookController::class, 'create'])->middleware(['auth', 'role:admin'])->name('books.create');

Route::post('/books', [BookController::class, 'store'])->middleware(['auth', 'role:admin'])->name('books.store');

Route::get('/books/{book}/edit', [BookController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('books.edit');

Route::put('/books/{book}', [BookController::class, 'update'])->middleware(['auth', 'role:admin'])->name('books.update');

Route::delete('/books/{book}', [BookController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('books.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
