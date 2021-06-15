<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmailBuilkController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('emailbuilk', [EmailBuilkController::class, 'index'])->name('emailbulk.index');
Route::get('emailbuilk/getdetails', [EmailBuilkController::class, 'GetDetableDetails'])->name('emailbulk.GetDetableDetails');
