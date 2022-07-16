<?php

use App\Http\Controllers\Api\Auth\AuthController;

Route::prefix('auth')
     ->namespace('Auth')
     ->group(
         function () {
             Route::post('/', [AuthController::class, 'login'])->name('v1.auth.login');
             Route::middleware('auth:sanctum')
                  ->group(
                      function () {
                          Route::get('logout', [AuthController::class, 'logout'])->name('v1.auth.logout');
                      }
                  );
         }
     );
