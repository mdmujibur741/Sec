<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminListController;
use App\Http\Controllers\Admin\SubmissionController as AdminSubController;
use App\Http\Controllers\Agent\SubmissionController as AgentSubController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Redirect;


// agent All route
Route::middleware(['auth', 'agent'])->prefix('agent/')->name('agent.')->group(function (){
    Route::resource('submissions', AgentSubController::class);
 });

// admin Route
Route::middleware(['auth', 'admin'])->prefix('admin/')->name('admin.')->group(function (){
       Route::resource('agents', AgentController::class);
       Route::resource('submissions', AdminSubController::class);
       Route::resource('lists', AdminListController::class);
       Route::get('/agents/active-status/{id}', [AgentController::class, 'status'])->name('agents.active.status');
    });

// pdf Route 
Route::get('pdf/view/{id}',[PDFController::class, 'pdfView'] )->name('web.view.pdf')->middleware('auth');
Route::get('pdf/download/{id}',[PDFController::class, 'pdfDownload'] )->name('web.download.pdf')->middleware('auth');
 Route::get('/verify/{id}',[VerifyController::class, 'verify'])->name('web.verify');

// dashboard route
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])
->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
});


Route::get('/', function () {
    return Redirect::route('login');
});

