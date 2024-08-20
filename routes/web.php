<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TestimonialController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('vacancies', [JobController::class, 'index'])->name('vacancies.index');
    Route::get('vacancies/create', [JobController::class, 'create'])->name('vacancies.create');
    Route::post('vacancies', [JobController::class, 'store'])->name('vacancies.store');
    Route::get('vacancies/{vacancy}', [JobController::class, 'show'])->name('vacancies.show');
    Route::get('vacancies/{vacancy}/edit', [JobController::class, 'edit'])->name('vacancies.edit');
    Route::put('vacancies/{vacancy}', [JobController::class, 'update'])->name('vacancies.update');
    Route::delete('vacancies/{vacancy}', [JobController::class, 'destroy'])->name('vacancies.destroy');
    
    Route::resource('applications', ApplicationController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('testimonials', TestimonialController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::post('/contact', [ContactController::class, 'store']);
