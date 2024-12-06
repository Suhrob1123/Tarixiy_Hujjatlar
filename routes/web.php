<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Asosiy sahifa
Route::get('/', [DocumentController::class, 'index'])->name('home');
Route::get('/admin', [DocumentController::class, 'admin'])->name('admin');

// Faqat autentifikatsiyadan o‘tgan foydalanuvchilar uchun marshrutlar
Route::middleware(['auth'])->group(function () {

    // Hujjatlarni boshqarish marshrutlari
    Route::post('/document', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/document/{id}', [DocumentController::class, 'show'])->name('documents.show');
    Route::delete('/document/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    // Admin paneliga kirish
    

    // Profilni boshqarish marshrutlari
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::patch('/document/{id}/approve', [DocumentController::class, 'approve'])->name('documents.approve');
Route::get('/category/{category}', [DocumentController::class, 'category'])->name('documents.category');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create')->middleware('auth');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store')->middleware('auth');
Route::post('/document/{id}/comment', [DocumentController::class, 'comment'])->name('documents.comment');


// Dashboard sahifasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Autentifikatsiya bilan bog‘liq marshrutlar
require __DIR__.'/auth.php';
