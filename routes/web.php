<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use Spatie\Permission\Middleware\RoleMiddleware;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('books', BookController::class);
    Route::post('/borrow/{book}', [BorrowingController::class, 'borrow'])->name('borrow');
    Route::post('/return/{book}', [BorrowingController::class, 'return'])->name('return');
});
route::group([RoleMiddleware::class. ':admin'], function () {
    route::get('/admin/stats', [BorrowingController::class, 'stats'])->name('admin.stats');
});
require __DIR__.'/auth.php';
