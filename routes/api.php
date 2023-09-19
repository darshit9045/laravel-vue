<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getHeaderData', [PageController::class, 'getHeaderData'])->name('getHeaderData');
Route::get('/getHompageData', [PageController::class, 'getHompageData'])->name('getHomepageData');
Route::get('/getAboutUsData', [PageController::class, 'getAboutUsData'])->name('getAboutUsData');
Route::get('/getContactUsData', [PageController::class, 'getContactUsData'])->name('getContactUsData');
Route::get('/getResidentialProjectsData', [PageController::class, 'getResidentialProjectsData'])->name('getResidentialProjectsData');
Route::get('/getCommercialProjectsData', [PageController::class, 'getCommercialProjectsData'])->name('getCommercialProjectsData');
Route::get('/getMalabarExoticaData', [PageController::class, 'getMalabarExoticaData'])->name('getMalabarExoticaData');

