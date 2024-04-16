<?php

use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/api/projects', [\App\Http\Controllers\API\ProjectController::class, 'index'])->name('apiprojects');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/project', ProjectController::class);
    Route::resource('/competence', CompetenceController::class);

    Route::get('/mesProjets', [ProjectController::class, 'index'])->name('projects');

    Route::get('/accueil', [ProjectController::class, 'create'])->name('dashboard');

    Route::get('/mesProjets/{project}', [ProjectController::class, 'show'])->name('show');


    Route::put('/projects/{project}/change-status', [ProjectController::class, 'changeStatus'])->name('changer_statut');

});

require __DIR__ . '/auth.php';
