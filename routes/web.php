<?php

use Illuminate\Support\Facades\Route;

// Home
use App\Http\Controllers\HomeController;
Route::get('/api/nginx-status', [HomeController::class, 'getNginxStatus'])->name('api.nginx-status');
Route::get('/api/top-ips', [HomeController::class, 'getTopIpsData']);
// ========================================


// Vhosts
use App\Http\Controllers\VhostController;
Route::get('/api/list_hosts', [VhostController::class, 'index']);
Route::post('/api/vhosts', [VhostController::class, 'store']);
Route::put('/api/vhosts/{id}', [VhostController::class, 'update']);
Route::delete('/api/vhosts/{id}', [VhostController::class, 'destroy']);
Route::get('/api/vhosts/{id}/edit', [VhostController::class, 'edit'])->name('vhosts.edit');
Route::get('/api/vhosts/{id}', [VhostController::class, 'show']);

// IPs
use App\Http\Controllers\IpController;
Route::get('/api/list_ips', [IpController::class, 'api_index']);
Route::post('/api/ips', [IpController::class, 'store']);
Route::put('/api/ips/{id}', [IpController::class, 'update']);
Route::delete('/api/ips/{id}', [IpController::class, 'destroy']);

// FPM
use App\Http\Controllers\PhpController;
Route::get('/api/list_fpm_pools', [PhpController::class, 'api_index']);
Route::get('/api/fpm_check_aviability', [PhpController::class, 'check_port_aviability']);
Route::post('/api/php', [PhpController::class, 'store']);
Route::put('/api/php/{id}', [PhpController::class, 'update']);
Route::delete('/api/php/{id}', [PhpController::class, 'destroy']);

// Ports
use App\Http\Controllers\PortController;
Route::get('/api/list_ports', [PortController::class, 'api_index']);
Route::post('/api/ports', [PortController::class, 'store']);
Route::get('/api/ports/{port}/edit', [PortController::class, 'edit']);
Route::put('/api/ports/{port}', [PortController::class, 'update']);
Route::delete('/api/ports/{port}', [PortController::class, 'destroy']);

// Logs
use App\Http\Controllers\LogController;
Route::get('/api/logs', [LogController::class, 'index']);
Route::get('/api/logs_names', [LogController::class, 'index_names']);
Route::get('/api/logs_stream_names', [LogController::class, 'stream_names']);
Route::post('/api/logs', [LogController::class, 'store']);
Route::put('/api/logs/{id}', [LogController::class, 'update']);
Route::delete('/api/logs/{id}', [LogController::class, 'destroy']);
Route::get('/api/logs/stream', [LogController::class, 'streamLogs']);

// Settings
use App\Http\Controllers\SettingsController;
Route::get('/api/settings', [SettingsController::class, 'index']);
Route::post('/api/settings', [SettingsController::class, 'update']);
Route::get('/api/panel-title', [SettingsController::class, 'getPanelTitle']);

// Catch-all route to serve the Vue application
Route::get('/{any}', [SettingsController::class, 'app'])->where('any', '.*');





