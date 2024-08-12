<?php

use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TestimonialController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('vacancies', JobController::class);
    Route::resource('applications', ApplicationController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('testimonials', TestimonialController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
