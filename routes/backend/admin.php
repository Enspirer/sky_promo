<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmailBuilkController;
use App\Http\Controllers\Backend\CampaignController;
use App\Http\Controllers\Backend\CompaniesController;
use App\Http\Controllers\ImportExportExcel\ImportExportExcelController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('emailbuilk', [EmailBuilkController::class, 'index'])->name('emailbulk.index');
Route::get('emailbuilk/getdetails', [EmailBuilkController::class, 'GetDetableDetails'])->name('emailbulk.GetDetableDetails');
Route::post('emailbuilk/insert', [EmailBuilkController::class, 'add_email'])->name('emailbulk.add_email');
Route::post('emailbuilk/update', [EmailBuilkController::class, 'update_email'])->name('emailbulk.update_email');
// Route::get('emailbuilk/destroy/{id}', [EmailBuilkController::class, 'destroy'])->name('emailbulk.destroy');


Route::get('campaign', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
Route::post('campaign/create', [CampaignController::class, 'store'])->name('campaign.store');
Route::get('campaign/getdetails', [CampaignController::class, 'getDetails'])->name('campaign.getdetails');
Route::get('campaign/show_statics/{id}', [CampaignController::class, 'show_statics'])->name('campaign.show_statics');
Route::get('campaign/edit/{id}', [CampaignController::class, 'edit'])->name('campaign.edit');
Route::post('campaign/update', [CampaignController::class, 'update'])->name('campaign.update');
Route::get('campaign/delete/{id}', [CampaignController::class, 'destroy'])->name('campaign.destroy');

Route::get('companies', [CompaniesController::class, 'index'])->name('companies.index');
Route::post('companies/insert', [CompaniesController::class, 'add_company'])->name('companies.add_company');
Route::get('companies/getdetails', [CompaniesController::class, 'GetTableDetails'])->name('companies.GetTableDetails');
Route::post('companies/update', [CompaniesController::class, 'update_company'])->name('companies.update_company');
Route::get('companies/edit/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::get('companies/delete/{id}', [CompaniesController::class, 'destroy'])->name('companies.destroy');
// Route::post('companies/import', [CompaniesController::class, 'add_company'])->name('companies.add_company');
// Route::get('companies/export', [ImportExportExcelController::class, 'exportcompany'])->name('companies.exportcompany');

