<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Models\Perfil;
use App\Http\Middleware\VerifyCsrfToken; // 👈 importa el middleware aquí

// Vista principal (HTML)
Route::get('/', function () {
    $perfiles = Perfil::all();
    return view('perfiles', compact('perfiles'));
});

Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

Route::get('perfiles', [PerfilController::class, 'index']);
Route::post('perfiles', [PerfilController::class, 'store']);      // ya sin withoutMiddleware
Route::get('perfiles/{perfile}', [PerfilController::class, 'show']);
Route::put('perfiles/{perfile}', [PerfilController::class, 'update']);
Route::delete('perfiles/{perfile}', [PerfilController::class, 'destroy']);