<?php

use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;



// Route to display the donation form
Route::get('/', action: [DonationController::class, 'index'])->name('donation.form');
Route::get('/donate', action: [DonationController::class, 'index'])->name('donation.form');
Route::get(uri: '/about', action: [DonationController::class, 'about'])->name('donation.about');
Route::get('/offline-donate', [DonationController::class, 'offlineDonation'])->name('donation.offline');


// Route to handle the donation form submission
Route::post('/donate', [DonationController::class, 'store'])->name('donation.submit');


