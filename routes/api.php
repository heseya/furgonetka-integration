<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InstallationController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InfoController::class, 'index']);

Route::post('/install', [InstallationController::class, 'install']);
Route::post('/uninstall', [InstallationController::class, 'uninstall']);

Route::get('/config', [ConfigController::class, 'show'])
    ->middleware('can:configure');
Route::post('/config', [ConfigController::class, 'show'])
    ->middleware('can:configure');

Route::get('/orders', [OrdersController::class, 'show']);

// TODO
// Route::post('/orders/{id}/tracking_number', [OrdersController::class, 'show']);
