<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;



// Route to display the donation form
Route::get('/', action: [DonationController::class, 'index'])->name('donation.form');
Route::get('/donate', action: [DonationController::class, 'index'])->name('donation.form');
Route::get(uri: '/about', action: [DonationController::class, 'about'])->name('donation.about');
Route::get(uri: '/projects', action: [DonationController::class, 'projects'])->name('donation.project');
Route::get(uri: '/reports', action: [DonationController::class, 'reports'])->name('donation.report');
Route::get('/offline-donate', [DonationController::class, 'offlineDonation'])->name('donation.offline');


// Route to handle the donation form submission
Route::post('/donate', [DonationController::class, 'store'])->name('donation.submit');

Route::get(uri: '/war-form', action: [FormController::class, 'index'])->name(name: 'warForm.index');
Route::post('/war-form', action: [FormController::class, 'store'])->name('warForm.submit');


