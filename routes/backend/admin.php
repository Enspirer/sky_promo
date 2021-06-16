<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmailBuilkController;
use App\Http\Controllers\Backend\CampaignController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('emailbuilk', [EmailBuilkController::class, 'index'])->name('emailbulk.index');
Route::get('emailbuilk/getdetails', [EmailBuilkController::class, 'GetDetableDetails'])->name('emailbulk.GetDetableDetails');
Route::post('emailbuilk/insert', [EmailBuilkController::class, 'add_email'])->name('emailbulk.add_email');


Route::get('campaign', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
Route::post('campaign/create', [CampaignController::class, 'store'])->name('campaign.store');
Route::get('campaign/getdetails', [CampaignController::class, 'getDetails'])->name('campaign.getdetails');
Route::get('campaign/show_statics/{id}', [CampaignController::class, 'show_statics'])->name('campaign.show_statics');

